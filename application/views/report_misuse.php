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
					<h2>Report Misuse</h2>
				</div>
				<div class="col-md-12">
					<div class="col-md-offset-2 col-md-8">
						<form action="<?=base_url('Customer_issue/report_misuse')?>" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<input type="text" name="user_id" placeholder="Misuse Id eg: MH1001/FH1001" class="form-control" required>
							</div>
							<div class="form-group">
								<input type="text" name="subject" placeholder="Subject" class="form-control" required>
							</div>
							<div class="form-group">
								<input type="file" name="img" class="form-control" required>
							</div>
							<div class="form-group">
								<textarea name="message" placeholder="Enter your message here... (Max 200 characters)" rows="7" maxlength="200" required="" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<input type="submit" class="form-control" value="Submit">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include "footer.php" ?>