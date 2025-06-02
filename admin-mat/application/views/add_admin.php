<?php include('header.php'); ?>
<?php 
   $CI = $CI =& get_instance();
   $CI->load->model('Dashboard_model');
   $get_admin_menu = $CI->Dashboard_model->get_admin_menu();
   $get_admin_sub_menu = $CI->Dashboard_model->get_admin_sub_menu();
?>
<!-- Content Wrapper. Contains page content -->
<style>

.ad_profile form {
  max-width: 300px;
  margin: 10px auto;
  padding: 10px 20px;
  background: #f4f7f8;
  border-radius: 8px;
}

.ad_profile h1 {
  margin: 0 0 30px 0;
  text-align: center;
}

.ad_profile input[type="text"],
.ad_profile input[type="password"],
.ad_profile input[type="date"],
.ad_profile input[type="datetime"],
.ad_profile input[type="email"],
.ad_profile input[type="number"],
.ad_profile input[type="search"],
.ad_profile input[type="tel"],
.ad_profile input[type="time"],
.ad_profile input[type="url"],
.ad_profile textarea,
select {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 16px;
  height: auto;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 100%;
  background-color: #e8eeef;
  color: #8a97a0;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
}

.ad_profile input[type="radio"],
.ad_profile input[type="checkbox"] {
  margin: 0 4px 8px 0;
}

.ad_profile select {
  padding: 6px;
  height: 32px;
  border-radius: 2px;
}

.ad_profile button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #4bc970;
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 100%;
  border: 1px solid #3ac162;
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}

.ad_profile fieldset {
  margin-bottom: 30px;
  border: none;
}

.ad_profile legend {
  font-size: 1.4em;
  margin-bottom: 10px;
}

.ad_profile label {
  display: block;
  margin-bottom: 8px;
}

.ad_profile label.light {
  font-weight: 300;
  display: inline;
}

.ad_profile .number {
  background-color: #5fcf80;
  color: #fff;
  height: 30px;
  width: 30px;
  display: inline-block;
  font-size: 0.8em;
  margin-right: 4px;
  line-height: 30px;
  text-align: center;
  text-shadow: 0 1px 0 rgba(255,255,255,0.2);
  border-radius: 100%;
}

@media screen and (min-width: 480px) {

  .ad_profile form {
    max-width: 480px;
  }

}
</style>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	   <div class="header-icon">
	      <i class="fa fa-file-text"></i>
	   </div>
	   <div class="header-title">
	      <h1>Add/Edit Admin</h1>
	      <small>Profile</small>
	   </div>
	</section>
	<!-- Main content -->
	<div class="content">
	   <div class="row">
	      <div class="col-sm-12 col-md-12">
	         <div class="panel panel-bd lobidrag">
	            <div class="panel-heading">
	               <div class="panel-title">
	                  <h4>Profile</h4>
	               </div>
	            </div>
	            <div class="panel-body">
	            	<div class="ad_profile">
	               <div class="row">
				    <div class="col-md-12">
				    <?php if ($_SESSION['page_edit'] == 1){ unset($_SESSION['page_edit']); ?>
				    	<?php foreach ($admin_detail as $key => $admin_detail_value) { ?>    
				    	<form action="<?=base_url('admin_controller/update_admin/').$admin_detail_value['ad_id']?>" method="post">

				        <fieldset>				        
				          <label for="name">Name:</label>
				          <input type="text" id="name" name="admin_name" value="<?=$admin_detail_value['name']?>" required>
				        
				          <label for="email">Email:</label>
				          <input type="email" id="mail" name="admin_email" value="<?=$admin_detail_value['email']?>" required>
				       
				          <label for="password">Password:</label>
				          <input type="password" id="password" name="admin_password" required>
				       
				          <label for="confirm_password">Confirm Password:</label>
				          <input type="password" id="confirm_password" name="confirm_password" required>

				          <label for="job">Job Title:</label>
				          <select id="job" name="admin_job">
				            <optgroup label="Role">
				            <?php if ($admin_detail_value['role'] == "Sub-Admin"){ ?>
				            	<option value="Sub-Admin" selected>Sub-Admin</option>
				            <?php } else { ?>
				            	<option value="Sub-Admin">Sub-Admin</option>
				            <?php } ?>
				            <?php if ($admin_detail_value['role'] == "Manager"){ ?>
				            	<option value="Manager" selected>Manager</option>
				            <?php } else { ?>
				            	<option value="Manager">Manager</option>
				            <?php } ?>
				            <?php if ($admin_detail_value['role'] == "Senior Executive"){ ?>
				            	<option value="Senior Executive" selected>Senior Executive</option>
				            <?php } else { ?>
				            	<option value="Senior Executive">Senior Executive</option>
				            <?php } ?>
				            <?php if ($admin_detail_value['role'] == "Executive"){ ?>
				            	<option value="Executive" selected>Executive</option>
				            <?php } else { ?>
				            	<option value="Executive">Executive</option>
				            <?php } ?>
				            </optgroup>
				          </select>

				          <label for="job">Job Role:</label>
				          <?php foreach ($get_admin_menu as $key => $get_admin_menu_value) { ?>
				          	<?php if ($get_admin_menu_value['am_name'] == "Dashboard"){ ?>
				          		<input type="hidden" name="role[]" value="<?=$get_admin_menu_value['am_id']?>" >
				          	<?php } else { ?>
				          		<?php if (in_array($get_admin_menu_value['am_id'], json_decode($admin_detail_value['privilege']))){ ?>
				          				<input type="checkbox" name="role[]" checked value="<?=$get_admin_menu_value['am_id']?>"> <?=$get_admin_menu_value['am_name']?><br>	          			
				          		<?php } else { ?>
				          			<input type="checkbox" name="role[]" value="<?=$get_admin_menu_value['am_id']?>"> <?=$get_admin_menu_value['am_name']?><br>
				          		<?php } ?>
				          	<?php } ?>
				      	  <?php } ?>
				          
				        </fieldset>				       
				        <button type="submit">Submit</button>
				        
				       </form>
				       <?php } ?> 
				    <?php } else { ?>				    

				      <form action="<?=base_url('admin_controller/insert_admin')?>" method="post">				        
				        <fieldset>				        
				          <label for="name">Name:</label>
				          <input type="text" id="name" name="admin_name" value="" required="">
				        
				          <label for="email">Email:</label>
				          <input type="email" id="mail" name="admin_email" value="" required="">
				       
				          <label for="password">Password:</label>
				          <input type="password" id="password" name="admin_password" required>
				       
				          <label for="confirm_password">Confirm Password:</label>
				          <input type="password" id="confirm_password" name="confirm_password" required>

				          <label for="job">Job Title:</label>
				          <select id="job" name="admin_job">
				            <optgroup label="Role">
				              <option value="Sub-Admin">Sub-Admin</option>
				              <option value="php_developer">Manager</option>
				              <option value="python_developer">Senior Executive</option>
				              <option value="rails_developer">Executive</option>
				            </optgroup>
				          </select>

				          <label for="job">Job Role:</label>
				          <?php foreach ($get_admin_menu as $key => $get_admin_menu_value) { ?>
				          	<?php if ($get_admin_menu_value['am_name'] == "Dashboard"){ ?>
				          		<input type="hidden" name="role[]" value="<?=$get_admin_menu_value['am_id']?>" >
				          	<?php } else { ?>				          		
				          		<input type="checkbox" name="role[]" value="<?=$get_admin_menu_value['am_id']?>"> <?=$get_admin_menu_value['am_name']?><br>
				          	<?php } ?>
				      	  <?php } ?>
				          
				        </fieldset>				       
				        <button type="submit">Submit</button>
				        
				       </form>
				       <?php } ?>
				        </div>
				      </div>
				      </div>
	            </div>
	         </div>
	      </div>
	   </div>
	</div>
	<!-- /.content -->
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
	var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

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
<!-- /.content-wrapper -->
<?php include('footer.php'); ?>