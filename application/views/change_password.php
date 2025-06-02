<?php include "header.php" ?>
<section class="changePwdSection">
	<div class="container">
		<div class="changePwd">
			<div class="col-md-12">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box fadeInUp animated-fast">
					<h2>Change Password</h2>
				</div>
				<div class="col-md-12">
					<div class="col-md-offset-2 col-md-8">
						<form action="<?=base_url('register_controller/change_pwd')?>" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<input type="password" name="oldpwd" placeholder="Old Password" class="form-control">
							</div>
							<div class="form-group">
								<input type="password" name="newpwd" placeholder="New Password" id="password" class="form-control">
							</div>
							<div class="form-group">
								<input type="password" name="matchNewPwd" id="passwordCon" placeholder="Re-Enter New Password" class="form-control">
							</div>
							<div class="form-group">
								<input type="submit" class="form-control" value="Save New Password">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	var password = document.getElementById("password"), confirm_password = document.getElementById("passwordCon");
	function validatePassword(){
		if(password.value != confirm_password.value) {
			confirm_password.setCustomValidity("Passwords Don't Match");
		} else {
			confirm_password.setCustomValidity('');
		}
	}
	password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;
</script>
<?php include "footer.php" ?>