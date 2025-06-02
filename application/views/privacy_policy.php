<?php
$CI =& get_instance();
$CI->load->model('Register_model');
$privacy_policy = $CI->Register_model->getPrivacyPolicy();
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
					<h2>Privacy Policy</h2>
				</div>
				<div class="col-md-12">
					<?php if (!empty($privacy_policy)) {
						foreach ($privacy_policy as $key => $privacy_policy_value) {
							echo $privacy_policy_value->privacy_policy_desc;
						}
					} ?>
					<!-- <p>We welcome that you put trust in us when you furnish us with your data, and we don’t trifle with this. We don’t compromise with your security. We structure most of our items and administration in view of your protection. We include specialists from different fields, including legitimate, security, building, item plan and others to settle on beyond any doubt that no choice is taken without regard for your protection.</p>
					<p>We endeavour to be straight forward in the way we process your information. Since we utilize a considerable lot of the equivalent online administrations you do, we realize that lacking data and excessively convoluted dialect are normal issues in security arrangements.</p>
					<p>We adopt the correct inverse strategy; we have composed our privacy policy and related reports in plain dialect. We really need you to pursue our arrangements and comprehend our protection rehearsals. Hello Humsafar, is very concerned with the protection of user’s personal data and the protection of user’s privacy. Hello Humsafar, work hard to keep user information secure.</p>
					<p>Hello Humsafar does not compromise with user’s privacy. Your privacy is the top priority. Hello Humsafar never shares or sells users data with anyone. All data is stored safely, and physical intruders cannot get access to user data. Be careful when accessing your account from a public or shared computer so that others can't view or record your password or personal information.</p>
					<p>There is a limit to an online matrimonial provider’s ability to check the backgrounds of users and verify the information they provide. They cannot do a check on every user for any criminal activities. And a person can become a problem without having a record. Therefore, don't get a false sense of security because you are on a website; do your own research to learn more about someone and make informed decisions before you decide to meet. Check to see if the person you're interested in is on other social networking sites.</p>
					<p>There is no reason for anyone to ask you for money or your financial information, whatever sad story they tell you. Always keep your bank and account information private. Stop all contact immediately and report the matter to the website. Trust your instincts and immediately stop communicating with anyone who makes you feel uncomfortable. Never feel embarrassed to report a problem to the website service provider. You are helping them and other users.</p>
					<p>Though Hello Humsafar strives to encourage a respectful user experience through features like the double opt-in that allows users to communicate via messaging if they have both indicated interest in one another, Hello Humsafar is not responsible for the conduct of any user on or off the service. You agree to use caution in all interaction with other users, particularly if you decide to communicate off the service or meet the person.</p>
					<h4>Thanks & Regards</h4>
					<p>The HelloHumsafar Team</p> -->
				</div>
			</div>
		</div>
	</div>
</section>
<?php include "footer.php" ?>