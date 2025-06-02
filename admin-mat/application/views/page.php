<?php include('header.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="header-icon">
      <i class="fa fa-users"></i>
    </div>
    <div class="header-title">
      <h1>Page</h1>
      <small>Add / Edit Page</small>
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
                <h4>Page</h4>
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
                  <div class="form-group">
                  <a href="<?=base_url('admin_controller/add_page/')?>">
                  <button type="button" class="btn btn-add btn-sm">Add New Page</button>
              	  </a>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table id="table-id" class="table table-bordered table-class table-striped table-hover">
            <thead>
              <tr class="info">
                <th>S.No.</th>
                <th>Page Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($blog)) { ?>
              <?php foreach ($blog as $key => $blog_value) { ?>
              <tr>
                <td><?=$key+1?></td>
                <td><?=$blog_value['name']?></td>
                <td style="white-space: nowrap;">
                  <a href="<?=base_url('admin_controller/add_page/').$blog_value['id']?>">
                  	<button type="button" class="btn btn-add btn-sm viewUser"><i class="fa fa-eye"></i></button>
              	  </a>
                  <a href="<?=base_url('admin_controller/delete_page/').$blog_value['id']?>">
                    <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-times-circle"></i> </button>
                  </a>
                </td>
              </tr>
              <?php } ?>
              <?php } else { ?>
              <tr>
                <td colspan="7">No Data Found</td>
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
          <!-- <div class="rows_count">Showing 11 to 20 of 91 entries</div> -->
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php include('footer.php'); ?>