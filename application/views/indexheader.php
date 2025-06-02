<?php
	$CI =& get_instance();
	$CI->load->model('Register_model');
	$country = $CI->Register_model->getCountry();
	$religion = $CI->Register_model->getReligion();
	$language = $CI->Register_model->getLanguage();
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
		<!-- Facebook Pixel Code -->
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
		<!-- End Facebook Pixel Code -->
		<!--facebook verification -->
		<meta name="facebook-domain-verification" content="ii8aryrkn1cux7ylfwt6iemsnnkub1" />
			<!--facebook verification -->
		
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Hello Humsafar | Find Your Perfect Partner | Free Matrimonial Service | Matrimonial India</title>
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
		<meta name="description" content="100% Free Matrimonial, 100% Free Registation, 100% Free to Use. 100% Mobile Verified Profile, Find your Perfect Match with HelloHumsafar, User Friendly and Easy to use Matrimonial Services Meet Your Dream Life Partner, Find Brides And Grooms Profiles From The Most Searchable Matrimony Site In India. Secure Match Making Site For Indian Brides And Grooms Worldwide." />
		<meta name="keywords" content="HelloHumsafar, hello, humsafar, hello humsafar, shadi, shaadi, online shadi, online shaadi, jeevansathi, jevansathi, jivansathi, matrimony, matrimonial, marriage, online marriage, best matrimony, best matrimonial, online bride, online bridegroom, best matrimony service in india, best matrimonial in india, free matrimonial service in
		india, best online matrimonial in india, free matrimony india, free matrimonial india,
		free online marriage services in india, best match making online service in india,
		online vivah, online relationship, delhi matrimony, delhi matrimonial, delhi online
		marriages, rajput matrimony services, rajput matrimonial services, brahmin
		matrimony services, brahmin matrimonial services, punjabi matrimony services,
		punjabi matrimonial services, punjabi online marriage, marwari matrimony services,
		marwari matrimonial services, marwari online marriages, uttarakhand matrimony
		services, uttarakhand matrimonial services, uttarakhand online matrimonial services,
		garhwali matrimony services, garhwali matrimonial services, pahadi matrimony
		services, pahadi matrimonial services, bania matrimony services, bania matrimonial
		services, jat matrimony services, jat matrimonial services, maratha matrimony
		services, maratha matrimonial services, hindu matrimony service, hindu matrimonial
		services, hindu online marriages, muslim online marriages, muslim matrimony
		services, muslim matrimonial services, sikh matrimony services, sikh matrimonial
		services , sikh online marriages, christian matrimony services, christian matrimonial
		services, kanada matrimony services, kanada matrimonial services, kanada online
		marriages, telugu matrimony services, telugu matrimonial services, telugu online
		marriages, tamil matrimony services, tamil matrimonial services, tamil online
		marriages, malyalam matrimony services, malayalam matrimonial services, kerala
		matrimony services, kerala, matrimonial services, kerala online marriages, andhra
		matrimony services, andhra matrimonial services, jain matrimony services, jain
		matrimonial services, jain online matrimony services, jain online marriage, bhojpuri
		matrimony services, bhojpuri matrimonial services, bhojpuri online marriages,
		assamese matrimony services, assamese matrimonial services, assamese online
		marriages, gurjar matrimony services, gurjar matrimonial services, bengali
		matrimony services, bengali matrimonial services, bengoli online marriages, nepali
		matrimony services, nepali matrimonial service, nepali online marriages, oriya
		matrimony services, oriya matrimonial services, oriya online marriages " />
		<meta name="author" content="Hello Humsafar" />
		<!-- Facebook and Twitter integration -->
		<meta property="og:title" content="Hello Humsafar &mdash; Meet Your Perfect Match"/>
		<meta property="og:image" content="http://localhost/perfomdigi/hindu-humsfar-react/backend//assets/favicon/apple-touch-icon.png"/>
		<meta property="og:url" content="http://localhost/perfomdigi/hindu-humsfar-react/backend//"/>
		<meta property="og:site_name" content="Hello Humsafar"/>
		<meta property="og:description" content="Meet Your Dream Life Partner, Find Brides And Grooms Profiles From The Most Searchable Matrimony Site In India. Register FREE-100% Secure Match Making Site For Indian Brides And Grooms Worldwide."/>
		<meta name="twitter:title" content="Hello Humsafar &mdash; Meet Your Perfect Match" />
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
		<!-- Magnific Popup -->
		<link rel="stylesheet" href="<?=base_url()?>assets/css/magnific-popup.css">
		<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-multiselect.css" />
		<!-- Owl Carousel  -->
		<link rel="stylesheet" href="<?=base_url()?>assets/css/owl.carousel.min.css">
		<link rel="stylesheet" href="<?=base_url()?>assets/css/owl.theme.default.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"  />
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
		<style>
			.m-progress-bar {
				min-height: 1em;
				background: #c12d2d;
				width: 5%;
			}
		</style>
		<!-- responsive css -->
		<link rel="stylesheet" href="<?=base_url()?>assets/css/indexresponsive.css">
	</head>
	<body id="bodyBackground">
		
		<!-- <div class="fh5co-loader"></div> -->
		
		<div id="page">
			<div class="fh5co-nav" id="navBackground">
				<div class="container">
					<div class="row">
						<div class="col-xs-4">
							<div id="fh5co-logo"><a href="<?=base_url('mycon/index')?>">Hello<strong> Humsafar</strong></a></div>
						</div>
						<div class="col-xs-8 text-right menu-1">
							<ul>
								<li><a href="#"  data-toggle="modal" data-target="#login-modal">LogIn</a></li>
								<li><a href="#" id="singup"  data-toggle="modal" data-target="#demo-modal-3">SignUp</a></li>
							</ul>
						</div>
					</div>
					
				</div>
			</div>
	<form class="modal" id="demo-modal-3" method="POST"   action="<?=base_url('register_controller/register')?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"  >Register for New Life</h4>
            </div>
            <div class="modal-body">
            	<h2>Registration Free</h2>
            	     <div class="form-group"> 
                  <div id="man_err" style="background:red;margin:10px" ></div>
                  </div>
            	  <div class="form-group"> 
				    <select id="looking_for" name="looking_for" class="form-control">  
				   	<option  selected="" disabled="">Looking For</option>
                	<option  value="Bride">Bride</option>
				   	<option  value="Groom">Groom</option>

				  
				 
				   </select>
				 </div>
				 
				
            	
            	  
            	
            	
            			 <div class="form-group"> 
				    <input type="text" class="form-control" name="name" placeholder="Full Name" required>
				 </div>
				 <div class="form-group"> 
				     <select id="gender" name="gender" class="form-control">  
				   	<option  selected="" disabled="">Gender</option>
                	<option  value="male">Male</option>
				   	<option  value="female">Female</option>

				  
				 
				   </select>
				 </div>
                <div class="form-group"> 
				    <input type="text" class="form-control" name="dob" max="<?=date('Y')-18;?>-<?=date('m-d');?>"   onclick="this.type='date'" placeholder="Date of Birth" required>
				 </div>
                <div class="form-group"> 
				     <select id="myReligion" name="religion" onchange="selectCaste()" class="form-control">  
				   	<option  selected="" disabled="">Select Religion</option>
				   	<?php  foreach($this->db->get("religion")->result() as $r) { ?>
					<option value="<?=$r->religion;?>"><?=$r->religion;?></option>
					
					<?php } ?>
				 
				   </select>
				 </div>
                <div class="form-group"> 
				     <select id="my_caste" name="caste" class="form-control">  
				   	<option  selected="" disabled="">Select Religion First</option>
				  
				 
				   </select>
				 </div>
				 
            	    <div class="form-group"> 
				   <select name="pro_for" id="pro_for" class="form-control" required="">  
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
				   <select name="language" class="form-control">  
				   
				   	<option value="" selected="" disabled="">Language</option>
				   	
				   	<?php 
				   	$this->db->order_by('language');
				   	$array=$this->db->get('language')->result_array();
				   	
				   	foreach($array  as $i){  ?>
				   	<option value="<?=$i['language'];?>"><?=$i['language'];?></option>
				   	 <?php }   ?>
					
					
				
				
				   </select>
				 </div>
			
				 
                <div class="form-group" > 
                  <div id="email_err" style="background:red;margin:10px" ></div>
				    <input type="email" class="form-control" name="email" onblur="validateEmail(this)"  id="email" placeholder="Email Id" required>
				    
				 </div>
				 
				 
				 
                       <div class="form-group" > 
                  <div id="mobile_err" style="background:red;margin:10px" ></div>
				    <input type="number" class="form-control" name="mobile" onblur="validateMobile()" maxlength="10" min="0" id="mobile" placeholder="Mobile Number" required>
				 </div>
				 	
				  <div class="form-group"  > 
				    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password" required>
				 </div>
				 
				 <button class="btn btn-warning mb-3" type="button" id="bsendotp"  onclick="sendotp()" >Send OTP</button>
				  <button class="btn btn-success btn-block" type="button" id="endotp" style="display:none">OTP Sent On Mobile</button>
				 
				 	<div class="form-group" id="boxotp" style="display:none"> 
				 	 <div id="otp_err" style="background:red;margin:10px" ></div>
				 	 	 <button class="btn btn-success btn-block" type="button" id="votp" style="display:none">OTP Verifed</button>
				    <input type="number" class="form-control" name="otp" id="otp" max="9999" min="0000" maxlength="4" placeholder="Enter OTP" required>
				    <button class="btn btn-info mt-3" type="button" id="verify" onclick="verifyotp()">Verify OTP</button>
				 </div>
				 
				 
				<div class="form-group form-check">
    <label class="form-check-label" style="font-size:1em">
      <input class="form-check-input" type="checkbox" checked required>&nbsp; I agree to all <a target='_blank' style="color:blue;font-size:1em" href='<?=base_url();?>mycon/term_of_use' > Terms & Conditions </a> and <a style="color:blue;font-size:1em" target='_blank' href='<?=base_url();?>mycon/privacy_policy' >Privacy Policy</a>
    </label>
  </div>
				 
				  
			 <button class="btn btn-default" type="submit" id="Submit" disabled>Register</button>
		
				   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
    
            <div class="modal-footer">
              
            </div>
        </div>
    </div>
</form>
			<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->
			<script>
				function validateEmail(emailField) {
				    var email = emailField.value;
			
				    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
				    if (reg.test(emailField.value) == false) {
				        $('#email_err').html('<p style="color: red">Invalid Email Id</p>');
				        return false;
				    } else {
				        $.ajax({
				            url: "<?=base_url('register_controller/checkEmailValidation');?>",
				            method: "POST",
				            data: {
				                email: email
				            },
				            success: function(data) {
				                if (data == 'success') {
				                    $('#email_err').html('<p style="color: red">Success</p>');	     
				                    $('#email_err').hide();
				                    return true;
				                } else {
				                    $('#email_err').html('<p style="color: red">Email alredy register</p>');
				                      $('#email_err').show();
				                }
				            }
				        });
				    }
				}
			function validateMobile(){
				var mobile = $('#mobile').val();
			        if (mobile.length !=10 ) {
			        	$('#mobile_err').html('<p style="color: red">10 Digit Mobile Number only</p>');
			            return false;
			        }else {
			        	$.ajax({
			                url:"<?=base_url('register_controller/checkMobileValidation');?>",
			                method:"POST",
			                data:{mobile:mobile},
			                success:function(data){
			                	if(data == 'success'){
			                		$('#mobile_err').html('<p style="color: red">Success</p>');
						        $('#mobile_err').hide();
						        return true;
			                	} else {
			                		$('#mobile_err').html('<p style="color: red">Mobile alredy register</p>');
			                		  $('#mobile_err').show();
			                	}
			                }
			            });
			    	}
			}
			function sendotp() {
			   
			    var mobile = $('#mobile').val();
			    var email = $('#email').val();
			    var pwd = $('#pwd').val();
			    var pro_for = $('#pro_for').val();
			    var looking_for = $('#looking_for').val();
			    var email_err = $('#email_err').text();
			    var mobile_err = $('#mobile_err').text();
			    if (mobile_err == "Mobile alredy register" || mobile_err == "10 Digit Mobile Number only" || email_err == "Invalid Email Id" || email_err == "Email alredy register") {
			        $('#man_err').html('<p style="color: red">Fill all Details correctly.</p>');
			    } else {
			        if (mobile && email && pwd && pro_for && looking_for) {
			            $.ajax({
			             url:"<?=base_url('register_controller/send_otp');?>",
			                 method:"POST",
			                 data:{mobile:mobile,email:email},
			                 success:function(data){
			                      $("#endotp").show();
			                      $("#boxotp").show();
			                      $("#bsendotp").text('Resend OTP');			                      
			                      $("#bsendotp").attr('disabled',true);	
			                      setTimeout(function(){
			                          $("#bsendotp").attr('disabled',false);	
			                          $("#bsendotp").text('Resend OTP');	
			                      },11000);
			                      let a=10;
			                      setInterval(function(){
			                          if(a>0){
			                          $("#bsendotp").text('Resend OTP '+a);
			                          a--;
			                          }
			                      },1000);
			                      
			                 }
			            });
			        } else {
			            $('#man_err').html('<p style="color: red">Fill all filed correctly.</p>');
			        }
			    }
			}
			
			
			function verifyotp() {
			    var otp = $('#otp').val();
			    var mobile = $('#mobile').val();
			    if (otp != '') {
			        $.ajax({
			            url: "<?=base_url('register_controller/verifyotp');?>",
			            method: "POST",
			            dataType: "json",
			            data: {
			                otp: otp,
			                mobile: mobile
			            },
			            success: function(e) {
			                if (e.errorCode == 200) {
			                    $('#Submit').attr('disabled',false);
			                     $('#otp').attr("readonly",true);
			                        $('#votp').show();
			                     $('#otp_err').hide();
			                      $('#verify').hide();
			                     
			                } else {
			                    $('#otp_err').show();
			                    $('#otp_err').html('<p style="color: red">Wrong OTP</p>');
			                }
			            }
			        });
			    }
			}
			function submitRegForm() {
			    // var fullName = $('#fullName').val();
			    //       var userGender = $('#userGender').val();
			    //       var userDob = $('#userDob').val();
			    //       var myReligion = $('#myReligion').val();
			    //       var my_caste = $('#my_caste').val();
			    //       var userLanguage = $('#userLanguage').text();
			    //       var userCountry = $('#userCountry').text();
			    var userTC = document.getElementById("userTC");
			    if ($("#userTC").prop('checked') == true) {
			        $("#demo-modal-3").submit();
			    } else {
			        $(document).ready(function() {
			            if (!$(this).hasClass('generate-toast')) {
			                var code = $.toast({
			                    heading: 'Error',
			                    text: 'Accept T&C',
			                    position: 'top-right',
			                    icon: 'error'
			                });
			            };
			        });
			    }
			}
			function selectCaste() {
			    var religion = $("#myReligion").val();
			    $('#my_caste')
			        .empty()
			        .append('<option selected="selected" disabled>Select Caste</option>');
			    $.ajax({
			        url: "<?=base_url()?>Register_controller/selectCaste",
			        dataType: 'json',
			        method: "POST",
			        data: {
			            religion: religion
			        },
			        success: function(data) {
			            for (i = 0; i < data.length; i++) {
			                $('#my_caste')
			                    .append($("<option></option>")
			                        .attr("value", data[i])
			                        .text(data[i]));
			            }
			        }
			    });
			}
			</script>
			<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog">
					<div class="loginmodal-container">
						<h1>Login to Your Account</h1><br>
						<form method="post" action="<?=base_url('Login_controller/login')?>">
							<input type="text" name="email" placeholder="Phone No  Ex-9999XXXXXX">
							<input type="password" name="password" placeholder="Password">
							<input type="submit" name="login" class="login loginmodal-submit" value="Login">
						</form>
						
						<div class="login-help">
							<a onclick="model_open_register_free()" href="#">Register Free</a>
							<!-- <a href="#" data-toggle="modal" data-target="#demo-modal-3" data-dismiss="modal">Register</a> -->
							<a href="#" onclick="model_open_forgot_pwd()" >Forgot Password</a>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="forgetPwd" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
				<div class="modal-dialog">
					<div class="loginmodal-container">
						<h1>Forget Your Password</h1><br>
						<form method="post" action="<?=base_url('Register_controller/forgot_pwd')?>">
							<input type="text" name="email" placeholder="Enter Your email Id">
							<input type="submit" name="login" class="login loginmodal-submit" value="Submit">
						</form>
						
						<div class="login-help">
							<a onclick="$('#login-modal').modal('hide');$('#demo-modal-3').modal('show');" href="#">Register Free</a>
							<!-- <a href="#" data-toggle="modal" data-target="#demo-modal-3" data-dismiss="modal">Register</a> -->
							<a href="#"  onclick="$('#forgetPwd').modal('hide');$('#login-modal').modal('show');">Login</a>
						</div>
					</div>
				</div>
			</div>
			<?php if ($this->router->fetch_method() == 'index') {
			echo '<script type="text/javascript">
			document.getElementById("navBackground").classList.add("indexNav");
			document.getElementById("bodyBackground").classList.add("bodyBackground");
			</script>';
			} ?>
			<script>
				function model_open_register_free() {
				    // $('#login-modal').modal('hide');
				    // $('#demo-modal-3').modal('show');
				    // $('#singup').click();
				    $("#login-modal").modal("hide");
				    $("#login-modal").on("hidden.bs.modal", function() {
				        $("#demo-modal-3").modal("show");
				    });
				}

				function model_open_forgot_pwd() {
				    // $('#login-modal').modal('hide');
				    // $('#demo-modal-3').modal('show');
				    // $('#singup').click();
				    // $('#login-modal').modal('hide');$('#forgetPwd').modal('show');
				    $("#login-modal").modal("hide");
				    $("#login-modal").on("hidden.bs.modal", function() {
				        $("#forgetPwd").modal("show");
				    });
				}
				
			</script>