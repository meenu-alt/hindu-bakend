	<?php
		$CI =& get_instance();
		$CI->load->model('Register_model');
		$india_state = $CI->Register_model->getIndiaState();
		$country = $CI->Register_model->getCountry();
		$language = $CI->Register_model->getLanguage();
		$income = $CI->Register_model->getIncome();
		$religion = $CI->Register_model->getReligion();
		$occupation = $CI->Register_model->getOccupation();
		$education = $CI->Register_model->getEducation();
	?>
	<?php include "header.php" ?>
	<div id="patnerDiv">
	<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
	<section class="profile">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box fadeInUp animated-fast">
					<h2>Desired Partner Profile</h2>
				</div>
			</div>
			<div class="row" id="desiredPartnerPage"> 
				<div class="col-md-12">
					<?php if (!empty($detail)) { ?>
					<?php foreach ($detail as $key => $detailValue){  ?>
					<div class="prDetailsBlocks">
						<div class="dpCenter">
							<h2><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Basic Details</h2>
							<a class="basicHide"  id="basicEdit"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Edit</a>
						</div> 
						<div class="dpContent basicHide">
							<ul>
								<li>Age</li>
								<li>
									<?php 
										if (!empty($detailValue->age)) {
											$age = explode(', ', $detailValue->age); echo $age[0].' - '.$age[1].' years of age';
										}
									?>
								</li>
							</ul>
							<ul>
								<li>Height</li>
								<li>
									<?php 
										if (!empty($detailValue->height)) {
											$height = explode(', ', $detailValue->height); 
											$minHight = explode('.', $height[0]);
											$maxHight = explode('.', $height[1]);
											echo $minHight[0]."'".$minHight[1].'" - '.$maxHight[0]."'".$maxHight[1].'"';
										}
									?>
								</li>
							</ul>
							<ul>
								<li>Marital Status</li>
								<li><?=$detailValue->marital_status?></li>
							</ul>
							<ul>
								<li>Country</li>
								<li><?=$detailValue->country?></li>
							</ul>
							<ul>
								<li>State</li>
								<li><?=$detailValue->state?></li>
							</ul>								
								 
						</div> 
						<div class="basicShow" style="display: none">
							<div class="dpFormContent">
								<form action="<?=base_url('Register_controller/updateDpBasicDetails')?>" method="post">
							<ul class="dpFormUl">
								<li>Age</li>
								<li class="form-group dpSplitsFirst" >
									<label>Minimum Age</label>
									<select class="form-control" id="minAge" onchange="max_age()"  name="age[]" required>
										<option value="" disabled>Please Select</option>
										<option selected  value="21">21</option>
										<option value="22">22</option>
										<option value="23">23</option>
										<option value="24">24</option>
										<option value="25">25</option>
										<option value="26">26</option>
										<option value="27">27</option>
										<option value="28">28</option>
										<option value="29">29</option>
										<option value="30">30</option>
										<option value="31">31</option>
										<option value="32">32</option>
										<option value="33">33</option>
										<option value="34">34</option>
										<option value="35">35</option>
										<option value="36">36</option>
										<option value="37">37</option>
										<option value="38">38</option>
										<option value="39">39</option>
										<option value="40">40</option>
										<option value="41">41</option>
										<option value="42">42</option>
										<option value="43">43</option>
										<option value="44">44</option>
										<option value="45">45</option>
										<option value="46">46</option>
										<option value="47">47</option>
										<option value="48">48</option>
										<option value="49">49</option>
										<option value="50">50</option>
										<option value="51">51</option>
										<option value="52">52</option>
										<option value="53">53</option>
										<option value="54">54</option>
										<option value="55">55</option>
										<option value="56">56</option>
										<option value="57">57</option>
										<option value="58">58</option>
										<option value="59">59</option>
										<option value="60">60</option>
										<option value="61">61</option>
										<option value="62">62</option>
										<option value="63">63</option>
										<option value="64">64</option>
										<option value="65">65</option>
										<option value="66">66</option>
										<option value="67">67</option>
										<option value="68">68</option>
										<option value="69">69</option>
										<option value="70">70</option>
										<option value="71">71</option>
										<option value="72">72</option>
										<option value="73">73</option>
										<option value="74">74</option>
										<option value="75">75</option>
									</select>
								</li>
								<li class="form-group dpSplitsSecond" >
									<label>Maximum Age</label>
									<select class="form-control" id="maxAge" onchange="min_age()" name="age[]" required>
										<option value="" disabled>Please Select</option>
										<option value="21">21</option>
										<option value="22">22</option>
										<option value="23">23</option>
										<option value="24">24</option>
										<option value="25">25</option>
										<option value="26">26</option>
										<option value="27">27</option>
										<option value="28">28</option>
										<option value="29">29</option>
										<option value="30">30</option>
										<option value="31">31</option>
										<option value="32">32</option>
										<option value="33">33</option>
										<option value="34">34</option>
										<option value="35">35</option>
										<option value="36">36</option>
										<option value="37">37</option>
										<option value="38">38</option>
										<option value="39">39</option>
										<option value="40">40</option>
										<option value="41">41</option>
										<option value="42">42</option>
										<option value="43">43</option>
										<option value="44">44</option>
										<option value="45">45</option>
										<option value="46">46</option>
										<option value="47">47</option>
										<option value="48">48</option>
										<option value="49">49</option>
										<option value="50"  selected  >50</option>
										<option value="51">51</option>
										<option value="52">52</option>
										<option value="53">53</option>
										<option value="54">54</option>
										<option value="55">55</option>
										<option value="56">56</option>
										<option value="57">57</option>
										<option value="58">58</option>
										<option value="59">59</option>
										<option value="60">60</option>
										<option value="61">61</option>
										<option value="62">62</option>
										<option value="63">63</option>
										<option value="64">64</option>
										<option value="65">65</option>
										<option value="66">66</option>
										<option value="67">67</option>
										<option value="68">68</option>
										<option value="69">69</option>
										<option value="70">70</option>
										<option value="71">71</option>
										<option value="72">72</option>
										<option value="73">73</option>
										<option value="74">74</option>
										<option value="75">75</option>
									</select>
								</li>
							</ul>
							<ul  class="dpFormUl">
								<li>Height</li>
								<li class="form-group dpSplitsFirst" >
									<label>Minimum Height</label>
									<select class="form-control" id="minHeight" name="height[]" required>
										<option value="" disabled>Please Select</option>
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
										<option value="5.8"  selected="selected">5' 8" (1.73 mts)</option>
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
										<option value="6.6">6' 6" (1.98 mts)</option>
										<option value="6.7">6' 7" (2.00 mts)</option>
										<option value="6.8">6' 8" (2.03 mts)</option>
										<option value="6.9">6' 9" (2.05 mts)</option>
										<option value="6.10">6' 10" (2.08 mts)</option>
										<option value="6.11">6' 11" (2.10 mts)</option>
										<option value="7.0">7' 0" (2.13 mts)</option>
									</select>
								</li>
								<li class="form-group dpSplitsSecond" >
									<label>Maximum Height</label>
									<select class="form-control" id="maxHeight"  name="height[]" required>
										<option value="" disabled>Please Select</option>
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
										<option value="5.8"  selected="selected">5' 8" (1.73 mts)</option>
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
										<option value="6.6">6' 6" (1.98 mts)</option>
										<option value="6.7">6' 7" (2.00 mts)</option>
										<option value="6.8">6' 8" (2.03 mts)</option>
										<option value="6.9">6' 9" (2.05 mts)</option>
										<option value="6.10">6' 10" (2.08 mts)</option>
										<option value="6.11">6' 11" (2.10 mts)</option>
										<option value="7.0">7' 0" (2.13 mts)</option>
									</select>
								</li>
							</ul>
							<ul  class="dpFormUl">
								<li>Marital Status</li>
								<li class="form-group dpSplitsFull">
								<select name="ms[]" class="form-control" required id="maritalStatusHH" multiple="multiple" > 
									<option value="Never Married">Never Married</option>
									<option value="Married">Married</option>
									<option value="Awaiting Divorce">Awaiting Divorce</option>
									<option value="Divorced">Divorced</option>
									<option value="Widowed">Widowed</option>
									<option value="Annulled">Annulled</option>
								</select>
							</li>
							</ul>
							<ul  class="dpFormUl">
								<li>Country</li>
								<li class="form-group dpSplitsFull">
								<select class="form-control" name="country" onchange="selectState()" id="countryName" required >
									<option value="" selected="" disabled>Select Country</option>
									<?php foreach ($country as $key => $countryValue) { ?>
										<?php if ($countryValue->country_name == $detailValue->country){ ?>
											<option value="<?=$countryValue->country_name?>" selected ><?=$countryValue->country_name?></option>

										<?php } else { ?>
											<option value="<?=$countryValue->country_name?>"><?=$countryValue->country_name?></option>
										<?php } ?>
									<?php } ?>
								</select>
							</li>
							</ul>
							<?php
								$getState = $CI->Register_model->getState($detailValue->country);
							?>
							<ul  class="dpFormUl">
								<li>State</li>
								<li class="form-group dpSplitsFull">
								<select class="form-control" name="state[]" id="stateNameHH" multiple="multiple">
									<?php foreach ($getState as $key => $stateValue) { ?>
										<?php $stateArray = explode(', ', $detailValue->state); if (in_array($stateValue->state_name, $stateArray)){ ?>
											<option value="<?=$stateValue->state_name?>" selected><?=$stateValue->state_name?></option>

										<?php } else { ?>
											<option value="<?=$stateValue->state_name?>"><?=$stateValue->state_name?></option>
										<?php } ?>
									<?php } ?>
								</select>
							</li>
							</ul>
							<ul  class="dpFormUlSubmit">
								<li class="form-group">
									<input type="submit" name="" value="SAVE">
								</li>
							</ul>

							</form>
						</div>
						</div>
					</div>
					<div class="prDetailsBlocks">
						<div class="dpCenter">
							<h2><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Religion & Ethnicity</h2>
							<a href="#" id="religionEdit" class="religionHide"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Edit</a>
						</div> 
						<div class="dpContent religionHide">
							<ul>
								<li>Religion</li>
								<li><?=ucfirst(strtolower($detailValue->religion))?></li>
							</ul>
							<ul>
								<li>Caste</li>
								<li><?=$detailValue->caste?></li>
							</ul> 
							<ul>
								<li>Mother Tongue</li>
								<li><?=$detailValue->mother_tongue?></li>
							</ul>
						</div> 
						<div class="religionShow" style="display: none">
							<div class="dpFormContent">
								<form action="<?=base_url('Register_controller/updateDpReligionEthnicity')?>" method="post"> 

							<ul  class="dpFormUl">
								<li>Religion</li>
								<li class="form-group dpSplitsFull">
									<select name="religion" class="form-control"  onchange ="selectCaste()" id="myReligion" required >
									<option value="">Please Select</option>
									<?php foreach ($religion as $key => $religionValue) { ?>
										<?php if (ucfirst(strtolower($religionValue->religion)) == $detailValue->religion){ ?>
											<option value="<?=ucfirst(strtolower($religionValue->religion))?>" selected><?=ucfirst(strtolower($religionValue->religion))?></option>
										<?php } else { ?>
											<option value="<?=ucfirst(strtolower($religionValue->religion))?>"><?=ucfirst(strtolower($religionValue->religion))?></option>
										<?php } ?>
									<?php } ?> 
									</select>
								</li>
							</ul> 
							<?php
								$getCaste = $CI->Register_model->selectCaste($detailValue->religion);
							?>
							<ul  class="dpFormUl">
								<li>Caste</li>
								<li class="form-group  dpSplitsFull"> 
								<select name="caste[]" class="form-control" id="myCaste" required multiple="multiple"  >
									<?php foreach ($getCaste as $key => $casteValue) { ?>
										<?php $casteArray = explode(', ', $detailValue->caste); if (in_array(ucfirst(strtolower($casteValue->caste)), $casteArray)){ ?>
											<option value="<?=ucfirst(strtolower($casteValue->caste))?>" selected><?=ucfirst(strtolower($casteValue->caste))?></option>
										<?php } else { ?>
											<option value="<?=ucfirst(strtolower($casteValue->caste))?>"><?=ucfirst(strtolower($casteValue->caste))?></option>
										<?php } ?>
									<?php } ?>
								</select> 
							</li>
							</ul> 
							<ul  class="dpFormUl">
								<li>Mother Tongue</li>
								<li class="form-group dpSplitsFull">
								<select name="motherTongue[]" class="form-control" id="motherToungHH" required multiple="multiple">
									<?php foreach ($language as $key => $languageValue) { ?>
										<?php $languageArray = explode(', ', $detailValue->mother_tongue); if (in_array($languageValue->language, $languageArray)){ ?>
											<option value="<?=$languageValue->language?>" selected><?=$languageValue->language?></option>
										<?php } else { ?>
											<option value="<?=$languageValue->language?>"><?=$languageValue->language?></option>
										<?php } ?>
									<?php } ?>
								</select>
							</li>
							</ul>
							<ul  class="dpFormUlSubmit">
								<li class="form-group">
									<input type="submit" name="" value="SAVE">
								</li>
							</ul>

							</form>
						</div>
						</div>
					</div>  
					<div class="prDetailsBlocks" style="border-bottom: unset;">
						<div class="dpCenter">
							<h2><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Education & Work</h2>
							<a href="#"  id="educationEdit" class="educationHide"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Edit</a>
						</div> 
						<div class="dpContent educationHide">
							<ul>
								<li>Highest Education</li>
								<li><?=$detailValue->highest_education?></li>
							</ul>
							<ul>
								<li>Occupation</li>
								<li><?=$detailValue->occupation?></li>
							</ul> 
							<ul>
								<li>Income</li>
								<li>
									<?php
										foreach ($income as $key => $incomeValue) {
											if ($detailValue->income == $incomeValue->income ) {
												echo $incomeValue->name;
											}
										}
									?>									
								</li>
							</ul>
						</div> 

						<div class="educationShow"  style="display: none">
							<div class="dpFormContent">
								<form action="<?=base_url('Register_controller/updateDpEducationWork')?>" method="post">  
							<ul  class="dpFormUl">
								<li>Highest Education</li>
								<li class="form-group dpSplitsFull">
								<select name="h_education[]" class="form-control" required id="highestEducationHH" multiple="multiple">
									<?php foreach ($education as $key => $educationValue) { ?>
										<?php $hEduArray = explode(', ', $detailValue->highest_education); if (in_array($educationValue->degree, $hEduArray)){ ?>
											<option value="<?=$educationValue->degree?>" selected><?=$educationValue->degree?></option>
										<?php } else { ?>
											<option value="<?=$educationValue->degree?>"><?=$educationValue->degree?></option>
										<?php } ?>
									<?php } ?> 
								</select>
							</li>
							</ul>  
							<ul  class="dpFormUl">
								<li>Occupation</li>
								<li class="form-group dpSplitsFull">
								<select name="occupation[]" class="form-control" required  id="occupationHH" multiple="multiple" >
									<?php foreach ($occupation as $key => $occupationValue) { ?>
										<?php $occupationArray = explode(', ', $detailValue->occupation); if (in_array($occupationValue->occupation, $occupationArray)){ ?>
											<option value="<?=$occupationValue->occupation?>" selected><?=$occupationValue->occupation?></option>
										<?php } else { ?>
											<option value="<?=$occupationValue->occupation?>"><?=$occupationValue->occupation?></option>
										<?php } ?>
									<?php } ?>
										<option value="Others">Others</option> 
								</select>
							</li>
							</ul> 
							<ul  class="dpFormUl">
								<li>Income</li>
								<li class="form-group dpSplitsFull">
								<select name="income" class="form-control" required>
									<?php foreach ($income as $key => $incomeValue) { ?>
										<?php if ($incomeValue->income == $detailValue->income){ ?>
											<option value="<?=$incomeValue->income?>" selected><?=$incomeValue->name?></option>
										<?php } else { ?>
											<option value="<?=$incomeValue->income?>"><?=$incomeValue->name?></option>
										<?php } ?>
									<?php } ?>
								</select>
							</li>
							</ul>
							<ul  class="dpFormUlSubmit">
								<li class="form-group">
									<input type="submit" name="" value="SAVE">
								</li>
							</ul>

							</form>
						</div>
						</div>
					</div> 
					<script>  
						$('#minAge option[value="<?=$age[0]?>"]').attr("selected","selected");
						$('#maxAge option[value="<?=$age[1]?>"]').attr("selected","selected");
						$('#minHeight option[value="<?=$height[0]?>"]').attr("selected","selected");
						$('#maxHeight option[value="<?=$height[1]?>"]').attr("selected","selected");

						<?php $aa= explode(', ', $detailValue->marital_status); ?>
						<?php foreach ($aa as $key => $value) { ?>
							$('#maritalStatusHH option[value="<?=$value?>"]').attr("selected","selected");
						<?php } ?>
					</script>
					<?php } ?>
					<?php } else { ?>

					<form action="<?=base_url('Register_controller/insertDesiredPartner')?>" method="post">
						<div class="prDetailsBlocks">
							<div class="dpCenter">
								<h2><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Basic Details</h2>
							</div> 
							<div class="basicShow">
							<div class="dpFormContent">
							<ul class="dpFormUl">
								<li>Age</li>
								<li class="form-group dpSplitsFirst" >
									<label>Minimum Age</label>
									<select class="form-control" id="minAge" onchange="max_age()"  name="age[]" required>
										<option value="" disabled>Please Select</option>
										<option value="21"  selected>21</option>
										<option value="22">22</option>
										<option value="23">23</option>
										<option value="24">24</option>
										<option value="25">25</option>
										<option value="26">26</option>
										<option value="27">27</option>
										<option value="28">28</option>
										<option value="29">29</option>
										<option value="30">30</option>
										<option value="31">31</option>
										<option value="32">32</option>
										<option value="33">33</option>
										<option value="34">34</option>
										<option value="35">35</option>
										<option value="36">36</option>
										<option value="37">37</option>
										<option value="38">38</option>
										<option value="39">39</option>
										<option value="40">40</option>
										<option value="41">41</option>
										<option value="42">42</option>
										<option value="43">43</option>
										<option value="44">44</option>
										<option value="45">45</option>
										<option value="46">46</option>
										<option value="47">47</option>
										<option value="48">48</option>
										<option value="49">49</option>
										<option value="50">50</option>
										<option value="51">51</option>
										<option value="52">52</option>
										<option value="53">53</option>
										<option value="54">54</option>
										<option value="55">55</option>
										<option value="56">56</option>
										<option value="57">57</option>
										<option value="58">58</option>
										<option value="59">59</option>
										<option value="60">60</option>
										<option value="61">61</option>
										<option value="62">62</option>
										<option value="63">63</option>
										<option value="64">64</option>
										<option value="65">65</option>
										<option value="66">66</option>
										<option value="67">67</option>
										<option value="68">68</option>
										<option value="69">69</option>
										<option value="70">70</option>
										<option value="71">71</option>
										<option value="72">72</option>
										<option value="73">73</option>
										<option value="74">74</option>
										<option value="75">75</option>
									</select>
								</li>
								<li class="form-group dpSplitsSecond" >
									<label>Maximum Age</label>
									<select class="form-control" id="maxAge" onchange="min_age()" name="age[]" required>
										<option value="" disabled>Please Select</option>
										<option value="21">21</option>
										<option value="22">22</option>
										<option value="23">23</option>
										<option value="24">24</option>
										<option value="25">25</option>
										<option value="26">26</option>
										<option value="27">27</option>
										<option value="28">28</option>
										<option value="29">29</option>
										<option value="30">30</option>
										<option value="31">31</option>
										<option value="32">32</option>
										<option value="33">33</option>
										<option value="34">34</option>
										<option value="35">35</option>
										<option value="36">36</option>
										<option value="37">37</option>
										<option value="38">38</option>
										<option value="39">39</option>
										<option value="40"   selected>40</option>
										<option value="41">41</option>
										<option value="42">42</option>
										<option value="43">43</option>
										<option value="44">44</option>
										<option value="45">45</option>
										<option value="46">46</option>
										<option value="47">47</option>
										<option value="48">48</option>
										<option value="49">49</option>
										<option value="50">50</option>
										<option value="51">51</option>
										<option value="52">52</option>
										<option value="53">53</option>
										<option value="54">54</option>
										<option value="55">55</option>
										<option value="56">56</option>
										<option value="57">57</option>
										<option value="58">58</option>
										<option value="59">59</option>
										<option value="60">60</option>
										<option value="61">61</option>
										<option value="62">62</option>
										<option value="63">63</option>
										<option value="64">64</option>
										<option value="65">65</option>
										<option value="66">66</option>
										<option value="67">67</option>
										<option value="68">68</option>
										<option value="69">69</option>
										<option value="70">70</option>
										<option value="71">71</option>
										<option value="72">72</option>
										<option value="73">73</option>
										<option value="74">74</option>
										<option value="75">75</option>
									</select>
								</li>
							</ul>
						
						
						
						
						
													<ul  class="dpFormUl">
								<li>Height</li>
								<li class="form-group dpSplitsFirst" >
									<label>Minimum Height</label>
									<select class="form-control"  name="height[]" required>
										<option value="" disabled>Please Select</option>
										<option value="4.0" selected="selected">4' 0" (1.22 mts)</option>
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
										<option value="6.6">6' 6" (1.98 mts)</option>
										<option value="6.7">6' 7" (2.00 mts)</option>
										<option value="6.8">6' 8" (2.03 mts)</option>
										<option value="6.9">6' 9" (2.05 mts)</option>
										<option value="6.10">6' 10" (2.08 mts)</option>
										<option value="6.11">6' 11" (2.10 mts)</option>
										<option value="7.0">7' 0" (2.13 mts)</option>
									</select>
								</li>
								<li class="form-group dpSplitsSecond" >
									<label>Maximum Height</label>
									<select class="form-control"  name="height[]" required>
										<option value="" disabled>Please Select</option>
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
										<option value="6.0" selected="selected">6' 0" (1.83 mts)</option>
										<option value="6.1">6' 1" (1.85 mts)</option>
										<option value="6.2">6' 2" (1.87 mts)</option>
										<option value="6.3">6' 3" (1.90 mts)</option>
										<option value="6.4">6' 4" (1.93 mts)</option>
										<option value="6.5">6' 5" (1.95 mts)</option>
										<option value="6.6">6' 6" (1.98 mts)</option>
										<option value="6.7">6' 7" (2.00 mts)</option>
										<option value="6.8">6' 8" (2.03 mts)</option>
										<option value="6.9">6' 9" (2.05 mts)</option>
										<option value="6.10">6' 10" (2.08 mts)</option>
										<option value="6.11">6' 11" (2.10 mts)</option>
										<option value="7.0">7' 0" (2.13 mts)</option>
									</select>
								</li>
							</ul>
							<ul  class="dpFormUl">
								<li>Marital Status</li>
								<li class="form-group dpSplitsFull">
								<select name="ms[]" class="form-control" required id="maritalStatusHH" multiple="multiple" > 
									<option value="Never Married" >Never Married</option>
									<option value="Married">Married</option>
									<option value="Awaiting Divorce">Awaiting Divorce</option>
									<option value="Divorced">Divorced</option>
									<option value="Widowed">Widowed</option>
									<option value="Annulled">Annulled</option>
								</select>
							</li>
							</ul>
							<ul  class="dpFormUl">
								<li>Country</li>
								<li class="form-group dpSplitsFull">
								<select class="form-control" name="country" onchange="selectState()" id="countryName" required >
									<option value="" selected="" disabled>Select Country</option>
									<?php foreach ($country as $key => $countryValue) { ?>
										<option value="<?=$countryValue->country_name?>"><?=$countryValue->country_name?></option>
									<?php } ?>
								</select>
							</li>
							</ul>
							<ul  class="dpFormUl">
								<li>State</li>
								<li class="form-group dpSplitsFull">
								<select class="form-control" name="state[]" id="stateNameHH" multiple="multiple" required >
									<option value="" selected disabled>Select State</option>
								</select>
							</li>
							</ul>
							<!-- <ul  class="dpFormUl">
								<li>City</li>
								<li class="form-group dpSplitsFull">
								<select name="city[]" class="form-control" required  id="cityHH" multiple="multiple" > 
									<option disabled selected>Select City</option>
								</select>
							</li>
							</ul> -->
						</div>
						</div>
						</div>
						<div class="prDetailsBlocks">
							<div class="dpCenter">
								<h2><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Religion & Ethnicity</h2>
							</div> 
							<div class="religionShow">
							<div class="dpFormContent">
							<ul  class="dpFormUl">
								<li>Religion</li>
								<li class="form-group dpSplitsFull">
									<select name="religion" class="form-control"  onchange ="selectCaste()" id="myReligion" required >
									<option value="">Please Select</option>
									<?php foreach ($religion as $key => $religionValue) { ?>
							   			<option value="<?=ucfirst(strtolower($religionValue->religion))?>"><?=ucfirst(strtolower($religionValue->religion))?></option>
									<?php } ?> 
									</select>
								</li>
							</ul> 
							<ul  class="dpFormUl">
								<li>Caste</li>
								<li class="form-group  dpSplitsFull"> 
								<select name="caste[]" class="form-control" id="myCaste" required multiple="multiple"  >
								</select> 
							</li>
							</ul> 
							<ul  class="dpFormUl">
								<li>Mother Tongue</li>
								<li class="form-group dpSplitsFull">
								<select name="motherTongue[]" class="form-control" id="motherToungHH" required multiple="multiple">
									<?php foreach ($language as $key => $languageValue) { ?>
								   		<option value="<?=$languageValue->language?>"><?=$languageValue->language?></option>
									<?php } ?>
								</select>
							</li>
							</ul>
						</div>
						</div>
						</div>
						<div class="prDetailsBlocks" style="border-bottom: unset;">
							<div class="dpCenter">
								<h2><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Education & Work</h2>
							</div>
							<div class="educationShow">
							<div class="dpFormContent">
							<ul  class="dpFormUl">
								<li>Highest Education</li>
								<li class="form-group dpSplitsFull">
								<select name="h_education[]" class="form-control" required id="highestEducationHH" multiple="multiple">
									<?php foreach ($education as $key => $educationValue) { ?>
										<option value="<?=$educationValue->degree?>"><?=$educationValue->degree?></option>
									<?php } ?> 
								</select>
							</li>
							</ul>  
							<ul  class="dpFormUl">
								<li>Occupation</li>
								<li class="form-group dpSplitsFull">
								<select name="occupation[]" class="form-control" required  id="occupationHH" multiple="multiple" >
									<?php foreach ($occupation as $key => $occupationValue) { ?>
										<option value="<?=$occupationValue->occupation?>"><?=$occupationValue->occupation?></option>
									<?php } ?>
										<option value="Others">Others</option> 
								</select>
							</li>
							</ul> 
							<ul  class="dpFormUl">
								<li>Income</li>
								<li class="form-group dpSplitsFull">
								<select name="income" class="form-control" required>
									<?php foreach ($income as $key => $incomeValue) { ?>
										<option value="<?=$incomeValue->income?>"><?=$incomeValue->name?></option>
									<?php } ?>
								</select>
							</li>
							</ul>
							<ul  class="dpFormUlSubmit">
								<li class="form-group">
									<input type="submit" name="" value="SAVE">
								</li>
							</ul>
						</div>
						</div>
						</div>  
					</form>
				<?php } ?>
				</div> 
			</div>
			
		</div>
	</section>
	<script>
		function selectState()
		{
			var country = $("#countryName").val();
			$('#stateNameHH')
			    .empty()
			;
			$.ajax({
				url: "<?=base_url()?>Register_controller/selectState",
				dataType:'json',
				method: "POST",
				data:{country:country},
			 	success: function(data)
				{
					for(i=0; i<data.length; i++){
					$('#stateNameHH')
			         .append($("<option></option>")
			                    .attr("value",data[i])
			                    .text(data[i])); 
					}
					$("#stateNameHH").multiselect('rebuild');
				}
			});
		}
		function selectCity()
		{
			var state = $("#stateName").val();
			var country = $("#countryName").val();
			$('#cityHH')
			    .empty()
			;
			$.ajax({
				url: "<?=base_url()?>Register_controller/selectCity",
				dataType:'json',
				method: "POST",
				data:{state:state, country:country},
			 	success: function(data)
				{
					for(i=0; i<data.length; i++){
					$('#cityHH')
			         .append($("<option></option>")
			                    .attr("value",data[i])
			                    .text(data[i])); 
					}
					$("#cityHH").multiselect('rebuild');
				}
			});
		}
		


		// Hide Basic Section  
		$("#basicEdit").click(function() {
		    $(".basicShow").show();
		    $(".basicHide").hide();
		});
  
		$("#religionEdit").click(function() {
		    $(".religionShow").show();
		    $(".religionHide").hide();
		});
  
		$("#educationEdit").click(function() {
		    $(".educationShow").show();
		    $(".educationHide").hide();
		});

		
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
	<script>
		
		// Multiple Select 
		$(".chosen-select").chosen({
		  no_results_text: "Oops, nothing found!"
		});

		$( document ).ready(function() {
		    var looking_for = "<?=$_SESSION['looking_for']?>";
			if (looking_for == 'Bride') {
				$("#minAge option").show();
				$("#maxAge option").show();
			} else{
				$("#minAge option[value=18]").hide();
				$("#minAge option[value=19]").hide();
				$("#minAge option[value=20]").hide();
				$("#minAge option[value=21]").attr('selected', 'selected');

				$("#maxAge option[value=18]").hide();
				$("#maxAge option[value=19]").hide();
				$("#maxAge option[value=20]").hide();
				$("#maxAge option[value=21]").attr('selected', 'selected');
			}
		});

		
	</script>
	<script>
		function selectCaste()
		{
			var religion = $("#myReligion").val();
			// var multi = 1;
			$.ajax({
				url: "<?=base_url()?>Register_controller/selectCaste",
				method: "POST",
				dataType:'json',
				data:{religion:religion},
			 	success: function(data)
				{
					// $('#selectCaste').hide();
					// $('#multiMyCaste').html(data);
					for(i=0; i<data.length; i++){
					$('#myCaste')
			         .append($("<option></option>")
			                    .attr("value",data[i])
			                    .text(data[i])); 
					}
					$("#myCaste").multiselect('rebuild');
				}
			});
		}

		function max_age(){
			var minAge = $("#minAge").val();
			$("#maxAge option").show();
			for (var i = 18; i < minAge; i++) {
				$("#maxAge option[value="+i+"]").hide();
			}
		}

		function min_age(){
			var maxAge = $("#maxAge").val();
			$("#minAge option").hide();
			for (var i = 18; i < maxAge; i++) {
				$("#minAge option[value="+i+"]").show();
			}
		}
		
	</script>
	<!-- <input type="file" id="fileField">
<input type="button" value="Click here!" onclick="getFileName()">

<script>
function getFileName() {
  var fileEl = document.getElementById("fileField");
  console.log(fileEl.value);
  // other stuff, e.g. send fileEl.value using XMLHttpRequest
}
</script> -->
	</div>

	<?php include "footer.php" ?>