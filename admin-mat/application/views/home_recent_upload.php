<?php include('header.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="header-icon">
      <i class="fa fa-users"></i>
    </div>
    <div class="header-title">
      <h1>Recent Upload Profile</h1>
      <small>Profiles</small>
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
                <h4>Recent Upload Profile</h4>
              </a>
            </div>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12">
                <style>
                  td{
                    vertical-align: middle !important;
                  }
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
                input.chooseFile{
                  width: calc(100% - 70px); 
                  display: inline-block; 
                  align-items: center; 
                  margin-left: 10px;
                }
            </style>
          </div>
        </div>
        <div class="table-responsive">
          <table id="table-id" class="table table-bordered table-class table-striped table-hover">
            <thead>
              <tr class="info">
                <th>Profile 1</th>
                <th>Profile 2</th>
                <th>Profile 3</th>
                <th>Profile 4</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              
              <form action="<?=base_url('admin_controller/update_recent_upload')?>" method="post" enctype="multipart/form-data">
                <tr>
                <?php foreach ($recent_upload as $key => $recent_upload_value) {  ?>	
                  <td class="form-group"><input type="text" name="profile<?=$key+1?>" class="form-control" value="<?=$recent_upload_value['user_id']?>" placeholder="Profile<?=$key+1?>" required></td>
                <?php } ?>
                  <td style="white-space: nowrap;">
                      <button type="submit" class="btn btn-add btn-sm" data-toggle="modal" data-target="#customer1"><i class="fa fa-refresh"></i></button>
                  </td>
                </tr>
              </form>
               
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
<script>
   var loadFile = function(event) {
    var output = document.getElementById('userImg');
    output.src = URL.createObjectURL(event.target.files[0]);
    };
     <?php foreach ($testimonials as $key => $valueTestimonials) {  ?>
   var loadFile<?=$key?> = function(event) {
    var output = document.getElementById('userImg<?=$key?>');
    output.src = URL.createObjectURL(event.target.files[0]);
    };
  <?php } ?> 
</script> 
<?php include('footer.php'); ?>