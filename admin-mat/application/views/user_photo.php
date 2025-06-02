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
          <small>Block Users</small>
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
                         <h4>Block Users</h4>
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
                            <select class  ="form-control" id="search_input_all" onchange="image_all_table()">                            
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
                        <div class="tb_search">                    
                          <div class="form-group">  <!--    Show Numbers Of Rows    -->
                            <select class  ="form-control" id="search_input_all1" onchange="image_all_table()">          
                               <option value="" disabled="" selected="">Select Categories</option>
                               <option value="">ALL</option>
                               <option value="1">With Photo</option>
                               <option value="0">Without Photo</option>
                            </select>                          
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                   <div class="table-responsive">
                      <table id="table-id" class="table table-bordered table-class table-striped table-hover">
                         <thead>
                            <tr class="info">
                               <th>Photo</th>
                               <th>User Name</th>
                               <th>Mobile</th>
                               <th>Email</th>
                               <th>Gender</th>
                               <th>Action</th>
                            </tr>
                         </thead>
                         <tbody>
                         	<?php if (!empty($all_user)) { ?>
	                         	<?php foreach ($all_user as $allUserValue) { ?>
		                            <tr>
		                               <td class="image">
		                               	<?php if ($allUserValue['image1'] != '') { ?>
		                               		<img src="<?=MAIN_SITE_URL.$allUserValue['image1'];?>" class="img-circle" alt="User Image" width="50" height="50">
		                               	<?php } else { ?>
		                               		<img src="<?=base_url('assets/dist/img/pp.png');?>" class="img-circle" alt="User Image" width="50" height="50">
		                               	<?php } ?> 
		                               </td>
		                               <td><?=$allUserValue['name']?></td>
		                               <td><?=$allUserValue['phone']?></td>
		                               <td><?=$allUserValue['email']?></td>
		                               <td class="gender"><?=$allUserValue['gender']?></td>	                               
		                               <td>
		                                  <button type="button" class="btn btn-add btn-sm" data-toggle="modal" data-target="#customer1"><i class="fa fa-eye"></i></button>
		                                  <?php if ($allUserValue['status'] == 2) { ?>
	                                      <a href="<?=base_url('admin_controller/unblock_user/').$allUserValue['user_id']?>">
	                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#customer2"><i class="fa fa-check-circle"></i> </button>
	                                      </a>
	                                    <?php } else { ?>
	                                      <a href="<?=base_url('admin_controller/block_user/').$allUserValue['user_id']?>">
	                                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#customer2"><i class="fa fa-times-circle"></i> </button>
	                                      </a>
	                                    <?php } ?>
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
                      <div class="col-md-12">
                         <div class="col-md-3"></div>
                         <div class="col-md-3"></div>
                         <div class="col-md-3"></div>
                         <form class="form-horizontal">
                            <fieldset>
                               <!-- Text input-->
                               <div class="col-md-12 form-group user-form-group">
                                  <div class="pull-right">
                                     <button type="button" class="btn btn-danger btn-sm">Cancel</button>
                                     <button type="submit" class="btn btn-add btn-sm">Save</button>
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
<?php include('footer.php'); ?>