<style>
  .help-block{
    font-style: italic;
    font-size: 11px;
  }
</style>

<!--sidebar-->
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
        <a class="" href="<?php echo base_url()?>material/">
          <i class="fa fa-home"></i>
          <span>Materials</span>
          </a>
      </li>
      <li class="sub"> <!-- USER -->
        <a class="active" href="<?php echo base_url()?>user/">
          <i class="fa fa-home"></i>
          <span>Users</span>
          </a>
      </li>
      <li class="sub"> <!-- PROFILE -->
        <a href="<?php echo base_url()?>profile/">
          <i class="fa fa-user"></i>
          <span>Profile</span>
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


<section id="main-content">
      <section class="wrapper site-min-height">
        <h3><i class="fa fa-book"></i> MANAGE MATERIAL</h3>
        <div class="row mt">
          <div class="col-md-12">

            <div class="box">  
                 <div class="table-responsive">   
                      <br /><br />  
                      <table id="user_data" class="table table-bordered table-striped">  
                           <thead>  
                                <tr>  
                                     <th width="35%">Title</th>  
                                     <th width="35%">Description</th> 
                                     <th width="35%">Start Date</th>   
                                     <th width="35%">End Date</th>  
                                     <th width="35%">Source</th>   
                                     <th width="35%">Uploader</th>
                                     <th width="35%">Division</th>
                                     <th width="35%">File Name</th>
                                     <th width="35%">File Type</th>
                                     <!-- <th width="10%">File</th>   --> 
                                     <th width="10%">Edit</th>  
                                     <th width="10%">Delete</th>  
                                     <th width="10%">Download</th>
                                </tr>  
                           </thead>  
                      </table>  
                      <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-theme btn-lg">Add Material</button>  
                 </div>  
            </div> 


          </div>
        </div>
      </section>
</section>


 </body>  
 </html> 

 <div id="userModal" class="modal fade">  
      <div class="modal-dialog">  
           <form method="post" id="material_form">  
                <div class="modal-content">  
                     <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>  
                          <h4 class="modal-title">Add Material</h4>  
                     </div>  
                     <div class="modal-body">  
                          <input hidden type="text" name="action" id="action" value="Add" />  

                          <label>Title</label>  
                          <input type="text" name="material_title" id="material_title" class="form-control" />  
                          <span class="help-block">Activity Name/Report Title/Event</span>
                          <br />  

                          <label>Description</label>  
                          <input type="text" name="material_description" id="material_description" class="form-control" />  
                          <span class="help-block">Keywords/Tags</span>
                          <br /> 

                          <label class="control-label ">Start Date</label>
                          <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="2019-00-00" class="input-append date dpYears">
                            <input type="date" readonly="" value="yyyy-mm-dd" class="form-control" name="material_startDate" id="material_startDate">
                            <span class="add-on">
                              <button class="btn btn-theme" type="button"><i class="fa fa-calendar"></i></button>
                            </span>
                          </div>
                          <span class="help-block">Select start date</span>
                          <br/>

                          <label class="control-label">End Date</label>
                          <div data-date-viewmode="years" data-date-format="yyyy-mm-dd" data-date="2019-00-00" class="input-append date dpYears">
                            <input type="date" readonly="" value="yyyy-mm-dd" class="form-control" name="material_endDate" id="material_endDate" >
                            <span class="add-on">
                              <button class="btn btn-theme" type="button"><i class="fa fa-calendar"></i></button>
                            </span>
                          </div>
                          <span class="help-block">Select end date</span>
                          <br/> 

                          <label>Source</label>  
                          <input type="text" name="material_source" id="material_source" class="form-control" /> 
                          <span class="help-block">Sender/Provider of the material</span> 
                          <br />

                          <label>Uploader</label>  
                          <input type="text" name="material_uploader" id="material_uploader" class="form-control" /> 
                          <span class="help-block">Full name of the uploader</span>  
                          <br />

                          <label>Division</label>  
                          <div class="dropdown-toggle">
                              <select name="material_division" id="material_division" >
                                  <option >Select  Division</option>
                                  <option value="TSD">TSD</option>
                                  <option value="FAD">FAD</option>
                                  <option value="ORD">ORD</option>
                                  <option value="PSTC-Occidental Mindoro">PSTC-Occidental Mindoro</option>
                                  <option value="PSTC-Oriental Mindoro"  >PSTC-Oriental Mindoro</option>
                                  <option value="PSTC-Marinduque"        >PSTC-Marinduque</option>
                                  <option value="PSTC-Romblon"           >PSTC-Romblon</option>
                                  <option value="PSTC-Palawan"           >PSTC-Palawan</option>
                              </select>
                          </div>
                          <br />

                          <label>File</label>  
                          <input type="file" name="material_file" id="material_file" />  
                          <span id="user_uploaded_file"></span> 
                          <br/><br/><br/>

                     </div>  

                     <div class="modal-footer">  
                          <input type="hidden" name="user_id" id="user_id" />  
                          <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />  
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                     </div>  
                </div>  
           </form>  
      </div>  
 </div> 










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