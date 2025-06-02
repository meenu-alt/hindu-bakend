
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<style>
    form,input,select{
        margin:10px;
        padding:10px;
    }
</style>
</head>
<body>




<form class="container py-5" method="POST" >
        <div class="">
        <div class="">
            <div class="">
                <h4 class="modal-title">Register for New Life</h4>
            </div>
            <div class="modal-body">
            	<h2>Registration Free</h2>
            	     <div class="form-group"> 
                  <div id="man_err" style="background:red;margin:10px"></div>
                  </div>
                  
                  <div class="row">
                      
                      <div class="col-md-6">
                           <div class="form-group"> 
				     <select id="looking_for" name="looking_for" class="form-control">  
				   	<option selected="" disabled="">Looking For</option>
                	<option value="Bride">Bride</option>
				   	<option value="Groom">Groom</option>

				  
				 
				   </select>
				 </div>
				 
				
                      </div>
                      
                      
                      
                      
                       <div class="col-md-6">
                          	 <div class="form-group"> 
				    <input type="text" class="form-control" name="name" placeholder="Full Name" required="">
				 </div>         
                      </div>
				  <div class="col-md-6">
                 
                      
				 <div class="form-group"> 
				     <select id="gender" name="gender" class="form-control">  
				   	<option selected="" disabled="">Gender</option>
                	<option value="male">Male</option>
				   	<option value="female">Female</option>

				  
				 
				   </select>
				 </div>
                      </div>
                      
                      
                      
                      
                       <div class="col-md-6">
                          		
                <div class="form-group"> 
				    <input type="text" class="form-control" name="dob" max="2006-09-03" onclick="this.type='date'" placeholder="Date of Birth" required="">
				 </div>
				      </div>
				 
				 
				  <div class="col-md-6">
                          
                 
                      
                <div class="form-group"> 
				     <select id="myReligion" name="religion" onchange="selectCaste()" class="form-control">  
				   	<option selected="" disabled="">Select Religion</option>
				   						<option value="HINDU">HINDU</option>
					
									 
				   </select>
				 </div>
                      </div>
                      
                      
                       <div class="col-md-6">
                             <div class="form-group"> 
				     <select id="my_caste" name="caste" class="form-control">  
				   	<option selected="" disabled="">Select Religion First</option>
				  
				 
				   </select>
				 </div>
                      </div>
                      
                      
                      
                      
                      
                      
                       <div class="col-md-6">
                          
            	    <div class="form-group"> 
				   <select name="pro_for" id="pro_for" class="form-control" required="">  
				   	<option value="" selected="" disabled="">Create Profile For</option>
					<option value="Self">Self</option>
					<option value="Son">Son</option>
					<option value="Daugter">Daughter</option>
					<option value="Brother">Brother</option>
					<option value="Sister">Sister</option>
					<option value="Friend">Friend</option>
				   </select>
				 </div>
                      </div>
                      
                      
                       <div class="col-md-6">
                          	 <div class="form-group"> 
				   <select name="language" class="form-control">  
				   	<option value="" selected="" disabled="">Language</option>
					<option value="Hindi">Hindi</option>
					<option value="Punjabi">Punjabi</option>
					<option value="Bhojpuri">Bhojpuri</option>
					<option value="Bangali">Bangali</option>
					<option value="Haryanvi">Haryanvi</option>
					<option value="Marathi">Marathi</option>
					<option value="Tamil">Tamil</option>
					<option value="Telgu">Telgu</option>
					<option value="Kannada">Kannada</option>
					<option value="Other">Other</option>
				   </select>
				 </div>
                      </div>
                      
                      
                      
                      
                      
                       <div class="col-md-6">
                                 	 
                <div class="form-group"> 
                  <div id="email_err" style="background:red;margin:10px"></div>
				    <input type="email" class="form-control" name="email"  id="email" placeholder="Email Id" required="">
				    
				 </div>
                      </div>
                      
                      
                      
                      
                       <div class="col-md-6">
                              <div class="form-group"> 
                  <div id="mobile_err" style="background:red;margin:10px"></div>
				    <input type="number" class="form-control" name="mobile"  maxlength="10" min="0" id="mobile" placeholder="Mobile Number" required="">
				 </div>
				 	
                      
                      
                      
                      </div>
                      
                      
                      
                      
                       <div class="col-md-12">
                          
				  <div class="form-group"> 
				    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password" required="">
				 </div>
				 
                      </div>
                      
                      
                      
                      
                      
                      
                      
                      
                      
                      
               
				 
				 
				 
                   
                      
                      
                      
                      
                    <!--///row end   -->
                  </div>
                  
            	 
            	
            	  
            	
            	
            
             
				 
				 
				 	
			
			
			
				 
				 
				<div class="form-group form-check">
    <label class="form-check-label" style="font-size:1em">
      <input class="form-check-input" type="checkbox" checked="" required="">&nbsp; I to Agree All <a target="_blank" style="color:blue;font-size:1em" href="http://localhost/perfomdigi/hindu-humsfar-react/backend//mycon/term_of_use"> Terms &amp; Condition </a> And <a style="color:blue;font-size:1em" target="_blank" href="http://localhost/perfomdigi/hindu-humsfar-react/backend//mycon/privacy_policy">Privacy Policy</a>
    </label>
  </div>
				 
				  
			 <button class="btn btn-success" type="submit" name="submit" value="1" id="Submit"  >Register</button>
		
				   <button type="button" class="btn btn-primary" onclick="window.location.href='<?=base_url();?>'">Home Page</button>
            </div>
    
            <div class="modal-footer">
              
            </div>
        </div>
    </div>
</form>


<script>
    function selectCaste() {
			    var religion = $("#myReligion").val();
			    $('#my_caste')
			        .empty()
			        .append('<option selected="selected" disabled>Select Caste</option>');
			    $.ajax({
			        url: "http://localhost/perfomdigi/hindu-humsfar-react/backend//Register_controller/selectCaste",
			        dataType: 'json',
			        method: "POST",
			        data: {
			            religion: religion
			        },
			        success: function(data) {
			            for (i = 0; i < data.length; i++) {
			                $('#my_caste')
			                    .append($("<option></option>")
			                        .attr("value", data[i])
			                        .text(data[i]));
			            }
			        }
			    });
			}
</script>



</body>
</html>




