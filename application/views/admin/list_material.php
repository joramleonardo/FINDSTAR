

    <!--sidebar-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="<?php echo base_url()?>profile/"><img src="<?php echo base_url()."assets/"; ?>img/logo.png" class="" width="80"></a></p>
          <h5 class="centered">ADMIN PANEL</h5>
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
              <li class="active"><a href="<?php echo base_url()?>list_material/">View List</a></li> <!-- View Edit Delete -->
              <li><a href="<?php echo base_url()?>add_material/" >Add Material</a></li>
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
        <h3><i class="fa fa-angle-right"></i>LIST OF MATERIALS</h3>
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th><i class="fa fa-list-ul"></i>  Activity Title</th>
                    <th><i class="fa fa-file-text"></i>  File Name</th>
                    <th><i class="fa fa-th"></i>  File Type</th>
                    <th><i class=" fa fa-folder-open"></i>  File</th>
                    <th><i class=" fa fa-calendar"></i>  Activity Start Date</th>
                    <th><i class=" fa fa-calendar"></i>  Activity End Date</th>
                    <th><i class=" fa fa-edit"></i>  Source</th>
                    <th><i class=" fa fa-user"></i>  Uploader</th>
                    <th><i class=" fa fa-question-circle"></i>  Division</th>
                    <th><i class=" fa fa-edit"></i>  Action</th>
                  </tr>
                </thead>
                <tbody id="search_materialTable">
                  <?php if(count($posts)):?>
                  <?php foreach($posts as $post):?>
                  <tr>
                  <tr>
                    <td><?php echo $post->material_title;?></td>
                    <td><?php echo $post->material_fileName;?></td>
                    <td><?php echo $post->material_fileType;?></td>
                    <td><?php echo $post->material_file;?></td>
                    <td><?php echo $post->material_startDate;?></td>
                    <td><?php echo $post->material_endDate;?></td>
                    <td><?php echo $post->material_source;?></td>
                    <td><?php echo $post->material_uploader;?></td>
                    <td><?php echo $post->material_division;?></td>
                    <td>
                      <?php
                        echo anchor('Display_controller/edit','Edit',['class'=>'btn btn-primary btn-xs']);
                      ?>
                      <?php
                        echo anchor('Display_controller/delete','Download',['class'=>'btn btn-warning btn-xs']);
                      ?>
                      <?php
                        echo anchor('Display_controller/delete','Delete',['class'=>'btn btn-danger btn-xs']);
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
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
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