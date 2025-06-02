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
					<h2>Approve User Id</h2>
				</div>
				
				<div class="row">
				    <div class="col-md-12">
				        <div class="bordered w-100 p-5">
				            <h1 class="text-center">Thank you for choosing Hello Humsafar.</h1>
				            <h2 class="text-center">
				            Our Team will review and approve your ID within 48 hours.
				            </h2>
				        </div>
				    </div>
				     
				</div>

			</div>
		</div>
	</div>
</section>
<?php include "footer.php" ?>