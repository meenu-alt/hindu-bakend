<?php include "header.php" ?>
<section class="profile">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box fadeInUp animated-fast">
				<?php if ($this->router->fetch_method() == 'search_result'){ ?>
					<h2>Matches You May Like</h2>
				<?php } elseif ($this->router->fetch_method() == 'desire_patner_match') { ?>
					 <h2>Desired Partner Matches</h2>
				<?php } elseif ($this->router->fetch_method() == 'recently_joint_match') { ?>
					 <h2>Recently Joined Matches</h2>  
				<?php } ?>
			</div>
		</div>
		<div class="row">
			<?php if (!empty($detail)) { ?>
			<?php foreach ($detail as $key => $detailValue) { ?>
				<div class="col-md-3 col-sm-3 col-xs-6">
					<div class="serachBox">
						<?php if (isset($_SESSION['id'])) { ?>
							<a href="<?=base_url('mycon/view_profile/?id=').$detailValue->user_id?>">
						<?php } else { ?>
							<a href="#" data-toggle="modal" data-target="#login-modal">
						<?php } ?>
							<div class="profileImgSearch">
							    <?php if($detailValue->image1 != ''){ ?>
								    <img src="<?=base_url().$detailValue->image1?>" alt="Profile Name">
								<?php } else { ?>
								    <img src="<?=base_url()?>assets/images/pp.png" alt="profile person">
								<?php } ?>
							</div>
							<div class="listSectionColor">
								<h3>	<?php if($detailValue->gender == 'male') { echo 'M'; } 
								if($detailValue->gender == 'female'){ echo 'F'; }?>H<?=$detailValue->user_id?> | <?php echo date_diff(date_create($detailValue->dob), date_create('today'))->y; ?> Yrs <?php if ($detailValue->height != '') { ?>|
									<?php 
										$inch = '"';
										$feet = "'";
										$height = explode('.', $detailValue->height);
										echo $height[0].$feet.$height[1].$inch;
									?> |
								<?php }
								if ($detailValue->gender == 'male') {
									echo ' M';
								}elseif($detailValue->gender == 'female'){
									echo ' F';
								}

							?> </h3>
								<ul>
									<li><?=$detailValue->caste?></li>
									<li><?=$detailValue->curr_location?></li>
								</ul>
							</div>
						</a>
					</div>
				</div>
			<?php } ?>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<li class="list-group-item">
						<nav class="text-center">
							<?php echo $links; ?>
						</nav>
					</li>
				</div>
			</div>
		<?php } else { ?>
			<h3 style="padding-bottom: 200px;"> Sorry No Profile Matches.</h3>
		<?php } ?>
	</div>
</section>
<?php include "footer.php" ?>