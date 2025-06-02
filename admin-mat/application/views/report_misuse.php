<?php include('header.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="header-icon">
      <i class="fa fa-users"></i>
    </div>
    <div class="header-title">
      <h1>Report Misuse</h1>
      <small>Report Misuse</small>
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
                <h4>Report</h4>
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
          </div>
        </div>
        <div class="table-responsive">
          <table id="table-id" class="table table-bordered table-class table-striped table-hover">
            <thead>
              <tr class="info">
                <th>S.No.</th>
                <th>User Id</th>
                <th>Subject</th> 
                <th>Message</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($report_misuse)) { ?>
              <?php foreach ($report_misuse as $key => $report_misuse_value) { ?>
              <tr>
                <!-- <td>
                  <?php if ($allUserValue['image1'] != '') { ?>
                  <img src="<?=MAIN_SITE_URL.$allUserValue['image1'];?>" class="img-circle" alt="User Image" width="50" height="50">
                  <?php } else { ?>
                  <img src="<?=base_url('assets/dist/img/pp.png');?>" class="img-circle" alt="User Image" width="50" height="50">
                  <?php } ?>
                </td> -->
                <td><?=$key+1?></td>
                <td><?=$report_misuse_value['user_id']?></td>
                <td><?=$report_misuse_value['subject']?></td> 
                <td class="msgReport"><?=$report_misuse_value['message']?></td>
                <td style="white-space: nowrap;">
                  <button type="button" data-id="<?=$report_misuse_value['rm_id']?>" class="btn btn-add btn-sm viewUser" data-toggle="modal" data-target="#customer1"><i class="fa fa-eye"></i></button>
                  <a href="<?=base_url('admin_controller/block_user/').$report_misuse_value['rm_id']?>">
                    <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-times-circle"></i> </button>
                  </a>
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
              <h5>Report Details</h5>
            </div>
            <div class="col-md-12">
              <ul>
                <li>Image</li>
                <li id="image1"> </li>
              </ul>
            </div>
            <div class="col-md-6">
              <ul>
                <li>User Id</li>
                <li id="user_id"></li>
              </ul>
            </div>
            <div class="col-md-6">
              <ul>
                <li>Subject</li>
                <li id="subject"></li>
              </ul>
            </div>
            <div class="col-md-12">
              <ul>
                <li>Message</li>
                <li id="message"></li>
              </ul>
            </div>              
          </div>
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
          url:"<?php echo base_url('admin_controller/viewReportMisuse')?>",
          success:function(e){
            // if(e.msg != 'Successfully Updated'){ 
              console.log(e);
              $('#user_id').html(e.user_id == '' ? 'Not Filled' : e.user_id);
              $('#subject').html(e.subject == '' ? 'Not Filled' : e.subject);
              $('#message').html(e.message == '' ? 'Not Filled' : e.message);

              $('#image1').html(e.img == '' ? '<a target="_blank" href="<?=MAIN_SITE_URL?>assets/images/default_profilepics.jpg" ><img src="<?=MAIN_SITE_URL?>assets/images/default_profilepics.jpg"  alt="User Image" style="width:100%;height:300px;object-fit: contain;" ></a>' : '<a target="_blank" href="<?=MAIN_SITE_URL?>'+e.img+'"><img src="<?=MAIN_SITE_URL?>'+e.img+'"  alt="User Image" style="width:100%;height:300px;object-fit: contain;" ></a>');

            // }

          }
        });
      });

  });
 </script>
<?php include('footer.php'); ?>