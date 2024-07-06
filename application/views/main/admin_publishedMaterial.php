
<link rel="stylesheet" href="<?php echo base_url()."assets/tags-input/"; ?>bootstrap-tagsinput.css">


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
                <a class="active" href="<?php echo base_url()?>admin/material/published">
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
      <section class="wrapper site-min-height">
        <h3><i class="fa fa-book"></i> PUBLISHED MATERIALS</h3>
        <div class="row mt">
          <div class="col-md-12">

            <div class="box">  
                 <div class="table-responsive">   
                      <br /><br />  
                      <table id="user_data" class="table table-bordered table-striped">  
                           <thead>  
                                <tr>  
                                     <th>Title</th>  
                                     <th>Description</th> 
                                     <th>category</th> 
                                     
                                     <th>Source</th>   
                                     <th>Uploader</th>
                                     <th>Division</th>
                                     <th>Date Created</th>
                                     <th>File Type</th>
                                     
                                     <th>Edit</th>  
                                     <th>Unpublish</th>
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
           <form method="post" id="material_form">  
                <div class="modal-content">  
                     <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>  
                          <h4 class="modal-title">Add Material</h4>  
                     </div>  
                     <div class="modal-body">  
                          <input hidden type="text" name="action" id="action" value="Add" />  

                        <div class="form-group ">
                        <label class="col-lg-2 control-label">Title</label>  
                            <div class="col-lg-10">
                                <input type="text" name="material_title" id="material_title" class="form-control" />  
                                <span class="help-block">Activity Name/Report Title/Event</span>
                            </div>
                        </div>

                        <div class="form-group ">
                        <label class="col-lg-2 control-label">Description</label> 
                            <div class="col-lg-10">
                                <input type="text" name="material_description" id="material_description" class="form-control" />  
                                <span class="help-block">Keywords/Tags</span>
                            </div> 
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label"><b>Category</b></label>
                            <div class="col-lg-10">
                                <div class="form-wrapper">
                                  <select name="material_category" id="material_category" class="form-control">
                                      <option selected="true" disabled="disabled">Select  Category</option>
                                    <option value="Annual Report">Annual Report</option>
                                    <option value="Articles">Articles</option>
                                    <option value="Certificate">Certificate</option>
                                    <option value="Foreign Training Report">Foreign Training Report</option>
                                    <option value="Forms">Forms</option>
                                    <option value="Government Policies">Government Policies</option>
                                    <option value="Guidelines">Guidelines</option>
                                    <option value="Images">Images</option>
                                    <option value="Investment Maps">Investment Maps</option>
                                    <option value="Job Posting">Job Posting</option>
                                    <option value="Letter">Letter</option>
                                    <option value="Local Training/Seminar/Workshop Report">Local Training/Seminar/Workshop Report</option>
                                    <option value="Manuals">Manuals</option>
                                    <option value="Meeting/Conference Attended Report">Meeting/Conference Attended Report</option>
                                    <option value="Memorandum of Agreement">Memorandum of Agreement</option>
                                    <option value="Notice">Notice</option>
                                    <option value="Planning Files">Planning Files</option>
                                    <option value="Policy">Policy</option>
                                    <option value="Presentations">Presentations</option>
                                    <option value="Proposals">Proposals</option>
                                    <option value="Publications">Publications</option>
                                    <option value="Templates">Templates</option>
                                    <option value="Trainings">Trainings</option>
                                    <option value="Videos">Videos</option>
                                    <option value="Others">Others</option>
                                  </select>
                                </div>
                                <span class="help-block">Division of Sender/Provider</span>
                            </div>
                        </div>

                          <div class="form-group ">
                            <label class="col-lg-2 control-label">Source</label>  
                            <div class="col-lg-10">
                            <input type="text" name="material_source" id="material_source" class="form-control" /> 
                            <span class="help-block">Sender/Provider of the material</span> 
                            </div>
                          </div>


                          <br/><br/><br/>

                     </div>  

                     <div class="modal-footer">  
                          <input type="hidden" name="user_id" id="user_id" />  
                          <input type="submit" name="action" id="action" class="btn btn-theme" value="Update"/>  
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                     </div>  
                </div>  
           </form>  
      </div>  
 </div>  


 <script type="text/javascript" language="javascript" >  
  
 $(document).ready(function(){

      $('#add_button').click(function(){  
           $('#material_form')[0].reset();  
           $('.modal-title').text("Add Material");  
           $('#action').val("Add");  
           $('#user_uploaded_file').html('');  
      }) 

      var dataTable = $('#user_data').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'Admin_controller/fetch_division_material'; ?>",  
                type:"POST"  
           },  
           "columns": [
            { "width": "15%" }, //Title
            { "width": "15%" }, //Description
            { "width": "10%" }, //Category

            { "width": "10%" }, //Source
            { "width": "10%" }, //Uploader
            { "width": "8%" }, //Division
            { "width": "10%" }, //Date Created
            { "width": "6%" }, //File Name

            { "width": "6%" }, //Edit
            { "width": "7%" }, //Unpublish
            { "width": "7%" }, //Delete
          ]
      }); 


      // ADD MATERIAL
      $(document).on('submit', '#material_form', function(event){  
           event.preventDefault();  

           var material_title      = $('#material_title').val();  
           var material_description= $('#material_description').val();  
           var material_category   = $('#material_category').val(); 
           
           var material_source     = $('#material_source').val();  
           var material_uploader   = $('#material_uploader').val();  
           var material_division   = $('#material_division').val();  

            $.ajax({  
                 url:"<?php echo base_url() . 'Admin_controller/material_action'?>",  
                 method:'POST',  
                 data:new FormData(this),  
                 contentType:false,  
                 processData:false,  
                 success:function(data)  
                 {  
                      Swal.fire(
                        'Updated!',
                        'Material has been updated.',
                        'success'
                      )
                      $('#material_form')[0].reset();  
                      $('#userModal').modal('hide');  
                      dataTable.ajax.reload();  
                 }  
            });   
      });  

      // UPDATE/EDIT MATERIAL
      $(document).on('click', '.update', function(){  
           var user_id = $(this).attr("id");  
           $.ajax({  
                url:"<?php echo base_url(); ?>Admin_controller/fetch_single_material",  
                method:"POST",  
                data:{user_id:user_id},  
                dataType:"json",  
                success:function(data)  
                {  
                     $('#userModal').modal('show');  
                     $('#material_title').val(data.material_title);   
                     $('#material_description').val(data.material_description); 
                     $('#material_category').val(data.material_category);
                        
                     $('#material_source').val(data.material_source);     
                     $('#material_uploader').val(data.material_uploader);  
                     $('#material_division').val(data.material_division);  
                      
                     $('.modal-title').text("Edit Material");  
                     $('#user_id').val(user_id);  
                      
                     $('#action').val("Edit"); 
                    

                }  

           })  
           
      }); 

      // DELETE MATERIAL
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
                     url:"<?php echo base_url(); ?>Admin_controller/delete_single_material",  
                     method:"POST",  
                     data:{user_id:user_id},  
                     success:function(data)  
                     {  
                          Swal.fire(
                            'Deleted!',
                            'Material has been deleted.',
                            'success'
                          )
                          dataTable.ajax.reload();  
                     }  
                }); 
                
              }
            }) 
      });  

      // UNPUBLISH MATERIAL
      $(document).on('click', '.unpublish', function(){  
           var user_id = $(this).attr("id");  
            $.ajax({  
                url:"<?php echo base_url(); ?>Admin_controller/unpublish_material",  
                method:"POST",  
                data:{user_id:user_id},   
                success:function(data)  
                {  
                      Swal.fire(
                        'Unpublished!',
                        'Material has been unpublished.',
                        'success'
                      )
                      $('#material_form')[0].reset();  
                      $('#userModal').modal('hide');  
                      dataTable.ajax.reload();  
                }  
           })  
      }); 

 }); 

 </script>  

<script class="include" type="text/javascript" src="<?php echo base_url()."assets/"; ?>lib/jquery.dcjqaccordion.2.7.js"></script>

<script src="<?php echo base_url()."assets/"; ?>lib/common-scripts.js"></script>

<script src="<?php echo base_url()."assets/"; ?>lib/advanced-form-components.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script src="<?php echo base_url()."assets/tags-input/"; ?>bootstrap-tagsinput.js"></script>
<script src="<?php echo base_url()."assets/tags-input/"; ?>bootstrap-tagsinput-angular.js"></script>