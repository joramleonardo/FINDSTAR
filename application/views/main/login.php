<style>
  .help-block{
    font-style: italic;
    font-size: 11px;
  }

    body{
    background-image:url("<?php echo base_url()."assets/"; ?>img/a2.jpg");
  }

  .layer {
    background-color: rgba(3, 18, 28, 0.8);
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
</style>


<div class="layer">
    <div id="login-page">
        <div class="container">

          <form class="form-login" method="POST" action="<?php echo base_url();?>Main_controller/login_validation">
            <h2 class="form-login-heading">Sign in now</h2>
            <div class="login-wrap">
              <?php
                echo '<label class="text-danger">' . $this->session->flashdata("error") . '</label>';
              ?>
              <input type="text" name="user_username" id="user_username" class="form-control" placeholder="User ID">
              <?php
                echo form_error('user_username','<div class="text-danger">','</div>'); 
              ?>
              <br>

              <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Password">
              <?php
                echo form_error('user_password','<div class="text-danger">','</div>'); 
              ?>
              <br>
              <button class="btn btn-theme btn-block" name="login">LOGIN</button>
            </div>
          </form>

        </div>
    </div>
</div>

 </body>  
 </html> 


 <script type="text/javascript" language="javascript" >  
  
 $(document).ready(function(){
 }); 

 </script>  

   <script src="<?php echo base_url()."assets/"; ?>lib/jquery-ui-1.9.2.custom.min.js"></script>
  <script src="<?php echo base_url()."assets/"; ?>lib/advanced-form-components.js"></script>