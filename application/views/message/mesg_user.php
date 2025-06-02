<?php foreach ($data as $key => $dataValue) { ?>
	<?php if ($dataValue != $_SESSION['id']){ ?>
		<?php
			$CI =& get_instance();
			$CI->load->model('Message_model');
			$profilePhoto = $CI->Message_model->getProfilePhoto($dataValue);
			// print_r($profilePhoto);
		?>
		<a href="<?=base_url('mycon/chat/?id=').$dataValue?>">
			<div class="user">
			    <div class="avatar">
			    <?php if (!empty($pp=$profilePhoto[0]['image1'])) { ?>
			    	<img src="<?=base_url().$pp?>" alt="User name">
			    <?php } else { ?>
			    	<img src="<?=base_url()?>assets/images/pp.png" alt="profile person">
			    <?php } ?>
			    <!-- <div class="status off"></div> -->
			    </div>
			    <div class="name"><?php $detailValue=$this->db->get_where("users",array("user_id"=>$dataValue))->row(); if($detailValue->gender == 'male') { echo 'M'; } 
								if($detailValue->gender == 'female'){ echo 'F'; }?>H<?=$dataValue?></div>
			    <!-- <div class="mood">Offline</div> -->
			    <div class="mood">
			    	<?php
			    	if (!empty($msgCount)) {
			    	 	# code...
				    	foreach ($msgCount as $msgCountValue) { 
				    		if ($msgCountValue->mesg_from == $dataValue) {
				    			echo $msgCountValue->no_msg;
				    		}
				    	} 
			    	 } 
			    	?>
			    </div>
			</div>
		</a>
	<?php } ?>
<?php } ?>