<body>
<section id="container">

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
        <a href="<?php echo base_url()?>encoder">
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
        <a class="active" href="<?php echo base_url()?>encoder/profile">
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
    <section class="wrapper site-min-height">
        <h3><i class="fa fa-user"></i> MANAGE PROFILE</h3>
        <div class="row">
            <div class="col-lg-12 ">
                <div class="row content-panel">
                    <div class="panel-body">
                        <div class="tab-content">
                            <div id="edit" class="tab-pane active">
                                <div class="row">
                                    <div class="col-lg-8 col-lg-offset-2 detailed">
                                        <h4 class="mb">Personal Information</h4>

                                        <form method="post" id="user_form" class="form-horizontal ">
                                            <div id="user_id" hidden=""><?php echo $_SESSION['id_user'];?></div>
                                            <div class="form-group ">
                                                <label for="firstname" class="control-label col-lg-2">Firstname:</label>
                                                <div class="col-lg-10">
                                                    <input type="text" name="user_firstName" id="user_firstName" class="form-control" required="" placeholder="" value="">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="lastname" class="control-label col-lg-2">Lastname:</label>
                                                <div class="col-lg-10">
                                                    <input type="text" name="user_lastName" id="user_lastName" class="form-control" required="" placeholder="" value="">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="lastname" class="control-label col-lg-2">Position:</label>
                                                <div class="col-lg-10">
                                                    <input type="text" placeholder="" name="user_position" id="user_position" class="form-control" required="" value="">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="email" class="control-label col-lg-2">Email:</label>
                                                <div class="col-lg-10">
                                                    <input type="email" placeholder="" name="user_email" id="user_email" class="form-control" required="" value="">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="username" class="control-label col-lg-2">Username:</label>
                                                <div class="col-lg-10">
                                                    <input type="text" placeholder="" name="user_username" id="user_username" class="form-control" required="" value="">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="password" class="control-label col-lg-2">Password:</label>
                                                <div class="col-lg-10">
                                                     <input type="password" placeholder="" name="user_password" id="user_password" class="form-control" pattern="(?=.*\d)(?=.*[a-zA-Z]).{8,}" minlength="8" maxlength="8" title="Must contain number and letter, and at least 8 characters" required="" value="">
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="confirm_password" class="control-label col-lg-2">Confirm Password:</label>
                                                <div class="col-lg-10">
                                                    <input type="password" placeholder="" name="user_confirmPassword" id="user_confirmPassword" class="form-control" pattern="(?=.*\d)(?=.*[a-zA-Z]).{8,}" minlength="8" maxlength="8" title="Must contain number and letter, and at least 8 characters" required="" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                              <div class="col-lg-12">
                                                <button class="btn btn-theme btn-block" id="save_profile">SAVE</button>
                                              </div>
                                            </div>
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

</section>
<script src="<?php echo base_url()."assets/"; ?>lib/jquery/jquery.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>lib/bootstrap/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="<?php echo base_url()."assets/"; ?>lib/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?php echo base_url()."assets/"; ?>lib/jquery.scrollTo.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>lib/jquery.nicescroll.js" type="text/javascript"></script>
<script src="<?php echo base_url()."assets/"; ?>lib/common-scripts.js"></script>

<script>

    $(document).ready(function(){

        var user_id = document.getElementById("user_id").innerHTML; 
        $.ajax({  
            url:"<?php echo base_url(); ?>Admin_controller/fetch_single_user",  
            method:"POST",  
            data:{user_id:user_id},  
            dataType:"json",  
            success:function(data){  
                $('#userModal').modal('show');  
                $('#user_firstName').val(data.user_firstName);   
                $('#user_lastName').val(data.user_lastName); 
                $('#user_position').val(data.user_position); 
                $('#user_sex').val(data.user_sex); 
                $('#user_email').val(data.user_email); 
                $('#user_username').val(data.user_username);   
                $('#user_password').val(data.user_password);    
                $('#user_confirmPassword').val(data.user_confirmPassword);  
                $('#user_division').val(data.user_division);  
                $('.modal-title').text("Edit User");  
                $('#user_id').val(user_id);  
                $('#action').val("Edit");  
            }  
        }) 

        $('#save_profile').click(function(){
                event.preventDefault();  
                var user_id              = document.getElementById("user_id").innerHTML; 
                var user_firstName       = $('#user_firstName').val();  
                var user_lastName        = $('#user_lastName').val();  
                var user_position        = $('#user_position').val(); 
                var user_email           = $('#user_email').val();  
                var user_username        = $('#user_username').val();  
                var user_password        = $('#user_password').val();  
                var user_confirmPassword = $('#user_confirmPassword').val();  

                $.ajax({  
                    url:"<?php echo base_url() . 'Encoder_controller/update_profile'?>",  
                    method:'POST',  
                    data:{  
                            user_id:user_id,
                            user_firstName:user_firstName,
                            user_lastName:user_lastName,
                            user_position:user_position,
                            user_email:user_email,
                            user_username:user_username,
                            user_password:user_password,
                            user_confirmPassword:user_confirmPassword
                        },  
                    success:function(data){  
                        Swal.fire({
                            title: 'UPDATED',
                            text: "Profile Updated Successfully",
                            type: 'success'
                        })
                    }  
                });
        });

    }); 

</script>

<style type="text/css">
    .control-label{
        font-weight: 900;
    }

    .detailed h4 {
        text-align: center;
        text-transform: uppercase;
        border-bottom: 1px solid #e2e2e2;
        font-weight: 700;
        color: #000000;
    }
</style>
</body>