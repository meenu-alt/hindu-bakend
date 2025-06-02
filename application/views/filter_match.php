<?php
	$CI =& get_instance();
	$CI->load->model('Register_model');
	$religion = $CI->Register_model->getReligion();
	// $state = $CI->Register_model->getState();
?>
<?php
if (isset($_SESSION['id'])) {
	include "header.php";
} else {
	include "indexheader.php";
}
?>
<section class="profile">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box fadeInUp animated-fast"> 
					<h2>Custom Search</h2> 
			</div>
		</div> 
		<div class="row search_resultFilter seven-cols">
				<form class="formBackground" action="<?=base_url('mycon/filter_match')?>" method="get">
					<div class="form-row">
						<div class="form-group col-xs-4 col-sm-4 col-md-1 ">
							<label>I'm Looking For</label>
							<select name="looking_for" onchange="look()" id="looking" class="form-control">
						
								<option value="Bride" <?=($forms['looking_for']=="Bride")?"Selected":"disabled";?> >Bride</option>
								<option value="Groom" <?=($forms['looking_for']=="Groom")?"Selected":"disabled";?>>Groom</option>
							</select>
						</div>
						<div class="form-group col-xs-4 col-sm-4 col-md-1 ">
							<label>Min Age</label>
							<select name="age[]" id="minAge" onchange="max_age()" class="form-control">
								<option value="" disabled selected>Select Please</option>
								<option value="21" <?=($forms['age'][0]=="21")?"selected":"";?>  >21</option>
								<option value="22" <?=($forms['age'][0]=="22")?"selected":"";?>  >22</option>
								<option value="23" <?=($forms['age'][0]=="23")?"selected":"";?>  >23</option>
								<option value="24" <?=($forms['age'][0]=="24")?"selected":"";?>  >24</option>
								<option value="25" <?=($forms['age'][0]=="25")?"selected":"";?>  >25</option>
								<option value="26" <?=($forms['age'][0]=="26")?"selected":"";?>  >26</option>
								<option value="27" <?=($forms['age'][0]=="27")?"selected":"";?>  >27</option>
								<option value="28" <?=($forms['age'][0]=="28")?"selected":"";?>  >28</option>
								<option value="29" <?=($forms['age'][0]=="29")?"selected":"";?>  >29</option>
								<option value="30" <?=($forms['age'][0]=="30")?"selected":"";?>  >30</option>
								<option value="31" <?=($forms['age'][0]=="31")?"selected":"";?>  >31</option>
								<option value="32" <?=($forms['age'][0]=="32")?"selected":"";?>  >32</option>
								<option value="33" <?=($forms['age'][0]=="33")?"selected":"";?>  >33</option>
								<option value="34" <?=($forms['age'][0]=="34")?"selected":"";?>  >34</option>
								<option value="35" <?=($forms['age'][0]=="35")?"selected":"";?>  >35</option>
								<option value="36" <?=($forms['age'][0]=="36")?"selected":"";?>  >36</option>
								<option value="37" <?=($forms['age'][0]=="37")?"selected":"";?>  >37</option>
								<option value="38" <?=($forms['age'][0]=="38")?"selected":"";?>  >38</option>
								<option value="39" <?=($forms['age'][0]=="39")?"selected":"";?>  >39</option>
								<option value="40" <?=($forms['age'][0]=="40")?"selected":"";?>  >40</option>
								<option value="41" <?=($forms['age'][0]=="41")?"selected":"";?>  >41</option>
								<option value="42" <?=($forms['age'][0]=="42")?"selected":"";?>  >42</option>
								<option value="43" <?=($forms['age'][0]=="43")?"selected":"";?>  >43</option>
								<option value="44" <?=($forms['age'][0]=="44")?"selected":"";?>  >44</option>
								<option value="45" <?=($forms['age'][0]=="45")?"selected":"";?>  >45</option>
								<option value="46" <?=($forms['age'][0]=="46")?"selected":"";?>  >46</option>
								<option value="47" <?=($forms['age'][0]=="47")?"selected":"";?>  >47</option>
								<option value="48" <?=($forms['age'][0]=="48")?"selected":"";?>  >48</option>
								<option value="49" <?=($forms['age'][0]=="49")?"selected":"";?>  >49</option>
								<option value="50" <?=($forms['age'][0]=="50")?"selected":"";?>  >50</option>
								<option value="51" <?=($forms['age'][0]=="51")?"selected":"";?>  >51</option>
								<option value="52" <?=($forms['age'][0]=="52")?"selected":"";?>  >52</option>
								<option value="53" <?=($forms['age'][0]=="53")?"selected":"";?>  >53</option>
								<option value="54" <?=($forms['age'][0]=="54")?"selected":"";?>  >54</option>
								<option value="55" <?=($forms['age'][0]=="55")?"selected":"";?>  >55</option>
								<option value="56" <?=($forms['age'][0]=="56")?"selected":"";?>  >56</option>
								<option value="57" <?=($forms['age'][0]=="57")?"selected":"";?>  >57</option>
								<option value="58" <?=($forms['age'][0]=="58")?"selected":"";?>  >58</option>
								<option value="59" <?=($forms['age'][0]=="59")?"selected":"";?>  >59</option>
								<option value="60" <?=($forms['age'][0]=="60")?"selected":"";?>  >60</option>
								<option value="61" <?=($forms['age'][0]=="61")?"selected":"";?>  >61</option>
								<option value="62" <?=($forms['age'][0]=="62")?"selected":"";?>  >62</option>
								<option value="63" <?=($forms['age'][0]=="63")?"selected":"";?>  >63</option>
								<option value="64" <?=($forms['age'][0]=="64")?"selected":"";?>  >64</option>
								<option value="65" <?=($forms['age'][0]=="65")?"selected":"";?>  >65</option>
								<option value="66" <?=($forms['age'][0]=="66")?"selected":"";?>  >66</option>
								<option value="67" <?=($forms['age'][0]=="67")?"selected":"";?>  >67</option>
								<option value="68" <?=($forms['age'][0]=="68")?"selected":"";?>  >68</option>
								<option value="69" <?=($forms['age'][0]=="69")?"selected":"";?>  >69</option>
								<option value="70" <?=($forms['age'][0]=="70")?"selected":"";?>  >70</option>
								<option value="71" <?=($forms['age'][0]=="71")?"selected":"";?>  >71</option>
								<option value="72" <?=($forms['age'][0]=="72")?"selected":"";?>  >72</option>
								<option value="73" <?=($forms['age'][0]=="73")?"selected":"";?>  >73</option>
								<option value="74" <?=($forms['age'][0]=="74")?"selected":"";?>  >74</option>
								<option value="75" <?=($forms['age'][0]=="75")?"selected":"";?>  >75</option>
							</select>
						</div>
						<div class="form-group col-xs-4 col-sm-4 col-md-1 ">
							<label>Max Age</label>
							<select name="age[]" id="maxAge" onchange="min_age()" class="form-control">
								<option value="" disabled selected>Select Please</option>
								<?php for ($i=21;$i<76;$i++){ ?>
								
								<option value="<?=$i;?>" <?=($forms['age'][1]==$i)?"selected":"";?>  ><?=$i;?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group col-xs-4 col-sm-4 col-md-1 ">
							<label>Min Height</label>
							<select class="form-control"  name="height" >
								<option selected value="">Select Please</option>
								<option value="4.0" <?=($forms['height']==4.0)?"selected":"";?> >4' 0" (1.22 mts)</option>
								<option value="4.1" <?=($forms['height']==4.1)?"selected":"";?> >4' 1" (1.24 mts)</option>
								<option value="4.2" <?=($forms['height']==4.2)?"selected":"";?> >4' 2" (1.28 mts)</option>
								<option value="4.3" <?=($forms['height']==4.3)?"selected":"";?> >4' 3" (1.31 mts)</option>
								<option value="4.4" <?=($forms['height']==4.4)?"selected":"";?> >4' 4" (1.34 mts)</option>
								<option value="4.5" <?=($forms['height']==4.5)?"selected":"";?> >4' 5" (1.35 mts)</option>
								<option value="4.6" <?=($forms['height']==4.6)?"selected":"";?> >4' 6" (1.37 mts)</option>
								<option value="4.7" <?=($forms['height']==4.7)?"selected":"";?> >4' 7" (1.40 mts)</option>
								<option value="4.8" <?=($forms['height']==4.8)?"selected":"";?> >4' 8" (1.42 mts)</option>
								<option value="4.9" <?=($forms['height']==4.9)?"selected":"";?> >4' 9" (1.45 mts)</option>
								<option value="4.10" <?=($forms['height']==4.10)?"selected":"";?> >4' 10" (1.47 mts)</option>
								<option value="4.11" <?=($forms['height']==4.11)?"selected":"";?> >4' 11" (1.50 mts)</option>
								<optgroup label=""></optgroup>
								<option value="5.0" <?=($forms['height']==5.0)?"selected":"";?> >5' 0" (1.52 mts)</option>
								<option value="5.1" <?=($forms['height']==5.1)?"selected":"";?> >5' 1" (1.55 mts)</option>
								<option value="5.2" <?=($forms['height']==5.2)?"selected":"";?> >5' 2" (1.58 mts)</option>
								<option value="5.3" <?=($forms['height']==5.3)?"selected":"";?> >5' 3" (1.60 mts)</option>
								<option value="5.4" <?=($forms['height']==5.4)?"selected":"";?> >5' 4" (1.63 mts)</option>
								<option value="5.5" <?=($forms['height']==5.5)?"selected":"";?> >5' 5" (1.65 mts)</option>
								<option value="5.6" <?=($forms['height']==5.6)?"selected":"";?> >5' 6" (1.68 mts)</option>
								<option value="5.7" <?=($forms['height']==5.7)?"selected":"";?> >5' 7" (1.70 mts)</option>
								<option value="5.8" <?=($forms['height']==5.8)?"selected":"";?> >5' 8" (1.73 mts)</option>
								<option value="5.9" <?=($forms['height']==5.9)?"selected":"";?> >5' 9" (1.75 mts)</option>
								<option value="5.10" <?=($forms['height']==5.10)?"selected":"";?> >5' 10" (1.78 mts)</option>
								<option value="5.11" <?=($forms['height']==5.11)?"selected":"";?> >5' 11" (1.80 mts)</option>
								<optgroup label="&nbsp;"></optgroup>
								<option value="6.0" <?=($forms['height']==6.0)?"selected":"";?> >6' 0" (1.83 mts)</option>
								<option value="6.1" <?=($forms['height']==6.1)?"selected":"";?> >6' 1" (1.85 mts)</option>
								<option value="6.2" <?=($forms['height']==6.2)?"selected":"";?> >6' 2" (1.87 mts)</option>
								<option value="6.3" <?=($forms['height']==6.3)?"selected":"";?> >6' 3" (1.90 mts)</option>
								<option value="6.4" <?=($forms['height']==6.4)?"selected":"";?> >6' 4" (1.93 mts)</option>
								<option value="6.5" <?=($forms['height']==6.5)?"selected":"";?> >6' 5" (1.95 mts)</option>
								<option value="6.6" <?=($forms['height']==6.6)?"selected":"";?> >6' 6" (1.97 mts)</option>
								<option value="6.7" <?=($forms['height']==6.7)?"selected":"";?> >6' 7" (2.00 mts)</option>
								<option value="6.8" <?=($forms['height']==6.8)?"selected":"";?> >6' 8" (2.02 mts)</option>
								<option value="6.9" <?=($forms['height']==6.9)?"selected":"";?> >6' 9" (2.05 mts)</option>
								<option value="6.10" <?=($forms['height']===6.10)?"selected":"";?> >6' 10" (2.07 mts)</option>
								<option value="6.11" <?=($forms['height']==6.11)?"selected":"";?> >6' 11" (2.10 mts)</option>
								<option value="7.0" <?=($forms['height']==7.0)?"selected":"";?> >7' 0" (2.13 mts)</option>
							</select>
						</div>
						<div class="form-group col-xs-4 col-sm-4 col-md-1 ">
							<label>Religion</label>
							<select name="religion" class="form-control" onchange="selectCaste1()"   id="myReligion1">  
					   			<option value="" disabled selected>Select Please</option>
					   			<?php foreach ($religion as $key => $religionValue) { ?>
						   			<option value="<?=$religionValue->religion;?>" <?=(strtoupper($forms['religion'])==$religionValue->religion)?"selected":"";?>   data-id="<?=$religionValue->religion?>" ><?=strtolower($religionValue->religion)?></option>
								<?php } ?>
					   		</select>
						</div>
						<div class="form-group col-xs-4 col-sm-4 col-md-1 ">
							<label>Caste</label>
							<select name="caste" class="form-control" id="myCaste1">
					    		<option value="" disabled selected>Select Please</option>
					    		<option value="" disabled> Select religion first.</option>
					   		</select>
						</div>
						<!-- <div class="form-group col-md-1">
							<label>State</label>
							<select name="state" class="form-control">
								<?php foreach ($state as $key => $stateValue) { ?>
									<option value="<?=$stateValue->state_name?>"><?=$stateValue->state_name?></option>
								<?php } ?>
							</select>
						</div> -->
						<div class="form-group col-xs-4 col-sm-4 col-md-1 ">
							<label>&nbsp; </label>
							<input type="submit" name="submit" value="Search" class="form-control">
						</div>
					</div>
				</form>
			</div> 
			<?php if($detail){ ?>
		<div class="row">
			<?php foreach ($detail as $key => $detailValue) { ?>
				<div class="col-md-3">
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
								<h3><?php if($detailValue->gender == 'male') { echo 'M'; } 
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
		<?php } else{ ?>
			<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				 <h2 class="text-center text-danger"> Sorry No Profile Matches</h2>
			</div>
		</div>
		<?php } ?>
	</div>
</section>

<script>
		function selectCaste1()
		{
			var religion = $("#myReligion1").val();
			$('#myCaste1')
			    .empty()
			    .append('<option selected="selected" value="">Select Caste</option>')
			;
			$.ajax({
				url: "<?=base_url()?>Register_controller/selectCaste",
				dataType:'json',
				method: "POST",
				data:{religion:religion},
			 	success: function(data)
				{
					for(i=0; i<data.length; i++){
					 if("<?=(isset($forms['caste']))?$forms['caste']:"none";?>"==data[i]){
					     $dt=$("<option></option>").attr("value",data[i]).attr("selected",true).text(data[i]);
					 } else{
					     $dt=$("<option></option>").attr("value",data[i]).text(data[i]);
					 }
					$('#myCaste1').append($dt); 
					}
				}
			});
		}
		selectCaste1();
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