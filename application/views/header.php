<?php
	$CI =& get_instance();
	$CI->load->model('Notice_model');
	$noticeCount = $CI->Notice_model->getNoticeCount();
	$msgCount = $CI->Notice_model->getMsgCount();
	$notice = $CI->Notice_model->getNotice();
?>
<!DOCTYPE html>
<html class="no-js"> 
	<head>
	 <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-VNPS5WGRG3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-VNPS5WGRG3');
    </script>
    
    <meta name="facebook-domain-verification" content="ii8aryrkn1cux7ylfwt6iemsnnkub1" />
<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1319059449547814');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1319059449547814&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
    
    
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hello Humsafar &mdash; Find Your Perfect Couple</title>
	<!-- Favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="http://localhost/perfomdigi/hindu-humsfar-react/backend//assets/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="http://localhost/perfomdigi/hindu-humsfar-react/backend//assets/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="http://localhost/perfomdigi/hindu-humsfar-react/backend//assets/favicon/favicon-16x16.png">
	<link rel="manifest" href="http://localhost/perfomdigi/hindu-humsfar-react/backend//assets/favicon/site.webmanifest">
	<link rel="mask-icon" href="http://localhost/perfomdigi/hindu-humsfar-react/backend//assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<link rel="shortcut icon" href="http://localhost/perfomdigi/hindu-humsfar-react/backend//assets/favicon/favicon.ico">
	<meta name="msapplication-TileColor" content="#bb419b">
	<meta name="msapplication-TileImage" content="http://localhost/perfomdigi/hindu-humsfar-react/backend//assets/favicon/mstile-144x144.png">
	<meta name="msapplication-config" content="http://localhost/perfomdigi/hindu-humsfar-react/backend//assets/favicon/browserconfig.xml">
	<meta name="theme-color" content="#ffffff">
	<!-- Keyword & Description -->
	<meta name="description" content="Meet Your Dream Life Partner, Find Brides And Grooms Profiles From The Most Searchable Matrimony Site In India. Register FREE-100% Secure Match Making Site For Indian Brides And Grooms Worldwide." />
	<meta name="keywords" content="hello humsafar, hello, humsafar, online, match, couple, bride, groom, perfect, matrimonial, beautiful brides, indian matrimonial, find your match, partner search, matrimonial services, matrimonial india, bride search, matrimonial search, marriage, matrimonial sites, free matrimonial, life partner, looking for bride, shaadi matrimonial, matrimony " />
	<meta name="author" content="Hello Humsafar" /> 
		<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="Hello Humsafar &mdash; Find Your Perfect Couple"/>
	<meta property="og:image" content="http://localhost/perfomdigi/hindu-humsfar-react/backend//assets/favicon/apple-touch-icon.png"/>
	<meta property="og:url" content="http://localhost/perfomdigi/hindu-humsfar-react/backend//"/>
	<meta property="og:site_name" content="Hello Humsafar"/>
	<meta property="og:description" content="Meet Your Dream Life Partner, Find Brides And Grooms Profiles From The Most Searchable Matrimony Site In India. Register FREE-100% Secure Match Making Site For Indian Brides And Grooms Worldwide."/>
	<meta name="twitter:title" content="Hello Humsafar &mdash; Find Your Perfect Couple" />
	<meta name="twitter:description" content="Meet Your Dream Life Partner, Find Brides And Grooms Profiles From The Most Searchable Matrimony Site In India. Register FREE-100% Secure Match Making Site For Indian Brides And Grooms Worldwide." />
	<meta name="twitter:image" content="http://localhost/perfomdigi/hindu-humsfar-react/backend//assets/favicon/apple-touch-icon.png" />
	<meta name="twitter:url" content="http://localhost/perfomdigi/hindu-humsfar-react/backend//" />
	<meta name="twitter:card" content="summary" />

	<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.css">
	<!-- Added By Imran -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-multiselect.css" />
	<!-- Added By Imran -->

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/magnific-popup.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/jquery.toast.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
	<!-- Modernizr JS -->
	<script src="<?=base_url()?>assets/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<!-- <script src="<?=base_url()?>assets/js/jquery.toast.js"></script>
	<script type="text/javascript">
        $(document).ready(function() {
        	alert('hello');
            
            // $('.eval-js').on('click', function ( e ) {
            //     e.preventDefault();

                if ( !$(this).hasClass('generate-toast') ) {
                    var code = $.toast({
								    heading: 'Success',
								    text: 'Here is some kind of success message with a success icon that you can notice at the left side.',
								    position: 'top-right', 
								    icon: 'success'
								});
                    code.replace("<span class='hidden'>", '');
                    code.replace("</span");

                    eval( code );
                };
            // });
            });
    </script> -->
	<style>
		.m-progress-bar {
		    min-height: 1em;
		    background: #c12d2d;
		    width: 5%;
		}
	</style>
	<link rel="stylesheet" href="<?=base_url()?>assets/css/responsive.css">
	
	</head>
	<body id="bodyBackground">
		
	<!-- <div class="fh5co-loader"></div> -->
	
	<div id="page">
	<div class="fh5co-nav" id="navBackground">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-xs-5">
					<div id="fh5co-logo"><?php if (isset($_SESSION['id'])) { ?><a href="<?=base_url('mycon/desire_patner_match')?>"> <?php } else { ?><a href="<?=base_url('mycon/index')?>"><?php } ?>Hello<strong> Humsafar</strong></a></div>
				</div>
				<div class="col-md-8 col-xs-7 text-right menu-1">
					<ul id="mobileMenuNew">
						<li class="dropdown">
							<span id="noticeCount" class="dropdown-toggle" data-toggle="dropdown" onclick="clearNoti()"><i class="fa fa-bell-o menuIcons" aria-hidden="true"></i><?php if ($noticeCount > 0) { ?>
								<!-- Added By imran 17.04.20 on style attributes -->
								<sup style="background: #f00; border-radius: 50%; width: 15px; height: 15px; color: #ffffff; font-size: 10px; padding-right: 5px; line-height: 15px; font-weight: bold; position: absolute; right: 9px;"><?=$noticeCount?></sup>
								<?php } ?>
								<!-- Added By imran on style attributes -->
							</span>
							<ul class="dropdown-menu" id="notificationIconUL">
								<?php foreach ($notice as $key => $noticeValue) { ?>
									<li><?=$noticeValue->notice;?><a href="<?=base_url('register_controller/delete_notification/').$noticeValue->notification_id?>" class="notificationCloseBtn">X</a></li>
								<?php } ?>
								<!-- <li>
									<a href="#">New request on your profile by HH - 1030</a><a href="#" class="notificationCloseBtn">X</a>
								</li>
								<li><a href="#">Declined / Cancelled</a><a href="#" class="notificationCloseBtn">X</a></li> -->
							</ul>
						</li> 
						<li><span class="nIconSup"><a href="<?=base_url('mycon/chat')?>"><i class="fa fa-envelope-o notificationIcon" aria-hidden="true"></i><?php if ($msgCount > 0) { ?> 
						<sup><?=$msgCount?></sup>
						<?php } ?></a></span></li> 
						<li><a href="#" class="labelMenu"><i class="fa fa-bars" aria-hidden="true"></i></a></li>
					</ul>
					<ul>
						<li><a href="<?=base_url('mycon/desire_patner_match')?>">Home</a></li>  
						<li class="dropdown">
							<span class="dropdown-toggle" data-toggle="dropdown">Matches <i class="fa fa-chevron-down" aria-hidden="true"></i></span>
							<ul class="dropdown-menu">
								<!-- <li><a href="#">Daily Recommendations</a></li> -->
								<!--<li><a href="<?=base_url('mycon/chat');?>">Recently Send Interest</a></li>  -->
								<li><a href="<?=base_url('mycon/search')?>">Search</a></li>
								<!--<li><a href="<?=base_url('mycon/search_result')?>">Matches You May Like</a></li>-->
								<li><a href="<?=base_url('mycon/matched_interest')?>">Matched Profiles</a></li>
								<li><a href="<?=base_url('mycon/send_interest')?>">Interest Sent Matches</a></li>
								<li><a href="<?=base_url('mycon/recently_joint_match')?>">Recently Joined Matches</a></li>
							
					
							</ul>
						</li>
						<!-- <li><a href="#">Profile Request</a></li>  -->
						 <li class="dropdown">
							<span id="noticeCount" class="dropdown-toggle" data-toggle="dropdown" onclick="clearNoti()"><i class="fa fa-bell-o menuIcons" aria-hidden="true"></i><?php if ($noticeCount > 0) { ?> 
								<sup style="background: #f00; border-radius: 50%; width: 15px; height: 15px; color: #ffffff; font-size: 10px; padding-right: 5px; line-height: 15px; font-weight: bold; position: absolute; right: 9px;"><?=$noticeCount?></sup>
								<?php } ?> 
							</span>
							<ul class="dropdown-menu" id="notificationIconUL" >
								<?php foreach ($notice as $key => $noticeValue) { ?>
									<li><?=$noticeValue->notice;?><a href="<?=base_url('register_controller/delete_notification/').$noticeValue->notification_id;?>" class="notificationCloseBtn">X</a></li>
								<?php } ?>
								<!-- <li><a href="#">Daily Recommendations</a></li>
								<li><a href="#">Declined/Cancelled</a></li> -->
							</ul>
						</li> 
						<li><span class="nIconSup"><a href="<?=base_url('mycon/chat')?>"><i class="fa fa-envelope-o notificationIcon" aria-hidden="true"></i><?php if ($msgCount > 0) { ?> 
						<sup><?=$msgCount?></sup>
						<?php } ?></a></span></li> 
						<!-- <li class="dropdown">
							<span class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope-o menuIcons" aria-hidden="true"></i></span>
							<ul class="dropdown-menu">
								<li><a href="#">Requests</a></li>
								<li><a href="#">Acceptances</a></li>
								<li><a href="<?=base_url('mycon/chat')?>">Messages</a></li>
								<li><a href="#">Decline/Blocked Members</a></li>
								<li><a href="#">Viewed Contacts</a></li>
							</ul>
						</li>  -->
						<li class="dropdown">
							<span class="dropdown-toggle" data-toggle="dropdown">
								
								<?php
								$img=$this->db->get_where("users",array("user_id"=>$_SESSION['id']))->row();
								if($img->image1){ ?>
	                                <img src="<?=base_url().$img->image1;?>" alt="Profile Pic">
	                            <?php }else { ?>
	                                <img src="<?=base_url()?>assets/images/pp.png" alt="Profile Pic">                                
	                            <?php } ?>	
							</span>
							<ul class="dropdown-menu">
								<li><a href="<?=base_url('mycon/view_profile')?>">My Profile</a></li>
								<li><a href="<?=base_url('mycon/desired_partner')?>">Partner Profile</a></li>
								<li><a href="#"  data-toggle="modal" data-target="#hideProfile">Hide profile</a></li>
								<li><a href="#"  data-toggle="modal" data-target="#deleteProfile">Delete profile</a></li>
								<li><a href="<?=base_url('mycon/change_password')?>">Change Password</a></li>
								<li><a href="<?=base_url('login_controller/logout')?>" style="text-align: center;">Sign out</a></li>
							</ul>
						</li> 
					</ul>

					<!-- Mobile Navigation --> 
					<div id="menuHelloHumsafar">
                                    <div class="logoMSec">
                                    	<a href="<?=base_url('mycon/view_profile')?>">
	                                       <?php if(isset($_SESSION['pp']) && !empty($_SESSION['pp']) ){ ?>
		                                		<img src="<?=base_url().$_SESSION['pp']?>" alt="Profile Pic">
	                            			<?php }else { ?>
		                                		<img src="<?=base_url()?>assets/images/pp.png" alt="Profile Pic">                                
		                            		<?php } ?>	
		                            		<div>
		                            		    <h2><?=$img->name;?></h2>
		                            		    	<p>  <?php 	if ($img->gender == 'male') { echo 'M';} else if($img->gender == 'female'){ echo 'F'; } ?>H<?=$img->user_id?> </p>
		                            		</div>
		                            	
		                            		</a>
                                    </div>
                                    <nav>
                                        <ul>
                                            <li>
                                                <a href="<?=base_url('mycon/desire_patner_match')?>">
                                                	<!--<i class="fa fa-home"></i> -->
                                                Home</a>
                                            </li>
                                            <li><a href="<?=base_url('mycon/view_profile')?>">My Profile</a></li>
											<li>
												<a href="<?=base_url('mycon/desired_partner')?>">Partner Profile</a> 
											</li>
											<li><a href="#"  data-toggle="modal" data-target="#hideProfile">Hide profile</a></li>
											<li><a href="#"  data-toggle="modal" data-target="#deleteProfile">Delete profile</a></li>
											<li><a href="<?=base_url('mycon/change_password')?>">Change Password</a></li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
                                                	<!--<i class="fa fa-diamond" aria-hidden="true"></i> -->
                                                	Matches <span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?=base_url('mycon/search')?>">Search</a></li>
													<li><a href="<?=base_url('mycon/desire_patner_match')?>">Desired Partner Matches</a></li>
													<li><a href="<?=base_url('mycon/recently_joint_match')?>">Recently Joined Matches</a></li>
													<li><a href="<?=base_url('mycon/send_interest')?>">Recently Sent Interest</a></li>
                                                </ul>
                                            </li>  
                                            
											<li>
												<a href="<?=base_url('login_controller/logout')?>" style="text-align: center;">Sign out</a> 
											</li>
                                                            </ul>
                        </nav>
                    </div>
                    <div class="opacMenu" style="display: none;"></div>
					<!-- ./Mobile Navigation -->
				</div>
			</div>
			
		</div>
	</div>
	<form class="modal" id="demo-modal-3">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"  >Registration</h4>
            </div>
            <div class="modal-body1">
            	<h2>registration</h2>
                <div class="form-group"> 
				    <input type="email" class="form-control" name="" id="email" placeholder="Email Id" required>
				 </div>
                <div class="form-group"> 
				    <input type="number" class="form-control" name="" id="mobile" placeholder="Mobile Number" required>
				 </div>
                <div class="form-group"> 
				    <input type="password" class="form-control" name="" placeholder="Password" required>
				 </div>
                <div class="form-group"> 
				   <select name="" class="form-control" required="">  
				   	<option value="" selected="" disabled="">Create Profile For</option>
					<option value="Self">Self</option>
					<option value="Son">Son</option>
					<option value="Daugter">Daughter</option>
					<option value="Brother">Brother</option>
					<option value="Sister">Sister</option>
					<option value="Friend">Friend</option>
				   </select>
				 </div>
				 
				 	<div class="form-group"> 
				    <input type="number" class="form-control" name="" placeholder="Enter OTP">
				 </div>
				 
				 <div class="form-group"> 
				    <input type="text" class="form-control" name="" placeholder="Full Name">
				 </div>
                <div class="form-group"> 
				    <input type="date" class="form-control" name="" placeholder="Date of Birth">
				 </div>
                <div class="form-group"> 
				    <input type="text" class="form-control" name="" placeholder="Religion">
				 </div>
                <div class="form-group"> 
				    <input type="text" class="form-control" name="" placeholder="Caste">
				 </div>
				 <div class="form-group"> 
				   <select name="" class="form-control">  
				   	<option value="" selected="" disabled="">Language</option>
					<option value="Hindi">Hindi</option>
					<option value="Punjabi">Punjabi</option>
					<option value="Bhojpuri">Bhojpuri</option>
					<option value="Bangali">Bangali</option>
					<option value="Haryanvi">Haryanvi</option>
					<option value="Marathi">Marathi</option>
					<option value="Tamil">Tamil</option>
					<option value="Telgu">Telgu</option>
					<option value="Kannada">Kannada</option>
					<option value="Other">Other</option>
				   </select>
				 </div>
				 <div class="form-group"> 
				   <select name="" class="form-control" required>  
				   	<option value="" selected="" disabled="">Where Does he live ?</option> 
					<option value="India">India</option>
					<option value="Pakistan">Pakistan</option>
					<option value="Nepal">Nepal</option>
					<option value="Bhutan">Bhutan</option>
					<option value="China">China</option>
					<option value="Russia">Russia</option>
				   </select>
				 </div>
				 
            </div>
    
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
	function sendotp(){
        var mobile = $('#mobile').val();  
       	if(mobile != '')  
       	{  
            $.ajax({  
                 url:"<?=base_url('register_controller/send_otp');?>",  
                 method:"POST",  
                 data:{mobile:mobile},  
                 success:function(data){  
                      sendEvent('#demo-modal-3', 2); 
                 }  
            });  
       	}
	}
	function clearNoti(){ 
       	if(mobile != '')  
       	{  
            $.ajax({  
                 url:"<?=base_url('register_controller/clearNoti');?>",  
                 method:"POST", 
                 success:function(data){  
                     // $("#noticeCount").load("#noticeCount");
                 }  
            });  
       	}
	}
</script> 

<?php if ($this->router->fetch_method() == 'index') {
	echo '<script type="text/javascript">	
	document.getElementById("navBackground").classList.add("indexNav");
	document.getElementById("bodyBackground").classList.add("bodyBackground");
</script>';
} ?> 