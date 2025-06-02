<?php
$CI =& get_instance();
$CI->load->model('Register_model');
$term_of_use = $CI->Register_model->getTermOfUse();
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
					<h2>Term Of Use</h2>
				</div>
				<div class="col-md-12">
					<?php if (!empty($term_of_use)) {
						foreach ($term_of_use as $key => $term_of_use_value) {
							echo $term_of_use_value->term_of_use_desc;
						}
					} ?>
					<!-- <h4>ELIGIBILITY</h4>
					<p>Users must be at least 18 years of age if female and at least 21 years of age if male to create an account on Hello Humsafar and for using the service. Any one if eligible can create an account and use the services.</p>
					<h4>ACCOUNT TERMINATION</h4> 
					<p>Hello Humsafar is continually endeavouring to enhance the services and present to you extra usefulness that you will discover connecting with your match. This implies we may include new item highlights or improvements every once in a while and expel a few highlights, and if these activities don’t tangibly influence your rights or commitments, we may even suspend the service altogether if we found uncontrollable issues at hand, for example wellbeing or security concerns keep us from doing as such.</p> 
					<p>Users may end up his records whenever for any reason, by adhering to the directions in ‘settings’ in the service. Hello Humsafar may end the user record whenever without notice on the off chance that the user has damaged the criteria and policy. Hello Humsafar cannot be held liable for actions by its members which are illegal, or which incur criminal penalties, including but not limited to the following</p> 
					<ol>
						<li>All types of scams.</li>
						<li>Prostitution.</li>
						<li>Business by any third party.</li>
						<li>Identity theft.</li>
						<li>Gambling.</li>
						<li>Pornographic materials.</li>
						<li>Objectionable messages sent to matches or other users.</li>
					</ol> 
					<p>Hello Humsafar cannot be held responsible for any failure, interruption or poor performance of the user’s internet provider services or any case/situation beyond Hello Humsafar control. In the event of any misuse or abuse of Hello Humsafar application Hello Humsafar reserves all the rights to block or cancel the users account immediately without user’s permission. Hello Humsafar is the sole authority for interpretation of these terms. Hello Humsafar shall not be liable for any loss or damage by uneventful happenings. Hello Humsafar shall not be liable for any indirect, incidental or consequential damages arising at or in connection with the application. Hello Humsafar will provide its best possible efforts to secure user’s data but ultimate risk is with the person who ever uses the application services.</p>
					<p>Though Hello Humsafar strives to encourage a respectful user experience through features like the double opt-in that allows users to communicate via messaging if they have both indicated interest in one another, Hello Humsafar is not responsible for the conduct of any user on or off the service. Immediately after registration you are agreed to use caution in all interaction with other users, particularly if you decide to communicate off the service or meet the person. Be safe.</p>
					<h4>Thanks & Regards</h4>
					<p>The HelloHumsafar Team</p> -->
				</div>
			</div>
		</div>
	</div>
</section>
<?php include "footer.php" ?>