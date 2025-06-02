<?php
	$CI =& get_instance();
	$CI->load->model('Register_model');
	$religion = $CI->Register_model->getReligion();
	$getTestimonials = $CI->Register_model->getTestimonials();
	$getSuccessStory = $CI->Register_model->getSuccessStory();
	$getBannerImage = $CI->Register_model->getBannerImage();
	$getNumberCounter = $CI->Register_model->getNumberCounter();
	$getRecentUpload = $CI->Register_model->getRecentUpload();
	// $state = $CI->Register_model->getState();
?>
<?php
if (isset($_SESSION['id'])) {
	include "header.php";
} else {
	include "indexheader.php";
}
?>
<?php foreach ($getBannerImage as $key => $getBannerImageValue) {
	$bannerImage = $getBannerImageValue->banner_image;
} ?>
<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(<?=base_url().$bannerImage?>);" data-stellar-background-ratio="0.5">
	<div class="overlay"></div> 
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center animate-box" id="sliderCaption"> 
					<h3>Find Your Perfect Match at Hello Humsafar</h3> 
				</div>
			</div>
			<?php /* foreach ($getSuccessStory as $key => $getSuccessStoryVal) { ?>
				<div class="couple-wrap animate-box">
					<div class="couple-half">
						<div class="groom">
							<img src="<?=base_url().$getSuccessStoryVal->groom_image?>" alt="groom" class="img-responsive">
						</div> 
					</div>
					<p class="heart text-center"><i class="icon-heart2"></i></p>
					<div class="couple-half">
						<div class="bride">
							<img src="<?=base_url().$getSuccessStoryVal->bride_image?>" alt="groom" class="img-responsive">
						</div> 
					</div>
				</div>
			<?php } */ ?>
		</div> 
	<div class="searchBar">
		<div class="container">
			<div class="row">
			    <?php if (isset($_SESSION['id'])) { ?>
    				<form class="formBackground" action="<?=base_url('mycon/filter_match')?>" method="get">
    			<?php } else { ?>
    			    <form class="formBackground" action="javascript:void(0)" >
    				<!--<a href="#" data-toggle="modal" data-target="#login-modal">-->
    			<?php } ?>
					<div class="form-row">
						<div class="form-group col-xs-4 col-sm-4 col-md-2 ">
							<label>I'm Looking For</label>
							<select name="looking_for" onchange="look()" id="looking" class="form-control">
								<option value="" disabled selected>Select Please</option>
								<option value="Bride">Bride</option>
								<option value="Groom">Groom</option>
							</select>
						</div>
						<div class="form-group col-xs-4 col-sm-4 col-md-2">
							<label>Min Age</label>
							<select name="age[]" id="minAge" onchange="max_age()" class="form-control">
								<option value="" disabled selected>Select Please</option> 
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
						</div>
						<div class="form-group col-xs-4 col-sm-4 col-md-2">
							<label>Max Age</label>
							<select name="age[]" id="maxAge" onchange="min_age()" class="form-control">
								<option value="" disabled selected>Select Please</option>
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
						</div>
						<div class="form-group col-xs-4 col-sm-4 col-md-2">
							<label>Religion</label>
							<select name="religion" class="form-control" onchange="selectCaste1()" id="myReligion1">  
					   			<option value="" disabled selected>Select Please</option>
					   			<?php foreach ($religion as $key => $religionValue) { ?>
						   			<option value="<?=$religionValue->religion?>" data-id="<?=$religionValue->religion?>" ><?=strtolower($religionValue->religion)?></option>
								<?php } ?>
					   		</select>
						</div>
						<div class="form-group col-xs-4 col-sm-4 col-md-2">
							<label>Caste</label>
							<select name="caste" class="form-control" id="myCaste1">
					    		<option value="" disabled selected>Select Please</option>
					    		<option value="" disabled> Select religion first</option>
					   		</select>
						</div>
						<!-- <div class="form-group col-md-2">
							<label>State</label>
							<select name="state" class="form-control">
								<?php foreach ($state as $key => $stateValue) { ?>
									<option value="<?=$stateValue->state_name?>"><?=$stateValue->state_name?></option>
								<?php } ?>
							</select>
						</div> -->
						<div class="form-group col-xs-4 col-sm-4 col-md-2">
						    <label>&nbsp; </label>
							<!--<input type="submit" name="submit" value="Get Started" class="form-control">-->
						    <?php if (isset($_SESSION['id'])) { ?>
							    <input type="submit" name="submit" value="Get Started" class="form-control">
    						<?php } else { ?>
    						    <input type="submit" name="submit" data-toggle="modal" data-target="#login-modal" value="Get Started" class="form-control">
    							<!--<a href="#" data-toggle="modal" data-target="#login-modal">-->
    						<?php } ?>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</header>
<div id="fh5co-couple-story">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
					<span>We Love Each Other</span>
					<h2>Find Your Special Someone</h2> 
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-md-offset-0">
					<div class="animate-box">
						<div class="col-md-3 col-xs-6 sectionRegistor">
							<div class="iconCircleIndex" >
								<i class="fa fa-file-text" aria-hidden="true"></i>
							</div>
							<h2>Sign Up</h2>
							<p>Register for Free</p>
						</div>
						<div class="col-md-3 col-xs-6 sectionRegistor">
							<div class="iconCircleIndex" >
								<i class="fa fa-heart" aria-hidden="true"></i>
							</div>
							<h2>Connect</h2>
							<p>Connect with Matches</p>
						</div>
						<div class="col-md-3 col-xs-6 sectionRegistor">
							<div class="iconCircleIndex" >
								<i class="fa fa-commenting" aria-hidden="true"></i>
							</div>
							<h2>Communicate</h2>
							<p>Start a Conversation</p>
						</div>
						<div class="col-md-3 col-xs-6 sectionRegistor">
							<div class="iconCircleIndex" >
								<img src="<?=base_url()?>assets/images/engg_icon.png">
							</div>
							<h2>Engage</h2>
							<p>Get Engaged with Partner</p>
						</div>
			    	</div>
				</div>
			</div>
		</div>
	</div>
	<div id="fh5co-event" class="fh5co-bg" style="background-image:url(<?=base_url()?>assets/images/img_bg_3.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
					<span>Recently Created Profiles</span>
					<h2>Recent Uploads</h2>
				</div>
			</div>
			<div class="row">
				<div class="display-t">
					<div class="display-tc">
						<?php
						foreach ($this->db->get("recent_upload")->result() as  $re) { 
						$user=$this->db->select('*')
                        ->where_in('user_id', $re->user_id)
                        ->where('hide_status', 0)
                        ->get('users')->row();
						
						?> 
							<div class="col-md-3 col-sm-3 col-xs-6 text-center">
								<div class="event-wrap animate-box">
									<div class="profilePic">
										<img src="<?=base_url().$user->image1?>">
									</div>
									<div class="event-col">
										<ul>
											<li>Age</li>
											<li>Religion</li>
											<li>Location</li>
										</ul>
									</div>
									<div class="event-col">
										<ul>
											<li><?php echo date_diff(date_create($user->dob), date_create('today'))->y; ?> Years</li>
											<li><?=strtolower($user->religion)?></li>
											<li><?=$user->curr_location?></li>
										</ul>
									</div>

								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- testimonail -->
	<div id="fh5co-testimonial">
		<div class="container">
			<div class="row">
				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
						<span>Our Reviews</span>
						<h2>Testimonials</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 animate-box">
						<div class="wrap-testimony">
							<div class="owl-carousel-fullwidth">
								<?php foreach ($getTestimonials as $key => $getTestimonialsValue) { ?>
									<div class="item">
										<div class="testimony-slide active text-center">
											<figure>
												<img src="<?=base_url().$getTestimonialsValue->image?>" alt="user">
											</figure>
											<span><?=$getTestimonialsValue->name?>, <?=$getTestimonialsValue->location?>
												<!-- <a href="#" class="twitter">Twitter</a> -->
											</span>
											<blockquote>
												<p>"<?=$getTestimonialsValue->message?>"</p>
											</blockquote>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="fh5co-counter" class="fh5co-bg fh5co-counter" style="background-image:url(<?=base_url()?>assets/images/counting_bg.jpg">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="display-t">
					<div class="display-tc countingSection">
						<?php foreach ($getNumberCounter as $key => $getNumberCounterValue) { ?>
							<div class="col-md-3 col-sm-6 col-xs-6 animate-box">
								<div class="feature-center">
									<span class="icon">
										<i class="icon-users"></i>
									</span>

									<span class="counter js-counter" data-from="0" data-to="<?=$getNumberCounterValue->matched_couples?>" data-speed="5000" data-refresh-interval="50">1</span>
									<span class="counter-label">Matched Couples</span>

								</div>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-6 animate-box">
								<div class="feature-center">
									<span class="icon">
										<i class="icon-user"></i>
									</span>

									<span class="counter js-counter" data-from="0" data-to="<?=$getNumberCounterValue->registered_user?>" data-speed="5000" data-refresh-interval="50">1</span>
									<span class="counter-label">Registered Users</span>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-6 animate-box">
								<div class="feature-center">
									<span class="icon">
										<i class="icon-calendar"></i>
									</span>
									<span class="counter js-counter" data-from="0" data-to="<?=$getNumberCounterValue->marriages?>" data-speed="5000" data-refresh-interval="50">1</span>
									<span class="counter-label">Marriages</span>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 col-xs-6 animate-box">
								<div class="feature-center">
									<span class="icon">
										<i class="icon-clock"></i>
									</span>

									<span class="counter js-counter" data-from="0" data-to="<?=$getNumberCounterValue->hours_spent?>" data-speed="5000" data-refresh-interval="50">1</span>
									<span class="counter-label">Hours Spent</span>

								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="fh5co-couple">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
					<h2>Success Story!</h2>
					<h3>Perfect match story of Mister &amp; Mistress</h3>
					<!-- <p>Perfect match story of Mister &amp; Mistress</p> -->
				</div>
			</div>
			<?php foreach ($getSuccessStory as $key => $getSuccessStoryValue) { ?>
				<div class="couple-wrap animate-box">
					<div class="couple-half">
						<div class="groom">
							<img src="<?=base_url().$getSuccessStoryValue->groom_image?>" alt="groom" class="img-responsive">
						</div>
						<div class="desc-groom">
							<h3>Mr. <?=$getSuccessStoryValue->groom_name?></h3>
							<p><?=$getSuccessStoryValue->groom_msg?></p>
						</div>
					</div>
					<p class="heart text-center"><i class="icon-heart2"></i></p>
					<div class="couple-half">
						<div class="bride">
							<img src="<?=base_url().$getSuccessStoryValue->bride_image?>" alt="groom" class="img-responsive">
						</div>
						<div class="desc-bride">
							<h3>Ms. <?=$getSuccessStoryValue->bride_name?></h3>
							<p><?=$getSuccessStoryValue->bride_msg?></p>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<script>
		function selectCaste1()
		{
			var religion = $("#myReligion1").val();
			$('#myCaste1')
			    .empty()
			    .append('<option selected="selected" disabled>Select Caste</option>')
			;
			$.ajax({
				url: "<?=base_url()?>Register_controller/selectCaste",
				dataType:'json',
				method: "POST",
				data:{religion:religion},
			 	success: function(data)
				{
					for(i=0; i<data.length; i++){
					$('#myCaste1')
			         .append($("<option></option>")
			                    .attr("value",data[i])
			                    .text(data[i])); 
					}
				}
			});
		}

		function look(){
			var looking_for = $("#looking").val();
			if (looking_for == 'Groom') {
				$("#minAge option[value=18]").hide();
				$("#minAge option[value=19]").hide();
				$("#minAge option[value=20]").hide();

				$("#maxAge option[value=18]").hide();
				$("#maxAge option[value=19]").hide();
				$("#maxAge option[value=20]").hide();
			} else{
				$("#minAge option").show();
				$("#maxAge option").show();
			}
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



		////7///////////////////////////////////////////////////////////////////////
		// city_state.js ///////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////
		var caste = Object();

		caste['Hindu'] = 'Abbott|Achari|Acharya|Adiga|Agarwal|Ahluwalia|Ahuja|Arora|Asan|Bandopadhyay|Banerjee|Bharadwaj|Bhat/Butt|Bhattacharya|Bhattathiri|Chaturvedi|Chattopadhyay|Chopra|Desai|Deshmukh|Deshpande|Devar|Dhawan|Dhirwan|Dubashi|Dutta|Dwivedi|Embranthiri|Ganaka|Gandhi|Gill|Gowda|Guha|Guneta|Gupta|Iyer|Iyengar|Jain|Jha|Johar|Joshi|Kakkar|Kaniyar|Kapoor|Kaul|Kaur|Khanna|Khatri|Kocchar|Kori|Kumawat|Lohkana, Lohkna, Lav|Mahajan|Mahto|Malik|Malireddy|Marar|Marri|Maurya|Menon|Mehra/Mehrotra|Mirpuri|Mishra|Mukhopadhyay|Nayar, Naik|Nair|Nambeesan|Namboothiri|Negi|Nehru|Ojha|Pandey|Panicker|Patel/Patil|Patial|Pilla/Pillai|Pothuvaal|Prajapati|Rana|Rajput|Reddy|Saini|Sethi|Shah|Sharma|Shukla|Sinha|Somayaji|Tagore|Talwar|Tandon|Trivedi|Varrier|Varma/Varman|Verma|Yadav|No Caste';
		caste['Muslim'] = 'India|Vietnam|No Caste';
		caste['Christian'] = 'India|Vietnam|No Caste';
		caste['Sikh'] = 'India|Vietnam|No Caste';
		caste['Buddhist'] = 'India|Vietnam|No Caste';
		caste['Jain'] = 'India|Vietnam|No Caste';
		caste['No Religion'] = 'No Caste';

		////////////////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////

		html = "";
		// for (religion1 in caste)
		//     html += '<option value="' + religion1 + '">' + religion1 + '</option>';

		// document.getElementById("religion1").innerHTML = document.getElementById("religion1").innerHTML + html;

		// function set_caste1(oReligionSel, oCasteSel='') {
		//     var casteArr;
		//     oCasteSel.length = 0;
		//     var religion1 = oReligionSel.options[oReligionSel.selectedIndex].text;
		//     if (caste[religion1]) {
		//         oCasteSel.disabled = false;
		//         oCasteSel.options[0] = new Option('SELECT CASTE', '');
		//         casteArr = caste[religion1].split('|');
		//         for (var i = 0; i < casteArr.length; i++)
		//             oCasteSel.options[i + 1] = new Option(casteArr[i], casteArr[i]);
		//     } else oCasteSel.disabled = true;
		// }
	</script> 
<?php include "footer.php" ?>