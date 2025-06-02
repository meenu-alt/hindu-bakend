<?php include('header.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	   <div class="header-icon">
	      <i class="fa fa-file-text"></i>
	   </div>
	   <div class="header-title">
	      <h1>Import Profiles</h1>
	      <small>Import Profiles</small>
	   </div>
	</section>
	<!-- Main content -->
	<div class="content">
	   <div class="row">
	      <div class="col-sm-12 col-md-12">
	         <div class="panel panel-bd lobidrag">
	            <div class="panel-heading">
	               <div class="panel-title">
	                  <h4>Import Profiles</h4>
	               </div>
	            </div>
	            <div class="panel-body">	            	
	            	<div style="padding-top: 50px; padding-bottom: 100px">	            		
		               <form action="<?=base_url('admin_controller/import_file')?>" method="post" enctype="multipart/form-data">
		               	<div class="col-md-6">
		               		<input type="file" name="import" class="form-control chooseFile">
						</div>
		               	<div class="col-md-6">
		               		<button type="submit" class="btn btn-primary btn-sm">Upload</button>
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
<!-- /.content-wrapper -->
<?php include('footer.php'); ?>