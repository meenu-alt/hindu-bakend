<footer class="ftr" >
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
				<div class="col-md-4 col-sm-4 col-xs-4 ftrList hidden-xs">
					<h2>Need Help ?</h2>
					<ul>
						<?php if (!isset($_SESSION['id'])) { ?>
						<li>
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;<a href="#">Partner Search</a>
						</li>
						<?php }else { ?>
						<li>
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;<a href="<?=base_url('mycon/search')?>">Partner Search</a>
						</li>
						<?php } ?>
						
						<li>
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;<a href="<?=base_url('mycon/how_to_use')?>">How to use ?</a>
						</li>
						<li>
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;<a href="<?=base_url('mycon/customer_support')?>">Contact Us</a>
						</li>
					</ul>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4 ftrList  hidden-xs">
					<h2>Privacy & You</h2>
					<ul>
						<li>
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;<a href="<?=base_url('mycon/term_of_use')?>">Terms of Use</a>
						</li>
						<li>
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;<a href="<?=base_url('mycon/privacy_policy')?>">Privacy Policy</a>
						</li>
						<?php /*
						<li>
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;<a href="<?=base_url('mycon/be_safe_online')?>">Be Safe Online</a>
						</li>
						*/ ?>
						<li>
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;<a href="<?=base_url('mycon/blog')?>">Blog</a>
						</li>
					</ul>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4 ftrList  hidden-xs">
					<h2>More</h2>
					<ul>
						<?php if (!isset($_SESSION['id'])) { ?>
						<li>
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;<a href="#" data-toggle="modal" data-target="#login-modal">Member Login</a>
						</li>
						<li>
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;<a href="#" data-toggle="modal" data-target="#demo-modal-3">Sign Up</a>
						</li>
						<?php }else { ?>
						<li>
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;<a href="<?=base_url('mycon/desire_patner_match')?>">Desired Partner Matches</a>
						</li>
						<li>
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;<a href="<?=base_url('mycon/recently_joint_match')?>">Recently Joined Matches</a>
						</li>
						<?php } ?>
						<li>
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;<a href="<?=base_url('mycon/report_misuse')?>">Report Misuse</a>
						</li>
					</ul>
				</div>
				<div class="col-md-12  col-sm-12 col-xs-12 ftr_bottom hidden-xs">
					<p>&copy; Copyright 2019-<?=date("Y");?>. All Rights Reserved By Hello Humsafar </p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
				<div class="col-md-4 col-sm-4 col-xs-4 ftrList  visible-xs">
					<h2>Need Help ?</h2>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4 ftrList  visible-xs">
					<h2>Privacy & You</h2>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4 ftrList  visible-xs">
					<h2>More</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
				<div class="col-md-4 col-sm-4 col-xs-4 ftrList  visible-xs">
					<ul>
						<?php if (!isset($_SESSION['id'])) { ?>
						<li>
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;<a href="#">Partner Search</a>
						</li>
						<?php }else { ?>
						<li>
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;<a href="<?=base_url('mycon/search')?>">Partner Search</a>
						</li>
						<?php } ?>
					</ul>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4 ftrList  visible-xs">
					<ul>
						<li>
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;<a href="<?=base_url('mycon/term_of_use')?>">Terms of Use</a>
						</li>
					</ul>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4 ftrList  visible-xs">
					<ul>
						<?php if (!isset($_SESSION['id'])) { ?>
						<li>
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;<a href="#" data-toggle="modal" data-target="#login-modal">Member Login</a>
						</li>
						<?php }else { ?>
						<li>
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;<a href="<?=base_url('mycon/desire_patner_match')?>">Desired Partner Matches</a>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
				<div class="col-md-4 col-sm-4 col-xs-4 ftrList  visible-xs">
					<ul>
						<li>
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;<a href="<?=base_url('mycon/how_to_use')?>">How to use ?</a>
						</li>
					</ul>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4 ftrList  visible-xs">
					<ul>
						<li>
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;<a href="<?=base_url('mycon/privacy_policy')?>">Privacy Policy</a>
						</li>
					</ul>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4 ftrList  visible-xs">
					<ul>
						<?php if (!isset($_SESSION['id'])) { ?>
						<li>
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;<a href="#" data-toggle="modal" data-target="#demo-modal-3">Sign Up</a>
						</li>
						<?php }else { ?>
						<li>
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;<a href="<?=base_url('mycon/recently_joint_match')?>">Recently Joined Matches</a>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
				<div class="col-md-4 col-sm-4 col-xs-4 ftrList  visible-xs">
					<ul>
						<li>
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;<a href="<?=base_url('mycon/customer_support')?>">Contact Us</a>
						</li>
					</ul>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4 ftrList  visible-xs">
					<ul>
						<?php /*
						<li>
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;<a href="<?=base_url('mycon/be_safe_online')?>">Be Safe Online</a>
						</li>
						*/ ?>
						<li>
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;<a href="<?=base_url('mycon/blog')?>">Blog</a>
						</li>
					</ul>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4 ftrList  visible-xs">
					<ul>
						<li>
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>&nbsp;<a href="<?=base_url('mycon/report_misuse')?>">Report Misuse</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer>
</div>
<div class="gototop js-top">
<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>
<!-- PopUp Hide profile Start -->
<!-- Modal -->
<div class="modal fade" id="hideProfile" tabindex="-1" role="dialog" aria-labelledby="hideProfileLabel">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="hideProfileLabel">Hide Your Profile</h4>
		</div>
		<div class="modal-body">
			Are you sure you want to hide your profile ?
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			<a href="<?=base_url('Register_controller/hide_pro')?>">
				<button type="button" class="btn btn-primary">Proceed</button>
			</a>
		</div>
	</div>
</div>
</div>
<!-- PopUp Hide profile End -->

<!-- PopUp Delete profile Start -->
<!-- Modal -->
<div class="modal fade" id="deleteProfile" tabindex="-1" role="dialog" aria-labelledby="deleteProfileLabel">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="deleteProfileLabel">Delete Your Profile</h4>
		</div>
		<form action="<?=base_url('Register_controller/delete_pro')?>" method="post">
			<div class="modal-body">
				Are you sure you want to Delete your profile ? After proceed it will take upto 30 days for deletion.
				<div class="feedback" style="text-align: left;">
					<input type="radio" name="message" value="I found my humsafar on hello humsafar" onclick="checkValue(this)"> I found my humsafar on Hello Humsafar.<br>
					<input type="radio" name="message" value="I found my humsafar elsewhere" onclick="checkValue(this)"> I found my humsafar elsewhere.<br>
					<input type="radio" name="message" value="I am unhappy with my experience on hello humsafar" onclick="checkValue(this)"> I am unhappy with my experience on Hello Humsafar.<br>
					<input type="radio" name="message" value="Other" onclick="checkValue(this)"> Other<br>
					<textarea name="message1" id="mesgBox" style="display: none; color: #000;"></textarea>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-primary">Proceed</button>
			</div>
		</form>
	</div>
</div>
</div>
<!-- PopUp Hide profile End -->

<!-- jQuery -->
<!-- <script src="<?=base_url()?>assets/js/jquery.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="<?=base_url()?>assets/js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="<?=base_url()?>assets/js/jquery.waypoints.min.js"></script>
<!-- Carousel -->
<script src="<?=base_url()?>assets/js/owl.carousel.min.js"></script>
<!-- countTo -->
<script src="<?=base_url()?>assets/js/jquery.countTo.js"></script>
<!-- Stellar -->
<script src="<?=base_url()?>assets/js/jquery.stellar.min.js"></script>
<!-- Magnific Popup -->
<script src="<?=base_url()?>assets/js/jquery.magnific-popup.min.js"></script>
<script src="<?=base_url()?>assets/js/magnific-popup-options.js"></script>
<!-- // <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.min.js"></script> -->
<script src="<?=base_url()?>assets/js/simplyCountdown.js"></script>
<!-- Main -->
<script src="<?=base_url()?>assets/js/main.js"></script>
<script src="<?=base_url()?>assets/js/multi-step-modal.js"></script>
<script src="<?=base_url()?>assets/js/jquery.toast.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" ></script>

<?php
	if ($feedback = $this->session->flashdata('feedback')) {
		$feedback_heading = $this->session->flashdata('feedback_heading');
		$feedback_icon = $this->session->flashdata('feedback_icon');
?>
<script>
    $(document).ready(function() {
        if (!$(this).hasClass('generate-toast')) {
            var code = $.toast({
                heading: '<?=$feedback_heading;?>',
                text: '<?=$feedback;?>',
                position: 'top-right',
                icon: '<?=$feedback_icon;?>'
            });
        };
    });
</script>
<?php }?>

<script>
var d = new Date(new Date().getTime() + 200 * 120 * 120 * 2000);
// default example
simplyCountdown('.simply-countdown-one', {
    year: d.getFullYear(),
    month: d.getMonth() + 1,
    day: d.getDate()
}); 

//jQuery example
$('#simply-countdown-losange').simplyCountdown({
    year: d.getFullYear(),
    month: d.getMonth() + 1,
    day: d.getDate(),
    enableUtc: false
});

$(".datepicker").datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true,
    endDate: '-21y'
}); 

// Year month days onChange for no of days
function generateDays(sel) {
    var selYear = document.getElementById('byear').value;
    var selMonth = document.getElementById('bmonth').value; 
    var noDays = new Date(selYear, selMonth, 0).getDate();

    //Clear the bday select element first
    document.getElementById('bday').innerHTML = "";

    for (i = 1; i <= noDays; i++) {
    	if(i.toString().length < 2) {
    		var dateFormat = '0' + i;
    	}else{
    		var dateFormat = i;
    	}
        document.getElementById('bday').innerHTML += "<option value='" + dateFormat + "'>" + dateFormat + "</option>";
    }
}

</script>

<script>
sendEvent = function(sel, step) {
    var sel_event = new CustomEvent('next.m.' + step, {
        detail: {
            step: step
        }
    });
    window.dispatchEvent(sel_event);
}
</script>
<script>
	function checkValue(val) {
	    if (val.value == 'Other') {
	        $('#mesgBox').show();
	    } else {
	        $('#mesgBox').hide();
	    }
	}
</script>
<script src="<?=base_url()?>assets/js/bootstrap-multiselect.js"></script>
<script type="text/javascript">
	$(function() {
	    $('#maritalStatusHH, #cityHH, #educationHH, #highestEducationHH, #occupationHH, #incomeDpHH, #myCaste, #motherToungHH, #stateNameHH').multiselect({
	        includeSelectAllOption: true
	    });
	});
</script>
<script>
	if (window.history.replaceState) {
	    window.history.replaceState(null, null, window.location.href);
	}
</script>
</body>
</html>