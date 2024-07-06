<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url()."assets/mdb/"; ?>css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?php echo base_url()."assets/mdb/"; ?>css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="<?php echo base_url()."assets/mdb/"; ?>css/style.css" rel="stylesheet">
</head>

<body>

  <!-- Start your project here-->
   <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="defaultForm-email" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="defaultForm-pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-default">Login</button>
      </div>
    </div>
  </div>
</div>
  <!-- Start your project here-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="<?php echo base_url()."assets/mdb/"; ?>js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?php echo base_url()."assets/mdb/"; ?>js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url()."assets/mdb/"; ?>js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url()."assets/mdb/"; ?>js/mdb.min.js"></script>
</body>

</html>






<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/fav.png">
  <!-- Author Meta -->
  <meta name="author" content="codepixer">
  <!-- Meta Description -->
  <meta name="description" content="">
  <!-- Meta Keyword -->
  <meta name="keywords" content="">
  <!-- meta character set -->
  <meta charset="UTF-8">
  <!-- Site Title -->
  <link rel="icon" href="<?php echo base_url()."assets/"; ?>img/find2-only.png">
  <title>F I N D S T A R</title>

  <!--Google Font============================================= -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500i" rel="stylesheet">

  <!--CSS============================================= -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/educ/"; ?>css/linearicons.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/educ/"; ?>css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/educ/"; ?>css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/educ/"; ?>css/magnific-popup.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/educ/"; ?>css/nice-select.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/educ/"; ?>css/animate.min.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/educ/"; ?>css/owl.carousel.css">-->
  <link rel="stylesheet" href="<?php echo base_url()."assets/educ/"; ?>css/main.css"> 


    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo base_url()."assets/colorlib/"; ?>main.css">

  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/search.css">

  <link rel="stylesheet" href="<?php echo base_url()."assets/sweet-alert/"; ?>sweetalert2.min.css">
  <script src="<?php echo base_url()."assets/sweet-alert/"; ?>sweetalert2.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <link href="<?php echo base_url()."assets/"; ?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">


</head>

<style type="text/css">
  .s003{
    background-color: #22242a;
  }
  .s003 form .inner-form .input-field.third-wrap .btn-search{
    background: #01579B;
  }
  .btn-search:hover{
    background-color: red;
  }
</style>

<body>
  <header id="header">
    <div class="container">
      <div class="row align-items-center justify-content-between d-flex">
        <div id="logo">
          <a href="index.html"><img src=" " alt="" title="" /></a>
        </div>
        <nav id="nav-menu-container">
          <ul class="nav-menu pull-left">
            <!-- <li><a href="<?php echo base_url()?>logout/">About Us</a></li>
            <li><a href="<?php echo base_url()?>logout/">Contact Us</a></li> -->
            <li><a href="<?php echo base_url()?>login/" target="_blank">Sign In</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </header>

<!--  <section class="home-banner-area ">
    <div class="container">
      <div class="row fullscreen align-items-center justify-content-center">
        <div class="banner-content col-lg-8 col-md-12">
          <img src="<?php echo base_url()."assets/"; ?>img/find2.png" class="wow fadeIn" data-wow-duration="4s" width="300px">
          <div class="input-wrap">
            <form method="POST" action="<?php echo base_url()?>search/result">
              <input type="text" placeholder="Enter Search" class="form-control" id="search_term" name="search_term">
              <?php
                        echo form_error('search_term','<div class="text-danger">','</div>'); 
                      ?>
              <input type="submit" name="search" class="btn search-btn" value="SEARCH" style="margin-top: 10px;">
            </form>
          </div>
          <h4 class="text-white">Top Search</h4>
          <div class="courses pt-20">
            <a href="#" data-wow-duration="1s" data-wow-delay=".3s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown">Ruby
              on Rails</a>
            <a href="#" data-wow-duration="1s" data-wow-delay=".6s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown">Python</a>
            <a href="#" data-wow-duration="1s" data-wow-delay=".9s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown">Marketing</a>
            <a href="#" data-wow-duration="1s" data-wow-delay="1.2s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown">UI/UX
              Design
            </a>
            <a href="#" data-wow-duration="1s" data-wow-delay="1.5s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown">Android</a>
            <a href="#" data-wow-duration="1s" data-wow-delay="1.8s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown">Data
              Science
            </a>
            <a href="#" data-wow-duration="1s" data-wow-delay="2.1s" class="primary-btn transparent mr-10 mb-10 wow fadeInDown">Cryptocurrency</a>
          </div>
        </div>
      </div>
    </div>
  </section> -->


    <div class="s003">
      <form method="POST" action="<?php echo base_url()?>search/result">
    <img src="<?php echo base_url()."assets/"; ?>img/find2.png" class="wow fadeIn" data-wow-duration="4s" style="width: 50%; margin-right: auto; margin-left: auto; display: block; margin-bottom: 50px">
        <div class="inner-form" >

         <!--  <div class="input-field first-wrap" style="width: 150px">
            <div class="input-select">
              <select data-trigger="" name="selected_date" id="selected_date">
                <option placeholder="">Date</option>
                <option>2010</option>
                <option>2011</option>
                <option>2012</option>
                <option>2013</option>
                <option>2014</option>
                <option>2015</option>
                <option>2016</option>
                <option>2017</option>
                <option>2018</option>
                <option>2019</option>
              </select>
            </div>
          </div> -->

          <!-- <div class="input-field first-wrap">
            <div class="input-select">
              <select data-trigger="" name="selected_category" id="selected_category">
                <option placeholder="">Category</option>
                <option value="Annual Report">Annual Report</option>
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
                <option value="Articles">Articles</option>
                <option value="Certificate">Certificate</option>
                <option value="Foreign Training Report">Foreign Training Report</option>
                <option value="Forms">Forms</option>
                <option value="Government Policies">Government Policies</option>
                <option value="Guidelines">Guidelines</option>
                <option value="Images">Images</option>
                <option value="Investment Maps">Investment Maps</option>
                <option value="Job Posting">Job Posting</option>
                
              </select>
            </div>
          </div> -->

          <div class="input-field second-wrap">
            <input type="text" placeholder="Enter Search" class="form-control" id="search_term" name="search_term">
          </div>

          <div class="input-field third-wrap">
            <!-- <button class="btn-search" type="submit">
              <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
              </svg>
            </button> -->
            <button class="btn-search" type="submit" name="search">
              <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
              </svg>
            </button>
            <!-- <input type="submit" name="search" class="btn search-btn" value="SEARCH" style="background-color: #01579B; color: #fff"> -->
            <!-- <i class="fa fa-search icon">  -->
          </div>

        </div>
      </form>
    </div>

    <button class="btn btn-success btn-block" id="submit_rate" style="background-color: #01579B">SUBMIT</button>


</body>

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

<script type="text/javascript">
  $('#submit_rate').click(function(){
    alert("aa");
  });
  


</script>

<!-- ####################### End Scroll to Top Area ####################### -->

<script src="<?php echo base_url()."assets/educ/"; ?>js/vendor/jquery-2.2.4.min.js"></script>
<script src="<?php echo base_url()."assets/educ/"; ?>js/vendor/bootstrap.min.js"></script>
<script src="<?php echo base_url()."assets/educ/"; ?>js/easing.min.js"></script>
<script src="<?php echo base_url()."assets/educ/"; ?>js/hoverIntent.js"></script>
<script src="<?php echo base_url()."assets/educ/"; ?>js/superfish.min.js"></script>
<script src="<?php echo base_url()."assets/educ/"; ?>js/jquery.ajaxchimp.min.js"></script>
<script src="<?php echo base_url()."assets/educ/"; ?>js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url()."assets/educ/"; ?>js/owl.carousel.min.js"></script>
<script src="<?php echo base_url()."assets/educ/"; ?>js/owl-carousel-thumb.min.js"></script>
<script src="<?php echo base_url()."assets/educ/"; ?>js/jquery.sticky.js"></script>
<script src="<?php echo base_url()."assets/educ/"; ?>js/jquery.nice-select.min.js"></script>
<script src="<?php echo base_url()."assets/educ/"; ?>js/parallax.min.js"></script>
<script src="<?php echo base_url()."assets/educ/"; ?>js/waypoints.min.js"></script>
<script src="<?php echo base_url()."assets/educ/"; ?>js/wow.min.js"></script>
<script src="<?php echo base_url()."assets/educ/"; ?>js/jquery.counterup.min.js"></script>
<script src="<?php echo base_url()."assets/educ/"; ?>js/mail-script.js"></script>
<script src="<?php echo base_url()."assets/educ/"; ?>js/main.js"></script>



</html>