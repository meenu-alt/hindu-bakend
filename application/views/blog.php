<?php include "header.php" ?> 
<section class="profile">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box fadeInUp animated-fast">
				<h2>Blog</h2>
			</div>
		</div>
		<?php if (!empty($detail)) { ?>
		<div class="row">
			<div class="col-md-8">	
				<div class="blog__Content">			
				<?php foreach ($detail as $key => $detailValue) { ?>
					<div class="row blog_list__content">
			  			<div class="col-md-4 col-xs-4"> 
			  				<a href="<?=base_url('mycon/blog_details/'.$detailValue->blog_id)?>">
			  					<img src="<?=base_url().$detailValue->blog_img?>" alt="<?=$detailValue->blog_keyword?>">
			  				</a>
			  			</div>
			  			<div class="col-md-8 col-xs-8">
			  				<a href="<?=base_url('mycon/blog_details/'.$detailValue->blog_id)?>">
				  				<h2><?= $detailValue->blog_name; ?></h2>
				  				<p><?= $detailValue->blog_description; ?></p>
				  				<h6><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date("d-M-Y g:i A", strtotime($detailValue->updated_on)); ?></h6>
				  			</a>
			  			</div>  
			  		</div>
				<?php } ?> 			
				</div>
			</div>

  			<div class="col-md-4">
  				<div class="blog__ContentSide">
  					<h5 class="text-center mb-4">OLDER POSTS</h5>
  					<?php foreach($older_post as $older_post_list){ ?>
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
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<li class="list-group-item">
					<nav class="text-center">
						<?php echo $links; ?>
					</nav>
				</li>
			</div>
		</div>
		<?php } else { ?>
			<h3 style="padding-bottom: 200px;">Result not found.</h3>
		<?php } ?>
  	</div>
  </section>
<?php include "footer.php" ?>