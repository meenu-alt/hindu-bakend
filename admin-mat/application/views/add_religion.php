<?php include('header.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="header-icon">
			<i class="fa fa-paper-plane"></i>
		</div>
		<div class="header-title">
			<h1>Add Religion</h1>
			<small>Add Religion</small>
		</div>
	</section>
	<!-- Main content -->
	<div class="content">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="panel panel-bd lobidrag">
					<div class="panel-heading">
						<div class="panel-title">
							<h4>Add Religion</h4>
						</div>
					</div>
					<div class="panel-body">
						<div style="padding-top: 50px; padding-bottom: 100px">
							<form  method="post" enctype="multipart/form-data">
							 
							 
							 
								<div class="col-md-6"> 
									<div class="form-group">
										<input type="text" class="form-control" name="name" placeholder="Religion Name" required>
									</div>
								</div>
								
								<div class="col-md-3">
									<button type="submit" name="submit" value="1" class="btn btn-primary btn-sm">Add Religion</button>
								</div>
							</form>
							
							
							
							
							<table class="table table-borderd">
							    <thead>
							        <tr>
							            <th>S.NO</th>
							            <th>Name</th>
							            <th>Action</th>
							        </tr>
							    </thead>
							    
							    
							    <tbody>
							        <?php $i=1;foreach($all as $r){ ?>
							        <tr>
							            <td><?=$i;?></td>
							            <td><?=$r->religion;?></td>
							            <td> <a href="<?=base_url('admin_controller/religion_delete/'.$r->religion_id);?>" ><i class="panel-control-icon ti-close text-danger bg-danger p-2"></i></a></td>
							        </tr>
							        <?php $i++; } ?>
							    </tbody>
							</table>
							
							
							
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
<script>	
function selectState() {
    var country = $("#countryName").val(); 
    $('#stateName')
        .empty()
        .append('<option selected="selected" disabled>Select State</option>');
    $.ajax({
        url: "<?=base_url()?>Admin_controller/selectState",
        dataType: 'json',
        method: "POST",
        data: {
            country: country
        }, 
        success: function(data) { 
            for (i = 0; i < data.length; i++) {
                $('#stateName')
                    .append($("<option></option>")
                        .attr("value", data[i])
                        .text(data[i])); 
            }
        }
    });
} 
</script> 