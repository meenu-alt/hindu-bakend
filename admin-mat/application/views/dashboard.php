<?php include('header.php'); ?>
<?php
   $CI =& get_instance();
   $CI->load->model('Dashboard_model');
   $get_all_user = $CI->Dashboard_model->get_all_user();
   $this->db->where('status',1);
   $get_all_active_user = $this->db->get('connection')->num_rows();
   $get_all_male_user = $CI->Dashboard_model->get_all_male_user();
   $get_all_female_user = $CI->Dashboard_model->get_all_female_user();
?>
<!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
               <div class="header-icon">
                  <i class="fa fa-dashboard"></i>
               </div>
               <div class="header-title">
                  <h1>HH Admin Dashboard</h1>
                  <small>Very detailed & featured admin.</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox1">
                        <div class="statistic-box">
                           <i class="fa fa-user-plus fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number"><?=sizeof($get_all_user)?></span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h3> All Users</h3>
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox2">
                        <div class="statistic-box">
                           <i class="fa fa-user-secret fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number"><?=($get_all_active_user)?></span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h3>Total Match Connection</h3>
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox3">
                        <div class="statistic-box">
                           <i class="fa fa-money fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number"><?=sizeof($get_all_male_user)?></span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h3>  Male Users</h3>
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                     <div id="cardbox4">
                        <div class="statistic-box">
                           <i class="fa fa-files-o fa-3x"></i>
                           <div class="counter-number pull-right">
                              <span class="count-number"><?=sizeof($get_all_female_user)?></span> 
                              <span class="slight"><i class="fa fa-play fa-rotate-270"> </i>
                              </span>
                           </div>
                           <h3> Female Users</h3>
                        </div>
                     </div>
                  </div>
               </div>
               
               <div class="row">
                  <!-- <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                     <div class="panel panel-bd lobidisable">
                        <div class="panel-heading">
                           <div class="panel-title">
                              <h4>Upcoming Events</h4>
                           </div>
                        </div>
                        <div class="panel-body">
                           <div class="work-touchpoint">
                              <div class="work-touchpoint-date">
                                 <span class="day">28</span>
                                 <span class="month">Apr</span>
                              </div>
                           </div>
                           <div class="detailswork">
                              <span class="label-custom label label-default pull-right">Email</span>
                              <a href="#" title="headings">Marketing policy</a> <br>
                              <p>Green Road - Dhaka,Bangladesh</p>
                           </div>
                           <div class="work-touchpoint">
                              <div class="work-touchpoint-date">
                                 <span class="day">2</span>
                                 <span class="month">Apr</span>
                              </div>
                           </div>
                           <div class="detailswork">
                              <span class="label-custom label label-default pull-right">skype</span>
                              <a href="#" title="headings">Accounting policy</a> <br>
                              <p>Kolkata, India</p>
                           </div>
                           <div class="work-touchpoint">
                              <div class="work-touchpoint-date2">
                                 <span class="day">17</span>
                                 <span class="month">Mrc</span>
                              </div>
                           </div>
                           <div class="detailswork">
                              <span class="label-custom label label-default pull-right">phone</span>
                              <a href="#" title="headings">Marketing policy</a> <br>
                              <p>Madrid  - spain</p>
                           </div>
                           <div class="work-touchpoint">
                              <div class="work-touchpoint-date2">
                                 <span class="day">3</span>
                                 <span class="month">jan</span>
                              </div>
                           </div>
                           <div class="detailswork">
                              <span class="label-custom label label-default pull-right">Mobile</span>
                              <a href="#" title="headings">Finance policy</a> <br>
                              <p>south Australia  - Australia</p>
                           </div>
                        </div>
                     </div>
                  </div> -->
                  
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                     <div class="panel panel-bd lobidisable">
                        <div class="panel-heading">
                           <div class="panel-title">
                              <h4>Male</h4>
                           </div>
                        </div>
                        <div class="panel-body">
                           <div class="runnigwork">
                              <span class="label-info label label-default pull-right"><?=$this->db->get_where('delete_account',array("gender"=>"male"))->num_rows(); ?></span>
                              <i class="fa fa-dot-circle-o"></i>        
                              <a href="#">Deleted Profiles</a><br>                          
                              <div class="progress runningprogress">
                                 <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="" data-original-title="25%"></div>
                              </div>
                           </div>
                           <div class="runnigwork">
                              <span class="label-info label label-default pull-right"><?=sizeof($get_all_male_user) -array_count_values(array_column($get_all_male_user, 'image1'))[''];?> / <?=sizeof($get_all_male_user)?></span>
                              <i class="fa fa-dot-circle-o"></i>        
                              <a href="#">Profiles with photo</a><br>                          
                              <div class="progress runningprogress">
                                 <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?=((sizeof($get_all_male_user)-array_count_values(array_column($get_all_male_user, 'drinking'))['Occasionally'])*100) /sizeof($get_all_male_user);?>%" aria-valuenow="<?=sizeof($get_all_male_user) -array_count_values(array_column($get_all_male_user, 'image1'))[''];?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=sizeof($get_all_male_user) -array_count_values(array_column($get_all_male_user, 'image1'))[''];?>"></div>
                              </div>
                           </div>
                           <div class="runnigwork">
                              <span class="label-info label label-default pull-right"><?=array_count_values(array_column($get_all_male_user, 'image1'))[''];?> / <?=sizeof($get_all_male_user)?></span>
                              <i class="fa fa-dot-circle-o"></i>        
                              <a href="#">Profiles without photo</a><br>                          
                              <div class="progress runningprogress">
                                 <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?=(array_count_values(array_column($get_all_male_user, 'image1'))['']*100) /sizeof($get_all_male_user);?>%" aria-valuenow="45" aria-valuemin="<?=array_count_values(array_column($get_all_male_user, 'image1'))[''];?>" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=array_count_values(array_column($get_all_male_user, 'image1'))[''];?>"></div>
                              </div>
                           </div>
                           <div class="runnigwork">
                              <span class="label-info label label-default pull-right"><?=array_count_values(array_column($get_all_male_user, 'drinking'))['Yes']+array_count_values(array_column($get_all_male_user, 'drinking'))['Occasionally'];?> / <?=sizeof($get_all_male_user)?></span>
                              <i class="fa fa-dot-circle-o"></i>        
                              <a href="#">Drinking</a><br>                          
                              <div class="progress runningprogress">
                                 <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?=((array_count_values(array_column($get_all_male_user, 'drinking'))['Yes']+array_count_values(array_column($get_all_male_user, 'drinking'))['Occasionally'])*100) /sizeof($get_all_male_user);?>%" aria-valuenow="<?=array_count_values(array_column($get_all_male_user, 'drinking'))['Yes']+array_count_values(array_column($get_all_male_user, 'drinking'))['Occasionally'];?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=array_count_values(array_column($get_all_male_user, 'drinking'))['Yes']+array_count_values(array_column($get_all_male_user, 'drinking'))['Occasionally'];?>"></div>
                              </div>
                           </div>
                           <div class="runnigwork">
                              <span class="label-info label label-default pull-right"><?=array_count_values(array_column($get_all_male_user, 'drinking'))['No'];?> / <?=sizeof($get_all_male_user)?></span>
                              <i class="fa fa-dot-circle-o"></i>        
                              <a href="#">Not Drinking</a><br>                          
                              <div class="progress runningprogress">
                                 <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?=(array_count_values(array_column($get_all_male_user, 'drinking'))['No']*100) /sizeof($get_all_male_user);?>%" aria-valuenow="<?=array_count_values(array_column($get_all_male_user, 'drinking'))['No'];?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=array_count_values(array_column($get_all_male_user, 'drinking'))['No'];?>"></div>
                              </div>
                           </div>
                           <div class="runnigwork">
                              <span class="label-info label label-default pull-right"><?=array_count_values(array_column($get_all_male_user, 'smoking'))['Yes']+array_count_values(array_column($get_all_male_user, 'smoking'))['Occasionally'];?> / <?=sizeof($get_all_male_user)?></span>
                              <i class="fa fa-dot-circle-o"></i>        
                              <a href="#">Smoking</a><br>                          
                              <div class="progress runningprogress">
                                 <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?=((array_count_values(array_column($get_all_male_user, 'smoking'))['Yes']+array_count_values(array_column($get_all_male_user, 'smoking'))['Occasionally'])*100) /sizeof($get_all_male_user);?>%" aria-valuenow="<?=array_count_values(array_column($get_all_male_user, 'smoking'))['Yes']+array_count_values(array_column($get_all_male_user, 'smoking'))['Occasionally'];?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=array_count_values(array_column($get_all_male_user, 'smoking'))['Yes']+array_count_values(array_column($get_all_male_user, 'smoking'))['Occasionally'];?>"></div>
                              </div>
                           </div>
                           <div class="runnigwork">
                              <span class="label-info label label-default pull-right"><?=array_count_values(array_column($get_all_male_user, 'smoking'))['No'];?> / <?=sizeof($get_all_male_user)?></span>
                              <i class="fa fa-dot-circle-o"></i>        
                              <a href="#">Not Smoking</a><br>                          
                              <div class="progress runningprogress">
                                 <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?=(array_count_values(array_column($get_all_male_user, 'smoking'))['No']*100) /sizeof($get_all_male_user);?>%" aria-valuenow="<?=array_count_values(array_column($get_all_male_user, 'smoking'))['No'];?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=array_count_values(array_column($get_all_male_user, 'smoking'))['No'];?>"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                     <div class="panel panel-bd lobidisable">
                        <div class="panel-heading">
                           <div class="panel-title">
                              <h4>Female</h4>
                           </div>
                        </div>
                        <div class="panel-body">
                           <div class="runnigwork">
                              <span class="label-info label label-default pull-right"><?=$this->db->get_where('delete_account',array("gender"=>"female"))->num_rows(); ?></span>
                              <i class="fa fa-dot-circle-o"></i>        
                              <a href="#">Deleted Profiles</a><br>                          
                              <div class="progress runningprogress">
                                 <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="" data-original-title="25%"></div>
                              </div>
                           </div>
                           <div class="runnigwork">
                              <span class="label-info label label-default pull-right"><?=sizeof($get_all_female_user) -array_count_values(array_column($get_all_female_user, 'image1'))[''];?> / <?=sizeof($get_all_female_user)?></span>
                              <i class="fa fa-dot-circle-o"></i>        
                              <a href="#">Profiles with photo</a><br>                          
                              <div class="progress runningprogress">
                                 <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?=((sizeof($get_all_female_user)-array_count_values(array_column($get_all_female_user, 'drinking'))['Occasionally'])*100) /sizeof($get_all_female_user);?>%" aria-valuenow="<?=sizeof($get_all_female_user) -array_count_values(array_column($get_all_female_user, 'image1'))[''];?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=sizeof($get_all_female_user) -array_count_values(array_column($get_all_female_user, 'image1'))[''];?>"></div>
                              </div>
                           </div>
                           <?php
                              if (array_count_values(array_column($get_all_female_user, 'image1'))[''] > 0) {
                                 $image1 = array_count_values(array_column($get_all_female_user, 'image1'))[''];
                              } else {
                                 $image1 = 0;
                              }
                           ?>
                           <div class="runnigwork">
                              <span class="label-info label label-default pull-right"><?=$image1;?> / <?=sizeof($get_all_female_user)?></span>
                              <i class="fa fa-dot-circle-o"></i>        
                              <a href="#">Profiles without photo</a><br>                          
                              <div class="progress runningprogress">
                                 <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?=(array_count_values(array_column($get_all_female_user, 'image1'))['']*100) /sizeof($get_all_female_user);?>%" aria-valuenow="45" aria-valuemin="<?=array_count_values(array_column($get_all_female_user, 'image1'))[''];?>" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=array_count_values(array_column($get_all_female_user, 'image1'))[''];?>"></div>
                              </div>
                           </div>
                           <div class="runnigwork">
                              <span class="label-info label label-default pull-right"><?=array_count_values(array_column($get_all_female_user, 'drinking'))['Yes']+array_count_values(array_column($get_all_female_user, 'drinking'))['Occasionally'];?> / <?=sizeof($get_all_female_user)?></span>
                              <i class="fa fa-dot-circle-o"></i>        
                              <a href="#">Drinking</a><br>                          
                              <div class="progress runningprogress">
                                 <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?=((array_count_values(array_column($get_all_female_user, 'drinking'))['Yes']+array_count_values(array_column($get_all_female_user, 'drinking'))['Occasionally'])*100) /sizeof($get_all_female_user);?>%" aria-valuenow="<?=array_count_values(array_column($get_all_female_user, 'drinking'))['Yes']+array_count_values(array_column($get_all_female_user, 'drinking'))['Occasionally'];?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=array_count_values(array_column($get_all_female_user, 'drinking'))['Yes']+array_count_values(array_column($get_all_female_user, 'drinking'))['Occasionally'];?>"></div>
                              </div>
                           </div>
                           <div class="runnigwork">
                              <span class="label-info label label-default pull-right"><?=array_count_values(array_column($get_all_female_user, 'drinking'))['No'];?> / <?=sizeof($get_all_female_user)?></span>
                              <i class="fa fa-dot-circle-o"></i>        
                              <a href="#">Not Drinking</a><br>                          
                              <div class="progress runningprogress">
                                 <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?=(array_count_values(array_column($get_all_female_user, 'drinking'))['No']*100) /sizeof($get_all_female_user);?>%" aria-valuenow="<?=array_count_values(array_column($get_all_female_user, 'drinking'))['No'];?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=array_count_values(array_column($get_all_female_user, 'drinking'))['No'];?>"></div>
                              </div>
                           </div>
                           <div class="runnigwork">
                              <span class="label-info label label-default pull-right"><?=array_count_values(array_column($get_all_female_user, 'smoking'))['Yes']+array_count_values(array_column($get_all_female_user, 'smoking'))['Occasionally'];?> / <?=sizeof($get_all_female_user)?></span>
                              <i class="fa fa-dot-circle-o"></i>        
                              <a href="#">Smoking</a><br>                          
                              <div class="progress runningprogress">
                                 <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?=((array_count_values(array_column($get_all_female_user, 'smoking'))['Yes']+array_count_values(array_column($get_all_female_user, 'smoking'))['Occasionally'])*100) /sizeof($get_all_female_user);?>%" aria-valuenow="<?=array_count_values(array_column($get_all_female_user, 'smoking'))['Yes']+array_count_values(array_column($get_all_female_user, 'smoking'))['Occasionally'];?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=array_count_values(array_column($get_all_female_user, 'smoking'))['Yes']+array_count_values(array_column($get_all_female_user, 'smoking'))['Occasionally'];?>"></div>
                              </div>
                           </div>
                           <div class="runnigwork">
                              <span class="label-info label label-default pull-right"><?=array_count_values(array_column($get_all_female_user, 'smoking'))['No'];?> / <?=sizeof($get_all_female_user)?></span>
                              <i class="fa fa-dot-circle-o"></i>        
                              <a href="#">Not Smoking</a><br>                          
                              <div class="progress runningprogress">
                                 <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?=(array_count_values(array_column($get_all_female_user, 'smoking'))['No']*100) /sizeof($get_all_female_user);?>%" aria-valuenow="<?=array_count_values(array_column($get_all_female_user, 'smoking'))['No'];?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=array_count_values(array_column($get_all_female_user, 'smoking'))['No'];?>"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
           
           
         
            
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
         <?php 
            if (array_count_values(array_column($get_all_male_user, 'religion'))['Hindu'] > 0) {
               $Hindu = array_count_values(array_column($get_all_male_user, 'religion'))['Hindu'];
            } else {
               $Hindu = 0;
            }

            if (array_count_values(array_column($get_all_male_user, 'religion'))['Muslim'] > 0) {
               $Muslim = array_count_values(array_column($get_all_male_user, 'religion'))['Muslim'];
            } else {
               $Muslim = 0;
            }

            if (array_count_values(array_column($get_all_male_user, 'religion'))['Sikh'] > 0) {
               $Sikh = array_count_values(array_column($get_all_male_user, 'religion'))['Sikh'];
            } else {
               $Sikh = 0;
            }

            if (array_count_values(array_column($get_all_male_user, 'religion'))['Christian'] > 0) {
               $Christian = array_count_values(array_column($get_all_male_user, 'religion'))['Christian'];
            } else {
               $Christian = 0;
            }

            if (array_count_values(array_column($get_all_male_user, 'religion'))['Buddhist'] > 0) {
               $Buddhist = array_count_values(array_column($get_all_male_user, 'religion'))['Buddhist'];
            } else {
               $Buddhist = 0;
            }

            if (array_count_values(array_column($get_all_male_user, 'religion'))['Jain'] > 0) {
               $Jain = array_count_values(array_column($get_all_male_user, 'religion'))['Jain'];
            } else {
               $Jain = 0;
            }

            if (array_count_values(array_column($get_all_male_user, 'religion'))['Parsi'] > 0) {
               $Parsi = array_count_values(array_column($get_all_male_user, 'religion'))['Parsi'];
            } else {
               $Parsi = 0;
            }

            if (array_count_values(array_column($get_all_male_user, 'religion'))['Jewish'] > 0) {
               $Jewish = array_count_values(array_column($get_all_male_user, 'religion'))['Jewish'];
            } else {
               $Jewish = 0;
            }

            if (array_count_values(array_column($get_all_male_user, 'religion'))['Bahai'] > 0) {
               $Bahai = array_count_values(array_column($get_all_male_user, 'religion'))['Bahai'];
            } else {
               $Bahai = 0;
            }

            if (array_count_values(array_column($get_all_male_user, 'religion'))['Other'] > 0) {
               $Other = array_count_values(array_column($get_all_male_user, 'religion'))['Other'];
            } else {
               $Other = 0;
            }
         ?>

         <?php 
            if (array_count_values(array_column($get_all_female_user, 'religion'))['Hindu'] > 0) {
               $Hindu1= array_count_values(array_column($get_all_female_user, 'religion'))['Hindu'];
            } else {
               $Hindu1 = 0;
            }

            if (array_count_values(array_column($get_all_female_user, 'religion'))['Muslim'] > 0) {
               $Muslim1 = array_count_values(array_column($get_all_female_user, 'religion'))['Muslim'];
            } else {
               $Muslim1 = 0;
            }

            if (array_count_values(array_column($get_all_female_user, 'religion'))['Sikh'] > 0) {
               $Sikh1 = array_count_values(array_column($get_all_female_user, 'religion'))['Sikh'];
            } else {
               $Sikh1 = 0;
            }

            if (array_count_values(array_column($get_all_female_user, 'religion'))['Christian'] > 0) {
               $Christian1 = array_count_values(array_column($get_all_female_user, 'religion'))['Christian'];
            } else {
               $Christian1 = 0;
            }

            if (array_count_values(array_column($get_all_female_user, 'religion'))['Buddhist'] > 0) {
               $Buddhist1 = array_count_values(array_column($get_all_female_user, 'religion'))['Buddhist'];
            } else {
               $Buddhist1 = 0;
            }

            if (array_count_values(array_column($get_all_female_user, 'religion'))['Jain'] > 0) {
               $Jain1 = array_count_values(array_column($get_all_female_user, 'religion'))['Jain'];
            } else {
               $Jain1 = 0;
            }

            if (array_count_values(array_column($get_all_female_user, 'religion'))['Parsi'] > 0) {
               $Parsi1 = array_count_values(array_column($get_all_female_user, 'religion'))['Parsi'];
            } else {
               $Parsi1 = 0;
            }

            if (array_count_values(array_column($get_all_female_user, 'religion'))['Jewish'] > 0) {
               $Jewish1 = array_count_values(array_column($get_all_female_user, 'religion'))['Jewish'];
            } else {
               $Jewish1 = 0;
            }

            if (array_count_values(array_column($get_all_female_user, 'religion'))['Bahai'] > 0) {
               $Bahai1 = array_count_values(array_column($get_all_female_user, 'religion'))['Bahai'];
            } else {
               $Bahai1 = 0;
            }

            if (array_count_values(array_column($get_all_female_user, 'religion'))['Other'] > 0) {
               $Other1 = array_count_values(array_column($get_all_female_user, 'religion'))['Other'];
            } else {
               $Other1 = 0;
            }
         ?>
         <script src="<?=base_url()?>/assets/plugins/jQuery/jquery-1.12.4.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
         <script>
            //doughnut
            Chart.pluginService.register({
                beforeDraw: function (chart) {
                    var width = chart.chart.width,
                        height = chart.chart.height,
                        ctx = chart.chart.ctx;
                    ctx.restore();
                    var fontSize = (height / 114).toFixed(2);
                    ctx.font = fontSize + "em sans-serif";
                    ctx.textBaseline = "middle";
                    var text = chart.config.options.elements.center.text,
                        textX = Math.round((width - ctx.measureText(text).width) / 2),
                        textY = height / 2;
                    ctx.fillText(text, textX, textY);
                    ctx.save();
                }
            });
            var chartData = [{"visitor": <?=$Hindu?>, "visit": "Hindu"}, {"visitor": <?=$Muslim?>, "visit": "Muslim"}, {"visitor": <?=$Sikh?>, "visit": "Sikh"}, {"visitor": <?=$Christian?>, "visit": "Christian"}, {"visitor": <?=$Buddhist?>, "visit": "Buddhist"}, {"visitor": <?=$Jain?>, "visit": "Jain"}, {"visitor": <?=$Parsi?>, "visit": "Parsi"}, {"visitor": <?=$Jewish?>, "visit": "Jewish"}, {"visitor": <?=$Bahai?>, "visit": "Bahai"}, {"visitor": <?=$Other?>, "visit": "Other"}]

            var visitorData = [],
                sum = 0,
                visitData = [];

            for (var i = 0; i < chartData.length; i++) {
                visitorData.push(chartData[i]['visitor'])
                visitData.push(chartData[i]['visit'])
              
                sum += chartData[i]['visitor'];
            }

            var textInside = sum.toString();            

            var myChart = new Chart(document.getElementById('mychart'), {
                type: 'doughnut',
                animation:{
                    animateScale:true
                },
                data: {
                    labels: visitData,
                    datasets: [{
                        label: 'Visitor',
                        data: visitorData,
                        backgroundColor: [
                            "#e84f11",
                            "#00963f",
                            "#ef7c02",
                            "#e40613",
                            "#fbbf1a",
                            "#f5ac03",
                            "#1979b4",
                            "#51a2cc",
                            "#e1c583",
                            "#695b52"

                        ]
                    }]
                },
                options: {
                    elements: {
                      center: {
                        text: textInside
                      }
                    },
                    responsive: true,
                    legend: false,
                    legendCallback: function(chart) {
                        var legendHtml = [];
                        legendHtml.push('<ul style="display:none">');
                        var item = chart.data.datasets[0];
                        for (var i=0; i < item.data.length; i++) {
                            legendHtml.push('<li>');
                            legendHtml.push('<span class="chart-legend" style="background-color:' + item.backgroundColor[i] +'"></span>');
                            legendHtml.push('<span class="chart-legend-label-text">' + item.data[i] + ' % - '+chart.data.labels[i]+' </span>');
                            legendHtml.push('</li>');
                        }

                        legendHtml.push('</ul>');
                        return legendHtml.join("");
                    },
                    tooltips: {
                         enabled: true,
                         mode: 'label',
                         callbacks: {
                            label: function(tooltipItem, data) {
                                var indice = tooltipItem.index;
                                return data.datasets[0].data[indice] + "  " + data.labels[indice];
                            }
                         }
                     },
                }
            });
            //chart 2
            var chartData1 = [{"visitor": <?=$Hindu1?>, "visit": "Hindu"}, {"visitor": <?=$Muslim1?>, "visit": "Muslim"}, {"visitor": <?=$Sikh1?>, "visit": "Sikh"}, {"visitor": <?=$Christian1?>, "visit": "Christian"}, {"visitor": <?=$Buddhist1?>, "visit": "Buddhist"}, {"visitor": <?=$Jain1?>, "visit": "Jain"}, {"visitor": <?=$Parsi1?>, "visit": "Parsi"}, {"visitor": <?=$Jewish1?>, "visit": "Jewish"}, {"visitor": <?=$Bahai1?>, "visit": "Bahai"}, {"visitor": <?=$Other1?>, "visit": "Other"}]

            var visitorData1 = [],
                sum1 = 0,
                visitData1 = [];

            for (var i = 0; i < chartData1.length; i++) {
                visitorData1.push(chartData1[i]['visitor'])
                visitData1.push(chartData1[i]['visit'])
              
                sum1 += chartData1[i]['visitor'];
            }

            var textInside1 = sum1.toString();

            var myChart1 = new Chart(document.getElementById('mychart1'), {
                type: 'doughnut',
                animation:{
                    animateScale:true
                },
                data: {
                    labels: visitData1,
                    datasets: [{
                        label: 'Visitor',
                        data: visitorData1,
                        backgroundColor: [
                            "#e84f11",
                            "#00963f",
                            "#ef7c02",
                            "#e40613",
                            "#fbbf1a",
                            "#f5ac03",
                            "#1979b4",
                            "#51a2cc",
                            "#e1c583",
                            "#695b52"

                        ]
                    }]
                },
                options: {
                    elements: {
                      center: {
                        text: textInside1
                      }
                    },
                    responsive: true,
                    legend: false,
                    legendCallback: function(chart) {
                        var legendHtml = [];
                        legendHtml.push('<ul style="display:none">');
                        var item = chart.data.datasets[0];
                        for (var i=0; i < item.data.length; i++) {
                            legendHtml.push('<li>');
                            legendHtml.push('<span class="chart-legend" style="background-color:' + item.backgroundColor[i] +'"></span>');
                            legendHtml.push('<span class="chart-legend-label-text">' + item.data[i] + ' % - '+chart.data.labels[i]+' </span>');
                            legendHtml.push('</li>');
                        }

                        legendHtml.push('</ul>');
                        return legendHtml.join("");
                    },
                    tooltips: {
                         enabled: true,
                         mode: 'label',
                         callbacks: {
                            label: function(tooltipItem, data) {
                                var indice = tooltipItem.index;
                                return data.datasets[0].data[indice] + " " + data.labels[indice];
                            }
                         }
                     },
                }
            });

            $('#my-legend-con').html(myChart.generateLegend());
            $('#my-legend-con1').html(myChart1.generateLegend());
         </script>
<?php include('footer.php'); ?>