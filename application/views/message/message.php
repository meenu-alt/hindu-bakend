<?php foreach ($data as $key => $msgValue) { ?>
  <?php if ($_SESSION['id'] == $msgValue->mesg_from) { ?>
     <div class="answer right">
      <div class="avatar">
        <?php if(isset($_SESSION['pp']) && !empty($_SESSION['pp']) ){ ?>
            <img src="<?=base_url().$_SESSION['pp']?>" alt="Profile Pic">
        <?php }else { ?>
            <img src="<?=base_url()?>assets/images/pp.png" alt="Profile Pic">                                
        <?php } ?>
        <!-- <img src="<?=base_url()?>assets/images/bride.jpg" alt="User name"> -->
        <!-- <div class="status offline"></div> -->
      </div>
      <div class="name"><?php  $this->db->where("user_id",$msgValue->mesg_from); $detailValue=$this->db->get("users")->row(); if($detailValue->gender == 'male') { echo 'M'; } 
								if($detailValue->gender == 'female'){ echo 'F'; }?>H<?=$msgValue->mesg_from?></div>
      <div class="text">
        <?=$msgValue->message?>
      </div>
      <div class="time"><?=date('j M Y g:i A', strtotime($msgValue->created_on))?></div>
    </div> 
  <?php  } else { ?>
    <?php
      $CI =& get_instance();
      $CI->load->model('Message_model');
      $profilePhoto = $CI->Message_model->getProfilePhoto($msgValue->mesg_from);
      // print_r($profilePhoto);
    ?>
    <div class="answer left">
      <div class="avatar">
        <?php if (!empty($pp=$profilePhoto[0]['image1'])) { ?>
          <img src="<?=base_url().$pp?>" alt="User name">
        <?php } else { ?>
          <img src="<?=base_url()?>assets/images/pp.png" alt="profile person">
        <?php } ?>
        <!-- <div class="status offline"></div> -->
      </div>
      <div class="name"><?php $detailValue=$this->db->get_where("users",array("user_id"=>$msgValue->mesg_from))->row(); if($detailValue->gender == 'male') { echo 'M'; } 
							if($detailValue->gender == 'female'){ echo 'F'; } ?>H<?=$msgValue->mesg_from?></div>
      <div class="text">
        <?=$msgValue->message?>
      </div>
      <div class="time"><?=date('j M Y g:i A', strtotime($msgValue->created_on))?></div>
    </div>
  <?php  } ?>
<?php  } ?>



