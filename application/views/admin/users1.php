
  <style type="text/css">
    .modal-body label{
      font-weight: 700;
    }
  </style>

    
    <!--sidebar-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="<?php echo base_url()?>profile/"><img src="<?php echo base_url()."assets/"; ?>img/logo.png" class="" width="80"></a></p>
          <h5 class="centered">ADMIN PANEL</h5>
          <li class="mt"> <!-- DASHBOARD -->
            <a href="<?php echo base_url()?>admin/dashboard/">
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
            <a class="active" href="<?php echo base_url()?>admin/users/">
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
      <section class="wrapper site-min-height">
        <h3><i class="fa fa-book"></i> LIST OF ALL USERS</h3>
        <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <!-- For search input  -->
              <div class="col-md-12" style="margin-left: 10px;">
                <div class="row">
                  <div class="col-md-4">
                    <input id="search_input" class="form-control mr-sm-2" type="text" placeholder="Search...">
                  </div>
                  <div class="col-md-2">
                      <!-- <?php
                        echo anchor('Display_controller/edit','Add User',['class'=>'btn btn-theme btn-block']);
                      ?> -->
                      <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-theme btn-block">Add User</button>  
                  </div>
                </div>
                
              </div>
              <br><br>  
              <table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                    <th><i class=" fa fa-edit"></i>  Name</th>
                    <th><i class=" fa fa-user"></i>  Email</th>
                    <th><i class=" fa fa-question-circle"></i>  Username</th>
                    <th><i class=" fa fa-edit"></i>  Role</th>
                    <th><i class=" fa fa-edit"></i>  Action</th>
                  </tr>
                </thead>
                <tbody id="search_table">
                  <?php if(count($posts)):?>
                  <?php foreach($posts as $post):?>
                  <tr>
                    <td><?php echo $post->name;?></td>
                    <td><?php echo $post->email;?></td>
                    <td><?php echo $post->username;?></td>
                    <td><?php echo $post->role_id;?></td>
                    <td>
                      <button type="button" id="edit" data-toggle="modal" data-target="#userModal" class="btn btn-primary btn-xs">Edit</button> 
                      <button type="button" id="delete" data-toggle="modal" data-target="#userModal" class="btn btn-danger btn-xs">Delete</button> 
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
  </section>


 <div id="userModal" class="modal fade">  
      <div class="modal-dialog">  
           <form method="post" id="user_form">  
                <div class="modal-content">  
                     <div class="modal-header">  
                          <button type="button" class="close" data-dismiss="modal">&times;</button>  
                          <h4 class="modal-title">Add User</h4>  
                     </div>  
                     <div class="modal-body">  
                     <input hidden type="text" name="action" id="action" value="Add" />  
                          <label> First Name:</label>  
                          <input type="text" name="first_name" id="first_name" class="form-control" />  
                          <br />  
                          <label> Last Name:</label>  
                          <input type="text" name="last_name" id="last_name" class="form-control" />  
                          <br />   
                          <label> Email:</label>  
                          <input type="text" name="last_name" id="last_name" class="form-control" />  
                          <br /> 
                          <label> Username:</label>  
                          <input type="text" name="last_name" id="last_name" class="form-control" />  
                          <br /> 
                          <label> Password:</label>  
                          <input type="text" name="last_name" id="last_name" class="form-control" />  
                          <br /> 
                          <label> Confrim Password: </label>  
                          <input type="text" name="last_name" id="last_name" class="form-control" />  
                          <br />  
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

   $(document).ready(function(){
     $("#search_input").on("keyup", function() {
       var value = $(this).val().toLowerCase();
       $("#search_table tr").filter(function() {
         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
       });
     });
   });

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





</script>
</body>