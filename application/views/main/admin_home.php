
<script src="<?php echo base_url()."assets/"; ?>lib/ChartJS/Chart.js"></script>

<style>
    .help-block{
        font-style: italic;
        font-size: 11px;
    }
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
                    <i class="fa fa-user-circle-o fa-4x" style="color: white"></i>
                </a>
            </p>
            <h5 class="centered"><?php echo $_SESSION['uploader'];?></h5>
            <li class="mt"> 
                <a class="active" href="<?php echo base_url()?>admin/">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sub"> 
                <a href="<?php echo base_url()?>admin/material/add">
                    <i class="fa fa-plus-square"></i>
                    <span>Add Material</span>
                </a>
            </li>
            <li class="sub"> 
                <a href="<?php echo base_url()?>admin/material/verify">
                    <i class="fa fa-clock-o"></i>
                    <span>Verify Material</span>
                </a>
            </li>
            <li class="sub"> 
                <a href="<?php echo base_url()?>admin/material/published">
                    <i class="fa fa-check-circle"></i>
                    <span>Published Material</span>
                </a>
            </li>
            <li class="sub"> 
                <a class="" href="<?php echo base_url()?>admin/user/add">
                    <i class="fa fa-user-plus"></i>
                    <span>Add User</span>
                </a>
            </li>
            <li class="sub"> 
                <a href="<?php echo base_url()?>admin/user/view">
                    <i class="fa fa-group"></i>
                    <span>View user</span>
                </a>
            </li>
            <li class="sub"> 
                <a href="<?php echo base_url()?>admin/profile">
                    <i class="fa fa-user-circle"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url()?>logout/"> 
                    <i class="fa fa-sign-out"></i>
                    <span>Logout </span>
                </a>
            </li>
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
                                    <div class="row centered">
                                        <h1 class="mt">
                                            <i class="fa fa-users fa-2x" style="color: #01579B"></i>
                                        </h1>
                                        <div class="" style="color: #000000; font-size: 40px;"><b><?php echo $_SESSION['total_u'];?></b></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 mb">
                                <div class="weather-2 pn" style="background-color: #fff">
                                    <div class="weather-2-header centered" style="padding: 3px 0; background-color: #fff;">
                                        <h5 style=" color: #000000">VISITS</h5>
                                    </div>
                                    <div class="row centered">
                                        <h1 class="mt">
                                            <i class="fa fa-eye fa-2x" style="color: #01579B"></i>
                                        </h1>
                                        <div class="" style="color: #000000; font-size: 40px;"><b><?php echo $_SESSION['total_v'];?></b></div>
                                    </div>
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
            url:"<?php echo base_url() . 'Admin_controller/get_top_encoder'; ?>",  

            success:function(response) {
                document.getElementById("display_top_encoder").innerHTML=response;
            }
        });

        $.ajax({
            type:'post',
            url:"<?php echo base_url() . 'Admin_controller/get_top_category'; ?>",  

            success:function(response) {
                document.getElementById("display_top_category").innerHTML=response;
            }
        });

        var cData = JSON.parse(`<?php echo $chart_data; ?>`);
        var ctx = $("#pie-chart");

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
                hoverBackgroundColor: 'gray'
            }]
        };

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

        var chart1 = new Chart(ctx, {
            type: "bar",
            data: data,
            options: options
        });

        var ctx_categ = $("#pie-chart-categ");
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

<script class="include" type="text/javascript" src="<?php echo base_url()."assets/"; ?>lib/jquery.dcjqaccordion.2.7.js"></script>

<script src="<?php echo base_url()."assets/"; ?>lib/common-scripts.js"></script>
<script src="<?php echo base_url()."assets/"; ?>lib/advanced-form-components.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script src="<?php echo base_url()."assets/tags-input/"; ?>bootstrap-tagsinput.js"></script>
<script src="<?php echo base_url()."assets/tags-input/"; ?>bootstrap-tagsinput-angular.js"></script>
