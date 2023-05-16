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
    $sta = new statistic();

    if(isset($_REQUEST['submit_time'])){
        if($_POST["staFrom"]<$_POST["staTo"]){
            if(isset($_POST['typeSta']) && $_POST['typeSta'] != -1){
                $getStatistic = $sta->get_type_statistic($_POST);
            }
            else{
                $getStatistic = $sta->get_date_statistic($_POST);
            }
        }
        else{
            $getStatistic = $sta->get_all_statistic();
        }
    }
    else{
        $getStatistic = $sta->get_all_statistic();
    }

    $getType = $sta->get_type_product();

    if($getStatistic){
        $chart_data ='';
        $total_arr = [];
        if(isset($_POST['typeSta']) && $_POST['typeSta'] != -1){
            while($data = $getStatistic->fetch_assoc()){
                $date_t = explode("-",$data["NgayLap"]);
                $date_order = $date_t[0] . "-" . "$date_t[1]";
                $check = true;

                foreach($total_arr as $d => $total){
                    if($d == $date_order){
                        $total += $data["TongGia"];
                        $total_arr = array_replace($total_arr,array($d=>$total));
                        $check = false;
                    }
                }
                if($check){
                    $total_arr[$date_order] = $data["TongGia"];
                }
            }
            
        }
        else{
            while($data = $getStatistic->fetch_assoc()){
                $date_t = explode("-",$data["NgayLap"]);
                $date_order = $date_t[0] . "-" . "$date_t[1]";
                $check = true;

                foreach($total_arr as $d => $total){
                    if($d == $date_order){
                        $total += $data["TongTien"];
                        $total_arr = array_replace($total_arr,array($d=>$total));
                        $check = false;
                    }
                }
                if($check){
                    $total_arr[$date_order] = $data["TongTien"];
                }
            }
        }
        $sort_total = new ArrayObject($total_arr);
        $sort_total->ksort();

        foreach($sort_total as $k => $total){
            $chart_data .= "{year: '".$k."', price: '".$total."'},";
        }
    }



    if(isset($_REQUEST['submit_pro'])){
        if($_POST["staProTo"] > $_POST["staProFrom"]){
            $getBestSeller = $sta->get_Sell($_POST); 
        }
        else{
            $getBestSeller = $sta->get_AllSell();
        }
    }
    else{
        $getBestSeller = $sta->get_AllSell();
    }
    if($getBestSeller){
        $chart_data_pro ='';
        $totalpro_arr = [];
        while($data_pro = $getBestSeller->fetch_assoc()){
            $check = true;
            foreach($totalpro_arr as $k => $value){
                    if($value["ProName"] == $data_pro["productName"]){
                        $value["SL"] += $data_pro["SoLuong"];
                        $totalpro_arr = array_replace($totalpro_arr,array($k=>$value));
                        $check = false;
                    }
            }

            if($check){
                $temp = ["SL"=>$data_pro["SoLuong"],"ProName"=>$data_pro["productName"]];
                $totalpro_arr[] = $temp;
            }
        }
        foreach($totalpro_arr as $key=>$value){
            $chart_data_pro .= "{name: '".$value["ProName"]."', total: '".$value["SL"]."'},";
        }
    }

?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Statistic</h2>
        <?php
            if(empty($chart_data) or empty($chart_data_pro)){
                echo "<h2>No Product Was Sold</h2>";
            }
        ?>
        <div class="formordered"> 
            <form action="" method="POST">
                <span>Filter Times: </span>
                <label>From </label><input type="date" name="staFrom" id="staFrom">
                <label>To </label><input type="date" name="staTo" id="staTo">
                <select name="typeSta" id="typeSta">
                    <option value="-1"></option>
                    <?php if($getType){
                        while($data = $getType->fetch_assoc()){ 
                            ?>
                            <option value="<?php echo $data['brandId']?>"><?php echo $data['brandName'] ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
                <input type="submit" value="Filter" name="submit_time">
        </form>
        </div>
        <div id="chart" style="height: 225x;"></div>
        <h2>BestSeller</h2>
        <div class = "formordered">
            <form action="" method="post">
                <label>From </label><input type="date" name="staProFrom" id="staProFrom">
                <label>To </label><input type="date" name="staProTo" id="staProTo">
                <input type="submit" value="Filter" name="submit_pro">
            </form>
        </div>
        <div id="chart_product" style="height: 225px;"></div>
    </div>    

</div>

<?php 
    include 'inc/footer.php';
?>


<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
    new Morris.Bar({
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
    labels: ['Total'],
    hideHover: true,
    });

    new Morris.Bar({
    // ID of the element in which to draw the chart.
    element: 'chart_product',
    // Chart data records -- each entry in this array corresponds to a point on
    // the chart.
    data: [
        <?php echo $chart_data_pro
             ?>
    ],
    
    // The name of the data record attribute that contains x-values.
    xkey: 'name',
    // A list of names of data record attributes that contain y-values.
    ykeys: ['total'],
    // Labels for the ykeys -- will be displayed when you hover over the
    // chart.
    labels: ['Total'],
    hideHover: true,
    axes: false,
    });
</script>