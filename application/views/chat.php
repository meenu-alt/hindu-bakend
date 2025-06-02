<?php include "header.php" ?>
<div class="content container">
      <div class="row row-broken">
        <div class="col-sm-3 col-xs-12">
          <div class="col-inside-lg decor-default chat" style="overflow: hidden; outline: none;" tabindex="5000">
            <div class="chat-users">
              <h6>Chats</h6>
                <div id="msgUser"></div>
            </div>
          </div>
        </div>
        <?php if (isset($id)) { ?>
          <div class="col-sm-9 col-xs-12 chat" style="overflow: hidden; outline: none;" tabindex="5001">
            <div class="col-inside-lg decor-default" id="msgChatActiveBody">
              <div class="chat-body">
                <h6><?php $detailValue=$this->db->get_where("users",array("user_id"=>$id))->row(); if($detailValue->gender == 'male') { echo 'M'; } 
								if($detailValue->gender == 'female'){ echo 'F'; } ?>H<?=$id;?></h6>
                <div id="mesg"></div>
                <div class="answer-add">
                  <textarea placeholder="Write a message" id="newMsg"></textarea>
                  
                  <!-- <span class="answer-btn answer-btn-2">dgas</span> -->
                  <span class="answer-btn answer-btn-1"><button style="background: #001cff;border: none;border-radius: 5px;padding: 3px 10px;color: white;" onclick="sendMessage()">Send</button></span>
                </div>
              </div>
            </div>
          </div>
        <?php } else {?>
          <div class="col-sm-9 col-xs-12 chat" style="overflow: hidden; outline: none;" tabindex="5001">
            <div class="col-inside-lg decor-default" id="msgBodyMain">
              <div class="chat-body">
                <h6>Message</h6>
                <div id="emptyChatBox">
                    <i class="fa fa-comments" aria-hidden="true"></i>
                    <p>Keep connected with matching profile</p>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div> 
    <script>

    <?php if (isset($id)) { ?>
      function sendMessage(){
        var msg = $('#newMsg').val();
        var msg_to = <?=$id?>;
        var msg_from = <?=$_SESSION['id']?>;
        if(msg != '')  
        {
          $.ajax({  
               url:"<?=base_url('Message_controller/insertMsg');?>",  
               method:"POST",
               dataType:"json",  
               data:{msg:msg, msg_to:msg_to, msg_from:msg_from},  
               success:function(e){
                if (e.errorCode == 200) {
                     $('#newMsg').val('');                    
                      msg();
                }
               }  
          });  
        }

      }
    <?php } ?>
// setTimeout(function(){
//    window.location.reload(1);
// }, 5000);
  <?php if (isset($id)) { ?>
      $(document).ready(function(){
        window.setInterval(function(){
          msgUser();
          msg();
        }, 1000);
      });
    <?php } else { ?>
      $(document).ready(function(){
        window.setInterval(function(){
          msgUser();
        }, 1000);
      });
    <?php } ?>
    <?php if (isset($id)) { ?>
      function msg(){
        var msg_id = <?=$id?>;
        $.ajax({  
               url:"<?=base_url('Message_controller/message');?>",  
               method:"POST",
               // dataType:"json",    
               data:{msg_id:msg_id},  
               success:function(e){
                if (e == 201) {
                  $('#mesg').html('Start your conversation');
                }else{
                  $('#mesg').html(e);
                }
                // if (e.errorCode == 200) {                 
                //       sendEvent('#demo-modal-3', 3);
                // }else {
                //   $('#otpErr').html('<p style="color: red">Wrong OTP</p>');
                // }
               }  
          });
      }
    <?php } ?>
      
      function msgUser(){
        $.ajax({  
               url:"<?=base_url('Message_controller/messageUser');?>",  
               success:function(e){
                if (e == 201) {
                  $('#msgUser').html('Empty Inbox');
                }else{
                  $('#msgUser').html(e);
                }
               }  
          });
      }
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/autosize.js/3.0.15/autosize.min.js'></script>
    <script>
        // Automatically size all of your <textarea> elements as you type
        autosize(document.querySelectorAll('textarea'));
        
        $( document ).ready(function() {  
          $("#msgChatActiveBody").stop().animate({ scrollTop: $("#msgChatActiveBody")[0].scrollHeight}, 2000);  

          $("#submit").click(function() { 
          $("#msgChatActiveBody").stop().animate({ scrollTop: $("#msgChatActiveBody")[0].scrollHeight}, 1000);  
          });
        });
    </script>
<?php include "footer.php" ?>