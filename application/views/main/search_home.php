<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="<?php echo base_url()."assets/"; ?>img/find2-only.png">
    <title>F I N D S T A R</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url()."assets/mdb/"; ?>css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url()."assets/mdb/"; ?>css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="<?php echo base_url()."assets/mdb/"; ?>css/style.min.css" rel="stylesheet">

    <style type="text/css">
        html,
        body,
        header,
        .view {
            height: 100%;
        }

        .carousel,
        .carousel-item,
        .carousel-item.active {
            height: 100%;
        }
        .carousel-inner {
            height: 100%;
        }

        @media (min-width: 800px) and (max-width: 850px) {
            .navbar:not(.top-nav-collapse) {
                background: #1C2331!important;
            }
        }

        .form-control{
            display: inline-block;
            width: 80%;
        }

        .carousel .carousel-control-prev-icon,
        .carousel .carousel-control-next-icon{
            opacity: 0;
        }

        .bg {
            background-image: url("<?php echo base_url()."assets/"; ?>img/a2.jpg");
            height: 100%; 
            opacity: 1.5;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="bg">

        <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left -->
                    <ul class="navbar-nav mr-auto">
                        <!-- <li class="nav-item active">
                        <a class="nav-link" href="#">Home
                        <span class="sr-only">(current)</span>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="https://mdbootstrap.com/docs/jquery/" target="_blank">About MDB</a>
                        </li> -->
                    </ul>

                    <!-- Right -->
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item">
                            <a href="<?php echo base_url()?>login/" class="nav-link border border-light rounded waves-effect waves-light"
                            target="_blank">
                                <i class="fas fa-sign-in-alt"></i>Log In
                            </a>
                        </li>
                    </ul>

                </div>

            </div>
        </nav>
        <div id="carousel-example-1z" class="carousel slide carousel-fade">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="view">

                        <!--Video source-->
                        <!-- <video class="video-intro" autoplay loop muted>
                        <source src="https://mdbootstrap.com/img/video/animation-intro.mp4" type="video/mp4" />
                        </video> -->

                        <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

                            <div class="text-center white-text mx-5 wow fadeIn">
                                <form method="POST" action="<?php echo base_url()?>search/result">
                                    <img src="<?php echo base_url()."assets/"; ?>img/find2.png" class="wow fadeIn" data-wow-duration="4s" style="width: 30%; margin-right: auto; margin-left: auto; display: block; margin-bottom: 50px">
                                    <div class="inner-form" >
                                        <div class="input-field second-wrap">
                                            <input type="text" placeholder="Enter Search" class="form-control" id="search_term" name="search_term">
                                        </div>
                                        <div class="input-field third-wrap">
                                            <input type="submit" name="search" class="btn search-btn" value="SEARCH" style="background-color: #01579B; color: #fff">
                                            <input type="button"       name="adv_search" class="btn search-btn" value="ADVANCED SEARCH" id="adv_search" name="adv_search" style="background-color: #01579B; color: #fff" data-toggle="modal" data-target="#modalLoginForm">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Advance Search</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body mx-3">
                        <div class="container">
                            <div class="row">
                                <form method="POST" action="<?php echo base_url()?>search/result/advance" style="width: 100%">
                                    <div class="col">
                                        <div class="md-form">
                                            <input type="text" id="defaultForm-email" class="form-control " style="width: 100%" name="search_term_advance">
                                            <label data-error="wrong" data-success="right" for="defaultForm-email">Enter Keyword</label>
                                        </div>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-3"><b>Year:</b></div>
                                    <div class="col-9">
                                        <div class="form-wrapper">
                                            <select name="material_year" id="material_year" class="form-control" style="width: 100%">
                                                <option selected="true" disabled="disabled">Select  Year</option>
                                                <option value="2018">2018</option>
                                                <option value="2019">2019</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="w-100"></div>
                                    <br>
                                    <div class="col-3"><b>Category:</b></div>
                                    <div class="col-9">
                                        <div class="form-wrapper">
                                            <select name="material_category" id="material_category" class="form-control" style="width: 100%">
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
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center">
                                        <input type="submit" name="advance_search" class="btn search-btn" value="SEARCH" style="background-color: #01579B; color: #fff">
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                    <!-- <div class="modal-footer d-flex justify-content-center">
                        <button class="btn " style="background-color: #01579B; color: white">Search</button>
                    </div> -->
                </div>
            </div>
        </div>

        <!-- SCRIPTS -->
        <!-- JQuery -->
        <script type="text/javascript" src="<?php echo base_url()."assets/mdb/"; ?>js/jquery-3.4.1.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="<?php echo base_url()."assets/mdb/"; ?>js/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="<?php echo base_url()."assets/mdb/"; ?>js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="<?php echo base_url()."assets/mdb/"; ?>js/mdb.min.js"></script>

        <!-- Initializations -->
        <script type="text/javascript">
            new WOW().init();
        </script>
    </div>

</body>

</html>
