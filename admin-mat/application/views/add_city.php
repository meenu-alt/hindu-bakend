<?php include('header.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="header-icon">
			<i class="fa fa-paper-plane"></i>
		</div>
		<div class="header-title">
			<h1>Add City</h1>
			<small>Add City</small>
		</div>
	</section>
	<!-- Main content -->
	<div class="content">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="panel panel-bd lobidrag">
					<div class="panel-heading">
						<div class="panel-title">
							<h4>Add City</h4>
						</div>
					</div>
					<div class="panel-body">
						<div style="padding-top: 50px; padding-bottom: 100px">
							<form action="<?=base_url('admin_controller/add_city_insert')?>" method="post" enctype="multipart/form-data">
								<div class="col-md-3">
									<?php
										$CI =& get_instance();
										$CI->load->model('Dashboard_model'); 
										$country = $CI->Dashboard_model->getCountry(); 
									?>  
									<div class="form-group">
										<select class="form-control" name="country" onchange="selectState()" id="countryName">
											<option value="" selected="" disabled>Select Country</option>
											<?php foreach ($country as $key => $countryValue) { ?>
												<option value="<?=$countryValue->country_name?>"><?=$countryValue->country_name?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-md-3"> 
									<div class="form-group">
										<select class="form-control" name="state_name" onchange="selectCity()" id="stateName" required > 
											<option value="" selected="" disabled>Select State</option>
										</select>
									</div>
								</div>
								<div class="col-md-3"> 
									<div class="form-group">
										<input type="text" class="form-control" name="city_name" placeholder="City Name" required>
									</div>
								</div>
								
								<div class="col-md-3">
									<button type="submit" class="btn btn-primary btn-sm">Add City</button>
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