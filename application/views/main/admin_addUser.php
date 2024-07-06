

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
                <a href="<?php echo base_url()?>admin/">
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
                <a class="active" href="<?php echo base_url()?>admin/user/add">
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
        <h3><i class="fa fa-user"></i> Add User</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">

                <form method="post" id="user_form" class="form-horizontal style-form">
                <input hidden type="text" name="action" id="action" value="Add" />  

                <div class="form-group">
                  <label class="col-lg-2 control-label"><b><span style="color: red">* </span>Name</b></label>
                  <div class="col-lg-5">
                    <input type="text" name="user_firstName" id="user_firstName" class="form-control" placeholder="">
                    <p class="help-block">First Name</p>
                  </div>
                  <div class="col-lg-5">
                    <input type="text" name="user_lastName" id="user_lastName" class="form-control" placeholder="">
                    <p class="help-block">Last Name</p>
                  </div>
                </div>

                <div class="form-group ">
                  <label class="col-lg-2 control-label"><b><span style="color: red">* </span>Position</b></label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" name="user_position" id="user_position" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-2 control-label"><b><span style="color: red">* </span>Sex</b></label>
                    <div class="col-lg-10">
                        <div class="form-wrapper">
                            <input type="radio" name="user_sex" id="user_sex" value="Male"> Male<br>
                            <input type="radio" name="user_sex" id="user_sex" value="Female"> Female<br>
                        </div>
                    </div>
                </div>

                <div class="form-group ">
                  <label class="col-lg-2 control-label"><b><span style="color: red">* </span>Email</b></label>
                  <div class="col-lg-10">
                    <input type="email" placeholder="" name="user_email" id="user_email" class="form-control">
                  </div>
                </div>

                <div class="form-group ">
                  <label class="col-lg-2 control-label"><b><span style="color: red">* </span>Username</b></label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" name="user_username" id="user_username" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-2 control-label"><b><span style="color: red">* </span>Password</b></label>
                  <div class="col-lg-5">
                    <input type="password" placeholder="" name="user_password" id="user_password" class="form-control" pattern="(?=.*\d)(?=.*[a-zA-Z]).{8,}" minlength="8" maxlength="8" title="Must contain number and letter, and at least 8 characters">
                    <p class="help-block">Must be 8 characters</p>
                  </div>
                  <div class="col-lg-5">
                    <input type="password" placeholder="" name="user_confirmPassword" id="user_confirmPassword" class="form-control" pattern="(?=.*\d)(?=.*[a-zA-Z]).{8,}" minlength="8" maxlength="8" title="Must contain number and letter, and at least 8 characters">
                    <p class="help-block">Enter password again</p>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-lg-2 control-label"><b style="color: red; font-size: 10px;">* Fields Required</b></label>
                </div>

                <div class="form-group">
                  <div class="col-lg-12">
                    <input type="hidden" name="user_id" id="user_id" />  
                    <input type="submit" name="action" id="action" class="btn btnn btn-block" value="Add"/> 
                  </div>
                </div>
                </form>
              
            </div>
          </div>
        </div>
    </section>
</section>

 </body>  
 </html> 



<script type="text/javascript" language="javascript">  

    $(document).ready(function(){

        $('#add_button').click(function(){  
            $('#user_form')[0].reset();  
            $('.modal-title').text("Add User");  
            $('#action').val("Add");  
        });

        // ADD USER
        $(document).on('submit', '#user_form', function(event){  
            event.preventDefault();  
            var user_firstName       = $('#user_firstName').val();  
            var user_lastName        = $('#user_lastName').val();  
            var user_position        = $('#user_position').val();  
            var user_sex             = $('#user_sex').val(); 
            var user_email           = $('#user_email').val(); 
            var user_username        = $('#user_username').val();  
            var user_password        = $('#user_password').val();  
            var user_confirmPassword = $('#user_confirmPassword').val(); 

                $.ajax({  
                    url:"<?php echo base_url() . 'Admin_controller/user_action'?>",  
                    method:'POST',  
                    data:new FormData(this),  
                    contentType:false,  
                    processData:false,  
                    success:function(data){  

                        Swal.fire({
                          title: 'DONE',
                          text: "Material Added Successfully",
                          type: 'success',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Add again?',
                          cancelButtonText: 'View List'
                        }).then((result) => {
                          if (result.value) {
                            $('#user_form')[0].reset();  
                            $('#userModal').modal('hide');  
                            dataTable.ajax.reload(); 
                            location.reload(); 
                          }
                          else{
                            document.location = "<?php echo base_url()?>admin/user/view";
                          }
                        })
                        
                    }  
                });
            
        }); 
        // $(document).on('submit', '#user_form', function(event){  
        //     event.preventDefault();  
        //     var user_firstName       = $('#user_firstName').val();  
        //     var user_lastName        = $('#user_lastName').val();  
        //     var user_position        = $('#user_position').val();  
        //     var user_sex             = $('#user_sex').val(); 
        //     var user_email           = $('#user_email').val(); 
        //     var user_username        = $('#user_username').val();  
        //     var user_password        = $('#user_password').val();  
        //     var user_confirmPassword = $('#user_confirmPassword').val(); 

        //     if( user_firstName == "" || user_lastName == "" || user_position == "" || user_sex == "" ||
        //         user_email == "" || user_username == "" || user_password == "" || user_confirmPassword == ""){
        //         Swal.fire(
        //                     'Error!',
        //                     'Do not leave an empty field.',
        //                     'error'
        //                   )
        //     }
        //     else{
        //         if(user_password == user_confirmPassword) {
        //             $.ajax({ 
        //                 url:"<?php echo base_url() . 'Main_controller/check_username_exist'?>",  
        //                 method:'POST',  
        //                 data:{
        //                     user_username:user_username
        //                 },
        //                 success:function(data){ 

        //                     if(data == 'taken'){
        //                         Swal.fire(data)
        //                     }
        //                     else{
        //                         $.ajax({  
        //                             url:"<?php echo base_url() . 'Admin_controller/user_action'?>",  
        //                             method:'POST',  
        //                             data:{
        //                                 user_firstName:user_firstName,
        //                                 user_lastName:user_lastName,
        //                                 user_position:user_position,
        //                                 user_sex:user_sex,
        //                                 user_email:user_email,
        //                                 user_username:user_username,
        //                                 user_password:user_password,
        //                                 user_confirmPassword:user_confirmPassword
        //                             },
        //                             success:function(data){  
        //                                 Swal.fire({
        //                                   title: 'DONE',
        //                                   text: "User Added Successfully",
        //                                   type: 'success',
        //                                   showCancelButton: true,
        //                                   confirmButtonColor: '#3085d6',
        //                                   cancelButtonColor: '#d33',
        //                                   confirmButtonText: 'Add again?',
        //                                   cancelButtonText: 'View List'
        //                                 }).then((result) => {
        //                                   if (result.value) {
        //                                     $('#user_form')[0].reset();  
        //                                     $('#userModal').modal('hide');  
        //                                     dataTable.ajax.reload(); 
        //                                     location.reload(); 
        //                                   }
        //                                   else{
        //                                     document.location = "<?php echo base_url()?>admin/user/view";
        //                                   }
        //                                 })
        //                             } 
        //                         }); 
        //                     }
        //                 }
        //             }); 
        //         } 
        //         else{
        //             Swal.fire(
        //                     'Error!',
        //                     'Password do not match!',
        //                     'error'
        //                   )
        //         }  
        //     }           
        // });  

        // UPDATE/EDIT USER
        $(document).on('click', '.update', function(){  
            var user_id = $(this).attr("id");  
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
        }); 
    }); 

</script>  

<script src="<?php echo base_url()."assets/"; ?>lib/jquery-ui-1.9.2.custom.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>lib/advanced-form-components.js"></script>



                <!-- <div class="form-group ">
                  <label class="col-lg-2 control-label"><b>Password</b></label>
                  <div class="col-lg-10">
                    <input type="password" placeholder="" name="user_password" id="user_password" class="form-control" pattern="(?=.*\d)(?=.*[a-zA-Z]).{8,}" minlength="8" maxlength="8" title="Must contain number and letter, and at least 8 characters">
                    <p class="help-block">Must be 8 characters</p>
                  </div>
                </div>

                <div class="form-group ">
                  <label class="col-lg-2 control-label"><b>Confirm Password</b></label>
                  <div class="col-lg-10">
                    <input type="password" placeholder="" name="user_confirmPassword" id="user_confirmPassword" class="form-control" pattern="(?=.*\d)(?=.*[a-zA-Z]).{8,}" minlength="8" maxlength="8" title="Must contain number and letter, and at least 8 characters">
                    <p class="help-block">Enter password again</p>
                  </div>
                </div> -->

                <!-- <div class="form-group">
                  <label class="col-lg-2 control-label"><b>Division</b></label>
                    <div class="col-lg-10">
                        <div class="form-wrapper" required="">
                            <select name="user_division" id="user_division" class="form-control" required="">
                                <option selected="true" disabled="disabled">Select  Division</option>
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
                    </div>
                </div> -->
                <!-- <div class="form-group">
                  <label class="col-lg-2 control-label"><b>Role</b></label>
                    <div class="col-lg-10">
                        <div class="form-wrapper" required>
                            <select name="user_role" id="user_role" class="form-control" required>
                                <option selected="true" disabled="disabled">Select  Role</option>
                                <option value="Encoder">Encoder</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                    </div>
                </div> -->