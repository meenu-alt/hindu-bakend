	<?php
		$CI =& get_instance();
		$CI->load->model('Register_model');
		$india_state = $CI->Register_model->getIndiaState(); 
		$country = $CI->Register_model->getCountry();
		$language = $CI->Register_model->getLanguage();
	?>
	<?php include "header.php" ?>
	<section class="profile">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box fadeInUp animated-fast">
					<h2>Create Profile</h2>
				</div>
			</div>
			<div class="row">
				<div class="profileBanner">
					<div class="col-md-12 col-xs-12">
						<?php foreach ($details as $key => $detailsValue) { ?>
							<h2>Welcome <?=$detailsValue->name?></h2>
						<?php } ?>
						<div class="col-sm-3 col-xs-12">
							<?php if (empty($detailsValue->image1)) { ?>
								<a href="<?=base_url('mycon/add_photos')?>">
									<img src="<?=base_url()?>assets/images/pp.png" alt="profile person" class="createPrImgNew">
								</a>
							<?php } else{ ?>
								<a href="<?=base_url('mycon/add_photos')?>">
									<img src="<?=base_url().$detailsValue->image1?>" alt="profile person" class="createPrImgNew">
								</a>
							<?php } ?>
						</div>
						<div class="col-sm-3 col-xs-12">
							<h3 class="createProfile__h3"><?php 	if ($detailsValue->gender == 'male') { echo 'M';} else if($detailsValue->gender == 'female'){ echo 'F'; } ?>H<?=$detailsValue->user_id?></h3>
							<form method="post" action="<?=base_url('mycon/add_photos')?>" class="prPhoto" enctype="multipart/form-data">
								<div class="form-group">
									<!-- <input type="file" name="img-pro" class="form-control"> -->
									<input type="submit" name="" class="form-control" value="Add Photo">
								</div>
							</form>
						</div>
						<!-- <div class="col-sm-5 prDetails">
							<h4>Add Details to your profile</h4>
							<ul>
								<li><a href="#">Upload more Photos: +18%</a></li>
								<li><a href="#">Write About You & Family: +7%</a></li>
								<li><a href="#">Add Lifestyle Details: +6%</a></li>
								<li><a href="#">Add Career Details: +4%</a></li>
							</ul>
						</div> -->
						<div class="col-sm-6 col-xs-12 prDetails">
							<h4>Profile Performance</h4>						
							<div class="canvas-con">
							    <div class="canvas-con-inner">
							        <canvas id="mychart" height="150px"></canvas>
							    </div>
							    <div id="my-legend-con" class="legend-con"></div>
							</div>
							<ul style="display: none;">
								<li><a href="#">Upload more Photos: +18%</a></li>
								<li><a href="#">Write About You & Family: +7%</a></li>
								<li><a href="#">Add Lifestyle Details: +6%</a></li>
								<li><a href="#">Add Career Details: +4%</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-md-push-8">
					<?php foreach ($details as $key => $detailsValue) { ?>
					<div class="prDetailsBlocksRight">
						<h2><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;Profile Details</h2>
						<ul>
							<li>Profile Id</li>
							<li class="form-group">
								<input type="text" name="" class="form-control" value="<?php if ($detailsValue->gender == 'male') { echo 'MH';} else if($detailsValue->gender == 'female'){ echo 'FH'; } ?><?=$detailsValue->user_id?>" readonly>
							</li>
							<li>Name</li>
							<li class="form-group">
								<input type="text" name="" class="form-control" placeholder="Name" value="<?=$detailsValue->name?>" readonly>
							</li>
							<li>Email</li>
							<li class="form-group">
								<input type="text" name="" class="form-control" placeholder="Email" value="<?=$detailsValue->email?>" readonly>
							</li>
							<li>Mobile No.</li>
							<li class="form-group">
								<input type="text" name="" class="form-control" placeholder="Mobile No." value="<?=$detailsValue->phone?>" readonly>
							</li>
							<li>Date of Birth</li>
							<li class="form-group">
								<input type="text" name="" class="form-control" placeholder="Date of Birth" value="<?=$detailsValue->dob?>" readonly>
							</li>
							<li>Religion</li>
							<li class="form-group">
								<input type="text" name="" class="form-control" placeholder="Religion" value="<?=ucfirst(strtolower($detailsValue->religion));?>" readonly>
							</li>
							<li>Caste</li>
							<li class="form-group">
								<input type="text" name="" class="form-control" placeholder="Caste" value="<?=$detailsValue->caste?>" readonly>
							</li>
							<li>Language</li>
							<li class="form-group">
								<input type="text" name="" class="form-control" placeholder="Language" value="<?=$detailsValue->language?>" readonly>
							</li>
						</ul>
					</div>
					<?php } ?>
				</div>
				<div class="col-md-8 col-md-pull-4">
					<form action="<?=base_url('Register_controller/upload_reg')?>" method="post"> 
						<div class="prDetailsBlocks"> 
							<?php 
								/*
									Desktop mobile display none block in above div class="desktopViewCP/mobViewCP" 
								*/ 
							?>
							<h2><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Basic Details</h2> 
							<ul class="fullDescProfile">
								<li>Description</li>
								<li class="form-group">
									<textarea class="form-control" name="desc" class="form-control">Hello, I am <?=$details[0]->name;?>. Welcome to my profile. My mother tongue is <?=$details[0]->language;?>. If you like my profile then send me Interest.</textarea>
								</li>
							</ul>

							<div class="leftDetails">
								<ul>
									<?php 
									foreach ($details as $key => $detailsValue) {
										$religion = $detailsValue->religion;
										$caste = $detailsValue->caste;
									}
										$sub_caste = $CI->Register_model->getSubCaste($religion, $caste);
									?>
									<li>Sub Caste :</li>
									<li class="form-group">
										<select name="sub_caste" class="form-control" required>
											<option value="" disabled>Not Filled</option>
											<?php foreach ($sub_caste as $key => $subCasteValue) { ?>
												<option value="<?=$subCasteValue->sub_caste?>"><?=$subCasteValue->sub_caste?></option>
											<?php } ?>
										</select>
									</li>
								</ul>
							</div>
							<div class="rightDetails">
								<ul>	
									<li>Current Location</li>
									<li class="form-group"> 
										<select name="curr_loc" class="form-control" required>
											<?php foreach ($country as $key => $stateValue) { ?>
												<?php foreach ($details as $key => $detailsValue) { ?>
													<?php if ($detailsValue->curr_location == $stateValue->country_name) { ?>
														<option value="<?=$stateValue->country_name?>" selected><?=$stateValue->country_name?></option>
													<?php } else {  ?>
														<option value="<?=$stateValue->country_name?>" <?=$stateValue->country_name == 'India' ? 'selected' : ''; ?>><?=$stateValue->country_name?></option>
													<?php } ?>
												<?php } ?>
											<?php } ?>
										</select>
									</li>
								</ul>
							</div>

							<div class="leftDetails">
								<ul>	
									<li>Complexion :</li>
									<li class="form-group">
										<select class="form-control" name="complexion" required>
											<option selected disabled>Not Filled</option>
											<option value="Very Fair">Very Fair</option>
											<option value="Fair" >Fair</option>
											<option value="Wheatish">Wheatish</option>
											<option value="Wheatish Brown">Wheatish Brown</option>
											<option value="Dark">Dark</option>
										</select>
									</li>
								</ul>
							</div>
							<div class="rightDetails">
								<ul>
									<li>Marital Status :</li>
									<li class="form-group">
										<select name="ms" class="form-control" required>
											<option selected disabled>Not Filled</option>
											<option value="Never Married">Never Married</option>
											<option value="Married">Married</option>
											<option value="Awaiting Divorce">Awaiting Divorce</option>
											<option value="Divorced">Divorced</option>
											<option value="Widowed">Widowed</option>
											<option value="Annulled">Annulled</option>
										</select>
									</li>
								</ul>
							</div>

							<div class="leftDetails">
								<ul>
									<li>Height (in feet) :</li>
									<li class="form-group"> 
										<select class="form-control"  name="height" required>
											<option selected disabled>Not Filled</option>
											<option value="4.0">4' 0" (1.22 mts)</option>
											<option value="4.1">4' 1" (1.24 mts)</option>
											<option value="4.2">4' 2" (1.28 mts)</option>
											<option value="4.3">4' 3" (1.31 mts)</option>
											<option value="4.4">4' 4" (1.34 mts)</option>
											<option value="4.5">4' 5" (1.35 mts)</option>
											<option value="4.6">4' 6" (1.37 mts)</option>
											<option value="4.7">4' 7" (1.40 mts)</option>
											<option value="4.8">4' 8" (1.42 mts)</option>
											<option value="4.9">4' 9" (1.45 mts)</option>
											<option value="4.10">4' 10" (1.47 mts)</option>
											<option value="4.11">4' 11" (1.50 mts)</option>
											<optgroup label=""></optgroup>
											<option value="5.0">5' 0" (1.52 mts)</option>
											<option value="5.1">5' 1" (1.55 mts)</option>
											<option value="5.2">5' 2" (1.58 mts)</option>
											<option value="5.3">5' 3" (1.60 mts)</option>
											<option value="5.4">5' 4" (1.63 mts)</option>
											<option value="5.5">5' 5" (1.65 mts)</option>
											<option value="5.6">5' 6" (1.68 mts)</option>
											<option value="5.7">5' 7" (1.70 mts)</option>
											<option value="5.8">5' 8" (1.73 mts)</option>
											<option value="5.9">5' 9" (1.75 mts)</option>
											<option value="5.10">5' 10" (1.78 mts)</option>
											<option value="5.11">5' 11" (1.80 mts)</option>
											<optgroup label="&nbsp;"></optgroup>
											<option value="6.0">6' 0" (1.83 mts)</option>
											<option value="6.1">6' 1" (1.85 mts)</option>
											<option value="6.2">6' 2" (1.87 mts)</option>
											<option value="6.3">6' 3" (1.90 mts)</option>
											<option value="6.4">6' 4" (1.93 mts)</option>
											<option value="6.5">6' 5" (1.95 mts)</option>
											<option value="6.6">6' 6" (1.97 mts)</option>
											<option value="6.7">6' 7" (2.00 mts)</option>
											<option value="6.8">6' 8" (2.02 mts)</option>
											<option value="6.9">6' 9" (2.05 mts)</option>
											<option value="6.10">6' 10" (2.07 mts)</option>
											<option value="6.11">6' 11" (2.10 mts)</option>
											<option value="7.0">7' 0" (2.13 mts)</option>
										</select>
									</li>
								</ul>
							</div>
							<div class="rightDetails">
								<ul>
									<li>Weight (in Kg) :</li>
									<li class="form-group">
										<input type="text" name="weight" class="form-control" placeholder="Weight" placeholder ="Not Filled" onkeypress="return (event.charCode > 47 && event.charCode < 58)" required>
									</li>
								</ul>
							</div>

							<div class="leftDetails">
								<ul>
									<li>Body Type :</li>
									<li class="form-group">
										<select class="form-control" name="body" required>
											<option selected disabled>Not Filled</option>
											<option value="Slim">Slim</option>
											<option value="Average">Average</option>
											<option value="Athletic">Athletic</option>
											<option value="Heavy">Heavy</option>
										</select>
									</li>
								</ul>
							</div>
							<div class="rightDetails">
								<ul>
									<li>Physical Status :</li>
									<li class="form-group">
										<select class="form-control" name="ps" required>
											<option selected disabled>Not Filled</option>
											<option value="Normal">Normal</option>
											<option value="Physical Challenged">Physical Challenged</option>
										</select>
									</li>
								</ul>
							</div>

							<div class="leftDetails">
								<ul>							
									<li>Eating Habits :</li>
									<li class="form-group">
										<select class="form-control" name="eating" required>
											<option selected disabled>Not Filled</option>
											<option value="Vegetarian">Vegetarian</option>
											<option value="Non-Vegetarian">Non-Vegetarian</option>
											<option value="Jain">Jain</option>
											<option value="Eggetarian">Eggetarian</option>
										</select>
									</li>
								</ul>
							</div>
							<div class="rightDetails">
								<ul>
									<li>Drinking Habits :</li>
									<li class="form-group">
										<select class="form-control" name="drinking" required>
											<option selected disabled>Not Filled</option>
											<option value="No">No</option>
											<option value="Yes">Yes</option>
											<option value="Occasionally">Occasionally</option>
										</select>
									</li>
								</ul>
							</div>

							<div class="leftDetails">
								<ul>
									<li>Smoking Habits :</li>
									<li class="form-group">
										<select class="form-control" name="smoking" required>
											<option selected disabled>Not Filled</option>
											<option value="No">No</option>
											<option value="Yes">Yes</option>
											<option value="Occasionally">Occasionally</option>
										</select>
									</li>
								</ul>
							</div>   
						</div> 
						<div class="prDetailsBlocks">
							<h2><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Education & Career</h2>
							<div class="leftDetails">
								<ul>
									<?php
										$CI =& get_instance();
										$CI->load->model('Register_model');
										$education = $CI->Register_model->getEducation();
									?>
									<li>Highest Education</li>
									<li class="form-group"> 
									<select name="highest_edu" class="form-control" >
										<option selected disabled>Not Filled</option>
										<?php foreach ($education as $key => $educationValue) { ?>
											<option value="<?=$educationValue->degree?>"><?=$educationValue->degree?></option>
										<?php } ?> 
										<option value="Other">Other</option>
									</select>
									</li>
								</ul>
							</div>
							<div class="rightDetails">
								<ul>
									<li>Bachelor's Degree</li>
									<li class="form-group"> 
										<select name="ug_degree" class="form-control">
											<option selected disabled>Not Filled</option>
											<?php foreach ($education as $key => $educationValue) { ?>
												<?php if ($educationValue->degree_type =='UG') { ?>
												<option value="<?=$educationValue->degree?>"><?=$educationValue->degree?></option>
											<?php } } ?>
											<option value="Other">Other</option>
										</select>
									</li>
								</ul>
							</div>
							<div class="leftDetails">
								<ul>
									<li >Other Degree/Diploma</li>
									<li class="form-group">
										<input type="text" name="oth_ug_degree" class="form-control" placeholder="Not Filled">
									</li>
								</ul>
							</div>
							<div class="rightDetails">
								<ul>
									<li>Employed In</li>
									<li class="form-group"> 
										<select name="emp_in" class="form-control" required>
											<option selected disabled>Not Filled</option>
											<option value="Private Sector">Private Sector</option>
											<option value="Government/Puboptionc Sector">Government/Puboptionc Sector</option>
											<option value="Civil Services">Civil Services</option>
											<option value="Defence">Defence</option>
											<option value="Business/ Self Employed">Business/ Self Employed</option>
											<option value="Not Working">Not Working</option>
										</select>
									</li>
								</ul>
							</div>
							<div class="leftDetails">
								<ul> 
									<?php
										$CI =& get_instance();
										$CI->load->model('Register_model');
										$occupation = $CI->Register_model->getOccupation();
									?>
									<li>Occupation</li>
									<li class="form-group"> 
										<select name="occupation" class="form-control">
											<option selected disabled>Not Filled</option>
											<?php foreach ($occupation as $key => $occupationValue) { ?>
											    <option value="<?=$occupationValue->occupation?>"><?=$occupationValue->occupation?></option>
											<?php } ?>
											    <option value="Others">Others</option> 
										</select>
									</li>
								</ul>
							</div>
							<div class="rightDetails">
								<ul>
									<li>Organization Name</li>
									<li class="form-group">
										<input type="text" name="org_name" class="form-control" placeholder="Not Filled">
									</li>
								</ul>
							</div>
							<div class="leftDetails">
								<ul>
									<li>Annual Income</li>
									<?php
										$CI =& get_instance();
										$CI->load->model('Register_model');
										$income = $CI->Register_model->getIncome();
									?>
									<li class="form-group"> 
										<select name="annual_income" class="form-control">
											<option selected disabled>Not Filled</option>
											<option value="0">No Income</option>
											<?php foreach ($income as $key => $incomeValue) { ?>
												<option value="<?=$incomeValue->income?>"><?=$incomeValue->name?></option>
											<?php } ?>
										</select>
									</li>
								</ul>
							</div>  

							<?php /* 
							<div class="rightDetails">
								<ul>
									<li style="display: none;">School/College Name</li>
									<li class="form-group" style="display: none;">
										<input type="text" name="schl_name" class="form-control" placeholder="School Name">
									</li>
									<li style="display: none;">School/College Name</li>
									<li class="form-group" style="display: none;">
										<input type="text" name="pg_degree" class="form-control" placeholder="PG Degree">
									</li> 
									<li style="display: none;">Other School/College Name</li>
									<li class="form-group" style="display: none;">
										<input type="text" name="oth_pg_degree" class="form-control" placeholder="Other PG Degree">
									</li>
								</ul>
							</div>
							*/ ?>
						</div> 
						<div class="prDetailsBlocks">
							<h2><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Family Details</h2>

							<div class="leftDetails">
								<ul>
									<li>Sister(s)</li>
									<li class="form-group"> 
										<select name="sister" class="form-control">
											<option selected disabled>Not Filled</option>
											<option value="None">None</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="3+">3+</option>
										</select>
									</li>
								</ul>
							</div>
							<div class="rightDetails">
								<ul>
									<li>Brother(s)</li>
									<li class="form-group">
										<select name="brother" class="form-control">
											<option selected disabled>Not Filled</option>
											<option value="None">None</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="3+">3+</option>
										</select>
									</li>
								</ul>
							</div>
							<div class="leftDetails">
								<ul>
									<?php foreach ($details as $key => $detailsValue) { ?>
										<?php if (strtoupper($detailsValue->religion) == 'HINDU') { ?>
									<li>Gothra</li>
									<li class="form-group"> 
										<select name="gothra" class="form-control">
											<option selected disabled>Not Filled</option>
											<option value="Not Known">Not Known</option>
											<option value="Agasti">Agasti</option>
											<option value="Angira">Angira</option>
											<option value="Atri">Atri</option>
											<option value="Aatreya">Aatreya</option>
											<option value="Bharadwaaj">Bharadwaaj</option>
											<option value="Dhananjaya">Dhananjaya</option>
											<option value="Garg">Garg</option>
											<option value="Gautam">Gautam</option>
											<option value="Ghrita Kaushik">Ghrita Kaushik</option>
											<option value="Kapil">Kapil</option>
											<option value="Kashyap">Kashyap</option>
											<option value="Kaudinya">Kaudinya</option>
											<option value="Kausalya">Kausalya</option>
											<option value="Kausik">Kausik</option>
											<option value="Kundin">Kundin</option>
											<option value="Mandaby">Mandaby</option>
											<option value="Maudagalya">Maudagalya</option>
											<option value="Parasar">Parasar</option>
											<option value="Ravi">Ravi</option>
											<option value="Sankhyayan">Sankhyayan</option>
											<option value="Shandilya">Shandilya</option>
											<option value="Upamanyu">Upamanyu</option>
											<option value="Vishwamitra">Vishwamitra</option>
											<option value="Vatsa">Vatsa</option>
											<option value="Vashishta">Vashishta</option>
										</select>
									</li>
									<?php } } ?>
								</ul>
							</div>
							<div class="rightDetails">
								<ul>
									<?php foreach ($details as $key => $detailsValue) { ?>
										<?php if (strtoupper($detailsValue->religion) == 'HINDU') { ?>
									<li>Gothra (Maternal)</li>
									<li class="form-group"> 
										<select name="gothra_maternal" class="form-control">
											<option selected disabled>Not Filled</option>
											<option value="Not Known">Not Known</option>
											<option value="Agasti">Agasti</option>
											<option value="Angira">Angira</option>
											<option value="Atri">Atri</option>
											<option value="Aatreya">Aatreya</option>
											<option value="Bharadwaaj">Bharadwaaj</option>
											<option value="Dhananjaya">Dhananjaya</option>
											<option value="Garg">Garg</option>
											<option value="Gautam">Gautam</option>
											<option value="Ghrita Kaushik">Ghrita Kaushik</option>
											<option value="Kapil">Kapil</option>
											<option value="Kashyap">Kashyap</option>
											<option value="Kaudinya">Kaudinya</option>
											<option value="Kausalya">Kausalya</option>
											<option value="Kausik">Kausik</option>
											<option value="Kundin">Kundin</option>
											<option value="Mandaby">Mandaby</option>
											<option value="Maudagalya">Maudagalya</option>
											<option value="Parasar">Parasar</option>
											<option value="Ravi">Ravi</option>
											<option value="Sankhyayan">Sankhyayan</option>
											<option value="Shandilya">Shandilya</option>
											<option value="Upamanyu">Upamanyu</option>
											<option value="Vishwamitra">Vishwamitra</option>
											<option value="Vatsa">Vatsa</option>
											<option value="Vashishta">Vashishta</option>
										</select>
									</li>
									<?php } }  ?>
								</ul>
							</div>
							<div class="leftDetails">
								<ul>
									<li>Family Status</li>
									<li class="form-group"> 
										<select name="family_status" class="form-control">
											<option selected disabled>Not Filled</option>
											<option value="Rich/Affluent">Rich/Affluent</option>
											<option value="Upper Middle">Upper Middle</option>
											<option value="Middle Class">Middle Class</option>
										</select>
									</li>
								</ul>
							</div>
							<div class="rightDetails">
								<ul>
									<li>Family Income</li>
									<li class="form-group"> 
										<select name="family_income" class="form-control">
											<option selected disabled>Not Filled</option>
											<option value="0">No Income</option>
											<?php foreach ($income as $key => $incomeValue) { ?>
												<option value="<?=$incomeValue->income?>"><?=$incomeValue->name?></option>
											<?php } ?>
										</select>
									</li>
								</ul>
							</div>
							<div class="leftDetails">
								<ul>
									<li>Family Type</li>
									<li class="form-group"> 
										<select name="family_type" class="form-control">
											<option selected disabled>Not Filled</option>
											<option value="Joint Family">Joint Family</option>
											<option value="Nuclear Family">Nuclear Family</option>
											<option value="Others">Others</option>
										</select>
									</li>
								</ul>
							</div>
							<div class="rightDetails">
								<ul>
									<li>Family based out of</li>
									<li class="form-group"> 
										<select name="family_based" class="form-control">
											<option selected disabled>Not Filled</option>
											<?php foreach ($india_state as $key => $stateValue) { ?>
												<option value="<?=$stateValue->state_name?>"><?=$stateValue->state_name?></option>
											<?php } ?>
										</select>
									</li>
								</ul>
							</div>
							<div class="leftDetails">
								<ul>
									<li>Living with parents?</li>
									<li class="form-group"> 
										<select name="living_wth_parents" class="form-control" >
											<option selected disabled>Not Filled</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
											<option value="Not Applicable">Not Applicable</option>
										</select>
									</li>
								</ul>
							</div>
							<div class="rightDetails">
								<ul>
									<li>Family Description :</li>
									<li class="form-group">
										<input type="text" name="address" class="form-control" placeholder="Not Filled">
									</li>
								</ul>
							</div>
							<div class="leftDetails">
								<ul>
									<li>Country :</li>
									<li class="form-group">
										<select class="form-control" name="country" onchange="selectState1()" id="countryName1">
											<option value="" selected="" disabled>Select Country</option>
											<?php foreach ($country as $key => $countryValue) { ?>
												<option value="<?=$countryValue->country_name?>" <?= $countryValue->country_name == 'India' ? 'selected' : '' ?> ><?=$countryValue->country_name?></option>
											<?php } ?>
										</select>
									</li>
								</ul>
							</div>
							<div class="rightDetails">
								<ul>
									<li>State :</li>
									<li class="form-group">
										<select class="form-control" name="state" onchange="selectCity1()" id="stateName1">
											<option value="" selected="" disabled>Select State</option>
											<?php foreach ($india_state as $key => $stateValue) { ?>
												<option value="<?=$stateValue->state_name?>"><?=$stateValue->state_name?></option>
											<?php } ?>
										</select>
									</li>
								</ul>
							</div>
							<div class="leftDetails">
								<ul>
									<li>City :</li>
									<li class="form-group">
										<select class="form-control" name="city" id="myCity1">
											<option disabled selected>Select City</option>
										</select>
									</li>
								</ul>
							</div>
							<div class="rightDetails">
								<ul>
									<li>Pincode :</li>
									<li class="form-group">
										<input type="text" name="pin" placeholder="Not Filled"  maxlength="6" onkeypress="return (event.charCode > 47 && event.charCode < 58)" class="form-control" value="">
									</li>
								</ul>
							</div> 
							<?php /*
							<div class="leftDetails">
								<ul>
									<li style="display: none;">Mother's Name</li>
									<li class="form-group" style="display: none;">
										<input type="text" name="mother" class="form-control" placeholder="Enter your Mother's Name" required>
									</li>
								</ul>
							</div>
							<div class="rightDetails">
								<ul>
									<li  style="display: none;">Father's Name</li>
									<li class="form-group"  style="display: none;">
										<input type="text" name="father" class="form-control" placeholder="Enter your Father's Name" required>
									</li>
								</ul>
							</div>
							*/ ?>
						</div> 
						<div class="prDetailsBlocks">
							<input type="submit" name="" class="form-control" value="Submit">
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<?php
		$CI =& get_instance();
		$CI->load->model('Register_model');
		$cal = $CI->Register_model->getProfileAllDetailsForCal($detailsValue->user_id); 
	?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
	<script>

		// Country state AJAX NO:1
		function selectState1()
		{
			var country = $("#countryName1").val(); 
			$('#stateName1')
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
					$('#stateName1')
			         .append($("<option></option>")
			                    .attr("value",data[i])
			                    .text(data[i])); 
					}
				}
			});
		}

		function selectCity1()
		{
			var state = $("#stateName1").val();
			var country = $("#countryName1").val(); 
			$('#myCity1')
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
					$('#myCity1')
			         .append($("<option></option>")
			                    .attr("value",data[i])
			                    .text(data[i])); 
					}
				}
			});
		}
		selectCity1();
		//END OF AJAX NO:1

		// Country state AJAX NO:2
		function selectState2()
		{
			var country = $("#countryName2").val(); 
			$('#stateName2')
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
					$('#stateName2')
			         .append($("<option></option>")
			                    .attr("value",data[i])
			                    .text(data[i])); 
					}
				}
			});
		}

		function selectCity2()
		{
			var state = $("#stateName2").val();
			var country = $("#countryName2").val(); 
			$('#myCity2')
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
					$('#myCity2')
			         .append($("<option></option>")
			                    .attr("value",data[i])
			                    .text(data[i])); 
					}
				}
			});
		}
		//END OF AJAX NO:2

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

		// var chartData = [{"visitor": 39, "visit": "Photos"}, {"visitor": 23, "visit": "About You & Family"}, {"visitor": 23, "visit": "Lifestyle Details"}, {"visitor": 15, "visit": "Career Details"}]
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

	</script>
	<?php include "footer.php" ?>