<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
<select name="caste[]" class="form-control chosen-select" required multiple >
	<option value="" disabled>Select Caste</option>
	<?php foreach ($data as $key => $casteValue) { ?>
		<option value="<?=$casteValue->caste?>"><?=$casteValue->caste?></option>
	<?php } ?>
</select>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src=""></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script> 
<!-- <script type="text/javascript">
	// Multiple Select 
	$(".chosen-select").chosen({
	  no_results_text: "Oops, nothing found!"
	});
</script> -->

<!-- Bootstrap -->
