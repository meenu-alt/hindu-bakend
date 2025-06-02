<?php foreach ($data as $key => $msgValue) { ?>
  <?php if ($_SESSION['id'] == $msgValue->mesg_from) { ?>
     <div class="answer right">
      <div class="avatar">
        <img src="<?=base_url()?>assets/images/bride.jpg" alt="User name">
        <div class="status offline"></div>
      </div>
      <div class="name">HH - <?=$msgValue->mesg_from?></div>
      <div class="text">
        <?=$msgValue->message?>
      </div>
      <div class="time"><?=$msgValue->created_on?></div>
    </div> 
  <?php  } else { ?>
    <div class="answer left">
      <div class="avatar">
        <img src="<?=base_url()?>assets/images/groom.jpg" alt="User name">
        <div class="status offline"></div>
      </div>
      <div class="name">HH - <?=$msgValue->mesg_from?></div>
      <div class="text">
        <?=$msgValue->message?>
      </div>
      <div class="time"><?=$msgValue->created_on?></div>
    </div>
  <?php  } ?>
<?php  } ?>