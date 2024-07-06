

    <!--sidebar-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="<?php echo base_url()?>profile/"><img src="<?php echo base_url()."assets/"; ?>img/logo.png" class="" width="80"></a></p>
          <h5 class="centered">Admin/Encoder</h5>
          <li class="mt"> <!-- DASHBOARD -->
            <a href="<?php echo base_url()?>dashboard/">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub"> <!-- PROFILE -->
            <a href="<?php echo base_url()?>profile/">
              <i class="fa fa-user"></i>
              <span>Profile</span>
              </a>
          </li>
          <li class="sub-menu"><!-- MATERIALS -->
            <a href="javascript:;"class="active" >
              <i class="fa fa-book"></i>
              <span>Materials</span>
              </a>
            <ul class="sub">
              <li><a href="<?php echo base_url()?>list_material/">View List</a></li> <!-- View Edit Delete -->
              <li class="active" ><a href="<?php echo base_url()?>add_material/" >Add Material</a></li>
            </ul>
          </li>
          <li class="sub-menu"> <!-- USERS -->
            <a href="javascript:;">
              <i class="fa fa-users"></i>
              <span>Users</span>
              </a>
            <ul class="sub">
              <li><a href="<?php echo base_url()?>list_user/">View List</a></li> <!-- View Edit Delete -->
              <li><a href="<?php echo base_url()?>add_user/">Add User</a></li>
            </ul>
          </li>
          <li>
            <a href="<?php echo base_url()?>home/"> <!-- LOGOUT -->
              <i class="fa fa-sign-out"></i>
              <span>Logout </span>
              </a>
          </li>
        </ul>
      </div>
    </aside>

    <!--main content-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i>ADD MATERIAL</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <div class="form">
                  <?php
                    echo form_open('Display_controller/save',['class'=>'form-horizontal']);
                  ?>
                  <!-- MATERIAL TITLE -->
                  <div class="form-group "> 
                    <label for="firstname" class="control-label col-lg-2">Activity Title:</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="material_title" name="material_title" type="text" />
                    </div>
                  </div>
                  <!-- START TO END DATE -->
                  <div class="form-group "> 
                    <label for="password" class="control-label col-lg-2">Activity Start to End Date:</label>
                    <div class="col-md-4">
                        <div class="input-group input-large" data-date="01/01/2014" data-date-format="mm/dd/yyyy">
                          <input type="text" class="form-control dpd1" name="material_startDate">
                            <span class="input-group-addon">TO</span>
                          <input type="text" class="form-control dpd2" name="material_endDate">
                        </div>
                        <span class="help-block" style="font-style: italic;">Select date range</span>
                    </div>
                  </div>
                  <!-- MATERIAL SOURCE -->
                  <div class="form-group "> 
                    <label for="email" class="control-label col-lg-2">Source:</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="material_source" name="material_source" type="email" />
                    </div>
                  </div>
                  <!-- OFFICE DIVISION -->
                  <div class="form-group "> 
                    <label for="lastname" class="control-label col-lg-2">Office/Division:</label>
                    <div class="col-lg-10">
                      <div class="btn-group">
                        <button type="button" class="btn btn-theme dropdown-toggle" data-toggle="dropdown" id="division_id">
                          Select here <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">TSD</a></li>
                          <li><a href="#">FAD</a></li>
                          <li><a href="#">ORD</a></li>
                          <li class="divider"></li>
                          <li><a href="#">PSTC-Occidental Mindoro</a></li>
                          <li><a href="#">PSTC-Oriental Mindoro</a></li>
                          <li><a href="#">PSTC-Marinduque</a></li>
                          <li><a href="#">PSTC-Romblon</a></li>
                          <li><a href="#">PSTC-Palawan</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <!-- MATERIAL FILE NAME -->
                  <div class="form-group"> 
                    <label for="lastname" class="control-label col-lg-2">File Name:</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="material_fileName" name="material_fileName" type="text" disabled="" />
                    </div>
                  </div>
                  <!-- FILE TYPE ID -->
                  <div class="form-group ">
                    <label for="username" class="control-label col-lg-2">File Type:</label>
                    <div class="col-lg-10">
                      <div class="btn-group">
                        <button type="button" class="btn btn-theme dropdown-toggle" data-toggle="dropdown" id="fileType_id">
                          Select here <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Word</a></li>
                          <li><a href="#">PDF</a></li>
                          <li><a href="#">PPTX</a></li>
                          <li><a href="#">ZIP</a></li>
                          <li><a href="#">Folder</a></li>
                          <li><a href="#">Link</a></li>
                          <li><a href="#">Excel</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <!-- MATERIAL UPLOADER -->
                  <!-- <div class="form-group "> 
                    <label for="lastname" class="control-label col-lg-2">Uploader:</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="material_uploader" name="material_uploader" type="text" />
                    </div>
                  </div> -->
                  <?php echo form_close();?>
                  <!-- FILE UPLOAD -->
                  <div> 
                    <label for="lastname" class="control-label">File Upload</label>
                    <div class="">
                      <div class="white-panel">
                        <div class="panel-body">
                          <form action="assets/dropzone/upload.php" class="dropzone" id="my-awesome-dropzone"></form>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              <!-- <button type="submit" class="btn btn-theme">Save</button> -->
              <!-- <button type="button" class="btn btn-theme04">Cancel</button> -->
              <?php
                echo form_submit(['type'=>'submit','name'=>'submitBtn','value'=>'SAVE', 'class'=>'btn btn-theme']);
              ?>
              <?php
                echo anchor('Material_controller/index','CANCEL',['class'=>'btn btn-theme04']);
              ?>
            </div>
          </div>
        </div>
      </section>
    </section>
  </section>

  <style type="text/css">
    .control-label{
      font-weight: 900;
    }
  </style>

  <!-- js placed at the end of the document so the pages load faster -->
  <script src="<?php echo base_url()."assets/"; ?>lib/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url()."assets/"; ?>lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url()."assets/"; ?>lib/jquery-ui-1.9.2.custom.min.js"></script>
  <script src="<?php echo base_url()."assets/"; ?>lib/jquery.ui.touch-punch.min.js"></script>
  <script class="include" type="text/javascript" src="<?php echo base_url()."assets/"; ?>lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="<?php echo base_url()."assets/"; ?>lib/jquery.scrollTo.min.js"></script>
  <script src="<?php echo base_url()."assets/"; ?>lib/jquery.nicescroll.js" type="text/javascript"></script>

  <!--common script for all pages-->
  <script src="<?php echo base_url()."assets/"; ?>lib/common-scripts.js"></script>

  <!--   DROPZONE -->
  <script src="<?php echo base_url()."assets/"; ?>lib/dropzone/dropzone.js"></script>

  <!--script for this page-->
  <script src="<?php echo base_url()."assets/"; ?>lib/jquery-ui-1.9.2.custom.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()."assets/"; ?>lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="<?php echo base_url()."assets/"; ?>lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="<?php echo base_url()."assets/"; ?>lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="<?php echo base_url()."assets/"; ?>lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="<?php echo base_url()."assets/"; ?>lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="<?php echo base_url()."assets/"; ?>lib/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url()."assets/"; ?>lib/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script src="<?php echo base_url()."assets/"; ?>lib/advanced-form-components.js"></script>
</body>