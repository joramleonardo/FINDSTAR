
<script src="<?php echo base_url()."assets/"; ?>lib/ChartJS/Chart.js"></script>

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
          <i class="fa fa-user-circle-o fa-4x" style="color: white"></i>
        </a>
      </p>
      <h5 class="centered"><?php echo $_SESSION['uploader'];?></h5>
      <li class="sub"> 
        <a class="active" href="<?php echo base_url()?>encoder">
          <i class="fa fa-dashboard"></i>
          <span>Dashboard</span>
          </a>
      </li>
      <li class="sub"> 
        <a href="<?php echo base_url()?>encoder/material/add">
          <i class="fa fa-plus-square"></i>
          <span>Add Material</span>
          </a>
      </li>
      <li class="sub"> 
        <a class="" href="<?php echo base_url()?>encoder/material/pending">
          <i class="fa fa-clock-o"></i>
          <span>Pending Material</span>
          </a>
      </li>
      <li class="sub"> 
        <a href="<?php echo base_url()?>encoder/profile">
          <i class="fa fa-user-circle"></i>
          <span>Profile</span>
          </a>
      </li>
      <li>
        <a href="<?php echo base_url()?>logout/"> 
          <i class="fa fa-sign-out"></i>
          <span>Logout</span>
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
                            <div class="col-md-4 col-sm-4 mb">
                                <div class="darkblue-panel pn" style="background-color: #fff">
                                    <div class="darkblue-header">
                                        <h5 style=" color: #000000">Materials Encoded</h5>
                                    </div>
                                    <div class="row centered">
                                        <h1 class="mt">
                                            <i class="fa fa-tasks fa-2x" style="color: #01579B"></i>
                                        </h1>
                                        <div class="" style="color: #000000; font-size: 40px;"><b><?php echo $_SESSION['total_material'];?></b></div>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-4 col-sm-4 mb">
                                <div class="green-panel pn" style="background-color: #fff">
                                    <div class="green-header" style="background-color: #fff;">
                                        <h5 style=" color: #000000">Pending Materials</h5>
                                    </div>
                                    <div class="row centered">
                                        <h1 class="mt">
                                            <i class="fa fa-clock-o fa-2x" style="color: #01579B"></i>
                                        </h1>
                                        <div class="" style="color: #000000; font-size: 40px;"><b><?php echo $_SESSION['total_pending'];?></b></div>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-4 col-sm-4 mb">
                                <div class="weather-2 pn" style="background-color: #fff">
                                    <div class="weather-2-header centered"style="padding: 3px 0; background-color: #fff;">
                                        <h5 style=" color: #000000">Published Materials</h5>
                                    </div>
                                    <div class="row centered">
                                        <h1 class="mt">
                                            <i class="fa fa-check-circle fa-2x" style="color: #01579B"></i>
                                        </h1>
                                        <div class="" style="color: #000000; font-size: 40px;"><b><?php echo $_SESSION['total_publish'];?></b></div>
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
                                    <h3><?php echo $_SESSION['uploader'];?></h3>
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
            url:"<?php echo base_url() . 'Encoder_controller/get_top_category'; ?>",  

            success:function(response) {
                document.getElementById("display_top_category").innerHTML=response;
            }
        });

        var cData = JSON.parse(`<?php echo $chart_data; ?>`);
        var ctx = $("#pie-chart");

        var data = {
            labels: cData.label,
            datasets: [{
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

<script src="<?php echo base_url()."assets/"; ?>lib/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()."assets/"; ?>lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="<?php echo base_url()."assets/"; ?>lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url()."assets/"; ?>lib/bootstrap-daterangepicker/date.js"></script>
<script type="text/javascript" src="<?php echo base_url()."assets/"; ?>lib/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url()."assets/"; ?>lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url()."assets/"; ?>lib/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()."assets/"; ?>lib/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script src="<?php echo base_url()."assets/"; ?>lib/advanced-form-components.js"></script>