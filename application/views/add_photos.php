<style>
	/* Absolute Center Spinner */
	.loading {
	  position: fixed;
	  z-index: 999;
	  height: 2em;
	  width: 2em;
	  overflow: visible;
	  margin: auto;
	  top: 0;
	  left: 0;
	  bottom: 0;
	  right: 0;
	}

	/* Transparent Overlay */
	.loading:before {
	  content: '';
	  display: block;
	  position: fixed;
	  top: 0;
	  left: 0;
	  width: 100%;
	  height: 100%;
	  background-color: rgba(0,0,0,0.3);
	}

	/* :not(:required) hides these rules from IE9 and below */
	.loading:not(:required) {
	  /* hide "loading..." text */
	  font: 0/0 a;
	  color: transparent;
	  text-shadow: none;
	  background-color: transparent;
	  border: 0;
	}

	.loading:not(:required):after {
	  content: '';
	  display: block;
	  font-size: 10px;
	  width: 1em;
	  height: 1em;
	  margin-top: -0.5em;
	  -webkit-animation: spinner 1500ms infinite linear;
	  -moz-animation: spinner 1500ms infinite linear;
	  -ms-animation: spinner 1500ms infinite linear;
	  -o-animation: spinner 1500ms infinite linear;
	  animation: spinner 1500ms infinite linear;
	  border-radius: 0.5em;
	  -webkit-box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.5) -1.5em 0 0 0, rgba(0, 0, 0, 0.5) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
	  box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) -1.5em 0 0 0, rgba(0, 0, 0, 0.75) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
	}

	/* Animation */

	@-webkit-keyframes spinner {
	  0% {
	    -webkit-transform: rotate(0deg);
	    -moz-transform: rotate(0deg);
	    -ms-transform: rotate(0deg);
	    -o-transform: rotate(0deg);
	    transform: rotate(0deg);
	  }
	  100% {
	    -webkit-transform: rotate(360deg);
	    -moz-transform: rotate(360deg);
	    -ms-transform: rotate(360deg);
	    -o-transform: rotate(360deg);
	    transform: rotate(360deg);
	  }
	}
	@-moz-keyframes spinner {
	  0% {
	    -webkit-transform: rotate(0deg);
	    -moz-transform: rotate(0deg);
	    -ms-transform: rotate(0deg);
	    -o-transform: rotate(0deg);
	    transform: rotate(0deg);
	  }
	  100% {
	    -webkit-transform: rotate(360deg);
	    -moz-transform: rotate(360deg);
	    -ms-transform: rotate(360deg);
	    -o-transform: rotate(360deg);
	    transform: rotate(360deg);
	  }
	}
	@-o-keyframes spinner {
	  0% {
	    -webkit-transform: rotate(0deg);
	    -moz-transform: rotate(0deg);
	    -ms-transform: rotate(0deg);
	    -o-transform: rotate(0deg);
	    transform: rotate(0deg);
	  }
	  100% {
	    -webkit-transform: rotate(360deg);
	    -moz-transform: rotate(360deg);
	    -ms-transform: rotate(360deg);
	    -o-transform: rotate(360deg);
	    transform: rotate(360deg);
	  }
	}
	@keyframes spinner {
	  0% {
	    -webkit-transform: rotate(0deg);
	    -moz-transform: rotate(0deg);
	    -ms-transform: rotate(0deg);
	    -o-transform: rotate(0deg);
	    transform: rotate(0deg);
	  }
	  100% {
	    -webkit-transform: rotate(360deg);
	    -moz-transform: rotate(360deg);
	    -ms-transform: rotate(360deg);
	    -o-transform: rotate(360deg);
	    transform: rotate(360deg);
	  }
	}
</style>
<?php include "header.php" ?>
<div class="loading" style="display: none;">Loading&#8230;</div>
<section class="addImageSc" id="addImageSc">
<?php 
	$CI =& get_instance();
	$CI->load->model('Register_model');
	$photo = $CI->Register_model->fetchPhoto();
 ?>
<?php foreach ($photo as $key => $photoValue) { ?>
	<div class="container">
		<div class="row">
			<a href="#" id="backButtonPhoto" onClick="backAway()"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back to profile</a>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box fadeInUp animated-fast"> 
					<h2>Add Photos</h2>
				</div>
			</div>
			<div class="col-md-offset-1 col-md-10 addImageBackground">
				<div class="col-sm-4">
					<div style="display: inline-block; width: 18%; text-align: center;">
					<?php if ($photoValue->image1 !='') { $_SESSION['pp'] = $photoValue->image1; ?>
				 		<img src="<?=base_url().$photoValue->image1?>" alt="profile img" style="padding-bottom: 10px;">
				 		<a class="delete" href="#" data-id="<?=base_url('Register_controller/deleteImg/?img=1&img_path=').$photoValue->image1?>" style="background: #bb439b; padding: 5px 20px; color: #fff; border-radius: 4px; margin-top: 10px">
							Delete 
						</a>
				 	<?php }else { ?>
				 		<img src="<?=base_url()?>assets/images/pp.png" width="150px" alt="profile person">
				 	<?php } ?>
				 	</div>
				 </div>
				<div class="col-sm-5">
					<div class="prPhotoDesc"> 
						<h3 style="font-weight: 600"><?php $detailsValue=$this->db->get_where('users',array("user_id"=>$_SESSION['id']))->row();  ?>
						<?php 	if ($detailsValue->gender == 'male') { echo 'M';} else if($detailsValue->gender == 'female'){ echo 'F'; } ?>H<?=$detailsValue->user_id?></h3> 
						<h4 style="font-weight: 600"><?=$_SESSION['name']?></h4>
					</div>
				</div>
				<div class="col-sm-3">
					<?php if ($photoValue->image6 =='') { ?>
						<div class="plusIconAdd">
							<form id="imgUpload" enctype="multipart/form-data">
								<label class="filelabel">
								    <i class="fa fa-paperclip">
								    </i>
								    <span class="title">
								        Add Photo<br> Max Size (2 MB)
								    </span>
								    <input type="hidden" name="duu" value="dststs">
								    <input class="FileUpload1" id="FileInput" name="img" accept="image/jpeg" type="file"/>
								</label>
							</form>
						</div>
					<?php } ?>
				</div>

			</div>
			<div class="col-md-offset-1 col-md-10 addImageBackground">
				<div class="imgListAll">
					<div class="imgPipeline">
						<?php if ($photoValue->image2 !='') { ?>
				 		<img src="<?=base_url().$photoValue->image2?>" alt="profile img">
						<a class="delete" href="#" data-id="<?=base_url('Register_controller/deleteImg/?img=2&img_path=').$photoValue->image2?>">
							Delete <i class="fa fa-times" aria-hidden="true"></i>
						</a>
					 	<?php } else{ ?>
					 		<img src="<?=base_url()?>assets/images/default_profilepics.jpg" alt="profile img">
					 	<?php } ?>
					</div>
					<div class="imgPipeline">
						<?php if ($photoValue->image3 !='') { ?>
				 		<img src="<?=base_url().$photoValue->image3?>" alt="profile img">
						<a class="delete" href="#" data-id="<?=base_url('Register_controller/deleteImg/?img=3&img_path=').$photoValue->image3?>">
							Delete <i class="fa fa-times" aria-hidden="true"></i>
						</a>
					 	<?php } else{ ?>
					 		<img src="<?=base_url()?>assets/images/default_profilepics.jpg" alt="profile img">
					 	<?php } ?>
					</div>
					<div class="imgPipeline">
						<?php if ($photoValue->image4 !='') { ?>
				 		<img src="<?=base_url().$photoValue->image4?>" alt="profile img">
						<a class="delete" href="#" data-id="<?=base_url('Register_controller/deleteImg/?img=4&img_path=').$photoValue->image4?>">
							Delete <i class="fa fa-times" aria-hidden="true"></i>
						</a>
					 	<?php } else{ ?>
					 		<img src="<?=base_url()?>assets/images/default_profilepics.jpg" alt="profile img">
					 	<?php } ?>
					</div>
					<div class="imgPipeline">
						<?php if ($photoValue->image5 !='') { ?>
				 		<img src="<?=base_url().$photoValue->image5?>" alt="profile img">
						<a class="delete" href="#" data-id="<?=base_url('Register_controller/deleteImg/?img=5&img_path=').$photoValue->image5?>">
							Delete <i class="fa fa-times" aria-hidden="true"></i>
						</a>
					 	<?php } else{ ?>
					 		<img src="<?=base_url()?>assets/images/default_profilepics.jpg" alt="profile img">
					 	<?php } ?>
					</div>
					<div class="imgPipeline">
						<?php if ($photoValue->image6 !='') { ?>
				 		<img src="<?=base_url().$photoValue->image6?>" alt="profile img">
						<a class="delete" href="#" data-id="<?=base_url('Register_controller/deleteImg/?img=6&img_path=').$photoValue->image6?>">
							Delete <i class="fa fa-times" aria-hidden="true"></i>
						</a>
					 	<?php } else{ ?>
					 		<img src="<?=base_url()?>assets/images/default_profilepics.jpg" alt="profile img">
					 	<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
</section>
<script type="text/javascript">
	$("#FileInput").on('change',function (e) {
            var labelVal = $(".title").text();
            var oldfileName = $(this).val();
                fileName = e.target.value.split( '\\' ).pop();

                if (oldfileName == fileName) {return false;}
                var extension = fileName.split('.').pop();

            if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
                $(".filelabel i").removeClass().addClass('fa fa-file-image-o');
                $(".filelabel i, .filelabel .title").css({'color':'#208440'});
                $(".filelabel").css({'border':' 2px solid #208440'});
            }
            else if(extension == 'pdf'){
                $(".filelabel i").removeClass().addClass('fa fa-file-pdf-o');
                $(".filelabel i, .filelabel .title").css({'color':'red'});
                $(".filelabel").css({'border':' 2px solid red'});

            }
  else if(extension == 'doc' || extension == 'docx'){
            $(".filelabel i").removeClass().addClass('fa fa-file-word-o');
            $(".filelabel i, .filelabel .title").css({'color':'#2388df'});
            $(".filelabel").css({'border':' 2px solid #2388df'});
        }
            else{
                $(".filelabel i").removeClass().addClass('fa fa-file-o');
                $(".filelabel i, .filelabel .title").css({'color':'black'});
                $(".filelabel").css({'border':' 2px solid black'});
            }

            if(fileName ){
                if (fileName.length > 10){
                    $(".filelabel .title").text(fileName.slice(0,4)+'...'+extension);
                }
                else{
                    $(".filelabel .title").text(fileName);
                }
            }
            else{
                $(".filelabel .title").text(labelVal);
            }
        });
		$("input[name='img']").change(function (e) {
			$('.loading').show();
		  var formData = new FormData(document.getElementById("imgUpload"));
		  $.ajax({
		    url: "<?=base_url()?>Register_controller/uploadImage",
		    type: "POST",
		    data: formData,
		    success: function (msg) {
		    	$('.loading').hide();
		    	window.location.reload();
		      // $("#addImageSc").load("#addImageSc");
		    },
		    cache: false,
		    contentType: false,
		    processData: false
		  });

		  e.preventDefault();
		});

		$(".delete").on('click', function() {
			$('.loading').show();
		  var url = $(this).attr("data-id");
		  $.ajax({
				url: url,
				method: "GET",
			 	success: function(data)
				{
					$('.loading').hide();
					window.location.reload();
					// $("#addImageSc").load("#addImageSc");
				}
			});
		});

		// go back
		function backAway(){
	        //if it was the first page
	        if(history.length === 1){
	            window.location = "http://[::1]/xamppp/mat"
	        } else {
	            history.back();
	        }
	    }
</script>
<?php include "footer.php" ?>

