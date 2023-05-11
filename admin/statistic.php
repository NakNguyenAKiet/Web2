<?php 
    include 'inc/header.php';
    include 'inc/sidebar.php';
    include '../helpers/format.php';
    include '../lib/database.php';

    spl_autoload_register(function ($classname)
    {
        include_once "../classes/".$classname.".php";
    });

    $fm = new Format();
    $cart = new cart();

    $getAllStatistic = $cart->get_all_statistic();

    $chart_data ='';

    if($getAllStatistic){
        $mont_arr = [1,2,3,4,5,6,7,8,9,10,11,12];
        $total_arr = [1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0,8=>0,9=>0,10=>0,11=>0,12=>0];
        while($data = $getAllStatistic->fetch_assoc()){
            $date_curr = getdate();
            $year_curr = $date_curr['year'];
            $date_order = explode("-", $data["date_order"]);
            $check_month = true;

            if($year_curr == $date_order[0]){
                foreach($mont_arr as $month){
                    if($month == (int)$date_order[1]){
                        foreach($total_arr as $key => $total){
                            if($key == (int)$date_order[1]){
                                $total += $data["price"];
                                $total_arr = array_replace($total_arr,array($key=>$total));
                            }
                        }
                    }
                }
            }
                
        }
        foreach($total_arr as $mo => $total){
            $chart_data .= "{ year:'".$year_curr."-".$mo."', price:".$total."}, ";
        }
    }

?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Statistic</h2>
        <div id="chart" style="height: 250px;"></div>
    </div>    

</div>

<?php 
    include 'inc/footer.php';
?>


<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
    new Morris.Area({
    // ID of the element in which to draw the chart.
    element: 'chart',
    // Chart data records -- each entry in this array corresponds to a point on
    // the chart.
    data: [
        <?php echo $chart_data
             ?>
    ],
    
    // The name of the data record attribute that contains x-values.
    xkey: 'year',
    // A list of names of data record attributes that contain y-values.
    ykeys: ['price'],
    // Labels for the ykeys -- will be displayed when you hover over the
    // chart.
    labels: ['Total']
    });
</script>