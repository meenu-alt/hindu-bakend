<?php
if (isset($_SESSION['id'])) {
	include "header.php";
} else {
	include "indexheader.php";
}
?>
<section class="changePwdSection">
	<div class="container">
		<div class="changePwd">
			<div class="col-md-12">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box fadeInUp animated-fast">
					<h2>Contact Us</h2>
				</div>
				
				<div class="row">
				    <div class="col-md-12">
				        <div class="bordered w-100 p-5 shadow">
				           <h2 class="text-center">For any inquiries, assistance, or feedback related to your experience on <a href="http://localhost/perfomdigi/hindu-humsfar-react/backend/">Hellohumsafar.com</a>,<br/> feel free to reach out to us at <a href="mailto:hellohumsafar@gmail.com" >hellohumsafar@gmail.com</a>.<br/><br> Whether you're seeking support with your profile, need help navigating the platform, or have questions regarding our services, our dedicated team is here to help. We aim to provide you with the best matrimonial experience and will respond promptly to ensure all your needs are met. Your journey towards finding the perfect match is important to us, and we’re always available to assist you in any way we can.</h2>
				        </div>
				    </div>
				
				</div>

			</div>
		</div>
	</div>
</section>
<?php include "footer.php" ?>