<?php include "header.php" ?> 
<section class="profile">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box fadeInUp animated-fast">
				<h2>Blog</h2>
			</div>
		</div>
  		<div class="row">
  			<div class="col-md-8">
  				<div class="blog__Content">
  					<?php foreach($detail as $blog_details){ ?>
	  					<img src="<?=base_url().$blog_details->blog_img?>">
	  					<div class="heading__section">
	  						<h5><?php echo date("d M Y g:i A", strtotime($blog_details->updated_on)); ?></h5>
	  						<h1><?php echo $blog_details->blog_description ?></h1>
	  					</div>
	  					<div class="blog_details_rich_text">
	  						<?php echo $blog_details->blog_desc; ?>
	  					</div>
					<?php } ?>
  				</div>
  			</div>
  			<div class="col-md-4">
  				<div class="blog__ContentSide">
  					<h5 class="text-center mb-4">RECENT POSTS</h5>
  					<?php foreach($recent_post as $older_post_list){ ?>
  					<div class="row sideTopicsLatest"> 
  						<div class="col-md-3">
  							<a href="<?=base_url('mycon/blog_details/'.$older_post_list->blog_id)?>">
  								<img src="<?=base_url().$older_post_list->blog_img; ?>">
  							</a>
  						</div>
  						<div class=" col-md-9">
  							<a href="<?=base_url('mycon/blog_details/'.$older_post_list->blog_id)?>">
				  				<h2><?= $older_post_list->blog_name; ?></h2> 
				  				<h6><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date("d-M-Y g:i A", strtotime($older_post_list->updated_on)); ?></h6>
				  			</a>
  						</div> 
  						<div class="col-md-12"></div>
  					</div>
  					<?php } ?>
  				</div>
  			</div>
  		</div>
  	</div>
  </section>
<?php include "footer.php" ?>