<style>
  .help-block{
    font-style: italic;
    font-size: 11px;
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
                <a class="" href="<?php echo base_url()?>admin/user/add">
                    <i class="fa fa-user-plus"></i>
                    <span>Add User</span>
                </a>
            </li>
            <li class="sub"> 
                <a class="active" href="<?php echo base_url()?>admin/user/view">
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
      <section class="wrapper site-min-height">
        <h3><i class="fa fa-book"></i> MANAGE USER</h3>
        <div class="row mt">
          <div class="col-md-12">

            <div class="box">  
                 <div class="table-responsive">   
                      <br /><br />  
                      <table id="user_data" class="table table-bordered table-striped">  
                           <thead>  
                                <tr>  
                                     <th>Name</th> 
                                     <th>Position</th>
                                     <th>Sex</th> 
                                     <th>Email</th>   
                                     <th>Username</th>  
                                     <th>Division</th>
                                     <th>Date Created</th>
                                     <th>Edit</th>  
                                     <th>Delete</th>  
                                </tr>  
                           </thead>  
                      </table>  
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
        
           <form method="post" id="user_form">  
                <div class="modal-content">  
                     <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>  
                          <h4 class="modal-title">Add User</h4>  
                     </div>  
                     <div class="modal-body">  
                          <input hidden type="text" name="action" id="action" value="Add" />  

                          <div class="form-group ">
                          <label class="col-lg-2 control-label">First Name</label>  
                            <div class="col-lg-10">
                              <input type="text" placeholder="First Name" name="user_firstName" id="user_firstName" class="form-control" required="">
                            </div>
                          </div>
                          <br/><br/> 

                          <div class="form-group ">
                          <label class="col-lg-2 control-label">Last Name</label>  
                            <div class="col-lg-10">
                              <input type="text" placeholder="Last Name" name="user_lastName" id="user_lastName" class="form-control" required="">
                            </div>
                          </div>
                          <br/><br/> 

                          <div class="form-group ">
                            <label class="col-lg-2 control-label"><b>Position</b></label>
                            <div class="col-lg-10">
                              <input type="text" placeholder="" name="user_position" id="user_position" class="form-control">
                            </div>
                          </div>
                          <br/><br/> 

                          <div class="form-group">
                            <label class="col-lg-2 control-label"><b>Sex</b></label>
                              <div class="col-lg-10">
                                  <div class="form-wrapper">
                                      <select name="user_sex" id="user_sex" class="form-control">
                                          <option selected="true" disabled="disabled">Select  Sex</option>
                                          <option value="Male">Male</option>
                                          <option value="Female">Female</option>
                                      </select>
                                  </div>
                              </div>
                          </div>
                          <br/><br/> 

                          <div class="form-group ">
                            <label class="col-lg-2 control-label"><b>Email</b></label>
                            <div class="col-lg-10">
                              <input type="email" placeholder="" name="user_email" id="user_email" class="form-control" required="">
                            </div>
                          </div>
                          <br/><br/> 

                          <div class="form-group ">
                            <label class="col-lg-2 control-label"><b>Username</b></label>
                            <div class="col-lg-10">
                              <input type="text" placeholder="" name="user_username" id="user_username" class="form-control">
                            </div>
                          </div>
                          <br/><br/> 

                          <div class="form-group ">
                            <label class="col-lg-2 control-label"><b>Password</b></label>
                            <div class="col-lg-10">
                              <input type="password" placeholder="" name="user_password" id="user_password" class="form-control" pattern="(?=.*\d)(?=.*[a-zA-Z]).{8,}" minlength="8" maxlength="8" title="Must contain number and letter, and at least 8 characters">
                              <p class="help-block">Must be 8 characters</p>
                            </div>
                          </div>
                          <br/><br/> 

                          <div class="form-group ">
                            <label class="col-lg-2 control-label"><b>Confirm Password</b></label>
                            <div class="col-lg-10">
                              <input type="password" placeholder="" name="user_confirmPassword" id="user_confirmPassword" class="form-control" pattern="(?=.*\d)(?=.*[a-zA-Z]).{8,}" minlength="8" maxlength="8" title="Must contain number and letter, and at least 8 characters">
                              <p class="help-block">Enter password again</p>
                            </div>
                          </div>
                          <br/><br/> 

                          <div class="form-group">
                            <label class="col-lg-2 control-label"><b>Division</b></label>
                              <div class="col-lg-10">
                                  <div class="form-wrapper">
                                      <select name="user_division" id="user_division" class="form-control">
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
                          </div>
                          <br/><br/> 
                          <br/><br/> 
                     </div>  

                     <div class="modal-footer">  
                          <input type="hidden" name="user_id" id="user_id" />  
                          <input type="submit" name="action" id="action" class="btn btn-theme" value="Update" />  
                          <button type="button" name="clear" id="clear" class="btn btn-default" data-dismiss="modal">Clear</button>  
                     </div>  
                </div>  
           </form>  
      </div>  
</div> 



<script type="text/javascript" language="javascript" >  

    $(document).ready(function(){

        $('#add_button').click(function(){  
            $('#user_form')[0].reset();  
            $('.modal-title').text("Add User");  
            $('#action').val("Add");  
        });

        var dataTable = $('#user_data').DataTable({  
            "processing":true,  
            "serverSide":true,  
            "order":[],  
            "ajax":{  
                url:"<?php echo base_url() . 'Admin_controller/fetch_user'; ?>",  
                type:"POST"  
            },  
            "columns": [
                { "width": "15%" }, //Name
                { "width": "10%" }, //Position
                { "width": "6%" }, //Sex
                { "width": "10%" }, //Email
                { "width": "10%" }, //Username
                { "width": "8%" }, //Division

                { "width": "8%" }, //Date Created

                { "width": "7%" }, //Edit
                { "width": "7%" }  //Delete
            ]
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
            var user_division        = $('#user_division').val();  

            if(user_password != user_confirmPassword) {
                alert("Passwords Don't Match");
            } 
            else {
                $.ajax({  
                    url:"<?php echo base_url() . 'Admin_controller/user_action'?>",  
                    method:'POST',  
                    data:new FormData(this),  
                    contentType:false,  
                    processData:false,  
                    success:function(data){  
                        Swal.fire(
                          'Updated!',
                          'User has been updated.',
                          'success'
                        )
                        $('#user_form')[0].reset();  
                        $('#userModal').modal('hide');  
                        dataTable.ajax.reload();  
                    }  
                }); 
            }              
        });  

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

        // DELETE USER
        $(document).on('click', '.delete', function(){  
            var user_id = $(this).attr("id");  

            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.value) {

                $.ajax({  
                     url:"<?php echo base_url(); ?>Admin_controller/delete_single_user",  
                     method:"POST",  
                     data:{user_id:user_id},  
                     success:function(data)  
                     {  
                          Swal.fire(
                            'Deleted!',
                            'User has been deleted.',
                            'success'
                          )
                          dataTable.ajax.reload();  
                     }  
                }); 
                
              }
            })
        }); 
    }); 

</script>  


<script src="<?php echo base_url()."assets/"; ?>lib/jquery-ui-1.9.2.custom.min.js"></script>
<script src="<?php echo base_url()."assets/"; ?>lib/advanced-form-components.js"></script>