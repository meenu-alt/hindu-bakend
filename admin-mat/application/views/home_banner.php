<?php include('header.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	   <div class="header-icon">
	      <i class="fa fa-file-text"></i>
	   </div>
	   <div class="header-title">
	      <h1>Home Screen</h1>
	      <small>Banner Image</small>
	   </div>
	</section>
	<!-- Main content -->
	<div class="content">
	   <div class="row">
	      <div class="col-sm-12 col-md-12">
	         <div class="panel panel-bd lobidrag">
	            <div class="panel-heading">
	               <div class="panel-title">
	                  <h4>Banner Image</h4>
	               </div>
	            </div>
	            <div class="panel-body">
	            	<?php foreach ($banner_image as $key => $banner_image_value) { ?>
		            	<div>	            		
		               		<img src="<?=MAIN_SITE_URL.$banner_image_value['banner_image']?>" width="1000px" height="500" id="userImg">
		            	</div>
	            	<?php } ?>
	            	<div style="padding-top: 50px; padding-bottom: 100px">
	            	   <p style="color: red; padding-left: 20px">Note : Image size should be 1000 X 650 pixel and not more than 2 MB</p>	            		
		               <form action="<?=base_url('admin_controller/update_banner')?>" method="post" enctype="multipart/form-data">
		               	<div class="col-md-6">
		               		<input type="file" name="banner_img" onchange="loadFile(event)" class="form-control chooseFile">
						</div>
		               	<div class="col-md-6">
		               		<button type="submit" class="btn btn-primary btn-sm">Update</button>
		               	</div>
		               </form>
	            	</div>
	            </div>
	            <!-- <div class="panel-footer">
	               This is standard panel footer
	            </div> -->
	         </div>
	      </div>
	   </div>
	</div>
	<!-- /.content -->
</div>
<script>
   var loadFile = function(event) {
    var output = document.getElementById('userImg');
    output.src = URL.createObjectURL(event.target.files[0]);
    }; 
</script> 
<!-- /.content-wrapper -->
<?php include('footer.php'); ?>