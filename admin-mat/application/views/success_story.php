<?php include('header.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	   <div class="header-icon">
	      <i class="fa fa-heartbeat" aria-hidden="true"></i>
	   </div>
	   <div class="header-title">
	      <h1>Success Story</h1>
	      <small></small>
	   </div>
	</section>
	<!-- Main content -->
	<?php foreach ($success_story as $key => $success_story_value) { ?>
		<div class="content">
		   <div class="row">
		      <div class="col-sm-12 col-md-12">
		         <div class="panel panel-bd lobidrag">
		            <div class="panel-heading">
		               <div class="panel-title">
		                  <h4>Success Story</h4>
		               </div>
		            </div>
		            <div class="panel-body"> 
		            	<p style="color: red; padding-left: 20px">Note : Image size should be 400X400 pixel and not more than 2 MB.</p>
		            	<form action="<?=base_url('admin_controller/update_success_story')?>" method="post" enctype="multipart/form-data">
			            	<div class="col-md-6">		            		
			            		<div class="col-sm-12">
			            			<label for="">Groom Image</label>
			            			<div class="col-sm-5">
			            				<?php if (empty($success_story_value['groom_image'])) { ?>	            			<img src="<?=MAIN_SITE_URL?>assets/images/default_profilepics.jpg" id="userImg" class="storyImageGroomBride">
			            				<?php } else { ?>
			            					<img src="<?=MAIN_SITE_URL.$success_story_value['groom_image']?>" id="userImg" class="storyImageGroomBride">
			            				<?php } ?>
				            		<br>
				            		<br>
				            		</div>		            		
				            		<div class="col-sm-7">		            			
					            		<div class="form-group">
					            			<input type="file" class="form-control" name="groom_image" onchange="loadFile(event)" >
					            		</div>
				            		</div>
			            		</div>
			            		<div class="form-group">
			            			<label for="">Groom Name</label>
			            			<input type="text" class="form-control" name="groom_name" value="<?=$success_story_value['groom_name']?>" placeholder="Enter Groom Name" >
			            		</div>
			            		<div class="form-group">
			            			<label for="">Groom Message</label>
			            			<textarea type="text" class="form-control" name="groom_msg" placeholder="Enter Groom Message" ><?=$success_story_value['groom_msg']?></textarea>
			            		</div>
			            	</div>
			            	<div class="col-md-6">		            		
			            		<div class="col-sm-12">
			            			<label for="">Bride Image</label>
			            			<div class="col-sm-5">
				            			<?php if (empty($success_story_value['bride_image'])) { ?>	            			<img src="<?=MAIN_SITE_URL?>assets/images/default_profilepics.jpg" id="userImg1" class="storyImageGroomBride">
			            				<?php } else { ?>
			            					<img src="<?=MAIN_SITE_URL.$success_story_value['bride_image']?>" id="userImg1" class="storyImageGroomBride">
			            				<?php } ?>
				            		<br>
				            		<br>
				            		</div>		            		
				            		<div class="col-sm-7">		            			
					            		<div class="form-group">
					            			<input type="file" class="form-control" name="bride_image" onchange="loadFile1(event)" >
					            		</div>
				            		</div>
			            		</div>
			            		<div class="form-group">
			            			<label for="">Bride Name</label>
			            			<input type="text" class="form-control" value="<?=$success_story_value['bride_name']?>" name="bride_name" placeholder="Enter Groom Name" >
			            		</div>
			            		<div class="form-group">
			            			<label for="">Bride Message</label>
			            			<textarea type="text" class="form-control" name="bride_msg" placeholder="Enter Groom Message"> <?=$success_story_value['bride_msg']?></textarea>
			            		</div>
			            	</div> 		            	
		            		<div class="form-group"> 
		            			<input type="submit" class="btn btn-primary" value="submit">
		            		</div>
		            	</form>
		            </div> 
		         </div>
		      </div>
		   </div>
		</div>
		<!-- /.content -->
	<?php } ?>
</div>
<script>
   var loadFile = function(event) {
    var output = document.getElementById('userImg');
    output.src = URL.createObjectURL(event.target.files[0]);
    }; 
   var loadFile1 = function(event) {
    var output = document.getElementById('userImg1');
    output.src = URL.createObjectURL(event.target.files[0]);
    }; 
</script> 
<!-- /.content-wrapper -->
<?php include('footer.php'); ?>