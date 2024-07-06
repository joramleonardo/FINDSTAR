
<script src="<?php echo base_url()."assets/"; ?>lib/ChartJS/Chart.js"></script>
<!-- <script src="<?php echo base_url()."assets/"; ?>lib/chart-master/Chart.js"></script> -->

<style>
    .help-block{
        font-style: italic;
        font-size: 11px;
    }

    /* Box styles */
    .myBox {
        height: 500px;
        overflow-y: scroll;
    }
</style>

<aside>
    <div id="sidebar" class="nav-collapse ">
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered">
                <a href="<?php echo base_url()?>profile/">
                    <img src="<?php echo base_url()."assets/"; ?>img/a.png" class="" width="80">
                </a>
            </p>
            <h5 class="centered"><?php echo $_SESSION['uploader'];?></h5>
            <!-- DASHBOARD -->
            <li class="mt"> 
                <a class="active" href="<?php echo base_url()?>admin/">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!-- MATERIAL -->
            <li class="sub"> 
                <a class="" href="<?php echo base_url()?>admin/material/add">
                    <i class="fa fa-folder"></i>
                    <span>Add Material</span>
                </a>
            </li>
            <li class="sub"> 
                <a href="<?php echo base_url()?>admin/material/publish">
                    <i class="fa fa-pencil"></i>
                    <span>Publish Material</span>
                </a>
            </li>
            <li class="sub"> 
                <a href="<?php echo base_url()?>admin/material/view">
                    <i class="fa fa-eye"></i>
                    <span>View Material</span>
                </a>
            </li>
            <!-- USER -->
            <li class="sub"> 
                <a class="" href="<?php echo base_url()?>admin/user/add">
                    <i class="fa fa-user"></i>
                    <span>Add User</span>
                </a>
            </li>
            <li class="sub"> 
                <a href="<?php echo base_url()?>admin/user/view">
                    <i class="fa fa-eye"></i>
                    <span>View user</span>
                </a>
            </li>
            <!-- LOGOUT -->
            <li>
                <a href="<?php echo base_url()?>logout/"> 
                    <i class="fa fa-sign-out"></i>
                    <span>Logout </span>
                </a>
            </li>
            <!-- PROFILE -->
            <!-- <li class="sub"> 
                <a href="<?php echo base_url()?>profile/">
                    <i class="fa fa-user"></i>
                    <span>Profile</span>
                </a>
            </li> -->
        </ul>
    </div>
</aside>

<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-12">

                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="row" id="display_analytics">
                            <div class="col-md-3 col-sm-3 mb">
                                <div class="darkblue-panel pn" style="background-color: #fff">
                                    <div class="darkblue-header">
                                        <h5 style=" color: #000000">MATERIALS</h5>
                                    </div>
                                    <div class="row centered">
                                        <h1 class="mt">
                                            <i class="fa fa-tasks fa-2x" style="color: #01579B"></i>
                                        </h1>
                                        <div class="" style="color: #000000; font-size: 40px;"><b><?php echo $_SESSION['total_m'];?></b></div>
                                    </div>
                                    <!-- <p>April 17, 2014</p> -->
                                </div>
                            </div> 
                            <div class="col-md-3 col-sm-3 mb">
                                <div class="green-panel pn" style="background-color: #fff">
                                    <div class="green-header" style="background-color: #fff;">
                                        <h5 style=" color: #000000">DOWNLOADS</h5>
                                    </div>
                                    <div class="row centered">
                                        <h1 class="mt">
                                            <i class="fa fa-download fa-2x" style="color: #01579B"></i>
                                        </h1>
                                        <div class="" style="color: #000000; font-size: 40px;"><b><?php echo $_SESSION['total_d'];?></b></div>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-3 col-sm-3 mb">
                                <div class="weather-2 pn" style="background-color: #fff">
                                    <div class="weather-2-header centered" style="padding: 3px 0; background-color: #fff;">
                                        <h5 style=" color: #000000">USERS</h5>
                                    </div>
                                    <!-- /weather-2 header -->
                                    <div class="row centered">
                                        <h1 class="mt">
                                            <i class="fa fa-users fa-2x" style="color: #01579B"></i>
                                        </h1>
                                        <div class="" style="color: #000000; font-size: 40px;"><b><?php echo $_SESSION['total_u'];?></b></div>
                                    </div>
                                    <!-- <div class="row centered">
                                        <h1 class="mt">
                                            <i class="fa fa-user fa-2x" style="color: #01579B"></i>
                                        </h1>
                                        <p><?php echo $_SESSION['top_e'];?></p>
                                        <footer>
                                            <div class="centered">
                                                <h5>
                                                    <i class="fa fa-trophy"></i> <?php echo $_SESSION['top_e_m'];?>
                                                </h5>
                                            </div>
                                        </footer>
                                    </div> -->
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 mb">
                                <div class="weather-2 pn" style="background-color: #fff">
                                    <div class="weather-2-header centered" style="padding: 3px 0; background-color: #fff;">
                                        <h5 style=" color: #000000">TOP CATEGORY</h5>
                                    </div>
                                    <!-- /weather-2 header -->
                                    <div class="row centered">
                                        <h1 class="mt">
                                            <i class="fa fa-list fa-2x" style="color: #01579B"></i>
                                        </h1>
                                        <div class="" style="color: #000000; font-size: 40px;"><b><?php echo $_SESSION['total_u'];?></b></div>
                                    </div>
                                    <!-- <div class="row centered">
                                        <h1 class="mt">
                                            <i class="fa fa-user fa-2x" style="color: #01579B"></i>
                                        </h1>
                                        <p><?php echo $_SESSION['top_e'];?></p>
                                        <footer>
                                            <div class="centered">
                                                <h5>
                                                    <i class="fa fa-trophy"></i> <?php echo $_SESSION['top_e_m'];?>
                                                </h5>
                                            </div>
                                        </footer>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div >
                            <div class='white-panel' style='height: 100%; margin: 10px 0'>
                                <div class='white-header' style='background-color: #01579B; color: #fff'>
                                    <h3><?php echo $_SESSION['division'];?></h3>
                                    <h5>TOP ENCODERS</h5>
                                </div>
                                <div id="display_top_encoder">
                                </div>
                            </div>     
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 mb">
                        <div class="chart-container">
                            <div class="pie-chart-container">
                                <canvas id="pie-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div >
                            <div class='white-panel' style='height: 100%; margin: 10px 0'>
                                <div class='white-header' style='background-color: #01579B; color: #fff'>
                                    <h3><?php echo $_SESSION['division'];?></h3>
                                    <h5>TOP CATEGORIES</h5>
                                </div>
                                <div id="display_top_category">
                                </div>
                            </div>      
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 mb">
                        <div class="chart-container">
                            <div class="pie-chart-container">
                                <canvas id="pie-chart-categ"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
</body>
</html>


<script type="text/javascript" language="javascript" >  
    $(document).ready(function(){
        $.ajax({
            type:'post',
            url:"<?php echo base_url() . 'SuperAdmin_controller/get_top_encoder'; ?>",  

            success:function(response) {
                document.getElementById("display_top_encoder").innerHTML=response;
            }
        });

        $.ajax({
            type:'post',
            url:"<?php echo base_url() . 'SuperAdmin_controller/get_top_category'; ?>",  

            success:function(response) {
                document.getElementById("display_top_category").innerHTML=response;
            }
        });

        //get the pie chart canvas
        var cData = JSON.parse(`<?php echo $chart_data; ?>`);
        var ctx = $("#pie-chart");
        //get the pie chart canvas

        //pie chart data
        var data = {
            labels: cData.label,
            datasets: [{
                label: "Materials Uploaded",
                data: cData.data,
                backgroundColor: [
                  "#039BE5",
                  "#0288D1",
                  "#0277BD",
                  "#01579B",

                  "#039BE5",
                  "#0288D1",
                  "#0277BD",
                  "#01579B",

                  "#039BE5",
                  "#0288D1",
                  "#0277BD",
                  "#01579B",

                  "#039BE5",
                  "#0288D1",
                  "#0277BD",
                  "#01579B",

                  "#039BE5",
                  "#0288D1",
                  "#0277BD",
                  "#01579B",
                ],
                // backgroundColor: '#4ECDC4',
                hoverBackgroundColor: 'gray'
            }]
        };

        //options
        var options = {
            responsive: true,
            title: {
                display: true,
                position: "top",
                text: "Total number of materials encoded by each encoder",
                fontSize: 18,
                fontColor: "#111"
            },
            legend: {
                display: true,
                position: "bottom",
                labels: {
                    fontColor: "#333",
                    fontSize: 16
                }
            },
            scales: {
                yAxes: [{
                    display: true,
                    ticks: {
                        beginAtZero: true,
                        min: 0.5,
                        suggestedMin: 0.5
                    }
                    
                }],
                yAxes: [{
                    display: true,
                    ticks: {
                        beginAtZero: true,
                        min: 0.5,
                        suggestedMin: 0.5
                    }
                }],
                xAxes: [{
                    minBarLength: 2
                }]
            }
        };
        //create Pie Chart class object
        var chart1 = new Chart(ctx, {
            type: "bar",
            data: data,
            options: options
        });



        var ctx_categ = $("#pie-chart-categ");

        //create Pie Chart class object
        var chart1_categ = new Chart(ctx_categ, {
            type: "bar",
            data: {
                labels: cData.label2,
                datasets: [{
                    label: "Materials Uploaded",
                    data: cData.data2,
                    backgroundColor: [
                      "#039BE5",
                      "#0288D1",
                      "#0277BD",
                      "#01579B",

                      "#039BE5",
                      "#0288D1",
                      "#0277BD",
                      "#01579B",

                      "#039BE5",
                      "#0288D1",
                      "#0277BD",
                      "#01579B",

                      "#039BE5",
                      "#0288D1",
                      "#0277BD",
                      "#01579B",

                      "#039BE5",
                      "#0288D1",
                      "#0277BD",
                      "#01579B",
                    ],
                    // backgroundColor: '#4ECDC4',
                    hoverBackgroundColor: 'gray'
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    position: "top",
                    text: "Total number of materials encoded to each category",
                    fontSize: 18,
                    fontColor: "#111"
                },
                legend: {
                    display: true,
                    position: "bottom",
                    labels: {
                        fontColor: "#333",
                        fontSize: 16
                    }
                },
                scales: {
                    yAxes: [{
                        display: true,
                        ticks: {
                            beginAtZero: true,
                            min: 0.5,
                            suggestedMin: 0.5
                        }
                        
                    }],
                    yAxes: [{
                        display: true,
                        ticks: {
                            beginAtZero: true,
                            min: 0.5,
                            suggestedMin: 0.5
                        }
                    }],
                    xAxes: [{
                        minBarLength: 2
                    }]
                }
            }
        });
    }); 

</script>  

<script src="<?php echo base_url()."assets/"; ?>lib/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()."assets/"; ?>lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="<?php echo base_url()."assets/"; ?>lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url()."assets/"; ?>lib/bootstrap-daterangepicker/date.js"></script>
<script type="text/javascript" src="<?php echo base_url()."assets/"; ?>lib/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url()."assets/"; ?>lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url()."assets/"; ?>lib/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()."assets/"; ?>lib/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script src="<?php echo base_url()."assets/"; ?>lib/advanced-form-components.js"></script>
