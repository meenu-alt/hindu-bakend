<?php
$CI =& get_instance();
$CI->load->model('Register_model');
$how_to_use = $CI->Register_model->getHowToUse();
if (isset($_SESSION['id'])) {
	include "header.php";
} else {
	include "indexheader.php";
}
?>
<section class="contentPageDesign">
	<div class="container">
		<div class="contentPDDetails">
			<div class="col-md-12">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box fadeInUp animated-fast">
					<h2>How to Use</h2>
				</div>
				<div class="col-md-12">
					<?php if (!empty($how_to_use)) {
						foreach ($how_to_use as $key => $how_to_use_value) {
							echo $how_to_use_value->how_to_use_desc;
						}
					} ?> 
					<!-- <h4>Registration</h4>
					<p>Sign up with your email id and phone number after u will get the OTP fill up the basic registration form so that you can login any time you want. Your email ID and PW will be required for login. After the completion of basic registration, you will be allotted with a Hello Humsafar user ID i.e. HH-1234 which will be used in place of your name to maintain your privacy.</p>
					<h4>Profile Details</h4>
					<p>After successful completion of the registration and sign up, Profile Page will get open where you can add your photos (Max 06) and fill up you’re all the other necessary information regarding your sub caste, education, family details, career, work etc. you are requested to kindly fill your all the details so that your match can go through with your all details.</p>
					<h4>Partner Profile</h4>
					<p>As per your choice you can set the basic searching criteria for your desired match i.e. age, height, marital status, country, state etc and all other information which you required. You can edit your desired partners profile anytime required.</p>
					<h4>Desired Partner Matches</h4>
					<p>On this page you will get all your desired matches at one place. There will be 20 profiles on each page.</p>
					<h4>Recently Joined Matches</h4>
					<p>On this page you will get all the recently joined matches at one place. There will be 20 profiles on each page.</p>
					<h4>Messaging</h4>
					<p>If you want to send interest to any profile just open the match profile and click on the send interest button. Your interest will be sent to the desired match and if your desired match accepts your proposal then both of you can start messaging each other on the messaging page.</p>
					<h4>Notifications</h4>
					<p>Members will get notification on the bell icon page by website or if a member gets any interest from his or her matches.</p>
					<h4>Contact Us</h4>
					<p>Members can contact us via contact us form provided at the footer bar. Members can provide with their basic details in the form and click on the submit button. Your query may be answered typically within weeks.</p>
					<h4>Report Misuse</h4>
					<p>If any member faces any problem by any other member, he or she can report the misuse on the form provided at the footer bar. Just fill your basic details and if necessary, send the screenshot of the problem. If it is found that there is some problem, then the opponent member ID will be blocked by Hello Humsafar without any notification.</p>
					<h4>Hide / Delete Profile</h4>
					<p>Additionally, whenever you feel that your purpose of creating registration with Hello Humsafar is completed or you want to take a break or busy in some other work you can anytime hide your profile, delete your profile and if you want to change password then you can do so.</p>
					<p>We wish you for your Happy Marriage Life and bright future :-)</p>
					<h4>Thanks & Regards</h4>
					<p>The HelloHumsafar Team</p> -->
				</div>
			</div>
		</div>
	</div>
</section>
<?php include "footer.php" ?>