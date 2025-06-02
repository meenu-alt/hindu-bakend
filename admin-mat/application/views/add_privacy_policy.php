<?php include('header.php') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-sm-12">
            <div class="mailbox">
               <div class="mailbox-header">
                  <div class="row">
                     <div class="col-xs-4">
                        <div class="inbox-avatar">
                           <i class="fa fa-user-circle-o"></i>
                           <div class="inbox-avatar-text hidden-xs hidden-sm">
                              <div class="avatar-name">Edit Privacy Policy</div>
                              <div><small>Privacy Policy</small></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xs-8">
                        <!-- <div class="inbox-toolbar btn-toolbar">
                           <div class="btn-group">
                              <a href="mailbox.html" class="btn btn-default"><span class="fa fa-long-arrow-left"></span></a>
                              <a href="#" class="hidden-xs hidden-sm btn btn-default"><span class="fa fa-reply-all"></span></a>
                           </div>
                        </div> -->
                     </div>
                  </div>
               </div>
               <div class="mailbox-body">
                  <div class="row m-0">
                     <div class="col-xs-12 col-sm-12 col-md-12 p-0 inbox-mail p-20">
                        <?php if (isset($privacy_policy)){ ?>
                           <?php foreach ($privacy_policy as $key => $privacy_policy_value) { ?>
                              <form action="<?=base_url('admin_controller/add_pp/').$privacy_policy_value['privacy_policy_id']?>" method="post" enctype="multipart/form-data">
                                 <!-- summernote -->
                                 <textarea id="summernote" name="privacy_policy_desc"><?=$privacy_policy_value['privacy_policy_desc']?></textarea>
                                 <div class="btn-group pull-right">
                                    <button type="submit" class="btn btn-add">UPDATE PP</button>
                                 </div>
                              </form>
                           <?php } ?>                           
                        <?php } else { ?>
                           <form action="<?=base_url('admin_controller/add_bl')?>" method="post" enctype="multipart/form-data">
                              <div class="form-group row">
                                 <label class="col-sm-3 col-md-3 col-form-label text-right">Blog Title :</label>
                                 <div class="col-sm-9 col-md-9">
                                    <input class="form-control" type="text" name="blog_name"  id="product_name">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label class="col-sm-3 col-md-3 col-form-label text-right">Feature Image :</label>
                                 <div class="col-sm-4 col-md-4">
                                    <input type="file" name="blog_img" onchange="loadFile(event)" class="form-control chooseFile">
                                 </div>
                                 <div class="col-sm-5 col-md-5">
                                    <img src="" width="300px" height="250px" id="userImg" style="display: none;">
                                    <!-- <img src="<?=base_url('assets/images/placeholder.jpg')?>" width="300px" height="300px" id="userImg"> -->
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label class="col-sm-3 col-md-3 col-form-label text-right">Blog Keywords :</label>
                                 <div class="col-sm-9 col-md-9">
                                    <input class="form-control" type="text" value="" name="blog_keyword"  id="blog_keyword">
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label class="col-sm-3 col-md-3 col-form-label text-right">Blog Descreption :</label>
                                 <div class="col-sm-9 col-md-9">
                                    <!-- <input class="form-control" type="text" value="" name="blog_name"  id="product_name"> -->
                                 <textarea class="form-control" name="blog_description"></textarea>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <label class="col-sm-3 col-md-3 col-form-label text-right">Blog URL :</label>
                                 <div class="col-sm-9 col-md-9">
                                    <input class="form-control" type="text" value="" name="blog_url"  id="blog_url">
                                 </div>
                              </div>
                              <!-- summernote -->
                              <textarea id="summernote" name="blog_desc"></textarea>
                              <div class="btn-group pull-right">
                                 <button type="submit" class="btn btn-add">ADD BLOG</button>
                              </div>
                           </form>
                        <?php } ?>
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
<script>
   var loadFile = function(event) {
    var output = document.getElementById('userImg');
    output.src = URL.createObjectURL(event.target.files[0]);
    $('#userImg').show();
    };
</script> 
<?php include('footer.php') ?>