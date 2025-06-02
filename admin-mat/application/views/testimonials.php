<?php include('header.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="header-icon">
      <i class="fa fa-users"></i>
    </div>
    <div class="header-title">
      <h1>Testimonials</h1>
      <small>Customers Testimonials</small>
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
                <h4>Testimonials</h4>
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
                  <button type="button" class="btn btn-add btn-sm" data-toggle="modal" data-target="#customer1">Add New Testimonials</button>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
            </div>
          </div>
          <p style="color: red; padding-left: 20px">Note : Image size should be 400X400 pixel and not more than 2 MB</p>
        </div>
        <div class="table-responsive">
          <table id="table-id" class="table table-bordered table-class table-striped table-hover">
            <thead>
              <tr class="info">
                <th>Sl. No</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Location</th>
                <th>Message</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($testimonials as $key => $valueTestimonials) {  ?>
              <form action="<?=base_url('admin_controller/update_testimonial/').$valueTestimonials['testimonial_id']?>" method="post" enctype="multipart/form-data">
                <tr>
                  <td><?=$key+1?></td>
                  <td class="form-group">
                    <img src="<?=MAIN_SITE_URL.$valueTestimonials['image']?>" class="img-circle" alt="User Image" width="50" height="50" id="userImg<?=$key?>"  > 
                    <input type="file" name="img" class="chooseFile form-control" onchange="loadFile<?=$key?>(event)"> <input type="hidden" name="img_name" value="" >
                  </td>
                  <td class="form-group"><input type="text" name="name" class="form-control" value="<?=$valueTestimonials['name']?>" placeholder="Enter Name"></td> 
                  <td class="form-group"><input type="text" name="location" class="form-control" value="<?=$valueTestimonials['location']?>" placeholder="Enter Location"></td> 
                  <td class="form-group"><input type="text" name="message" class="form-control" value="<?=$valueTestimonials['message']?>" placeholder="Enter Message"></td> 
                  <td style="white-space: nowrap;">
                      <button type="submit" class="btn btn-add btn-sm" data-toggle="modal" data-target="#customer1"><i class="fa fa-refresh"></i></button>
                    <a href="#">
                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#customer2"><i class="fa fa-times-circle"></i> </button>
                    </a>
                  </td>
                </tr>
              </form>
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
        <h3><i class="fa fa-user m-r-5"></i> Add New Testimoials</h3>
      </div>
      <div class="modal-body">
        <p style="color: red">Note : Image size should be 400X400 pixel</p>
        <div class="row"> 
          <form action="<?=base_url('admin_controller/insert_testimonial')?>" method="post" enctype="multipart/form-data">
            <div class="col-md-12">
              <div class="form-group">
                <img src="<?=MAIN_SITE_URL?>assets/images/default_profilepics.jpg" class="img-circle" alt="User Image" width="50" height="50" id="userImg"  > 
                <input type="file" name="img"  onchange="loadFile(event)" class="form-control chooseFile">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Enter Name" style="width: 100%" required="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" name="location" placeholder="Enter Location" style="width: 100%" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <textarea type="text" class="form-control" name="message" placeholder="Enter Message" style="width: 100%" required></textarea>
              </div>
            </div>  
            <div class="col-md-12"> 
                <fieldset>
                  <div class="col-md-12 form-group user-form-group">
                    <div class="pull-right">
                      <button type="button" class="btn btn-add btn-sm"  data-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </div>
                  </div>
                </fieldset> 
            </div> 
              </form>
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



<?php /*update image check validate*/
/*
public function update_gallery($g_id)
  {
    $where = 'g_id='.$g_id;
    $fetchGalleryImg=$this->Admin_Model->getData('gallery', $where ,''); 
    foreach ($fetchGalleryImg as $key) 
    {
      $catpreviousImg = $key->g_img;
    }  

    $g_caption=$this->input->post('g_caption');
    $config['upload_path'] = 'images/gallery/'; 
    $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|PNG|GIF|JPEG'; 
    $config['remove_spaces'] = TRUE;
    $config['file_name'] = 'tumble_town_'.date('dmyHis');
    $this->load->library('upload',$config,'image1');

    if (!($this->image1->do_upload('g_img') =='')) 
    { 
      $expcatImage = explode('/', $catpreviousImg);
      $expcatImageLen = sizeof($expcatImage)-1;
      $catimgUrl = $expcatImage[$expcatImageLen];
      $catfinalURl = 'images/gallery/'.$catimgUrl; 

      if (is_file($catfinalURl)) 
      {
        unlink($catfinalURl);
        //echo "Successfully";
      }
      else
      {
        //echo "file is not found";
      } 

      $upload_img1=$this->image1->data(); 
      $img1_path=$upload_img1['raw_name']. $upload_img1['file_ext'];  
    } 
    else
    { 
      $img1_path = $this->input->post('img_name'); 
    } 

    $data = array(
      'g_caption' => $g_caption,
      'g_img' => $img1_path
    );  
    $where = 'g_id = '.$g_id;
    $this->Admin_Model->updateQuery('gallery', $data, $where);
    $this->session->set_flashdata('feedback',"Image/Caption Updated Successfully"); 
    $this->session->set_flashdata('feedback_class',"alert-success");
    redirect($_SERVER['HTTP_REFERER']);
  }
*/
 ?>