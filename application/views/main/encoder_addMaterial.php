
<link rel="stylesheet" href="<?php echo base_url()."assets/tags-input/"; ?>bootstrap-tagsinput.css">


<style>
    .help-block{
        font-style: italic;
        font-size: 11px;
    }

    .bootstrap-tagsinput input{
        width: 1350px;
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
      <li class="sub"> 
        <a href="<?php echo base_url()?>encoder">
          <i class="fa fa-dashboard"></i>
          <span>Dashboard</span>
          </a>
      </li>
      <li class="sub"> 
        <a  class="active" href="<?php echo base_url()?>encoder/material/add">
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
        <a href="<?php echo base_url()?>encoder/profile">
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
  <section class="wrapper">
        <h3><i class="fa fa-folder"></i> Add Material</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">

              <form method="post" id="material_form" class="form-horizontal style-form">
                    <input hidden type="text" name="action" id="action" value="Add" />  

                    <div class="form-group ">
                      <label class="col-lg-2 control-label"><b>Title</b></label>
                      <div class="col-lg-10">
                        <input type="text" name="material_title" id="material_title" class="form-control" required="" placeholder="">
                        <p class="help-block">Activity Name/Report Title/Event</p>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label class="col-lg-2 control-label"><b>Description</b></label>
                      <div class="col-lg-10">
                        <input type="text" placeholder="" name="material_description" id="material_description" class="form-control">
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
                            <span class="help-block">Choose Category of the Material</span>
                        </div>
                    </div>

                    <div class="form-group ">
                      <label class="col-lg-2 control-label"><b>Source</b></label>
                      <div class="col-lg-10">
                        <input type="text" placeholder="" name="material_source" id="material_source" class="form-control" >
                        <p class="help-block">Sender/Provider of the material</p>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label class="col-lg-2 control-label"><b>File</b></label>
                      <div class="col-lg-10">
                        <input type="file" name="material_file" id="material_file" class="form-control" />
                        <span id="user_uploaded_file"></span>
                        <p class="help-block">Upload File</p>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-lg-12">
                        <input type="hidden" name="user_id" id="user_id" />  
                            <input type="submit" name="action" id="action" class="btn btn-theme btn-block" value="Add" /> 
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
                url:"<?php echo base_url() . 'Admin_controller/fetch_material'; ?>",  
                type:"POST"  
            },  
            "columns": [
                { "width": "10%" }, //Title
                { "width": "10%" }, //Description
                { "width": "10%" }, //Start Date
                { "width": "10%" }, //End Date

                { "width": "8%" }, //Source
                { "width": "8%" }, //Uploader
                { "width": "8%" }, //Division
                { "width": "8%" }, //File Name
                { "width": "8%" }, //File Type

                { "width": "6%" }, //Edit
                { "width": "7%" }, //Delete
                { "width": "7%" }  //Download
            ]
        }); 

        // ADD MATERIAL
        $(document).on('submit', '#material_form', function(event){  
            event.preventDefault();  
            var material_title      = $('#material_title').val();  
            var material_description= $('#material_description').val();  
            var material_category   = $('#material_category').val();  
            
            var material_source     = $('#material_source').val();  
            
            var material_fileName   = $('#material_fileName').val();  
            var material_fileType   = $('#material_fileType').val();  
            var extension           = $('#material_file').val().split('.').pop().toLowerCase();  

            if(extension != ''){  
                if(jQuery.inArray(extension, ['gif','jpg','jpeg','png','iso','dmg','zip','rar','doc','docx','xls','xlsx','ppt','pptx','csv','ods','odt','odp','pdf','rtf','sxc','sxi','txt','exe','avi','mpeg','mp3','mp4','3gp', 'pub']) == -1){  
                    alert("Invalid File");  
                    $('#material_file').val('');  
                    return false;  
                }  
            }       

            $.ajax({  
                url:"<?php echo base_url() . 'Admin_controller/material_action'?>",  
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
                        $('#material_form')[0].reset();  
                        $('#userModal').modal('hide');  
                        dataTable.ajax.reload(); 
                        location.reload(); 
                      }
                      else{
                        document.location = "<?php echo base_url()?>encoder/material/view";
                      }
                    })
                    
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
                success:function(data){  
                    $('#userModal').modal('show');  
                    $('#material_title').val(data.material_title);   
                    $('#material_description').val(data.material_description); 
                    $('#material_category').val(data.material_category);  
                    $('#material_source').val(data.material_source);     
                    $('#material_fileName').val(data.material_fileName);  
                    $('#material_fileType').val(data.material_fileType);  
                    $('.modal-title').text("Edit User");  
                    $('#user_id').val(user_id);  
                    $('#user_uploaded_file').html(data.material_file);  
                    $('#action').val("Edit");  
                }  
            })  
        });  

        // DELETE MATERIAL
        $(document).on('click', '.delete', function(){  
            var user_id = $(this).attr("id");  
            if(confirm("Are you sure you want to delete this?")){  
                $.ajax({  
                    url:"<?php echo base_url(); ?>Admin_controller/delete_single_material",  
                    method:"POST",  
                    data:{user_id:user_id},  
                    success:function(data){  
                        alert(data);  
                        dataTable.ajax.reload();  
                    }  
                });  
            }  
            else  
            {  
            return false;       
            }  
        });

        $(document).on('click', '.download', function(){  
            var user_id = $(this).attr("id");  
            if(confirm("Are you sure you want to delete this?")){  
                $.ajax({  
                    url:"<?php echo base_url(); ?>Admin_controller/download_material",  
                    method:"POST",  
                    data:{user_id:user_id},  
                    success:function(data){  
                        alert(data);  
                        dataTable.ajax.reload();  
                    }  
                });  
            }  
            else{  
                return false;       
            }  
        }); 
    }); 
</script> 

<script class="include" type="text/javascript" src="<?php echo base_url()."assets/"; ?>lib/jquery.dcjqaccordion.2.7.js"></script>

<script src="<?php echo base_url()."assets/"; ?>lib/common-scripts.js"></script>

<script src="<?php echo base_url()."assets/"; ?>lib/advanced-form-components.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

<script src="<?php echo base_url()."assets/tags-input/"; ?>bootstrap-tagsinput.js"></script>
<script src="<?php echo base_url()."assets/tags-input/"; ?>bootstrap-tagsinput-angular.js"></script>
