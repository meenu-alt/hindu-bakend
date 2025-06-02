<?php
		$CI =& get_instance();
		$CI->load->model('Register_model'); 
		$language = $CI->Register_model->getLanguage(); 
		$religion = $CI->Register_model->getReligion();
	?>
<?php include "header.php" ?>
<style type="text/css">	
.hidden {
  overflow: hidden;
  display: none;
  visibility: hidden;
}
.prDetailsBlocks .leftDetails ul li, 
.prDetailsBlocks .middleDetails ul li,
.prDetailsBlocks .rightDetails ul li{  
  font-weight: 500 !important;
}
</style>
<section class="profile"> 
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box fadeInUp animated-fast"> 
					<h2>Search</h2>
				</div>
			</div>
			<div class="row"> 
				<div class="col-md-offset-2 col-md-8"> 
				<div class="prDetailsBlocks">
					
					<!-- <h4><span>Full Name</span> - <?=$detailsValue->name?></h4> -->
					<form class="searchById" action="<?=base_url('mycon/filter_match')?>" method="get">
					<div class="fullWidth searchById">
						<ul class="">
							<li>I'm Looking For :</li>
							<li class="form-group">
								<select name="looking_for" class="form-control" required>
									<option value="" disabled>Please Select</option>
									<?php if ($_SESSION['looking_for'] == 'Bride'){ ?>										
										<option value="Bride" selected>Bride</option>
										<option value="Groom" disabled>Groom</option> 
									<?php } else { ?>
										<option value="Bride" disabled>Bride</option>
										<option value="Groom" selected>Groom</option> 
									<?php } ?>
								</select>
							</li>
						</ul>
					</div>
					<div class="leftDetailsSearch  searchById">
						<ul class="">
							<li>Min Age :</li>
							<li class="form-group">
								<select name="age[]" id="minAge" onchange="max_age()" class="form-control" required>
									<option value="" disabled selected>Select Please</option>
									<option value="21" selected>21</option>
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
						</ul> 
					</div>
					<div class="middleDetailsSearch searchById">
						<ul class="">							
							<li>Max Age :</li>
							<li class="form-group">
								<select name="age[]" id="maxAge" onchange="min_age()" class="form-control" required>
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
									<option value="50"  selected>50</option>
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
					</div>
					<div class="rightDetailsSearch searchById">
						<ul class="">							
							<li>Min Height :</li>
							<li class="form-group">
								<select name="height" id="maxAge" onchange="min_age()" class="form-control" required>
									<option selected disabled>Select Please</option>
									<option value="4.0" selected >4' 0" (1.22 mts)</option>
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
					<div class="fullWidth searchById">
						<ul class="">
							<li>Religion :</li>
							<li class="form-group">
								<select name="religion" class="form-control" onchange="selectCaste1()" id="myReligion1">  
					   			<option value="" disabled selected="selected">Select religion</option>
					   			<?php foreach ($religion as $key => $religionValue) { ?>
						   			<option selected value="<?=ucfirst(strtolower($religionValue->religion))?>" data-id="<?=$religionValue->religion?>" ><?=ucfirst(strtolower($religionValue->religion))?></option>
								<?php } ?>
					   		</select>
							</li>
						</ul>
					</div>
					<div class="fullWidth searchById">
						<ul class="">
							<li>Caste :</li>
							<li class="form-group">
								<select name="caste" class="form-control" id="myCaste1">
						    		<option disabled selected>Select Caste</option>
						   		</select>
							</li>
						</ul>

						<input type="submit" name="" value="Search" class="searchMatchesInput">
					</div>
				</form>
				<div class="searchByDetails" style="display: none">					
					<form class="searchByDetails" style="display: none">
						<div class="fullWidth">
							<ul class="">
								<li>Search By Profile Id:</li>
								<li class="form-group">
									<input name="id" id="profile_id" class="form-control" placeholder="HH1234">  
								</li>
							</ul>

						</div>					
					</form>
					<input type="submit" onclick="profileIdSubmit()" value="Search" class="searchMatchesInput">
				</div>
				<h2>
					<span  class="searchById">
						<a onclick="searchByDetails('edit')">
							<i class="fa fa-id-card" aria-hidden="true"></i>&nbsp;Click Here For Search By Id
						</a>
					</span>
					<span  class="searchByDetails">
						<a onclick="searchByDetails('cancel')">
						<i class="fa fa-id-badge" aria-hidden="true"></i>&nbsp;Click Here For Custom Search
					</a>
					</span>
				</h2>
				</div>   
			</div>  
		</div>
	</div> 
</section> 
<script>
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

	function profileIdSubmit(){
		var user_id = $('#profile_id').val();
		var id = user_id.substr(2,user_id.length-2);
// 		alert("<?=base_url('mycon/view_profile/?id=')?>"+id);
		location.href ="<?=base_url('mycon/view_profile/?id=')?>"+id;
	}
	function searchByDetails(val){
		if (val == 'edit') {			
			$('.searchByDetails').css('display', 'block');;
			$('.searchById').hide();
		} else {
			$('.searchByDetails').hide();
			$('.searchById').show();
		}
	}
 

</script>
	<script>
		function selectCaste1()
		{
			var religion = $("#myReligion1").val();
			$('#myCaste1')
			    .empty()
			;
			$.ajax({
				url: "<?=base_url()?>Register_controller/selectCaste",
				dataType:'json',
				method: "POST",
				data:{religion:religion},
			 	success: function(data)
				{
				    	$('#myCaste1').append("<option disabled selected  value='' >Select Caste</option>"); 
					for(i=0; i<data.length; i++){
					$('#myCaste1').append($("<option></option>").attr("value",data[i]).text(data[i])); 
					}
				}
			});
		}
		
		selectCaste1();



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