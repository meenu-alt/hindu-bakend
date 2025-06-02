<?php
	$CI =& get_instance();
	$CI->load->model('Register_model');
	$india_state = $CI->Register_model->getIndiaState();
	$income = $CI->Register_model->getIncome();
	$language = $CI->Register_model->getLanguage(); 
?>
<?php include "header.php" ?>
<style type="text/css">	
.hidden {
  overflow: hidden;
  display: none;
  visibility: hidden;
}
</style>
<section class="profile">
	<?php foreach ($details as $key => $detailsValue) { ?>
		<!-- Added By imran 25.5.20 -->
		<div class="container">
			<div class="row">
				<a href="#" id="backButtonProfile" onClick="backAway()"><i class="fa fa-arrow-left" aria-hidden="true"></i>Go Back</a>
			</div>
		</div>
		<!-- Added By imran 25.5.20 -->
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box fadeInUp animated-fast"> 
					<h2>Profile Details</h2>
				</div>
			</div>
			<div class="row">
			<div class="profileBanner">
				<div class="col-md-12">
					<div class="col-sm-3 col-xs-6">
						<?php if ($_SESSION['id'] == $detailsValue->user_id){ ?>
							<a href="<?=base_url('mycon/add_photos')?>" >
								<?php
									$countImg = 0;
									for($imge=1;$imge <= 6 ;$imge++) {
										$imgName = 'image'.$imge;
										if ($detailsValue->$imgName){
											$countImg++;
										}
									}
									if ($detailsValue->image1 != '') { 
								?>
									<img src="<?=base_url().$detailsValue->image1?>" alt="profile person">
									<div class="countPicsPr">
										<i class="fa fa-camera" aria-hidden="true"></i>
										<span><p><?=$countImg?></p></span>
									</div>
								<?php }else { ?>
									<img src="<?=base_url()?>assets/images/pp.png" alt="profile person">
									<div class="countPicsPr">
										<i class="fa fa-camera" aria-hidden="true"></i>
										<span><p>0</p></span>
									</div>
								<?php } ?>
							</a>
						<?php }else{ ?>
							
						<?php
							$countImg = 0;
							for($imge=1;$imge <= 6 ;$imge++) {
								$imgName = 'image'.$imge;
								if ($detailsValue->$imgName){
									$countImg++;
								}
							}
							if ($detailsValue->image1 != '') { 
						?>
							<a href="#gallery-1" class="btn-gallery" >
								<img src="<?=base_url().$detailsValue->image1?>" alt="profile person">
								<div class="countPicsPr">
										<i class="fa fa-camera" aria-hidden="true"></i>
										<span><p><?=$countImg?></p></span>
									</div>
							</a>
						<?php }else { ?>
							<a class="btn-gallery" >
								<img src="<?=base_url()?>assets/images/pp.png" alt="profile person">
									<div class="countPicsPr">
										<i class="fa fa-camera" aria-hidden="true"></i>
										<span><p>0</p></span>
									</div>
								</a>
						<?php } ?>

						<div id="gallery-1" class="hidden">
							<?php if ($detailsValue->image1 != '') { ?>
								<a href="<?=base_url().$detailsValue->image1?>">Image 1</a>
							<?php } ?>
							<?php if ($detailsValue->image2 != '') { ?>
								<a href="<?=base_url().$detailsValue->image2?>">Image 2</a>
							<?php } ?>
							<?php if ($detailsValue->image3 != '') { ?>
								<a href="<?=base_url().$detailsValue->image3?>">Image 3</a>
							<?php } ?>
							<?php if ($detailsValue->image4 != '') { ?>
								<a href="<?=base_url().$detailsValue->image4?>">Image 4</a>
							<?php } ?>
							<?php if ($detailsValue->image5 != '') { ?>
								<a href="<?=base_url().$detailsValue->image5?>">Image 5</a>
							<?php } ?>
							<?php if ($detailsValue->image6 != '') { ?>
								<a href="<?=base_url().$detailsValue->image6?>">Image 6</a>
							<?php } ?>
						</div>
						<?php }  ?>
						
					</div>
					<div class="col-sm-3 col-xs-6 prPhoto">
						<!-- <form action="#" method="post" class="prPhoto">
							<div class="form-group">
								<input type="file" name="" class="form-control">
								<input type="submit" name="" class="form-control" value="Submit">
							</div>
						</form> -->
								<h3 style="font-weight: 600"><?php 	if ($detailsValue->gender == 'male') { echo 'M';} else if($detailsValue->gender == 'female'){ echo 'F'; } ?>H<?=$detailsValue->user_id?></h3>
				
							<h4 style="font-weight: 600"><?=$detailsValue->name?></h4>
							<?php if ($_SESSION['id'] == $detailsValue->user_id) { ?> 
							<a href="<?=base_url('mycon/add_photos')?>">Add Photos</a>
						<?php } ?>

						<?php $count =0; if ($_SESSION['id'] != $detailsValue->user_id) { ?>
							<?php 
								foreach ($connection as $key => $connectionValue) { 
									if ($connectionValue->req_from == $detailsValue->user_id || $connectionValue->req_to == $detailsValue->user_id) {
									 	$count = 1;
									} 
								} 
							?>
							<?php if ($count == 1 ) { ?>
								<?php foreach ($connection as $key => $connectionValue) { ?>
									<?php if ($connectionValue->req_from == $detailsValue->user_id || $connectionValue->req_to == $detailsValue->user_id) {  ?>
										<?php if ($connectionValue->status == 1) { ?>
											<a href="<?=base_url('mycon/chat/?id=').$detailsValue->user_id?>"><button type="button" class="btn btn-primary">Message</button></a>
										<?php } else { ?>
											<?php if ($connectionValue->req_to == $detailsValue->user_id) { ?>
												<button type="button" class="btn btn-primary" style="background: #a9a7a8; border: 2px solid #a9a7a8;">Interest Sent</button>
											<?php } else { ?>
												<a href="<?=base_url('connection/accept_req/?id=').$connectionValue->connection_id.'&user_id='.$detailsValue->user_id?>"><button type="button" class="btn btn-primary">Accept</button></a>
											<?php } ?>
										<?php } ?>
									<?php } ?>
								<?php } ?>
							<?php } else { ?>								
								<button type="button" class="btn btn-primary" id="interest_send" data-id="<?=$detailsValue->user_id?>" onclick="con_req(this)">Send Interest</button>
								<button type="button" id="interest_sent" class="btn btn-primary" style="background: #a9a7a8; border: 2px solid #a9a7a8; display:none;">Interest Sent</button>
							<?php } ?>
						<?php } ?>
					</div>
					<div class="col-sm-6 col-xs-12 prDetails">
						<h4>Profile Performance</h4>						
						<div class="canvas-con">
						    <div class="canvas-con-inner">
						        <canvas id="mychart" height="170px"></canvas>
						    </div>
						    <div id="my-legend-con" class="legend-con"></div>
						</div>
						
					</div>
				</div>
			</div> 
				<div class="col-md-8">
				<?php if ($_SESSION['id'] == $detailsValue->user_id) { ?> 
					<div class="prDetailsBlocks">
						<h2><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Account Details</h2>
						<div class="leftDetails">
						    <?php //$url = base_url('Register_controller/verify_email?email=').$detailsValue->email; $email_verify = $detailsValue->verify_email == 0 ? '' : '' ?>
							<ul>
								<li>Email id</li>
								<li><?=$detailsValue->email.' '.$email_verify?> <br>  <?php  $url = base_url('Register_controller/verify_email?email=').$detailsValue->email; 
								
								echo $email_verify = $detailsValue->verify_email == 0 ? "<a href='$url'  style='color:red'>Verify Now</a>" : '<span class="btn btn-success" style="color:white">Verified</span>' ?> <a href="#" data-toggle="modal" data-target="#UpdateEmail"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a></li>
							</ul>
						</div>
						<div class="rightDetails">
							<ul>
								<li>Mobile No.</li>
								<li>+91-<?=$detailsValue->phone?></li>
							</ul>
						</div>
					</div>
				<?php } ?>  
				<div class="prDetailsBlocks">
					<h2><i class="fa fa-user" aria-hidden="true"></i>&nbsp;About Me <?php if ($_SESSION['id'] == $detailsValue->user_id) { ?> <span  class="aboutMe"><a onclick="editAboutMe('edit')"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Edit</a></span><span  class="editAboutMe"><a onclick="editAboutMe('Cancel')"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancel</a></span> <?php } ?> </h2>
					<?php if ($detailsValue->desc != '') { ?>
						<p class="aboutMe"><?=$detailsValue->desc?></p>
					<?php } else { ?>
						<p class="aboutMe"><?='Not filled in'?></p>
					<?php } ?>
						<?php if ($_SESSION['id'] == $detailsValue->user_id) { ?> 
						<ul class="fullDescProfile editAboutMe" style="display: none;">
							<li>Description</li>
							<li class="form-group">
								<form method="post" action="<?=base_url('Register_controller/updateProfileDes')?>">									
									<textarea class="form-control" name="desc" placeholder="Describe yourself" class="form-control"><?=$detailsValue->desc?></textarea>						
									<input type="submit" name=""  value="Update">
								</form>
							</li>
						</ul>
						<?php } ?>
				</div> 
				<div class="prDetailsBlocks">
					<h2><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Basic Details <?php if ($_SESSION['id'] == $detailsValue->user_id) { ?> <span  class="basicDetails"><a onclick="editBasicDetails('edit')"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Edit</a></span><span  class="editBasicDetails"><a onclick="editBasicDetails('Cancel')"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancel</a></span> <?php } ?></h2>
					<!-- <h4><span>Full Name</span> - <?=$detailsValue->name?></h4> -->
					<form method="post" action="<?=base_url('Register_controller/updateProfileBasicDetails')?>">

					<!-- New Format  -->
					<div class="leftDetails">
						<ul class="basicDetails">							
							<li>Religion</li>
							<li>
								<?php if ($detailsValue->religion != '') { ?>
									<?=$detailsValue->religion?>
								<?php } else { ?>
									<?='Not filled in'?>
								<?php } ?>
							</li>
						</ul>
					</div>					
					<div class="rightDetails">
						<ul class="basicDetails">
							<li>Caste</li>
							<li style="white-space: nowrap;">
								<?php if ($detailsValue->caste != '') { ?>
									<?=$detailsValue->caste?> - <?=$detailsValue->sub_caste?>
								<?php } else { ?>
									<?='Not filled in'?>
								<?php } ?>
							</li>
						</ul>
					</div>

					<div class="leftDetails">
						<ul class="basicDetails">
							<li>Current Location</li>
							<li>
								<?php if ($detailsValue->curr_location != '') { ?>
									<?=$detailsValue->curr_location?>
								<?php } else { ?>
									<?='Not filled in'?>
								<?php } ?>
							</li>
						</ul>
					</div>
					<div class="rightDetails">
						<ul class="basicDetails">						
							<li>Mother Tongue</li>
							<li>
								<?php if ($detailsValue->language != '') { ?>
									<?=$detailsValue->language?>
								<?php } else { ?>
									<?='Not filled in'?>
								<?php } ?>
							</li>
						</ul>
					</div>

					<div class="leftDetails">
						<ul class="basicDetails">	
							<li>Complexion</li>
							<li>
								<?php if ($detailsValue->complexion != '') { ?>
									<?=$detailsValue->complexion?>
								<?php } else { ?>
									<?='Not filled in'?>
								<?php } ?>
							</li>
						</ul>
					</div>
					<div class="rightDetails">
						<ul class="basicDetails">
							<li>Marital Status</li>
							<li>
								<?php if ($detailsValue->marital_status != '') { ?>
									<?=$detailsValue->marital_status?>
								<?php } else { ?>
									<?='Not filled in'?>
								<?php } ?>
							</li>							
						</ul>
					</div>

					<div class="leftDetails">
						<ul class="basicDetails">		
							<li>Age</li>
							<li>
								<?php if ($detailsValue->dob != '') { ?>
									<?php 
										echo date_diff(date_create($detailsValue->dob), date_create('today'))->y;
										// $getyear = explode("-", $detailsValue->dob);
										// echo $dob = date('Y') - $getyear[0];
									?>
								<?php } else { ?>
									<?='Not filled in'?>
								<?php } ?>								
							</li>
						</ul>
					</div>
					<div class="rightDetails">
						<ul class="basicDetails">	
							<li>Height (in feet)</li>
							<li>
								<?php if ($detailsValue->height != '') { ?>
									<?php 
										$inch = '"';
										$feet = "'";
										$height = explode('.', $detailsValue->height);
										echo $height[0].$feet.$height[1].$inch;
									?>
								<?php } else { ?>
									<?='Not filled in'?>
								<?php } ?>
							</li>
						</ul>
					</div>

					<div class="leftDetails">
						<ul class="basicDetails">
							<li>Weight (in Kg)</li>
							<li>
								<?php if ($detailsValue->weight != '') { ?>
									<?=$detailsValue->weight?>
								<?php } else { ?>
									<?='Not filled in'?>
								<?php } ?>
							</li>
						</ul>
					</div>
					<div class="rightDetails">
						<ul class="basicDetails">
							<li>Body Type</li>
							<li>
								<?php if ($detailsValue->bdy_type != '') { ?>
									<?=$detailsValue->bdy_type?>
								<?php } else { ?>
									<?='Not filled in'?>
								<?php } ?>
							</li>							
						</ul>
					</div>

					<div class="leftDetails">
						<ul class="basicDetails">
							<li>Physical Status</li>
							<li>
								<?php if ($detailsValue->ps != '') { ?>
									<?=$detailsValue->ps?>
								<?php } else { ?>
									<?='Not filled in'?>
								<?php } ?>
							</li>
						</ul>
					</div>
					<div class="rightDetails">
						<ul class="basicDetails">	
							<li>Eating Habits</li>
							<li>
								<?php if ($detailsValue->eating != '') { ?>
									<?=$detailsValue->eating?>
								<?php } else { ?>
									<?='Not filled in'?>
								<?php } ?>
							</li>
							<li>Smoking Habits</li>
							<li>
								<?php if ($detailsValue->smoking != '') { ?>
									<?=$detailsValue->smoking?>
								<?php } else { ?>
									<?='Not filled in'?>
								<?php } ?>
							</li>
						</ul>
					</div>

					<div class="leftDetails">
						<ul class="basicDetails">	
							<li>Drinking Habits</li>
							<li>
								<?php if ($detailsValue->drinking != '') { ?>
									<?=$detailsValue->drinking?>
								<?php } else { ?>
									<?='Not filled in'?>
								<?php } ?>
							</li>
						</ul>
					</div>

					
					<?php if ($_SESSION['id'] == $detailsValue->user_id) { ?> 
					<?php 
						foreach ($details as $key => $detailsValue) {
							$religion = $detailsValue->religion;
							$caste = $detailsValue->caste;
							$languageSelected = $detailsValue->language;
						}
							$sub_caste = $CI->Register_model->getSubCaste($religion, $caste); 
							
							if($_SESSION['is_admin_profile_edit']=="Admin"){
						?>

					<div class="leftDetails">
						<ul class="editBasicDetails" style="display: none">
							<li>Name :</li>
							<li class="form-group">
								<input type="text" class="form-control" value="<?=$detailsValue->name?>" name="name" placeholder="Name" >
							</li>
						</ul>
					</div>
					<div class="rightDetails">
						 	<ul class="editBasicDetail" style="opacity: 0">
							<li>Name :</li>
							<li class="form-group">
								<input type="text" class="form-control" value="<?=$detailsValue->name?>"  placeholder="Name" >
							</li>
						</ul>
						 
					</div>
					
					
					
					<div class="leftDetails">
						<ul class="editBasicDetails" style="display: none">
							<li>Caste :</li>
							<li class="form-group">
								<select name="caste" class="form-control" required>
									<option value="" disabled>Not Filled</option>
									<?php foreach ($this->db->get_where('caste',array("religion_id"=>1))->result() as $k => $v) { ?>
										<option value="<?=ucfirst(strtolower($v->caste));?>" <?php if ($detailsValue->caste == ucfirst(strtolower($v->caste))){echo 'selected';} ?>><?=ucfirst(strtolower($v->caste));?></option>
									<?php } ?>
								</select>
							</li>
						</ul>
					</div>
					<div class="rightDetails">
						<ul class="editBasicDetails" style="display: none">
							<li>DOB :</li>
							<li class="form-group">
							    	<input type="date" class="form-control" value="<?=$detailsValue->dob?>" name="dob"  >
								<!--<select name="dob" class="form-control" required>-->
								<!--	<option value="" disabled>Not Filled</option>-->
						 <?php for ($i=21;$i<76;$i++) { ?> 
								<!--		<option value="<?=$i;?>" <?php if ((date("Y")-intval(substr($detailsValue->dob,0,4))) == $i){echo 'selected';}else{} ?>><?=$i?></option>-->
							 	<?php } ?> 
								</select>
							</li>
						</ul>
					</div>
					<?php } ?>
					
					
					<div class="leftDetails">
						<ul class="editBasicDetails" style="display: none">
							<li>Religion :</li>
							<li class="form-group">
								<input type="text" class="form-control" value="<?=$detailsValue->religion?>" name="religion" placeholder="Religion" disabled>
							</li>
						</ul>
					</div>
					<div class="rightDetails">
						<ul class="editBasicDetails" style="display: none">
							<li>Sub Caste :</li>
							<li class="form-group">
								<select name="sub_caste" class="form-control" required>
									<option value="" disabled>Not Filled</option>
									<?php foreach ($sub_caste as $key => $subCasteValue) { ?>
										<option value="<?=$subCasteValue->sub_caste?>" <?php if ($subCasteValue->sub_caste == $detailsValue->sub_caste){echo 'selected';}else{} ?>><?=$subCasteValue->sub_caste?></option>
									<?php } ?>
								</select>
							</li>
						</ul>
					</div>

					<div class="leftDetails">
						<ul class="editBasicDetails" style="display: none">
							<li>Current Location :</li>
							<li class="form-group">
								<input type="text" class="form-control" value="<?=$detailsValue->curr_location?>" name="location" placeholder="Location" disabled>
							</li>
						</ul>
					</div>
					<div class="rightDetails">
						<ul class="editBasicDetails" style="display: none">
							<li>Mother Tongue :</li>
							<li class="form-group">
								<select name="language" class="form-control" required>
									<option value="" disabled>Not Filled</option>
									<?php foreach ($language as $languageValue) { ?>
										<option value="<?=$languageValue->language?>" <?php if($languageValue->language == $languageSelected){ echo 'selected'; }else{} ?>><?=$languageValue->language?></option>
									<?php } ?>
								</select>
							</li>
						</ul>
					</div>

					<div class="leftDetails">
						<ul class="editBasicDetails" style="display: none">
							<li>Complexion :</li>
							<li class="form-group">
								<select class="form-control" name="complexion" required>
									<optgroup label="Select"></optgroup> 
									<option value="Very Fair" <?php if ($detailsValue->complexion == 'Very Fair'){echo 'selected';}else{} ?>>Very Fair</option>
									<option value="Fair" <?php if ($detailsValue->complexion == 'Fair'){echo 'selected';}else{} ?>>Fair</option>
									<option value="Wheatish" <?php if ($detailsValue->complexion == 'Wheatish'){echo 'selected';}else{} ?>>Wheatish</option>
									<option value="Wheatish Brown" <?php if ($detailsValue->complexion == 'Wheatish Brown'){echo 'selected';}else{} ?>>Wheatish Brown</option>
									<option value="Dark" <?php if ($detailsValue->complexion == 'Dark'){echo 'selected';}else{} ?>>Dark</option>
								</select>
							</li>
						</ul>
					</div>
					<div class="rightDetails">
						<ul class="editBasicDetails" style="display: none">	
							<li>Marital Status :</li>
							<li class="form-group">
								<select name="marital_status" class="form-control" required>
									<option value="" disabled>Not Filled</option>
									<option value="Never Married" <?php if($detailsValue->marital_status == 'Never Married'){echo 'selected';}else{} ?>>Never Married</option>
									<option value="Married" <?php if($detailsValue->marital_status == 'Married'){echo 'selected';}else{} ?>>Married</option>
									<option value="Awaiting Divorce" <?php if($detailsValue->marital_status == 'Awaiting Divorce'){echo 'selected';}else{} ?>>Awaiting Divorce</option>
									<option value="Divorced" <?php if($detailsValue->marital_status == 'Divorced'){echo 'selected';}else{} ?>>Divorced</option>
									<option value="Widowed" <?php if($detailsValue->marital_status == 'Widowed'){echo 'selected';}else{} ?>>Widowed</option>
									<option value="Annulled" <?php if($detailsValue->marital_status == 'Annulled'){echo 'selected';}else{} ?>>Annulled</option>
								</select>
							</li>
						</ul>
					</div>

					<div class="leftDetails">
						<ul class="editBasicDetails" style="display: none">
							<li>Date of Birth</li>
							<li class="form-group">
								<input type="text" class="form-control datepicker" value="<?=date('d-M-Y', strtotime($detailsValue->dob));?>" name="dob" placeholder="Date of Birth" disabled>
							</li>
						</ul>
					</div>
					<div class="rightDetails">
						<ul class="editBasicDetails" style="display: none">
							<li>Height (in feet) :</li>
							<li class="form-group"> 
								<select class="form-control"  name="height" required>
									<option value="" disabled>Not Filled</option>
									<option value="4.0" <?php if($detailsValue->height == '4.0'){echo 'selected';}else{} ?>>4' 0" (1.22 mts)</option>
									<option value="4.1" <?php if($detailsValue->height == '4.1'){echo 'selected';}else{} ?>>4' 1" (1.24 mts)</option>
									<option value="4.2" <?php if($detailsValue->height == '4.2'){echo 'selected';}else{} ?>>4' 2" (1.28 mts)</option>
									<option value="4.3" <?php if($detailsValue->height == '4.3'){echo 'selected';}else{} ?>>4' 3" (1.31 mts)</option>
									<option value="4.4" <?php if($detailsValue->height == '4.4'){echo 'selected';}else{} ?>>4' 4" (1.34 mts)</option>
									<option value="4.5" <?php if($detailsValue->height == '4.5'){echo 'selected';}else{} ?>>4' 5" (1.35 mts)</option>
									<option value="4.6" <?php if($detailsValue->height == '4.6'){echo 'selected';}else{} ?>>4' 6" (1.37 mts)</option>
									<option value="4.7" <?php if($detailsValue->height == '4.7'){echo 'selected';}else{} ?>>4' 7" (1.40 mts)</option>
									<option value="4.8" <?php if($detailsValue->height == '4.8'){echo 'selected';}else{} ?>>4' 8" (1.42 mts)</option>
									<option value="4.9" <?php if($detailsValue->height == '4.9'){echo 'selected';}else{} ?>>4' 9" (1.45 mts)</option>
									<option value="4.10" <?php if($detailsValue->height == '4.10'){echo 'selected';}else{} ?>>4' 10" (1.47 mts)</option>
									<option value="4.11" <?php if($detailsValue->height == '4.11'){echo 'selected';}else{} ?>>4' 11" (1.50 mts)</option>
									<optgroup label=""></optgroup>
									<option value="5.0" <?php if($detailsValue->height == '5.0'){echo 'selected';}else{} ?>>5' 0" (1.52 mts)</option>
									<option value="5.1" <?php if($detailsValue->height == '5.1'){echo 'selected';}else{} ?>>5' 1" (1.55 mts)</option>
									<option value="5.2" <?php if($detailsValue->height == '5.2'){echo 'selected';}else{} ?>>5' 2" (1.58 mts)</option>
									<option value="5.3" <?php if($detailsValue->height == '5.3'){echo 'selected';}else{} ?>>5' 3" (1.60 mts)</option>
									<option value="5.4" <?php if($detailsValue->height == '5.4'){echo 'selected';}else{} ?>>5' 4" (1.63 mts)</option>
									<option value="5.5" <?php if($detailsValue->height == '5.5'){echo 'selected';}else{} ?>>5' 5" (1.65 mts)</option>
									<option value="5.6" <?php if($detailsValue->height == '5.6'){echo 'selected';}else{} ?>>5' 6" (1.68 mts)</option>
									<option value="5.7" <?php if($detailsValue->height == '5.7'){echo 'selected';}else{} ?>>5' 7" (1.70 mts)</option>
									<option value="5.8" <?php if($detailsValue->height == '5.8'){echo 'selected';}else{} ?>>5' 8" (1.73 mts)</option>
									<option value="5.9" <?php if($detailsValue->height == '5.9'){echo 'selected';}else{} ?>>5' 9" (1.75 mts)</option>
									<option value="5.10" <?php if($detailsValue->height == '5.10'){echo 'selected';}else{} ?>>5' 10" (1.78 mts)</option>
									<option value="5.11" <?php if($detailsValue->height == '5.11'){echo 'selected';}else{} ?>>5' 11" (1.80 mts)</option>
									<optgroup label="&nbsp;"></optgroup>
									<option value="6.0" <?php if($detailsValue->height == '6.0'){echo 'selected';}else{} ?>>6' 0" (1.83 mts)</option>
									<option value="6.1" <?php if($detailsValue->height == '6.1'){echo 'selected';}else{} ?>>6' 1" (1.85 mts)</option>
								</select>
							</li> 
						</ul>
					</div>

					<div class="leftDetails">
						<ul class="editBasicDetails" style="display: none"><li>Weight (in Kg) :</li>
							<li class="form-group">
								<input type="text" name="weight" class="form-control" placeholder="Weight" value="<?=$detailsValue->height;?>" onkeypress="return (event.charCode > 47 && event.charCode < 58)" required>
							</li>
						</ul>
					</div>
					<div class="rightDetails">
						<ul class="editBasicDetails" style="display: none"> 
							<li>Body Type :</li>
							<li class="form-group">
								<select class="form-control" name="bdy_type" required>
									<option value="Slim" <?php if($detailsValue->bdy_type == 'Slim'){echo 'selected';}else{} ?>>Slim</option>
									<option value="Average" <?php if($detailsValue->bdy_type == 'Average'){echo 'selected';}else{} ?>>Average</option>
									<option value="Athletic" <?php if($detailsValue->bdy_type == 'Athletic'){echo 'selected';}else{} ?>>Athletic</option>
									<option value="Heavy" <?php if($detailsValue->bdy_type == 'Heavy'){echo 'selected';}else{} ?>>Heavy</option>
								</select>
							</li>
						</ul>
					</div>

					<div class="leftDetails">
						<ul class="editBasicDetails" style="display: none">
							<li>Physical Status :</li>
							<li class="form-group">
								<select class="form-control" name="ps" required>
									<option value="Normal"  <?php if ($detailsValue->ps == 'Normal'){echo 'selected';}else{} ?>>Normal</option>
									<option value="Physical Challenged"  <?php if ($detailsValue->ps == 'Physical Challenged'){echo 'selected';}else{} ?>>Physical Challenged</option>
								</select> 
							</li>
						</ul>
					</div>
					<div class="rightDetails">
						<ul class="editBasicDetails" style="display: none">
							<li>Eating Habits :</li>
							<li class="form-group">
								<select class="form-control" name="eating" required>
									<option value="Vegetarian" <?php if ($detailsValue->eating == 'Vegetarian'){echo 'selected';}else{} ?>>Vegetarian</option>
									<option value="Non-Vegetarian" <?php if ($detailsValue->eating == 'Non-Vegetarian'){echo 'selected';}else{} ?>>Non-Vegetarian</option>
									<option value="Jain" <?php if ($detailsValue->eating == 'Jain'){echo 'selected';}else{} ?>>Jain</option>
									<option value="Eggetarian" <?php if ($detailsValue->eating == 'Eggetarian'){echo 'selected';}else{} ?>>Eggetarian</option>
								</select>
							</li>
						</ul>
					</div>

					<div class="leftDetails">
						<ul class="editBasicDetails" style="display: none">
							<li>Drinking Habits :</li>
							<li class="form-group">
								<select class="form-control" name="drinking" required>
									<option value="No"  <?php if ($detailsValue->drinking == 'No'){echo 'selected';}else{} ?>>No</option>
									<option value="Yes"  <?php if ($detailsValue->drinking == 'Yes'){echo 'selected';}else{} ?>>Yes</option>
									<option value="Occasionally"  <?php if ($detailsValue->drinking == 'Occasionally'){echo 'selected';}else{} ?>>Occasionally</option>
								</select>
							</li>
						</ul>
					</div>
					<div class="rightDetails">
						<ul class="editBasicDetails" style="display: none">
							<li>Smoking Habits :</li>
							<li class="form-group">
								<select class="form-control" name="smoking" required>
									<option value="No"  <?php if ($detailsValue->smoking == 'No'){echo 'selected';}else{} ?>>No</option>
									<option value="Yes"  <?php if ($detailsValue->smoking == 'Yes'){echo 'selected';}else{} ?>>Yes</option>
									<option value="Occasionally"  <?php if ($detailsValue->smoking == 'Occasionally'){echo 'selected';}else{} ?>>Occasionally</option>
								</select>
								<input type="submit" name=""  value="Update">
							</li>
						</ul>
					</div>

					<!-- <div class="leftDetails">
						<ul class="editBasicDetails" style="display: none">
						</ul>
					</div>
					<div class="rightDetails">
						<ul class="editBasicDetails" style="display: none">
						</ul>
					</div> -->

					<?php } ?>

					<!-- New Format END -->
				</form>
				</div>

				<?php /* 
							// Uncomment if contact is needed seperatly
				 if ($_SESSION['id'] == $detailsValue->user_id) { ?> 
					<div class="prDetailsBlocks">
					<form method="post" action="<?=base_url('Register_controller/updateProfileContact')?>">
						<h2><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Contact Details <?php if ($_SESSION['id'] == $detailsValue->user_id) { ?> <span  class="contactDetails"><a onclick="editContactDetails('edit')"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Edit</a></span><span class="editContactDetails"><a onclick="editContactDetails('Cancel')"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancel</a></span><?php } ?></h2>
						<?php if ($detailsValue->address != '') { ?>
							<p class="contactDetails"><?=$detailsValue->address?></p>
						<?php } else { ?>
							<p class="contactDetails"><?='Not filled in'?></p>							
						<?php } ?>
						<?php if ($_SESSION['id'] == $detailsValue->user_id) { ?> 
						<ul class="editContactDetails" style="display: none;">
							<li class="cntAds">Address</li>
							<li class="form-group cntAds">								
									<textarea class="form-control" name="address" placeholder="Write your address" class="form-control"><?=$detailsValue->address?></textarea>
							</li>
						</ul>
						<?php } ?>
						<div class="leftDetails">
							<ul class="contactDetails">
								<li>State</li>
								<li>
									<?php if ($detailsValue->state != '') { ?>
										<?=$detailsValue->state?>
									<?php } else { ?>
										<?='Not filled in'?>
									<?php } ?>
								</li>
								<li>Country</li>
								<li>
									<?php if ($detailsValue->country != '') { ?>
										<?=$detailsValue->country?>
									<?php } else { ?>
										<?='Not filled in'?>
									<?php } ?>
								</li>
							</ul>
							<?php if ($_SESSION['id'] == $detailsValue->user_id) { ?> 
							<ul class="editContactDetails" style="display: none">
								<?php
									$CI =& get_instance();
									$CI->load->model('Register_model');
									$getState = $CI->Register_model->getState($detailsValue->country);
								?>						 
								<li>State</li>
								<li class="form-group">
									<select class="form-control" name="state" onchange="selectCity()" id="stateName" required >
									<?php foreach ($getState as $key => $stateValue) { ?>
										<?php if ($stateValue->state_name == $detailsValue->state){ ?>
											<option value="<?=$stateValue->state_name?>" selected ><?=$stateValue->state_name?></option>

										<?php } else { ?>
											<option value="<?=$stateValue->state_name?>"><?=$stateValue->state_name?></option>
										<?php } ?>
									<?php } ?>
								</select>
								</li>
								<?php
									$CI =& get_instance();
									$CI->load->model('Register_model'); 
									$country = $CI->Register_model->getCountry();
								?>  							 
								<li>Country</li>
								<li class="form-group">
									<select class="form-control" name="country" onchange="selectState()" id="countryName">
										<option value="" selected="" disabled>Select Country</option>
										<?php foreach ($country as $key => $countryValue) { ?>
											<?php if ($countryValue->country_name == $detailsValue->country) {  ?>
												<option value="<?=$countryValue->country_name?>" selected><?=$countryValue->country_name?></option>
											<?php } else { ?>
												<option value="<?=$countryValue->country_name?>"><?=$countryValue->country_name?></option>
											<?php } ?>
										<?php } ?>
									</select>
								</li>  
							</ul>
							<?php } ?>
						</div>
						<div class="rightDetails">
							<ul class="contactDetails">
								<li>City</li>
								<li>
									<?php if ($detailsValue->city != '') { ?>
										<?=$detailsValue->city?>
									<?php } else { ?>
										<?='Not filled in'?>
									<?php } ?>
								</li>
								<li>Pincode</li>
								<li>
									<?php if ($detailsValue->pin != '') { ?>
										<?=$detailsValue->pin?>
									<?php } else { ?>
										<?='Not filled in'?>
									<?php } ?>
								</li>
							</ul>
							<?php if ($_SESSION['id'] == $detailsValue->user_id) { ?> 
							<ul class="editContactDetails" style="display: none">
								<?php
									$CI =& get_instance();
									$CI->load->model('Register_model'); 
									$getCity = $CI->Register_model->selectCity($detailsValue->country, $detailsValue->state);
								?>						 
								<li>City</li>
								<li class="form-group">
									<select name="city" class="form-control" required  id="myCity">
									<?php foreach ($getCity as $key => $cityValue) { ?>
										<?php if ($cityValue->city_name == $detailsValue->city ){ ?>
											<option value="<?=$cityValue->city_name?>" selected><?=$cityValue->city_name?></option>

										<?php } else { ?>
											<option value="<?=$cityValue->city_name?>"><?=$cityValue->city_name?></option>
										<?php } ?>
									<?php } ?>
								</select>
								</li>  							 
								<li>Pincode</li>
								<li class="form-group">
									<input type="text" class="form-control" value="<?=$detailsValue->pin?>" name="pin" placeholder="Pincode" >
								</li> 
								<input type="submit" name=""  value="Update"> 
							</ul>
							<?php } ?>
						</div>
				</form>
					</div>
				<?php } */ ?>  
				<div class="prDetailsBlocks">
					<form method="post" action="<?=base_url('Register_controller/updateProfileEducation')?>">
					<h2><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Education & Career <?php if ($_SESSION['id'] == $detailsValue->user_id) { ?> <span  class="eduCareerDetails"><a onclick="editEduCareerDetails('edit')"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Edit</a></span><span class="editEduCareerDetails"><a onclick="editEduCareerDetails('Cancel')"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancel</a></span><?php } ?></h2> 

					<div class="leftDetails">
						<ul class="eduCareerDetails">
							<li>Highest Education</li>
							<li>
								<?php if ($detailsValue->highest_edu != '') { ?>
									<?=$detailsValue->highest_edu?>
								<?php } else { ?>
									<?='Not filled in'?>
								<?php } ?>
							</li>						
						</ul>
					</div> 
					<div class="rightDetails">
						<ul class="eduCareerDetails">
							<li>Bachelor's Degree</li>
							<li>
								<?php if ($detailsValue->ug_degree != '') { ?>
									<?=$detailsValue->ug_degree?>
								<?php } else { ?>
									<?='Not filled in'?>
								<?php } ?>
							</li>
						</ul>
					</div>

					<div class="leftDetails">
						<ul class="eduCareerDetails">
							<li>Other Degree/Diploma</li>
							<li>
								<?php if ($detailsValue->oth_ug_degree != '') { ?>
									<?=$detailsValue->oth_ug_degree?>
								<?php } else { ?>
									<?='Not filled in'?>
								<?php } ?>
							</li>
						</ul>
					</div> 
					<div class="rightDetails">
						<ul class="eduCareerDetails">
							<li>Employed In</li>
							<li>
								<?php if ($detailsValue->emp_in != '') { ?>
									<?=$detailsValue->emp_in?>
								<?php } else { ?>
									<?='Not filled in'?>
								<?php } ?>
							</li>
						</ul>
					</div>

					<div class="leftDetails">
						<ul class="eduCareerDetails">							
							<li>Occupation</li>
							<li>
								<?php if ($detailsValue->occupation != '') { ?>
									<?=$detailsValue->occupation?>
								<?php } else { ?>
									<?='Not filled in'?>
								<?php } ?>
							</li>
						</ul>
					</div> 
					<div class="rightDetails">
						<ul class="eduCareerDetails">
							<li>Organization Name</li>
							<li>
								<?php if ($detailsValue->org_name != '') { ?>
									<?=$detailsValue->org_name?>
								<?php } else { ?>
									<?='Not filled in'?>
								<?php } ?>
							</li>
						</ul>
					</div>

					<div class="leftDetails">
						<ul class="eduCareerDetails">
							<li>Annual Income</li>
							<li>
								<?php if ($detailsValue->annual_income != '') { ?>
									<?php foreach ($income as $key => $incomeValue) {
										if($detailsValue->annual_income==$incomeValue->income){
											echo $incomeValue->name;
										}
									} ?>
								<?php } else { ?>
									<?='Not filled in'?>
								<?php } ?>
							</li>
						</ul>
					</div> 

					<?php if ($_SESSION['id'] == $detailsValue->user_id) { ?> 
					<?php
						$CI =& get_instance();
						$CI->load->model('Register_model');
						$education = $CI->Register_model->getEducation();
					?>	

					<div class="leftDetails">
						<ul class="editEduCareerDetails" style="display: none">
							<li>Highest Education</li>
							<li class="form-group"> 
							<select name="highest_edu" class="form-control" >
								<?php foreach ($education as $key => $educationValue) { ?>
									<option value="<?=$educationValue->degree?>" <?php if ($educationValue->degree==$detailsValue->highest_edu) {echo 'selected';}else{}?>><?=$educationValue->degree?></option>
								<?php } ?>
								<option value="Other">Other</option>
							</select>
							</li>
						</ul>
					</div> 
					<div class="rightDetails">
						<ul class="editEduCareerDetails" style="display: none">
							<li>Bachelor's Degree</li>
							<li class="form-group"> 
								<select name="ug_degree" class="form-control">
									<?php foreach ($education as $key => $educationValue) { ?>
										<?php if ($educationValue->degree_type =='UG') { ?>
										<option value="<?=$educationValue->degree?>" <?php if ($educationValue->degree==$detailsValue->ug_degree) {echo 'selected';}else{}?>><?=$educationValue->degree?></option>
									<?php } } ?>
								<option value="Other">Other</option>
							</select>
							</li> 
						</ul>
					</div>
					
					<div class="leftDetails">
						<ul class="editEduCareerDetails" style="display: none">
							<li>Other Degree/Diploma</li>
							<li class="form-group"> 
								<input type="text" name="oth_ug_degree" class="form-control" placeholder="Other Degree/Diploma" value="<?=$detailsValue->oth_ug_degree?>">
							</li> 
						</ul>
					</div>
					
					<div class="rightDetails">
						<ul class="editEduCareerDetails" style="display: none">
							<li>Employed In</li>
							<li class="form-group"> 
								<select name="emp_in" class="form-control" >
									<option value="Private Sector" <?php if ($detailsValue->emp_in=='Private Sector'){echo 'selected';}else{} ?> >Private Sector</option>
									<option value="Government/Public Sector" <?php if ($detailsValue->emp_in=='Government/Public Sector'){echo 'selected';}else{} ?>>Government/Public Sector</option>
									<option value="Civil Services" <?php if ($detailsValue->emp_in=='Civil Services'){echo 'selected';}else{} ?>>Civil Services</option>
									<option value="Defence" <?php if ($detailsValue->emp_in=='Defence'){echo 'selected';}else{} ?>>Defence</option>
									<option value="Business/ Self Employed" <?php if ($detailsValue->emp_in=='Business/ Self Employed'){echo 'selected';}else{} ?>>Business/ Self Employed</option>
									<option value="Not Working" <?php if ($detailsValue->emp_in=='Not Working'){echo 'selected';}else{} ?>>Not Working</option>
								</select>
							</li>
						</ul>
					</div> 
					<div class="leftDetails">
						<ul class="editEduCareerDetails" style="display: none">	
							<?php
								$CI =& get_instance();
								$CI->load->model('Register_model');
								$occupation = $CI->Register_model->getOccupation();
							?>
							<li>Occupation</li>
							<li class="form-group"> 
								<select name="occupation" class="form-control">
									<?php foreach ($occupation as $key => $occupationValue) { ?>
									    <option value="<?=$occupationValue->occupation?>" <?php if ($occupationValue->occupation==$detailsValue->occupation){echo 'selected'; }else{} ?>><?=$occupationValue->occupation?></option>
									<?php } ?> 
									    <option value="Others">Others</option> 
								</select>
							</li>
						</ul>
					</div>
					
					<div class="rightDetails">
						<ul class="editEduCareerDetails" style="display: none">							
							<li>Organization Name</li>
							<li class="form-group">
								<input type="text" name="org_name" class="form-control" placeholder="Organization Name" value="<?=$detailsValue->org_name?>">
							</li>
						</ul>
					</div> 
					<div class="leftDetails">
						<ul class="editEduCareerDetails" style="display: none">
							<li>Annual Income</li>
							<?php
								$CI =& get_instance();
								$CI->load->model('Register_model');
								$income = $CI->Register_model->getIncome();
							?>
							<li class="form-group"> 
								<select name="annual_income" class="form-control">
									<option value="0">No Income</option>
									<?php foreach ($income as $key => $incomeValue) { ?>
										<option value="<?=$incomeValue->income?>" <?php if ($incomeValue->income==$detailsValue->annual_income){echo 'selected'; }else{} ?>><?=$incomeValue->name?></option>
									<?php } ?>
								</select>
							</li>							
								<input type="submit" name=""  value="Update">
						</ul>
					</div> 
					<?php } ?>

					<?php /* //EducationDetails 1 Start ?>
					<div class="leftDetails">
						<ul class="eduCareerDetails">
							<!-- <li>UG College</li>
							<li><?=$detailsValue->ug_college?></li> -->
							<li>Other UG Degree</li>
							<li>
								<?php if ($detailsValue->oth_ug_degree != '') { ?>
									<?=$detailsValue->oth_ug_degree?>
								<?php } else { ?>
									<?='Not filled in'?>
								<?php } ?>
							</li>													
						</ul>
						<?php if ($_SESSION['id'] == $detailsValue->user_id) { ?> 
						<ul class="editEduCareerDetails" style="display: none">
							<?php
								$CI =& get_instance();
								$CI->load->model('Register_model');
								$education = $CI->Register_model->getEducation();
							?>						 
							<li>Highest Education</li>
							<li class="form-group"> 
							<select name="highest_edu" class="form-control" >
								<?php foreach ($education as $key => $educationValue) { ?>
									<option value="<?=$educationValue->degree?>" <?php if ($educationValue->degree==$detailsValue->highest_edu) {echo 'selected';}else{}?>><?=$educationValue->degree?></option>
								<?php } ?>
								<option value="Other">Other</option>
							</select>
							</li>
							<li>UG Degree</li>
							<li class="form-group"> 
								<select name="ug_degree" class="form-control">
									<?php foreach ($education as $key => $educationValue) { ?>
										<?php if ($educationValue->degree_type =='UG') { ?>
										<option value="<?=$educationValue->degree?>" <?php if ($educationValue->degree==$detailsValue->ug_degree) {echo 'selected';}else{}?>><?=$educationValue->degree?></option>
									<?php } } ?>
								<option value="Other">Other</option>
							</select>
							</li> 
							<li>Other UG Degree</li>
							<li class="form-group">
								<input type="text" name="oth_ug_degree" class="form-control" placeholder="Other UG Degree" value="<?=$detailsValue->oth_ug_degree?>">
							</li>
							<li>Employed In</li>
							<li class="form-group"> 
								<select name="emp_in" class="form-control" >
									<option value="Private Sector" <?php if ($detailsValue->emp_in=='Private Sector'){echo 'selected';}else{} ?> >Private Sector</option>
									<option value="Government/Public Sector" <?php if ($detailsValue->emp_in=='Government/Public Sector'){echo 'selected';}else{} ?>>Government/Public Sector</option>
									<option value="Civil Services" <?php if ($detailsValue->emp_in=='Civil Services'){echo 'selected';}else{} ?>>Civil Services</option>
									<option value="Defence" <?php if ($detailsValue->emp_in=='Defence'){echo 'selected';}else{} ?>>Defence</option>
									<option value="Business/ Self Employed" <?php if ($detailsValue->emp_in=='Business/ Self Employed'){echo 'selected';}else{} ?>>Business/ Self Employed</option>
									<option value="Not Working" <?php if ($detailsValue->emp_in=='Not Working'){echo 'selected';}else{} ?>>Not Working</option>
								</select>
							</li>
							<li>Organization Name</li>
							<li class="form-group">
								<input type="text" name="org_name" class="form-control" placeholder="Organization Name" value="<?=$detailsValue->org_name?>">
							</li>
						</ul>
						<?php } ?>
					</div>
					<div class="rightDetails">
						<ul class="eduCareerDetails">
							<li>School/College Name</li>
							<li>
								<?php if ($detailsValue->schl_name != '') { ?>
									<?=$detailsValue->schl_name?>
								<?php } else { ?>
									<?='Not filled in'?>
								<?php } ?>
							</li>
							<li>School/College Name</li>
							<li>
								<?php if ($detailsValue->pg_degree != '') { ?>
									<?=$detailsValue->pg_degree?>
								<?php } else { ?>
									<?='Not filled in'?>
								<?php } ?>
							</li>
							<!-- <li>PG College</li>
							<li><?=$detailsValue->pg_college?></li> -->
							<li>Other PG Degree</li>
							<li>
								<?php if ($detailsValue->oth_pg_degree != '') { ?>
									<?=$detailsValue->oth_pg_degree?>
								<?php } else { ?>
									<?='Not filled in'?>
								<?php } ?>
							</li>							
						</ul>
						<?php */ //EducationDetails 1 END ?>

						<?php // if ($_SESSION['id'] == $detailsValue->user_id) { ?>
						<?php /* //EducationDetails 2 Start ?> 
						<ul class="editEduCareerDetails" style="display: none">
							<li>School/College Name</li>
							<li class="form-group">
								<input type="text" name="schl_name" class="form-control" placeholder="School Name" value="<?=$detailsValue->schl_name?>">
							</li>
							<li>School/College Name</li>
							<li class="form-group">
								<input type="text" name="pg_degree" class="form-control" placeholder="School Name" value="<?=$detailsValue->pg_degree?>">
							</li>
						<?php */ //EducationDetails 2 END ?>
							<?php /* 
							<li>PG Degree</li>
							<li class="form-group"> 
								<select name="ug_degree" class="form-control">
									<?php foreach ($education as $key => $educationValue) { ?>
										<?php if ($educationValue->degree_type =='PG') { ?>
										<option value="<?=$educationValue->degree?>" <?php if ($educationValue->degree==$detailsValue->pg_degree) {echo 'selected';}else{}?>><?=$educationValue->degree?></option>
									<?php } } ?>
								<option value="Other">Other</option>
							</select>
							</li> 
							*/ ?>
							<?php /* //EducationDetails 3 Start ?>
							<li>Other PG Degree</li>
							<li class="form-group">
								<input type="text" name="oth_pg_degree" class="form-control" placeholder="Other PG Degree"  value="<?=$detailsValue->oth_pg_degree?>">
							</li>
							<?php
								$CI =& get_instance();
								$CI->load->model('Register_model');
								$occupation = $CI->Register_model->getOccupation();
							?>
							<li>Occupation</li>
							<li class="form-group"> 
								<select name="occupation" class="form-control">
									<?php foreach ($occupation as $key => $occupationValue) { ?>
									    <option value="<?=$occupationValue->occupation?>" <?php if ($occupationValue->occupation==$detailsValue->occupation){echo 'selected'; }else{} ?>><?=$occupationValue->occupation?></option>
									<?php } ?> 
									    <option value="Others">Others</option> 
								</select>
							</li>
							<li>Annual Income</li>
							<?php
								$CI =& get_instance();
								$CI->load->model('Register_model');
								$income = $CI->Register_model->getIncome();
							?>
							<li class="form-group"> 
								<select name="annual_income" class="form-control">
									<option value="0">No Income</option>
									<?php foreach ($income as $key => $incomeValue) { ?>
										<option value="<?=$incomeValue->income?>" <?php if ($incomeValue->income==$detailsValue->annual_income){echo 'selected'; }else{} ?>><?=$incomeValue->name?></option>
									<?php } ?>
								</select>
							</li>							
								<input type="submit" name=""  value="Update"> 
						</ul>
						<?php */ //EducationDetails 3 END ?>
						<?php // } ?>
					<!-- </div> -->
				</form>
				</div>
			</div> 
			<div class="col-md-4">
				<div class="prDetailsBlocksRight">
					<form method="post" action="<?=base_url('Register_controller/updateProfileFamily')?>">
					<h2><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Family Details <?php if ($_SESSION['id'] == $detailsValue->user_id) { ?> <span  class="aboutMyFamily"><a onclick="editAboutMyFamily('edit')"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Edit</a></span><span class="editAboutMyFamily"><a onclick="editAboutMyFamily('Cancel')"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancel</a></span><?php } ?></h2> 
					<ul class="aboutMyFamily">
						<?php /* if ($_SESSION['id'] == $detailsValue->user_id) { ?> 
							<li>Mother's Name</li>
							<li>
								<?php if ($detailsValue->mother != '') { ?>
									<?=$detailsValue->mother?>
								<?php } else { ?>
									<?='Not filled in'?>
								<?php } ?>
							</li>
							<li>Father's Name</li>
							<li>
								<?php if ($detailsValue->father != '') { ?>
									<?=$detailsValue->father?>
								<?php } else { ?>
									<?='Not filled in'?>
								<?php } ?>
							</li>
						<?php } */ ?>
						<li>Sister(s)</li>
						<li>
							<?php if ($detailsValue->sister != '') { ?>
								<?=$detailsValue->sister?>
							<?php } else { ?>
								<?='Not filled in'?>
							<?php } ?>
						</li>
						<li>Brother(s)</li>
						<li>
							<?php if ($detailsValue->brother != '') { ?>
								<?=$detailsValue->brother?>
							<?php } else { ?>
								<?='Not filled in'?>
							<?php } ?>
						</li>
						<?php if (strtoupper($detailsValue->religion) == 'HINDU') { ?>
						<li>Gothra</li>
						<li>
							<?php if ($detailsValue->gothra != '') { ?>
								<?=$detailsValue->gothra?>
							<?php } else { ?>
								<?='Not filled in'?>
							<?php } ?>
						</li>
						<li>Gothra (Maternal)</li>
						<li>
							<?php if ($detailsValue->gothra_maternal != '') { ?>
								<?=$detailsValue->gothra_maternal?>
							<?php } else { ?>
								<?='Not filled in'?>
							<?php } ?>
						</li>
						<?php } ?>
						<li>Family Status</li>
						<li>
							<?php if ($detailsValue->family_status != '') { ?>
								<?=$detailsValue->family_status?>
							<?php } else { ?>
								<?='Not filled in'?>
							<?php } ?>
						</li>
						<li>Family Income</li>
						<li>
							<?php if ($detailsValue->family_income != '') { ?>
								<?php foreach ($income as $key => $incomeValue) {
									if($detailsValue->family_income==$incomeValue->income){
										echo $incomeValue->name;
									}
								} ?>
							<?php } else { ?>
								<?='Not filled in'?>
							<?php } ?>
						</li>
						<li>Family Type</li>
						<li>
							<?php if ($detailsValue->family_type != '') { ?>
								<?=$detailsValue->family_type?>
							<?php } else { ?>
								<?='Not filled in'?>
							<?php } ?>
						</li>
						<li>Family based out of</li>
						<li>
							<?php if ($detailsValue->family_based != '') { ?>
								<?=$detailsValue->family_based?>
							<?php } else { ?>
								<?='Not filled in'?>
							<?php } ?>
						</li>
						<li>Living with parents ?</li>
						<li>
							<?php if ($detailsValue->living_wth_parents != '') { ?>
								<?=$detailsValue->living_wth_parents?>
							<?php } else { ?>
								<?='Not filled in'?>
							<?php } ?>
						</li>
						<li>Family Description* </li>
						<li>
							<?php if ($detailsValue->address != '') { ?>
								<?=$detailsValue->address?>
							<?php } else { ?>
								<?='Not filled in'?>
							<?php } ?>
						</li>
						<li>Country</li>
						<li>
							<?php if ($detailsValue->country != '') { ?>
								<?=$detailsValue->country?>
							<?php } else { ?>
								<?='Not filled in'?>
							<?php } ?>
						</li>
						<li>State</li>
						<li>
							<?php if ($detailsValue->state != '') { ?>
								<?=$detailsValue->state?>
							<?php } else { ?>
								<?='Not filled in'?>
							<?php } ?>
						</li>
						<li>City</li>
						<li>
							<?php if ($detailsValue->city != '') { ?>
								<?=$detailsValue->city?>
							<?php } else { ?>
								<?='Not filled in'?>
							<?php } ?>
						</li>
						<li>Pincode</li>
						<li>
							<?php if ($detailsValue->pin != '') { ?>
								<?=$detailsValue->pin?>
							<?php } else { ?>
								<?='Not filled in'?>
							<?php } ?>
						</li>
					</ul>
					<?php if ($_SESSION['id'] == $detailsValue->user_id) { ?> 
					<ul class="editAboutMyFamily" style="display: none;">
						<?php if ($_SESSION['id'] == $detailsValue->user_id) { ?>
							<?php /* //Mother father comment ?> 
							<li>Mother's Name</li>
							<li class="form-group">
								<input type="text" name="mother" class="form-control" placeholder="Enter your Mother's Name"  value="<?=$detailsValue->mother?>">
							</li> 
							<li>Father's Name</li> 
							<li class="form-group">
								<input type="text" name="father" class="form-control" placeholder="Enter your Father's Name"  value="<?=$detailsValue->father?>">
							</li>
							<?php */ ?>
							<li>Sister(s)</li>
							<li class="form-group"> 
								<select name="sister" class="form-control">
									<option value="None" <?php if($detailsValue->sister=='None'){echo 'selected';}else{}?>>None</option>
									<option value="1" <?php if($detailsValue->sister=='1'){echo 'selected';}else{}?>>1</option>
									<option value="2" <?php if($detailsValue->sister=='2'){echo 'selected';}else{}?>>2</option>
									<option value="3" <?php if($detailsValue->sister=='3'){echo 'selected';}else{}?>>3</option>
									<option value="3+" <?php if($detailsValue->sister=='3+'){echo 'selected';}else{}?>>3+</option>
								</select>
							</li> 
							<li>Brother(s)</li>
							<li class="form-group"> 
								<select name="brother" class="form-control">
									<option value="None" <?php if($detailsValue->brother=='None'){echo 'selected';}else{}?>>None</option>
									<option value="1" <?php if($detailsValue->brother=='1'){echo 'selected';}else{}?>>1</option>
									<option value="2" <?php if($detailsValue->brother=='2'){echo 'selected';}else{}?>>2</option>
									<option value="3" <?php if($detailsValue->brother=='3'){echo 'selected';}else{}?>>3</option>
									<option value="3+" <?php if($detailsValue->brother=='3+'){echo 'selected';}else{}?>>3+</option>
								</select>
							</li> 
							<?php foreach ($details as $key => $detailsValue) { ?>
								<?php if (strtoupper($detailsValue->religion) == 'HINDU') { ?>
							<li>Gothra</li>
							<li class="form-group"> 
								<select name="gothra" class="form-control">  
									<option value="">Not Filled</option>
									<option value="Not Known">Not Known</option>
									<option value="Agasti" <?php if ($detailsValue->gothra=='Agasti'){ echo 'selected';} else{} ?>>Agasti</option>
									<option value="Angira" <?php if ($detailsValue->gothra=='Angira'){ echo 'selected';} else{} ?>>Angira</option>
									<option value="Atri" <?php if ($detailsValue->gothra=='Atri'){ echo 'selected';} else{} ?>>Atri</option>
									<option value="Aatreya" <?php if ($detailsValue->gothra=='Aatreya'){ echo 'selected';} else{} ?>>Aatreya</option>
									<option value="Bharadwaaj" <?php if ($detailsValue->gothra=='Bharadwaaj'){ echo 'selected';} else{} ?>>Bharadwaaj</option>
									<option value="Dhananjaya" <?php if ($detailsValue->gothra=='Dhananjaya'){ echo 'selected';} else{} ?>>Dhananjaya</option>
									<option value="Garg" <?php if ($detailsValue->gothra=='Garg'){ echo 'selected';} else{} ?>>Garg</option>
									<option value="Gautam" <?php if ($detailsValue->gothra=='Gautam'){ echo 'selected';} else{} ?>>Gautam</option>
									<option value="Ghrita Kaushik" <?php if ($detailsValue->gothra=='Ghrita Kaushik'){ echo 'selected';} else{} ?>>Ghrita Kaushik</option>
									<option value="Kapil" <?php if ($detailsValue->gothra=='Kapil'){ echo 'selected';} else{} ?>>Kapil</option>
									<option value="Kashyap" <?php if ($detailsValue->gothra=='Kashyap'){ echo 'selected';} else{} ?>>Kashyap</option>
									<option value="Kaudinya" <?php if ($detailsValue->gothra=='Kaudinya'){ echo 'selected';} else{} ?>>Kaudinya</option>
									<option value="Kausalya" <?php if ($detailsValue->gothra=='Kausalya'){ echo 'selected';} else{} ?>>Kausalya</option>
									<option value="Kausik" <?php if ($detailsValue->gothra=='Kausik'){ echo 'selected';} else{} ?>>Kausik</option>
									<option value="Kundin" <?php if ($detailsValue->gothra=='Kundin'){ echo 'selected';} else{} ?>>Kundin</option>
									<option value="Mandaby" <?php if ($detailsValue->gothra=='Mandaby'){ echo 'selected';} else{} ?>>Mandaby</option>
									<option value="Maudagalya" <?php if ($detailsValue->gothra=='Maudagalya'){ echo 'selected';} else{} ?>>Maudagalya</option>
									<option value="Parasar" <?php if ($detailsValue->gothra=='Parasar'){ echo 'selected';} else{} ?>>Parasar</option>
									<option value="Ravi" <?php if ($detailsValue->gothra=='Ravi'){ echo 'selected';} else{} ?>>Ravi</option>
									<option value="Sankhyayan" <?php if ($detailsValue->gothra=='Sankhyayan'){ echo 'selected';} else{} ?>>Sankhyayan</option>
									<option value="Shandilya" <?php if ($detailsValue->gothra=='Shandilya'){ echo 'selected';} else{} ?>>Shandilya</option>
									<option value="Upamanyu" <?php if ($detailsValue->gothra=='Upamanyu'){ echo 'selected';} else{} ?>>Upamanyu</option>
									<option value="Vishwamitra" <?php if ($detailsValue->gothra=='Vishwamitra'){ echo 'selected';} else{} ?>>Vishwamitra</option>
									<option value="Vatsa" <?php if ($detailsValue->gothra=='Vatsa'){ echo 'selected';} else{} ?>>Vatsa</option>
									<option value="Vashishta" <?php if ($detailsValue->gothra=='Vashishta'){ echo 'selected';} else{} ?>>Vashishta</option>
								</select>
							</li> 
							<?php } } ?>
							<?php foreach ($details as $key => $detailsValue) { ?>
								<?php if (strtoupper($detailsValue->religion) == 'HINDU') { ?>
							<li>Gothra (Maternal)</li>
							<li class="form-group"> 
								<select name="gothra_maternal" class="form-control">  
									<option value="">Not Filled</option>
									<option value="Not Known">Not Known</option>
									<option value="Agasti" <?php if ($detailsValue->gothra_maternal=='Agasti'){ echo 'selected';} else{} ?>>Agasti</option>
									<option value="Angira" <?php if ($detailsValue->gothra_maternal=='Angira'){ echo 'selected';} else{} ?>>Angira</option>
									<option value="Atri" <?php if ($detailsValue->gothra_maternal=='Atri'){ echo 'selected';} else{} ?>>Atri</option>
									<option value="Aatreya" <?php if ($detailsValue->gothra_maternal=='Aatreya'){ echo 'selected';} else{} ?>>Aatreya</option>
									<option value="Bharadwaaj" <?php if ($detailsValue->gothra_maternal=='Bharadwaaj'){ echo 'selected';} else{} ?>>Bharadwaaj</option>
									<option value="Dhananjaya" <?php if ($detailsValue->gothra_maternal=='Dhananjaya'){ echo 'selected';} else{} ?>>Dhananjaya</option>
									<option value="Garg" <?php if ($detailsValue->gothra_maternal=='Garg'){ echo 'selected';} else{} ?>>Garg</option>
									<option value="Gautam" <?php if ($detailsValue->gothra_maternal=='Gautam'){ echo 'selected';} else{} ?>>Gautam</option>
									<option value="Ghrita Kaushik" <?php if ($detailsValue->gothra_maternal=='Ghrita Kaushik'){ echo 'selected';} else{} ?>>Ghrita Kaushik</option>
									<option value="Kapil" <?php if ($detailsValue->gothra_maternal=='Kapil'){ echo 'selected';} else{} ?>>Kapil</option>
									<option value="Kashyap" <?php if ($detailsValue->gothra_maternal=='Kashyap'){ echo 'selected';} else{} ?>>Kashyap</option>
									<option value="Kaudinya" <?php if ($detailsValue->gothra_maternal=='Kaudinya'){ echo 'selected';} else{} ?>>Kaudinya</option>
									<option value="Kausalya" <?php if ($detailsValue->gothra_maternal=='Kausalya'){ echo 'selected';} else{} ?>>Kausalya</option>
									<option value="Kausik" <?php if ($detailsValue->gothra_maternal=='Kausik'){ echo 'selected';} else{} ?>>Kausik</option>
									<option value="Kundin" <?php if ($detailsValue->gothra_maternal=='Kundin'){ echo 'selected';} else{} ?>>Kundin</option>
									<option value="Mandaby" <?php if ($detailsValue->gothra_maternal=='Mandaby'){ echo 'selected';} else{} ?>>Mandaby</option>
									<option value="Maudagalya" <?php if ($detailsValue->gothra_maternal=='Maudagalya'){ echo 'selected';} else{} ?>>Maudagalya</option>
									<option value="Parasar" <?php if ($detailsValue->gothra_maternal=='Parasar'){ echo 'selected';} else{} ?>>Parasar</option>
									<option value="Ravi" <?php if ($detailsValue->gothra_maternal=='Ravi'){ echo 'selected';} else{} ?>>Ravi</option>
									<option value="Sankhyayan" <?php if ($detailsValue->gothra_maternal=='Sankhyayan'){ echo 'selected';} else{} ?>>Sankhyayan</option>
									<option value="Shandilya" <?php if ($detailsValue->gothra_maternal=='Shandilya'){ echo 'selected';} else{} ?>>Shandilya</option>
									<option value="Upamanyu" <?php if ($detailsValue->gothra_maternal=='Upamanyu'){ echo 'selected';} else{} ?>>Upamanyu</option>
									<option value="Vishwamitra" <?php if ($detailsValue->gothra_maternal=='Vishwamitra'){ echo 'selected';} else{} ?>>Vishwamitra</option>
									<option value="Vatsa" <?php if ($detailsValue->gothra_maternal=='Vatsa'){ echo 'selected';} else{} ?>>Vatsa</option>
									<option value="Vashishta" <?php if ($detailsValue->gothra_maternal=='Vashishta'){ echo 'selected';} else{} ?>>Vashishta</option>
								</select>
							</li>
							<?php } } ?>
							<li>Family Status</li>
							<li class="form-group"> 
								<select name="family_status" class="form-control">
									<option value="">Not Filled</option>
									<option value="Rich/Affluent" <?php if ($detailsValue->family_status=='Rich/Affluent'){ echo 'selected';} else{} ?>>Rich/Affluent</option>
									<option value="Upper Middle"  <?php if ($detailsValue->family_status=='Upper Middle'){ echo 'selected';} else{} ?>>Upper Middle</option>
									<option value="Middle Class"  <?php if ($detailsValue->family_status=='Middle Class'){ echo 'selected';} else{} ?>>Middle Class</option>
								</select>
							</li>
							<li>Family Income</li>
							<li class="form-group"> 
								<select name="family_income" class="form-control">
									<option value="1">No Income</option>
									<?php foreach ($income as $key => $incomeValue) { ?>
										<option value="<?=$incomeValue->income?>" <?php if ($incomeValue->income==$detailsValue->family_income){ echo 'selected';} else{} ?>><?=$incomeValue->name?></option>
									<?php } ?>
								</select>
							</li>
							<li>Family Type</li>
							<li class="form-group">
								<select name="family_type" class="form-control">
									<option value="">Not Filled</option>
									<option value="Joint Family" <?php if ($detailsValue->family_type=='Joint Family'){ echo 'selected';} else{} ?>>Joint Family</option>
									<option value="Nuclear Family" <?php if ($detailsValue->family_type=='Nuclear Family'){ echo 'selected';} else{} ?>>Nuclear Family</option>
									<option value="Others" <?php if ($detailsValue->family_type=='Others'){ echo 'selected';} else{} ?>>Others</option>
								</select>
							</li>
							<li>Family based out of</li>
							<li class="form-group"> 
								<select name="family_based" class="form-control">
									<option disabled>Not Filled</option>
									<?php foreach ($india_state as $key => $stateValue) { ?>
										<option value="<?=$stateValue->state_name?>" <?php if ($stateValue->state_name==$detailsValue->family_based){ echo 'selected';}  ?>><?=$stateValue->state_name?></option>
									<?php } ?>
								</select>
							</li>
							<li>Living with parents ?</li>
							<li class="form-group"> 
								<select name="living_wth_parents" class="form-control" >
									<option value="">Not Filled</option>
									<option value="Yes"<?php if ($detailsValue->living_wth_parents=='Yes'){ echo 'selected';} else{} ?>>Yes</option>
									<option value="No"<?php if ($detailsValue->living_wth_parents=='No'){ echo 'selected';} else{} ?>>No</option>
									<option value="Not Applicable"<?php if ($detailsValue->living_wth_parents=='Not Applicable'){ echo 'selected';} else{} ?>>Not Applicable</option>
								</select>
							</li>
							<li>Family Description*</li>
							<li class="form-group"> 
								<input type="text" name="address" class="form-control" placeholder="Not Filled "  value="<?=$detailsValue->address?>">
							</li>
								<?php
									$CI =& get_instance();
									$CI->load->model('Register_model'); 
									$country = $CI->Register_model->getCountry();
								?>  							 
								<li>Country</li>
								<li class="form-group">
									<select class="form-control" name="country" onchange="selectState()" id="countryName">
										<option value="" selected="" disabled>Select Country</option>
										<?php foreach ($country as $key => $countryValue) { ?>
											<?php if ($countryValue->country_name == $detailsValue->country) {  ?>
												<option value="<?=$countryValue->country_name?>" selected><?=$countryValue->country_name?></option>
											<?php } else { ?>
												<option value="<?=$countryValue->country_name?>"><?=$countryValue->country_name?></option>
											<?php } ?>
										<?php } ?>
									</select>
								</li> 
								<?php
									$CI =& get_instance();
									$CI->load->model('Register_model');
									$getState = $CI->Register_model->getState($detailsValue->country);
								?>						 
								<li>State</li>
								<li class="form-group">
									<select class="form-control" name="state" onchange="selectCity()" id="stateName" required >
									<?php foreach ($getState as $key => $stateValue) { ?>
										<?php if ($stateValue->state_name == $detailsValue->state){ ?>
											<option value="<?=$stateValue->state_name?>" selected ><?=$stateValue->state_name?></option>

										<?php } else { ?>
											<option value="<?=$stateValue->state_name?>"><?=$stateValue->state_name?></option>
										<?php } ?>
									<?php } ?>
								</select>
								</li>
								<?php
									$CI =& get_instance();
									$CI->load->model('Register_model'); 
									$getCity = $CI->Register_model->selectCity($detailsValue->country, $detailsValue->state);
								?>						 
								<li>City</li>
								<li class="form-group">
									<select name="city" class="form-control" required  id="myCity">
									<?php foreach ($getCity as $key => $cityValue) { ?>
										<?php if ($cityValue->city_name == $detailsValue->city ){ ?>
											<option value="<?=$cityValue->city_name?>" selected><?=$cityValue->city_name?></option>

										<?php } else { ?>
											<option value="<?=$cityValue->city_name?>"><?=$cityValue->city_name?></option>
										<?php } ?>
									<?php } ?>
								</select>
								</li>
								<li>Pincode :</li>
								<li class="form-group"> 
									<input type="text" name="pin"  maxlength="6" onkeypress="return (event.charCode > 47 && event.charCode < 58)" class="form-control" placeholder="Not Filled "  value="<?=$detailsValue->pin?>">
								</li> 
														
								<input type="submit" name=""  value="Update">
						<?php } ?>
					</ul>
					<?php } ?>
				</form>
				</div>
			</div>
		</div>
	</div>
	<?php
		$CI =& get_instance();
		$CI->load->model('Register_model');
		$cal = $CI->Register_model->getProfileAllDetailsForCal($detailsValue->user_id); 
	?>
	<?php } ?>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
<script type="text/javascript">
	$(document).ready(function() {

	$('a.btn-gallery').on('click', function(event) {
		event.preventDefault();
		
		var gallery = $(this).attr('href');
    
		$(gallery).magnificPopup({
      delegate: 'a',
			type:'image',
			gallery: {
				enabled: true
			}
		}).magnificPopup('open');
	});
	
});
</script>
<script>
	function editAboutMe(val){
		if (val == 'edit') {			
			$('.editAboutMe').show();
			$('.aboutMe').hide();
		} else {
			$('.editAboutMe').hide();
			$('.aboutMe').show();
		}
	}

	function editBasicDetails(val){
		if (val == 'edit') {			
			$('.editBasicDetails').show();
			$('.basicDetails').hide();
		} else {
			$('.editBasicDetails').hide();
			$('.basicDetails').show();
		}
	}

	function editContactDetails(val){
		if (val == 'edit') {			
			$('.editContactDetails').show();
			$('.contactDetails').hide();
		} else {
			$('.editContactDetails').hide();
			$('.contactDetails').show();
		}
	}

	function editEduCareerDetails(val){
		if (val == 'edit') {			
			$('.editEduCareerDetails').show();
			$('.eduCareerDetails').hide();
		} else {
			$('.editEduCareerDetails').hide();
			$('.eduCareerDetails').show();
		}
	}


	function editAboutMyFamily(val){
		if (val == 'edit') {			
			$('.editAboutMyFamily').show();
			$('.aboutMyFamily').hide();
		} else {
			$('.editAboutMyFamily').hide();
			$('.aboutMyFamily').show();
		}
	}

	function con_req(val)
		{
			var id = $(val).data("id");
			$.ajax({
				url: "<?=base_url('connection/con_req')?>",
				dataType:'json',
				method: "GET",
				data:{id:id},
			 	success: function(data)
				{
					if(data.error==200){
						$('#interest_sent').show();
						$('#interest_send').hide();
					}
				}
			});
		}

	function selectState()
		{
			var country = $("#countryName").val();
			$('#stateName')
			    .empty()
			    .append('<option selected="selected" disabled>Select State</option>')
			;
			$.ajax({
				url: "<?=base_url()?>Register_controller/selectState",
				dataType:'json',
				method: "POST",
				data:{country:country},
			 	success: function(data)
				{
					for(i=0; i<data.length; i++){
					$('#stateName')
			         .append($("<option></option>")
			                    .attr("value",data[i])
			                    .text(data[i])); 
					}
				}
			});
		}
		function selectCity()
		{
			var state = $("#stateName").val();
			var country = $("#countryName").val();
			$('#myCity')
			    .empty()
			    .append('<option selected="selected" disabled>Select City</option>')
			;
			$.ajax({
				url: "<?=base_url()?>Register_controller/selectCity",
				dataType:'json',
				method: "POST",
				data:{state:state, country:country},
			 	success: function(data)
				{
					for(i=0; i<data.length; i++){
					$('#myCity')
			         .append($("<option></option>")
			                    .attr("value",data[i])
			                    .text(data[i])); 
					}
				}
			});
		}

		// go back
		function backAway(){
	        //if it was the first page
	        if(history.length === 1){
	            window.location = "http://[::1]/xamppp/mat"
	        } else {
	            history.back();
	        }
	    }


 
		//doughnut
		Chart.pluginService.register({
		    beforeDraw: function (chart) {
		        var width = chart.chart.width,
		            height = chart.chart.height,
		            ctx = chart.chart.ctx;
		        ctx.restore();
		        var fontSize = (height / 114).toFixed(2);
		        ctx.font = fontSize + "em sans-serif";
		        ctx.textBaseline = "middle";
		        var text = chart.config.options.elements.center.text,
		            textX = Math.round((width - ctx.measureText(text).width) / 2),
		            textY = height / 2;
		        ctx.fillText(text, textX, textY);
		        ctx.save();
		    }
		});

		var chartData = [{"visitor": <?=$cal['photo']?>, "visit": "Photos"}, {"visitor": <?=$cal['basic_detail']?>, "visit": "About You & Family"}, {"visitor": <?=$cal['email_verify']?>, "visit": "Email Verification"}, {"visitor": <?=$cal['contact_detail']?>, "visit": "Contact Details"}, {"visitor": <?=$cal['education_detail']?>, "visit": "Career Details"}, {"visitor": <?=$cal['family_detail']?>, "visit": "Family Details"}]

		var visitorData = [],
		    sum = 0,
		    visitData = [];

		for (var i = 0; i < chartData.length; i++) {
		    visitorData.push(chartData[i]['visitor'])
		    visitData.push(chartData[i]['visit'])
		  
		    sum += chartData[i]['visitor'];
		}

		var textInside = sum.toString();

		var myChart = new Chart(document.getElementById('mychart'), {
		    type: 'doughnut',
		    animation:{
		        animateScale:true
		    },
		    data: {
		        labels: visitData,
		        datasets: [{
		            label: 'Visitor',
		            data: visitorData,
		            backgroundColor: [
		                "#b81103",
		                "#fab700",
		                "#33991f",
		                "#0d6bba",
		                "#bb439b",
		                "#9588ff"

		            ]
		        }]
		    },
		    options: {
		        elements: {
		          center: {
		            text: textInside
		          }
		        },
		        responsive: true,
		        legend: false,
		        legendCallback: function(chart) {
		            var legendHtml = [];
		            legendHtml.push('<ul>');
		            var item = chart.data.datasets[0];
		            for (var i=0; i < item.data.length; i++) {
		                legendHtml.push('<li>');
		                legendHtml.push('<span class="chart-legend" style="background-color:' + item.backgroundColor[i] +'"></span>');
		                legendHtml.push('<span class="chart-legend-label-text">' + item.data[i] + ' % - '+chart.data.labels[i]+' </span>');
		                legendHtml.push('</li>');
		            }

		            legendHtml.push('</ul>');
		            return legendHtml.join("");
		        },
		        tooltips: {
		             enabled: true,
		             mode: 'label',
		             callbacks: {
		                label: function(tooltipItem, data) {
		                    var indice = tooltipItem.index;
		                    return data.datasets[0].data[indice] + " % " + data.labels[indice] + ' complete';
		                }
		             }
		         },
		    }
		});

		$('#my-legend-con').html(myChart.generateLegend());

		// console.log(document.getElementById('my-legend-con'));

		</script>  
		
		
		<div class="modal fade in" id="UpdateEmail" tabindex="-1" role="dialog" aria-hidden="true" >
				<div class="modal-dialog">
					<div class="loginmodal-container">
						<h1>UPDATE EMAIL </h1><br>
						<form method="post" action="<?=base_url();?>Register_controller/updateemail">
							<input type="text" name="email" placeholder="Enter Your email Id" value="<?=$detailsValue->email;?>"  >
							<input type="submit" name="login" class="login loginmodal-submit" value="Update">
						</form>
						
		
					</div>
				</div>
			</div>
<?php include "footer.php" ?>