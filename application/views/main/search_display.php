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

	<!-- Bootstrap core CSS -->
	<!-- <link href="<?php echo base_url()."assets/"; ?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

	<!--CSS============================================= -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css">
	<link rel="stylesheet" href="<?php echo base_url()."assets/educ/"; ?>css/linearicons.css">
	<link rel="stylesheet" href="<?php echo base_url()."assets/educ/"; ?>css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url()."assets/educ/"; ?>css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url()."assets/educ/"; ?>css/magnific-popup.css">
	<link rel="stylesheet" href="<?php echo base_url()."assets/educ/"; ?>css/nice-select.css">
	<link rel="stylesheet" href="<?php echo base_url()."assets/educ/"; ?>css/animate.min.css">
	<link rel="stylesheet" href="<?php echo base_url()."assets/educ/"; ?>css/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo base_url()."assets/educ/"; ?>css/main.css">

	<script src="<?php echo base_url()."assets/"; ?>ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>maxcdn/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="<?php echo base_url()."assets/"; ?>ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="<?php echo base_url()."assets/"; ?>maxcdn/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link href="<?php echo base_url()."assets/"; ?>netdna/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/search.css">

	<!-- SWEET ALERT -->
	<link rel="stylesheet" href="<?php echo base_url()."assets/sweet-alert/"; ?>sweetalert2.min.css">
	<script src="<?php echo base_url()."assets/sweet-alert/"; ?>sweetalert2.min.js"></script>
</head>


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

	<section id="main-content">
		<section class="wrapper">	
			<section class="" id="result-area" style="margin-top: 50px;">

				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-12">
							<div class="section-title text-center">
								<h1>
									Search Results
										<br>
										<span>
											for
										</span>
										<br>
										<span style="color: #01579B; text-transform: uppercase;font-style: italic">
											<?php
											echo $_SESSION['search_phrase'];  
											?> 
										</span>
								</h1>
								<p>
									About <b style="color: #01579B"> <?php echo $_SESSION['total_search'];?> </b> results.
								</p>
								<a href="<?php echo base_url();?>Main_controller/home" style="text-decoration: none; color: white;">
									<button type="button" class="btn btn-info btn-block " style="margin-top: 10px; background-color: #01579B  " >Search Again</button>
								</a>
							</div>
							<div class="feature-inner">
								<div class="res" style="width: 100%">
									<?php foreach($record as $row): ?>
									<div class="card" style="width: 100%">
										<div class="additional">
											<div class="user-card">
												<div class="level center">
													<!-- <i class='fa fa-star'  style="color: #fff;"></i> -->
													<div style="color: white">
														<?php 
															$sql2 = "SELECT COUNT(material_id) as bb FROM `tbl_rating` WHERE material_id = '" . $row->material_id . "'";
															$query2 = $this->db->query($sql2);
															$result2 = $query2->result();

															foreach ($result2 as $row2) {
																if ($row2->bb !=0) {
																	echo "Over " . $row2->bb . " User rating";
																}
																else{
																	echo "";
																}
															}
														?>
													</div>
												</div>
												<div class="points center" style="color: #fff">
													<i class='fa fa-star'  style="color: #fff"></i>
													<?php 
														$sql = "SELECT COUNT(*) as a, SUM(rate) as b FROM tbl_rating WHERE material_id = '" . $row->material_id . "'";
														$query1 = $this->db->query($sql);
														$result1 = $query1->result();

														$a_sum = 0;
														$a_count = 0;

														foreach($result1 as $row1){
															$a_count = $row1->a;
															$a_sum = $row1->b;

															if($a_count!=0){
																echo number_format($a_sum/$a_count,1);
															}
															else{
																echo "No Rating";
															}
														}
													?>
												</div>
											</div>

											<div class="more-info" style="width: 80%">
												<h2 style="color: #fff; text-align: center;">
													<?php echo $row->material_title;?> aaaa
												</h2>

												<!-- <div class="coords">
												<span>Position/Role</span>
												<span>City, Country</span>
												</div> -->
												<script language="javascript">
													function clickme(x){
														document.getElementById("hidden_id").value = x;
													}
												</script>
												<div class="stats">
													<div>
														<div class="title" style="color: #fff">
															Rate
														</div>
														<i class='fa fa-star' style="font-size: 30px; color: #fff" onclick="clickme(<?php echo $row->material_id; ?>)" data-toggle="modal" data-target="#userModal">
															<a href="" id="<?php echo $row->material_id; ?>" class="qwerty" ></a>
														</i>
													</div>
													<div>
														<div class="title" style="color: #fff">
															Download
														</div>
														<a href="../upload/<?php echo $row->file; ?>" target="_blank" id="<?php echo $row->material_id; ?>" class="ddd">
															<i class='fa fa-download aa' style="font-size: 30px; color: #fff"></i>
														</a>
													</div>
												</div>
											</div>
										</div>

										<div class="general">
											<h1 style="color:black">
												<div id="material_title">
													<?php 
														$a = str_ireplace($_SESSION['search_phrase'], $_SESSION['highlighted_text'], $row->material_title);
														echo $a;
													?>
												</div>
											</h1>
											<p>
												<div id="material_description">
													<?php 
														$b = str_ireplace($_SESSION['search_phrase'], $_SESSION['highlighted_text'], $row->material_description);
														echo $b;
													?>
												</div>
											</p>
											<p>
												<div id="material_source" class="par"> 
													<b style="color: #000000">Category: </b> <i><?php echo $row->material_category;?></i> 
												</div>
											</p>
											<p>
												<div id="material_source" class="par"> 
													<b style="color: #000000">Source: </b> <i><?php echo $row->material_source;?></i>
												</div>
											</p>
											<span class="more" style="color: #fff  ;"><div id="material_id"><?php echo $row->material_id; ?></div></span>
										</div>
									</div>
									<?php endforeach;?>
								</div>
							</div>
						</div>
					</div>
				</div>

			</section>
		</section>
	</section>



	<div class="modal" id="userModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<form method="post" id="user_form" class="form-horizontal style-form">
						<div class="rating-form" id="rate_form">
							<div class="form-group" id="result_fieldset">
								<div class="form-item" id="rates">
									<input id="rating-5" name="rating" type="radio" value="5" />
									<label for="rating-5" data-value="5">
										<span class="rating-star">
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star"></i>
										</span>
										<span class="ir">
											5
										</span>
									</label>
									<input id="rating-4" name="rating" type="radio" value="4" />
									<label for="rating-4" data-value="4">
										<span class="rating-star">
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star"></i>
										</span>
										<span class="ir">
											4
										</span>
									</label>
									<input id="rating-3" name="rating" type="radio" value="3" />
									<label for="rating-3" data-value="3">
										<span class="rating-star">
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star"></i>
										</span>
										<span class="ir">
											3
										</span>
									</label>
									<input id="rating-2" name="rating" type="radio" value="2" />
									<label for="rating-2" data-value="2">
										<span class="rating-star">
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star"></i>
										</span>
										<span class="ir">
											2
										</span>
									</label>
									<input id="rating-1" name="rating" type="radio" value="1" />
									<label for="rating-1" data-value="1">
										<span class="rating-star">
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star"></i>
										</span>
										<span class="ir">
											1
										</span>
									</label>
									<div class="form-output" style="color: white">
										? / 5
									</div>
								</div>
							</div>
						</div>

						<div class="form-group ratesss">
							<input type="hidden" name="hidden_id" id="hidden_id" value="">

							<label class="col-lg-2 control-label" >
								<b style="color: black;">Name</b>
							</label>
							<div class="col-lg-5">
								<input type="text" name="user_firstName" id="user_firstName" class="form-control" required="" placeholder="">
								<p class="help-block">
									First Name
								</p>
							</div>
							<div class="col-lg-5">
								<input type="text" name="user_lastName" id="user_lastName" class="form-control" required="" placeholder="">
								<p class="help-block">
									Last Name
								</p>
							</div>
						</div>
						<div class="form-group ">
							<label class="col-lg-2 control-label">
								<b style="color: black;">Email</b>
							</label>
							<div class="col-lg-10">
								<input type="email" placeholder="" name="user_email" id="user_email" class="form-control" required="">
							</div>
						</div>
						<div class="form-group">
							<div class="col-lg-12">
								<button class="btn btn-success btn-block" id="submit_rate" style="background-color: #01579B">
									SUBMIT
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">

		$(document).ready(function() {

			var text = '<?php echo $_SESSION['search_phrase'];?>';
			$.ajax({  
				url:"<?php echo base_url(); ?>Main_controller/total_visit",  
				method:"POST",  
				data:{text:text},  
				success:function(data)  
				{    
					// alert(data);
				}  
			});

			$('.ddd').click(function(){
				var material_id 			= $(this).attr("id");
				var material_title 			= document.getElementById("material_title").innerHTML;
				$.ajax({  
					url:"<?php echo base_url(); ?>Main_controller/total_download",  
					method:"POST",  
					data:{material_id:material_id},  
					success:function(data)  
					{    
						// alert("aa");
					}  
				});
			});

			function clickme(){
				alert();
			}

			$('#submit_rate').click(function(){
				event.preventDefault(); 

				var material_id 			= $('#hidden_id').val();
				var material_title 			= document.getElementById("material_title").innerHTML;
				var user_firstName       	= $('#user_firstName').val();  
				var user_lastName        	= $('#user_lastName').val(); 
				var user_name				= user_firstName + " " + user_lastName; 
				var user_email           	= $('#user_email').val(); 
				var user
				var rate;
				var a;

				if (document.getElementById('rating-1').checked) {
					rate = document.getElementById('rating-1').value;
				}
				else if (document.getElementById('rating-2').checked) {
					rate = document.getElementById('rating-2').value;
				}
				else if (document.getElementById('rating-3').checked) {
					rate = document.getElementById('rating-3').value;
				}
				else if (document.getElementById('rating-4').checked) {
					rate = document.getElementById('rating-4').value;
				}
				else if (document.getElementById('rating-5').checked) {
					rate = document.getElementById('rating-5').value;
				}

				if (user_firstName!= "" && user_lastName!= "" && user_email!= "") {
					$.ajax({
						url:"<?php echo base_url() . 'Main_controller/check_rate_record'?>", 
						method:'POST',
						data:{
							user_email:user_email,
							material_id:material_id
						},
						success:function(data){
							if (data == 'new') {
								$.ajax({  
									url:"<?php echo base_url() . 'Main_controller/submit_rate_form'?>",  
									method:'POST',  
									data:{	user_name:user_name,
											user_email:user_email,
											material_id: material_id,
											material_title: material_title,
											rate:rate
									},  
									success:function(data){  
										Swal.fire(data) 
										$('#user_form')[0].reset();  
										$(".modal-backdrop").remove();
										$('#myModal').modal('hide'); 
										$('#userModal').modal('hide'); 
									}  
								});
							}
							else{
								Swal.fire({
									title: 'Do you want to rate this again?',
									text: "Your old rate will be raplace by this.",
									type: 'question',
									showCancelButton: true,
									confirmButtonColor: '#3085d6',
									cancelButtonColor: '#d33',
									confirmButtonText: 'Yes, Rate again!'
								}).then((result) => {
									if (result.value) {
										$.ajax({  
											url:"<?php echo base_url() . 'Main_controller/update_rate_form'?>",  
											method:'POST',  
											data:{	user_email:user_email,
													material_id: material_id,
													rate:rate
											},  
											success:function(data){  
												Swal.fire(
													'Updated!',
													'Rate has been updated.',
													'success'
												)
												$('#user_form')[0].reset();  
												$(".modal-backdrop").remove();
												$('#myModal').modal('hide'); 
												$('#userModal').modal('hide'); 
											}  
										});
									}
								})
							}
						}
					});
				}
				else{
					Swal.fire({
						type: 'error',
						title: 'Oops...',
						text: 'Fields are required'
					})
				}    
			});
		});
	</script>

	<!-- ####################### End Scroll to Top Area ####################### -->

	<script src="<?php echo base_url()."assets/educ/"; ?>js/vendor/jquery-2.2.4.min.js"></script>
	<script src="<?php echo base_url()."assets/"; ?>ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
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

	<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script> -->

</body>

</html>

