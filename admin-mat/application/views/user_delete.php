<?php include('header.php'); ?>
<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <div class="header-icon">
          <i class="fa fa-users"></i>
       </div>
       <div class="header-title">
          <h1>Users</h1>
          <small>Deleted User</small>
       </div>
    </section>
    <!-- Main content -->
    <section class="content">      
       <div class="row">
          <div class="col-sm-12">
             <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                   <div class="btn-group" id="buttonexport">
                      <a href="#">
                         <h4>Deleted User</h4>
                      </a>
                   </div>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-12">
                      <style>
                        .pagination {
                          margin-left: 15px;
                        }

                        .pagination li:hover{
                            cursor: pointer;
                        }
                        .num_rows {
                          width: 50%;
                          float:left;
                        }
                        .tb_search{
                          width: 50%;
                        }
                        .pagination-container {
                          width: 70%;
                          float:left;
                        }

                        .rows_count {
                          width: 20%;
                          float:right;
                          text-align:right;
                          color: #999;
                        }
                .userListAdmin h5{
                font-weight: 600;
                font-size: 18px;
                padding-bottom: 8px;
                border-bottom: 1px solid #ccc;
                }
                .userListAdmin ul{
                padding: 0;
                margin: 0;
                }
                .userListAdmin ul li{
                list-style: none;
                }
                .userListAdmin ul li:first-child{
                font-weight: 600;
                margin-bottom: 2px;
                }
                .userListAdmin ul li:last-child {
                    color: #666;
                    margin-bottom: 10px;
                    text-transform: capitalize;
                }
                span.inactiveAdminPanel {
                    background: #ff8d00;
                    padding: 2px 10px;
                    border-radius: 4px;
                    color: #fff;
                    font-size: 12px;
                }
                span.activeAdminPanel {
                       background: #52ff26;
                      padding: 2px 10px;
                      border-radius: 4px;
                      color: #000000;
                      font-size: 12px;
                }
                span.blockedAdminPanel {
                       background: #f00;
                      padding: 2px 10px;
                      border-radius: 4px;
                      color: #fff;
                      font-size: 12px;
                }
                      </style>
                      <div class="col-sm-6">
                        <div class="num_rows" style="display: none;">                    
                          <div class="form-group">  <!--    Show Numbers Of Rows    -->
                            <select class  ="form-control" name="state" id="maxRows">
                               <option value="100">100</option>
                              <option value="5000">Show ALL Rows</option>
                            </select>                          
                          </div>
                        </div>
                        <div class="tb_search">                    
                          <div class="form-group">  <!--    Show Numbers Of Rows    -->
                            <select class  ="form-control" id="search_input_all" onchange="FilterkeyWord_all_table()">                            
                               <option value="">ALL</option>
                               <option value="Male">Male</option>
                               <option value="Female">Female</option>
                            </select>                          
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <!-- <div class="tb_search">
                          <input type="text" id="search_input_all" onkeyup="FilterkeyWord_all_table()" placeholder="Search.." class="form-control">
                        </div> -->
                      </div>
                    </div>
                  </div>
                   <div class="table-responsive">
                      <table id="table-id" class="table table-bordered table-class table-striped table-hover">
                         <thead>
                            <tr class="info">
                             
                               <th>User ID</th>
                               <th>Gender</th>
                               <th>Comments</th>
                      
                               <th>Time</th>
                               <th>Action</th>
                            </tr>
                         </thead>
                         <tbody>
                          <?php if (!empty($all_user)) { ?>
                            <?php foreach ($all_user as $allUserValue) { ?>
                                <tr>
                                   
                                  
                                   <td><?=$allUserValue['user_id']?></td>
                                   <td><?=$allUserValue['gender']?></td>
                                   <td><?=$allUserValue['comment']?></td>
                                   <td><?=$allUserValue['created_on']?></td>                           
                                   <td>
                                      <button type="button"  data-id="<?=$allUserValue['user_id']?>"  class="btn btn-add btn-sm viewUser" data-toggle="modal" data-target="#customer1"><i class="fa fa-eye"></i></button>
                                        <a href="<?=base_url('admin_controller/delete_user/').$allUserValue['user_id']?>">
                                          <button type="button" class="btn btn-danger btn-sm" ><i class="fa fa-times-circle"></i> </button>
                                        </a>
                                 
                                      
                                          <!--  <a href="<?php //base_url('admin_controller/delete_user/').$allUserValue['user_id']?>" class="btn btn-danger btn-sm" style="margin:3px" title="Delete User" onclick="return confirm('You Want To Delete \nUser=<?php //$allUserValue['user_id']?>')" ><i class="fa fa-times-circle"></i></a>-->
                                   </td>
                                </tr>
                            <?php } ?>
                          <?php } else { ?>
                            <tr>
                              <td colspan="6">No Data Found</td>
                            </tr>
                          <?php } ?>
                         </tbody>
                      </table>
                   </div>
                   <div class="row">
                     <!--   Start Pagination -->
                      <div class='pagination-container'>
                        <nav>
                          <ul class="pagination">
                           <!-- Here the JS Function Will Add the Rows -->
                          </ul>
                        </nav>
                      </div>
                      <div class="rows_count">Showing 11 to 20 of 91 entries</div>
                   </div>
                </div>
             </div>
          </div>
       </div>       
       <!-- customer Modal1 -->
       <div class="modal fade" id="customer1" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-primary">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3><i class="fa fa-user m-r-5"></i> User Detail</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="userListAdmin">
            <div class="col-md-12">
              <h5>Account Details</h5>
            </div>
            <div class="col-md-12">
            <div class="col-md-2">
              <ul>
                <li>Image1</li>
                <li id="image1"> </li>
              </ul>
            </div>
            <div class="col-md-2">
              <ul>
                <li>Image2</li>
                <li id="image2"> </li>
              </ul>
            </div>
            <div class="col-md-2">
              <ul>
                <li>Image3</li>
                <li id="image3"> </li>
              </ul>
            </div>
            <div class="col-md-2">
              <ul>
                <li>Image4</li>
                <li id="image4"> </li>
              </ul>
            </div>
            <div class="col-md-2">
              <ul>
                <li>Image5</li>
                <li id="image5"> </li>
              </ul>
            </div>
            <div class="col-md-2">
              <ul>
                <li>Image6</li>
                <li id="image6"> </li>
              </ul>
            </div>
            </div>
            <div class="col-md-6">
              <ul>
                <li>User Id</li>
                <li id="user_id" style="display: inline-block;"></li> 
                <li id="statusUser" style="display: inline-block;"></li>
              </ul>
            </div>
            <div class="col-md-6">
              <ul>
                <li>Name</li>
                <li id="name"></li>
              </ul>
            </div>
            <div class="col-md-6">
              <ul>
                <li>Email id</li>
                <li id="email" style="text-transform: lowercase;"></li>
              </ul>
            </div>
            <div class="col-md-6">
              <ul>
                <li>Mobile No.</li>
                <li id="phone"></li>
              </ul>
            </div>
            <div class="col-md-12">
              <h5>Basic Details</h5>
            </div>
            <div class="col-md-3">
              <ul>
                <li>Date of Birth</li>
                <li id="dob"></li>
              </ul>
              <ul>
                <li>Gender</li>
                <li id="gender"></li>
              </ul>
              <ul>
                <li>Looking For</li>
                <li id="looking_for"></li>
              </ul>
            </div>
            <div class="col-md-3">
              <ul>
                <li>Religion</li>
                <li id="religion"></li>
              </ul>
            </div>
            <div class="col-md-3">
              <ul>
                <li>Caste</li>
                <li id="caste"></li>
              </ul>
            </div>
            <div class="col-md-3">
              <ul>
                <li>Sub Caste</li>
                <li id="sub_caste"></li>
              </ul>
            </div>
            <div class="col-md-3">
              <ul>
                <li>Location</li>
                <li id="curr_location"></li>
              </ul>
            </div>
            <div class="col-md-3">
              <ul>
                <li>Marital Status</li>
                <li id="marital_status"></li>
              </ul>
            </div>
            <div class="col-md-3">
              <ul>
                <li>Height (in feet)</li>
                <li id="height"></li>
              </ul>
            </div>
            <div class="col-md-3">
              <ul>
                <li>Weight (in Kg)</li>
                <li id="weight"></li>
              </ul>
            </div>
            <div class="col-md-3">
              <ul>
                <li>Body Type</li>
                <li id="bdy_type"></li>
              </ul>
            </div>
            <div class="col-md-3">
              <ul>
                <li>Mother Tongue</li>
                <li id="language"></li>
              </ul>
            </div>
            <div class="col-md-3">
              <ul>
                <li>Complexion</li>
                <li id="complexion"></li>
              </ul>
            </div>
            <div class="col-md-3">
              <ul>
                <li>Eating Habits</li>
                <li id="eating"></li>
              </ul>
            </div>
            <div class="col-md-3">
              <ul>
                <li>Drinking Habits</li>
                <li id="drinking"></li>
              </ul>
            </div>
            <div class="col-md-3">
              <ul>
                <li>Smoking Habits</li>
                <li id="smoking"></li>
              </ul>
            </div>
            <div class="col-md-3">
              <ul>
                <li>Physical Status</li>
                <li id="ps"></li>
              </ul>
            </div>
            <div class="col-md-12">
              <ul>
                <li>User Description</li>
                <li id="desc"></li>
              </ul>
            </div> 
            <div class="col-md-12">
              <h5>Contact Details</h5>
            </div>
            <div class="col-md-12">
              <ul>
                <li>Address</li>
                <li id="address"></li>
              </ul>
            </div>
            <div class="col-md-3">
              <ul>
                <li>State</li>
                <li id="state"></li>
              </ul>
            </div>
            <div class="col-md-3">
              <ul>
                <li>City</li>
                <li id="city"></li>
              </ul>
            </div>  
            <div class="col-md-3">
              <ul>
                <li>Country</li>
                <li id="country"></li>
              </ul>
            </div> 
            <div class="col-md-3">
              <ul>
                <li>Pincode</li>
                <li id="pin"></li>
              </ul>
            </div> 
            <div class="col-md-12">
              <h5>Education & Career</h5>
            </div>
            <div class="col-md-3">
              <ul>
                <li>Highest Education</li>
                <li id="highest_edu"></li>
              </ul>
            </div> 
            <div class="col-md-3">
              <ul>
                <li>UG Degree</li>
                <li id="ug_degree"></li>
              </ul>
            </div> 
            <div class="col-md-3">
              <ul>
                <li>Other UG Degree</li>
                <li id="oth_ug_degree"></li>
              </ul>
            </div> 
            <div class="col-md-3">
              <ul>
                <li>Employed In</li>
                <li id="emp_in"></li>
              </ul>
            </div> 
            <div class="col-md-3">
              <ul>
                <li>Organization Name</li>
                <li id="org_name"></li>
              </ul>
            </div> 
            <div class="col-md-3">
              <ul>
                <li>School/College Name</li>
               <li id="schl_name"></li>
              </ul>
            </div> 
            <div class="col-md-3">
              <ul>
                <li>School/College Name</li>
                <li id="pg_college"></li>
              </ul>
            </div> 
            <div class="col-md-3">
              <ul>
                <li>Other PG Degree</li>
                <li id="oth_pg_degree"></li>
              </ul>
            </div> 
            <div class="col-md-3">
              <ul>
                <li>Occupation</li>
                <li id="occupation"></li>
              </ul>
            </div> 
            <div class="col-md-3">
              <ul>
                <li>Annual Income</li>
                <li id="annual_income"></li>
              </ul>
            </div>  
            <div class="col-md-12">
              <h5>Family Details</h5>
            </div>
            <div class="col-md-3">
              <ul>
                <li>Mother's Name</li>
                <li id="mother"></li>
              </ul>
            </div> 
            <div class="col-md-3">
              <ul>
                <li>Father's Name</li>
                <li id="father"></li>
              </ul>
            </div> 
            <div class="col-md-3">
              <ul>
                <li>Sister(s)</li>
                <li id="sister"></li>
              </ul>
            </div> 
            <div class="col-md-3">
              <ul>
                <li>Brother(s)</li>
                <li id="brother"></li>
              </ul>
            </div> 
            <div class="col-md-3">
              <ul>
                <li>Gothra</li>
                <li id="gothra"></li>
              </ul>
            </div> 
            <div class="col-md-3">
              <ul>
                <li>Gothra (Maternal)</li>
                <li id="gothra_maternal"></li>
              </ul>
            </div> 
            <div class="col-md-3">
              <ul>
                <li>Family Status</li>
                <li id="family_status"></li>
              </ul>
            </div> 
            <div class="col-md-3">
              <ul>
                <li>Family Income</li>
                <li id="family_income"></li>
              </ul>
            </div> 
            <div class="col-md-3">
              <ul>
                <li>Family Type</li>
                <li id="family_type"></li>
              </ul>
            </div> 
            <div class="col-md-3">
              <ul>
                <li>Family based out of</li>
                <li id="family_based"></li>
              </ul>
            </div> 
            <div class="col-md-3">
              <ul>
                <li>Living with parents ?</li>
                <li id="living_wth_parents"></li>
              </ul>
            </div>   
          </div>
          <!-- <div class="col-md-12">
            <form class="form-horizontal">
              <fieldset> 
                <div class="col-md-12 form-group user-form-group">
                  <div class="pull-right">
                    <button type="button" class="btn btn-add btn-sm"  data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm">Block</button>
                  </div>
                </div>
              </fieldset>
            </form>
          </div> -->
        </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
      </div> -->
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
       <!-- /.modal -->
       <!-- Modal -->    
       <!-- Customer Modal2 -->
       <div class="modal fade" id="customer2" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modal-header-primary">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3><i class="fa fa-user m-r-5"></i> Delete Customer</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <form class="form-horizontal">
              <fieldset>
                <div class="col-md-12 form-group user-form-group">
                  <label class="control-label">Delete Customer</label>
                  <div class="pull-right">
                    <button type="button" class="btn btn-danger btn-sm">NO</button>
                    <button type="submit" class="btn btn-add btn-sm">YES</button>
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
       <!-- /.modal -->
    </section>
    <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script>
  $(document).ready(function(){

    $('.viewUser').on('click',function(){
        var id = $(this).attr('data-id'); 
        $.ajax({
          type:'POST',
          dataType:'json',
          data:{id:id},
          url:"<?php echo base_url('admin_controller/viewUser')?>",
          success:function(e){
            // if(e.msg != 'Successfully Updated'){ 
              console.log(e);
              $('#address').html(e.address == '' ? 'Not Filled' : e.address);
              $('#annual_income').html(e.annual_income == '' ? 'Not Filled' : e.annual_income + ' LPA');
              $('#area').html(e.area == '' ? 'Not Filled' : e.area);
              $('#bdy_type').html(e.bdy_type == '' ? 'Not Filled' : e.bdy_type);
              $('#brother').html(e.brother == '' ? 'Not Filled' : e.brother);
              $('#caste').html(e.caste == '' ? 'Not Filled' : e.caste);
              $('#city').html(e.city == '' ? 'Not Filled' : e.city);
              $('#complexion').html(e.complexion == '' ? 'Not Filled' : e.complexion);
              $('#country').html(e.country == '' ? 'Not Filled' : e.country);
              $('#curr_location').html(e.curr_location == '' ? 'Not Filled' : e.curr_location);
              $('#desc').html(e.desc == '' ? 'Not Filled' : e.desc);
              $('#dob').html(e.dob == '' ? 'Not Filled' : e.dob);
              $('#drinking').html(e.drinking == '' ? 'Not Filled' : e.drinking);
              $('#eating').html(e.eating == '' ? 'Not Filled' : e.eating);
              $('#email').html(e.email == '' ? 'Not Filled' : e.email);
              $('#emp_in').html(e.emp_in == '' ? 'Not Filled' : e.emp_in);
              $('#family_based').html(e.family_based == '' ? 'Not Filled' : e.family_based);
              $('#family_income').html(e.family_income == '' ? 'Not Filled' : e.family_income + ' LPA');
              $('#family_status').html(e.family_status == '' ? 'Not Filled' : e.family_status);
              $('#family_type').html(e.family_type == '' ? 'Not Filled' : e.family_type);
              $('#father').html(e.father == '' ? 'Not Filled' : e.father);
              $('#gender').html(e.gender == '' ? 'Not Filled' : e.gender);
              $('#gothra').html(e.gothra == '' ? 'Not Filled' : e.gothra);
              $('#gothra_maternal').html(e.gothra_maternal == '' ? 'Not Filled' : e.gothra_maternal);
              $('#height').html(e.height == '' ? 'Not Filled' : e.height);
              $('#highest_edu').html(e.highest_edu == '' ? 'Not Filled' : e.highest_edu);

              $('#image1').html(e.image1 == '' ? '<img src="<?=MAIN_SITE_URL?>assets/images/default_profilepics.jpg" class="img-responsive" alt="User Image" width="200" height="200">' : '<img src="<?=MAIN_SITE_URL?>'+e.image1+'" class="img-responsive" alt="User Image" width="200" height="200">');
              $('#image2').html(e.image2 == '' ? '<img src="<?=MAIN_SITE_URL?>assets/images/default_profilepics.jpg" class="img-responsive" alt="User Image" width="200" height="200">' : '<img src="<?=MAIN_SITE_URL?>'+e.image2+'" class="img-responsive" alt="User Image" width="200" height="200">');
              $('#image3').html(e.image3 == '' ? '<img src="<?=MAIN_SITE_URL?>assets/images/default_profilepics.jpg" class="img-responsive" alt="User Image" width="200" height="200">' : '<img src="<?=MAIN_SITE_URL?>'+e.image3+'" class="img-responsive" alt="User Image" width="200" height="200">');
              $('#image4').html(e.image4 == '' ? '<img src="<?=MAIN_SITE_URL?>assets/images/default_profilepics.jpg" class="img-responsive" alt="User Image" width="200" height="200">' : '<img src="<?=MAIN_SITE_URL?>'+e.image4+'" class="img-responsive" alt="User Image" width="200" height="200">');
              $('#image5').html(e.image5 == '' ? '<img src="<?=MAIN_SITE_URL?>assets/images/default_profilepics.jpg" class="img-responsive" alt="User Image" width="200" height="200">' : '<img src="<?=MAIN_SITE_URL?>'+e.image5+'" class="img-responsive" alt="User Image" width="200" height="200">');
              $('#image6').html(e.image6 == '' ? '<img src="<?=MAIN_SITE_URL?>assets/images/default_profilepics.jpg" class="img-responsive" alt="User Image" width="200" height="200">' : '<img src="<?=MAIN_SITE_URL?>'+e.image6+'" class="img-responsive" alt="User Image" width="200" height="200">');
              
              $('#language').html(e.language == '' ? 'Not Filled' : e.language);
              $('#living_wth_parents').html(e.living_wth_parents == '' ? 'Not Filled' : e.living_wth_parents);
              $('#looking_for').html(e.looking_for == '' ? 'Not Filled' : e.looking_for);
              $('#marital_status').html(e.marital_status == '' ? 'Not Filled' : e.marital_status);
              $('#mother').html(e.mother == '' ? 'Not Filled' : e.mother);
              $('#name').html(e.name == '' ? 'Not Filled' : e.name);
              $('#occupation').html(e.occupation == '' ? 'Not Filled' : e.occupation);
              $('#org_name').html(e.org_name == '' ? 'Not Filled' : e.org_name);
              $('#oth_pg_degree').html(e.oth_pg_degree == '' ? 'Not Filled' : e.oth_pg_degree);
              $('#oth_ug_degree').html(e.oth_ug_degree == '' ? 'Not Filled' : e.oth_ug_degree);
              $('#pg_college').html(e.pg_college == '' ? 'Not Filled' : e.pg_college);
              $('#pg_degree').html(e.pg_degree == '' ? 'Not Filled' : e.pg_degree);
              $('#phone').html(e.phone == '' ? 'Not Filled' : e.phone);
              $('#pin').html(e.pin == '' ? 'Not Filled' : e.pin);
              $('#pro_for').html(e.pro_for == '' ? 'Not Filled' : e.pro_for);
              $('#ps').html(e.ps == '' ? 'Not Filled' : e.ps);
              $('#religion').html(e.religion == '' ? 'Not Filled' : e.religion);
              $('#schl_name').html(e.schl_name == '' ? 'Not Filled' : e.schl_name);
              $('#sister').html(e.sister == '' ? 'Not Filled' : e.sister); 
              $('#smoking').html(e.smoking == '' ? 'Not Filled' : e.smoking); 
              $('#state').html(e.state == '' ? 'Not Filled' : e.state);
              $('#statusUser').html(e.status == '0' ? '<span class="inactiveAdminPanel">In-active</span>' : e.status == '1' ? '<span class="activeAdminPanel">Active</span>' : '<span class="blockedAdminPanel">Blocked</span>');
              $('#street').html(e.street == '' ? 'Not Filled' : e.street);
              $('#sub_caste').html(e.sub_caste == '' ? 'Not Filled' : e.sub_caste);
              $('#ug_college').html(e.ug_college == '' ? 'Not Filled' : e.ug_college);
              $('#ug_degree').html(e.ug_degree == '' ? 'Not Filled' : e.ug_degree);
              $('#user_id').html(e.user_id == '' ? 'Not Filled' : e.user_id); 
              $('#weight').html(e.weight == '' ? 'Not Filled' : e.weight); 

            // }

          }
        });
      });

  });
 </script>
<?php include('footer.php'); ?>