<body>
  <section id="container">

    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="<?php echo base_url()?>profile/"><img src="<?php echo base_url()."assets/"; ?>img/logo.png" class="" width="80"></a></p>
          <h5 class="centered">(ENCODER NAME HERE)</h5>
          <li class="mt"> <!-- DASHBOARD -->
            <a href="<?php echo base_url()?>dashboard/">
              <i class="fa fa-home"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub"> <!-- MATERIAL -->
            <a href="<?php echo base_url()?>material/">
              <i class="fa fa-home"></i>
              <span>Materials</span>
              </a>
          </li>
          <li class="sub"> <!-- PROFILE -->
            <a class="active" href="<?php echo base_url()?>profile/">
              <i class="fa fa-user"></i>
              <span>Profile</span>
              </a>
          </li>
          <li>
            <a href="<?php echo base_url()?>logout/"> <!-- LOGOUT -->
              <i class="fa fa-sign-out"></i>
              <span>Logout </span>
              </a>
          </li>
        </ul>
      </div>
    </aside>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <h3><i class="fa fa-user"></i> MANAGE PROFILE</h3>
        <div class="row">
          
          <div class="col-lg-12 ">
            <div class="row content-panel">
              <div class="panel-heading">
                <ul class="nav nav-tabs nav-justified">
                  <li class="active">
                    <a data-toggle="tab" href="#overview">Overview</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#edit">Edit Profile</a>
                  </li>
                </ul>
              </div>

              <div class="panel-body">
                <div class="tab-content">

                  <div id="overview" class="tab-pane active">
                    <div class="row">
                      <div class="col-lg-8 col-lg-offset-2 ">
                        <div class="detailed">
                          <h4>Recent Activity</h4>
                          <div class="recent-activity">
                            <div class="activity-icon bg-theme"><i class="fa fa-check"></i></div>
                            <div class="activity-panel">
                              <h5>1 HOUR AGO</h5>
                              <p>Purchased: Dashio Admin Panel & Front-end theme.</p>
                            </div>
                            <div class="activity-icon bg-theme"><i class="fa fa-check"></i></div>
                            <div class="activity-panel">
                              <h5>5 HOURS AGO</h5>
                              <p>Task Completed. Resolved issue with Disk Space.</p>
                            </div>
                            <div class="activity-icon bg-theme"><i class="fa fa-check"></i></div>
                            <div class="activity-panel">
                              <h5>3 DAYS AGO</h5>
                              <p>Launched a new product: Flat Pack Heritage.</p>
                            </div>
                          </div>
                          <!-- /recent-activity -->
                        </div>
                        <!-- /detailed -->
                      </div>
                    </div>
                  </div>

                  <div id="edit" class="tab-pane">
                    <div class="row">
                      <div class="col-lg-8 col-lg-offset-2 detailed">
                        <h4 class="mb">Personal Information</h4>
                        <form role="form" class="form-horizontal">
                                        
                            <div class="form-group "><!-- Firstname -->
                                <label for="firstname" class="control-label col-lg-2">Firstname:</label>
                                <div class="col-lg-10">
                                    <input class=" form-control" id="firstname" name="firstname" type="text" />
                                </div>
                            </div>
                            <div class="form-group "><!-- Lastname -->
                                <label for="lastname" class="control-label col-lg-2">Lastname:</label>
                                <div class="col-lg-10">
                                    <input class=" form-control" id="lastname" name="lastname" type="text" />
                                </div>
                            </div>
                            <div class="form-group "><!-- Username -->
                                <label for="username" class="control-label col-lg-2">Username:</label>
                                <div class="col-lg-10">
                                    <input class="form-control " id="username" name="username" type="text" />
                                </div>
                            </div>
                            <div class="form-group "><!-- Password -->
                                <label for="password" class="control-label col-lg-2">Password:</label>
                                <div class="col-lg-10">
                                    <input class="form-control " id="password" name="password" type="password" />
                                </div>
                            </div>
                            <div class="form-group "><!-- Confirm Password -->
                                <label for="confirm_password" class="control-label col-lg-2">Confirm Password:</label>
                                <div class="col-lg-10">
                                    <input class="form-control " id="confirm_password" name="confirm_password" type="password" />
                                </div>
                            </div>
                            <div class="form-group "><!-- Email -->
                                <label for="email" class="control-label col-lg-2">Email:</label>
                                <div class="col-lg-10">
                                    <input class="form-control " id="email" name="email" type="email" />
                                </div>
                            </div>
                            <input type="button"onclick="window.location.href = '<?php echo base_url()?>login/';" value="Update Profile" class="btn btn-theme btn-block ">
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </section>
 
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="<?php echo base_url()."assets/"; ?>lib/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url()."assets/"; ?>lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="<?php echo base_url()."assets/"; ?>lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="<?php echo base_url()."assets/"; ?>lib/jquery.scrollTo.min.js"></script>
  <script src="<?php echo base_url()."assets/"; ?>lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="<?php echo base_url()."assets/"; ?>lib/common-scripts.js"></script>
  <!--script for this page-->
  <!-- MAP SCRIPT - ALL CONFIGURATION IS PLACED HERE - VIEW OUR DOCUMENTATION FOR FURTHER INFORMATION -->
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASm3CwaK9qtcZEWYa-iQwHaGi3gcosAJc&sensor=false"></script>
  <script>
    $('.contact-map').click(function() {

      //google map in tab click initialize
      function initialize() {
        var myLatlng = new google.maps.LatLng(40.6700, -73.9400);
        var mapOptions = {
          zoom: 11,
          scrollwheel: false,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);
        var marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
          title: 'Dashio Admin Theme!'
        });
      }
      google.maps.event.addDomListener(window, 'click', initialize);
    });
  </script>

  <style type="text/css">
  .control-label{
    font-weight: 900;
    }
</style>
</body>