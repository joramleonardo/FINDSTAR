<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="<?php echo base_url()."assets/"; ?>img/favicon.png" rel="icon">
  <link href="<?php echo base_url()."assets/"; ?>img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url()."assets/"; ?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="<?php echo base_url()."assets/"; ?>lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="<?php echo base_url()."assets/"; ?>css/style.css" rel="stylesheet">
  <link href="<?php echo base_url()."assets/"; ?>css/style-responsive.css" rel="stylesheet">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
    <div class="layer">
        <div id="register-user-page">
            <div class="container">
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel">
                            <div class="form">
                                <form class="cmxform form-horizontal style-form" id="signupForm" method="get" action="">
                                    <h2 class="form-login-heading">Create an Account</h2>
                                    <div class="login-wrap">
                                        
                                        <div class="form-group "><!-- Firstname -->
                                            <label for="firstname" class="control-label col-lg-2">Firstname:</label>
                                            <div class="col-lg-10">
                                                <input class=" form-control" id="firstname" name="firstname" type="text" />
                                            </div>
                                        </div>
                                        <div class="form-group "><!-- Lastname -->
                                            <label for="lastname" class="control-label col-lg-2">Lastname:</label>
                                            <div class="col-lg-10">
                                                <input class=" form-control" id="lastname" name="lastname" type="text" />
                                            </div>
                                        </div>
                                        <div class="form-group "><!-- Username -->
                                            <label for="username" class="control-label col-lg-2">Username:</label>
                                            <div class="col-lg-10">
                                                <input class="form-control " id="username" name="username" type="text" />
                                            </div>
                                        </div>
                                        <div class="form-group "><!-- Password -->
                                            <label for="password" class="control-label col-lg-2">Password:</label>
                                            <div class="col-lg-10">
                                                <input class="form-control " id="password" name="password" type="password" />
                                            </div>
                                        </div>
                                        <div class="form-group "><!-- Confirm Password -->
                                            <label for="confirm_password" class="control-label col-lg-2">Confirm Password:</label>
                                            <div class="col-lg-10">
                                                <input class="form-control " id="confirm_password" name="confirm_password" type="password" />
                                            </div>
                                        </div>
                                        <div class="form-group "><!-- Email -->
                                            <label for="email" class="control-label col-lg-2">Email:</label>
                                            <div class="col-lg-10">
                                                <input class="form-control " id="email" name="email" type="email" />
                                            </div>
                                        </div>
                                        <div class="form-group "> <!-- Role Dropdown -->
                                            <label for="lastname" class="control-label col-lg-2">Role:</label>
                                            <div class="col-lg-10">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-theme dropdown-toggle" data-toggle="dropdown">
                                                    Select here <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu" id="role" name="role">
                                                        <li><a href="#">Admin</a></li>
                                                        <li><a href="#">Encoder</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="button"onclick="window.location.href = '<?php echo base_url()?>login/';" value="Register" class="btn btn-theme btn-block ">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- js placed at the end of the document so the pages load faster -->
        <script src="<?php echo base_url()."assets/"; ?>lib/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url()."assets/"; ?>lib/bootstrap/js/bootstrap.min.js"></script>
        <!--BACKSTRETCH-->
        <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
        <script type="<?php echo base_url()."assets/"; ?>text/javascript" src="lib/jquery.backstretch.min.js"></script>
        <!--   <script>
        $.backstretch("<?php echo base_url()."assets/"; ?>img/login-bg.jpg", {
        speed: 500
        });
        </script> -->
    </div>
    </body>

<style type="text/css">
  body{
    background-image:url("<?php echo base_url()."assets/"; ?>img/login-bg4.jpg");
  }

  .layer {
    background-color: rgba(3, 18, 28, 0.8);
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }
  .control-label{
    font-weight: 900;
    }
</style>

</html>
