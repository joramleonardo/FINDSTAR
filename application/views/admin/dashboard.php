
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="<?php echo base_url()?>profile/"><img src="<?php echo base_url()."assets/"; ?>img/logo.png" class="" width="80"></a></p>
          <h5 class="centered">ADMIN PANEL</h5>
          <li class="mt"> <!-- DASHBOARD -->
            <a class="active" href="<?php echo base_url()?>admin/dashboard/">
              <i class="fa fa-home"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub"> <!-- PROFILE -->
            <a href="<?php echo base_url()?>admin/profile/">
              <i class="fa fa-user"></i>
              <span>Profile</span>
              </a>
          </li>
          <li class="sub-menu"><!-- MATERIALS -->
            <a href="javascript:;">
              <i class="fa fa-book"></i>
              <span>Manage Materials</span>
              </a>
            <ul class="sub">
              <li><a href="<?php echo base_url()?>list_material/">My List</a></li> <!-- View Edit Delete -->
              <li><a href="<?php echo base_url()?>add_material/">Add Material</a></li>
            </ul>
          </li>
          <li class="sub"> <!-- USERS -->
            <a href="<?php echo base_url()?>admin/users/">
              <i class="fa fa-users"></i>
              <span>Manage Users</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url()?>login/"> <!-- LOGOUT -->
              <i class="fa fa-sign-out"></i>
              <span>Logout </span>
              </a>
          </li>
        </ul>
      </div>
    </aside>

    
    <!--main content-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-book"></i> LIST OF ALL MATERIALS</h3>
        <div class="row">
          <div class="col-lg-9 main-chart">
            <div class="content-panel">
              <!-- For search input  -->
              <div class="col-md-2" style="margin-left: 10px;">
                <input id="search_input" class="form-control mr-sm-2" type="text" placeholder="Search...">
              </div><br><br>  
              <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                   <!--  <th><i class="fa fa-list-ul"></i>  ID</th> -->
                    <th><i class="fa fa-list-ul"></i>  Activity Title</th>
                    <th><i class="fa fa-file-text"></i>  File Name</th>
                    <th><i class="fa fa-th"></i>  File Type</th>
                    <th><i class=" fa fa-folder-open"></i>  File</th>
                    <th><i class=" fa fa-calendar"></i>  Activity Start Date</th>
                    <th><i class=" fa fa-calendar"></i>  Activity End Date</th>
                    <th><i class=" fa fa-edit"></i>  Source</th>
                    <th><i class=" fa fa-user"></i>  Uploader</th>
                    <!-- <th><i class=" fa fa-user"></i>  Uploader Role</th> -->
                    <th><i class=" fa fa-question-circle"></i>  Division</th>
                    <th><i class=" fa fa-edit"></i>  Action</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody id="search_table">
                  <?php if(count($posts)):?>
                  <?php foreach($posts as $post):?>
                  <tr>
                    <!-- <td><?php echo $post->material_id;?></td> -->
                    <td><?php echo $post->material_title;?></td>
                    <td><?php echo $post->material_fileName;?></td>
                    <td><?php echo $post->material_fileType;?></td>
                    <td><?php echo $post->material_file;?></td>
                    <td><?php echo $post->material_startDate;?></td>
                    <td><?php echo $post->material_endDate;?></td>
                    <td><?php echo $post->material_source;?></td>
                    <td><?php echo $post->material_uploader;?></td>
                    <!-- <td><?php echo $post->material_uploaderRole;?></td> -->
                    <td><?php echo $post->material_division;?></td>
                    <td>
                      <?php
                        echo anchor('Display_controller/delete','Download',['class'=>'btn btn-danger btn-xs']);
                      ?>
                    </td>
                  </tr>
                  <?php endforeach;?>
                   <?php else:?>
                      <tr>
                         <td>No Records Found!</td>
                      </tr>
                   <?php endif;?>
                </tbody>
              </table>
            </div>

            <!-- 1st ROW -->
            <!-- <div class="row mt">
              <div class="col-md-4 col-sm-4 mb">
                <div class="grey-panel pn donut-chart">
                  <div class="grey-header">
                    <h5>SERVER LOAD</h5>
                  </div>
                  <canvas id="serverstatus01" height="120" width="120"></canvas>
                  <script>
                    var doughnutData = [{
                        value: 70,
                        color: "#FF6B6B"
                      },
                      {
                        value: 30,
                        color: "#fdfdfd"
                      }
                    ];
                    var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
                  </script>
                  <div class="row">
                    <div class="col-sm-6 col-xs-6 goleft">
                      <p>Usage<br/>Increase:</p>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                      <h2>21%</h2>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h5>DROPBOX STATICS</h5>
                  </div>
                  <canvas id="serverstatus02" height="120" width="120"></canvas>
                  <script>
                    var doughnutData = [{
                        value: 60,
                        color: "#1c9ca7"
                      },
                      {
                        value: 40,
                        color: "#f68275"
                      }
                    ];
                    var myDoughnut = new Chart(document.getElementById("serverstatus02").getContext("2d")).Doughnut(doughnutData);
                  </script>
                  <p>April 17, 2014</p>
                  <footer>
                    <div class="pull-left">
                      <h5><i class="fa fa-hdd-o"></i> 17 GB</h5>
                    </div>
                    <div class="pull-right">
                      <h5>60% Used</h5>
                    </div>
                  </footer>
                </div>
              </div>
              <div class="col-md-4 col-sm-4 mb">
                <div class="green-panel pn">
                  <div class="green-header">
                    <h5>REVENUE</h5>
                  </div>
                  <div class="chart mt">
                    <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,464,655]"></div>
                  </div>
                  <p class="mt"><b>$ 17,980</b><br/>Month Income</p>
                </div>
              </div>
            </div> -->
            <!-- 2nd ROW -->
            <!-- <div class="row">
              <div class="col-md-4 mb">
                <div class="twitter-panel pn">
                  <i class="fa fa-twitter fa-4x"></i>
                  <p>Dashio is here! Take a look and enjoy this new Bootstrap Dashboard theme.</p>
                  <p class="user">@Alvrz_is</p>
                </div>
              </div>
              <div class="col-md-4 col-sm-4 mb">
                <div class="green-panel pn">
                  <div class="green-header">
                    <h5>DISK SPACE</h5>
                  </div>
                  <canvas id="serverstatus03" height="120" width="120"></canvas>
                  <script>
                    var doughnutData = [{
                        value: 60,
                        color: "#2b2b2b"
                      },
                      {
                        value: 40,
                        color: "#fffffd"
                      }
                    ];
                    var myDoughnut = new Chart(document.getElementById("serverstatus03").getContext("2d")).Doughnut(doughnutData);
                  </script>
                  <h3>60% USED</h3>
                </div>
              </div>
              <div class="col-md-4 mb">
                <div class="instagram-panel pn">
                  <i class="fa fa-instagram fa-4x"></i>
                  <p>@THISISYOU<br/> 5 min. ago
                  </p>
                  <p><i class="fa fa-comment"></i> 18 | <i class="fa fa-heart"></i> 49</p>
                </div>
              </div>
            </div> -->
          </div>
          <div class="col-lg-3 ds">
            <h4 class="centered mt">RECENT ACTIVITY</h4>
            <div class="desc">
              <div class="thumb">
                <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
              </div>
              <div class="details">
                <p>
                  <muted>Just Now</muted>
                  <br/>
                  <a href="#">Paul Rudd</a> purchased an item.<br/>
                </p>
              </div>
            </div>
            <div class="desc">
              <div class="thumb">
                <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
              </div>
              <div class="details">
                <p>
                  <muted>2 Minutes Ago</muted>
                  <br/>
                  <a href="#">James Brown</a> subscribed to your newsletter.<br/>
                </p>
              </div>
            </div>
            <div class="desc">
              <div class="thumb">
                <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
              </div>
              <div class="details">
                <p>
                  <muted>3 Hours Ago</muted>
                  <br/>
                  <a href="#">Diana Kennedy</a> purchased a year subscription.<br/>
                </p>
              </div>
            </div>
            <div class="desc">
              <div class="thumb">
                <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
              </div>
              <div class="details">
                <p>
                  <muted>7 Hours Ago</muted>
                  <br/>
                  <a href="#">Brando Page</a> purchased a year subscription.<br/>
                </p>
              </div>
            </div>

            <div id="calendar" class="mb">
              <div class="panel green-panel no-margin">
                <div class="panel-body">
                  <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                    <div class="arrow"></div>
                    <h3 class="popover-title" style="disadding: none;"></h3>
                    <div id="date-popover-content" class="popover-content"></div>
                  </div>
                  <div id="my-calendar"></div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>
    </section>
    
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="<?php echo base_url()."assets/"; ?>lib/jquery/jquery.min.js"></script>

  <script src="<?php echo base_url()."assets/"; ?>lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="<?php echo base_url()."assets/"; ?>lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="<?php echo base_url()."assets/"; ?>lib/jquery.scrollTo.min.js"></script>
  <script src="<?php echo base_url()."assets/"; ?>lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="<?php echo base_url()."assets/"; ?>lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="<?php echo base_url()."assets/"; ?>lib/common-scripts.js"></script>
  <script type="text/javascript" src="<?php echo base_url()."assets/"; ?>lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="<?php echo base_url()."assets/"; ?>lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="<?php echo base_url()."assets/"; ?>lib/sparkline-chart.js"></script>
  <script src="<?php echo base_url()."assets/"; ?>lib/zabuto_calendar.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Welcome!',
        // (string | mandatory) the text inside the notification
        text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo.',
        // (string | optional) the image to display on the left
        image: '<?php echo base_url()."assets/"; ?>img/profile.png',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 8000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });
      return false;
    });
  </script>
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
    
     $(document).ready(function(){
       $("#search_input").on("keyup", function() {
         var value = $(this).val().toLowerCase();
         $("#search_table tr").filter(function() {
           $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
         });
       });
     });
  </script>
</body>