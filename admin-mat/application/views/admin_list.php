<?php include('header.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="header-icon">
      <i class="fa fa-users"></i>
    </div>
    <div class="header-title">
      <h1>Admin</h1>
      <small>All Admin</small>
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
                <h4>Users</h4>
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
                <th>Admin Name</th>
                <th>Email</th>
                <th>Job Title</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($all_user)) { ?>
              <?php foreach ($all_user as $allUserValue) { ?>
              <?php if ($allUserValue['ad_id'] != $_SESSION['ad_id']){ ?>
              <tr>
                <td><?=$allUserValue['name']?></td>
                <td><?=$allUserValue['email']?></td>
                <td><?=$allUserValue['role']?></td>
                <td>
                 <a href="<?=base_url('admin_controller/edit_admin/').$allUserValue['ad_id']?>">
                  <button type="button" data-id="<?=$allUserValue['ad_id']?>" class="btn btn-add btn-sm viewUser" data-toggle="modal" data-target="#customer1"><i class="fa fa-pencil"></i></button>
          		 </a>
                  <a href="<?=base_url('admin_controller/delete_admin/').$allUserValue['ad_id']?>">
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#customer2"><i class="fa fa-times-circle"></i> </button>
                  </a>
                </td>
              </tr>
              <?php } ?>
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
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include('footer.php'); ?>