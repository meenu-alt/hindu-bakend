<footer class="main-footer">
            <strong>Copyright &copy; 2020-<?=date("Y");?> <a href="#">Hello Humsafar</a>.</strong> All rights reserved.   <a href="https://web-services.co.in/">Maintained By Web Services</a>
         </footer>
      </div>
      <!-- /.wrapper -->
      <!-- Start Core Plugins
         =====================================================================-->
      <!-- jQuery -->
      <script src="<?=base_url()?>/assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
      <!-- jquery-ui --> 
      <script src="<?=base_url()?>/assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
      <!-- Bootstrap -->
      <script src="<?=base_url()?>/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      <!-- lobipanel -->
      <script src="<?=base_url()?>/assets/plugins/lobipanel/lobipanel.min.js" type="text/javascript"></script>
      <!-- Pace js -->
      <script src="<?=base_url()?>/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
      <!-- SlimScroll -->
      <script src="<?=base_url()?>/assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript">    </script>
      <!-- FastClick -->
      <script src="<?=base_url()?>/assets/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
      <!-- CRMadmin frame -->
      <script src="<?=base_url()?>/assets/dist/js/custom.js" type="text/javascript"></script>
      <!-- End Core Plugins
         =====================================================================-->
      <!-- Start Page Lavel Plugins
         =====================================================================-->
      <!-- ChartJs JavaScript -->
      <script src="<?=base_url()?>/assets/plugins/chartJs/Chart.min.js" type="text/javascript"></script>
      <!-- Counter js -->
      <script src="<?=base_url()?>/assets/plugins/counterup/waypoints.js" type="text/javascript"></script>
      <script src="<?=base_url()?>/assets/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
      <!-- Monthly js -->
      <script src="<?=base_url()?>/assets/plugins/monthly/monthly.js" type="text/javascript"></script>
      <!-- End Page Lavel Plugins
         =====================================================================-->
      <!-- Start Theme label Script
         =====================================================================-->
      <!-- summernote js -->
      <script src="<?=base_url()?>assets/plugins/summernote/summernote.js" type="text/javascript"></script>

      <script src="<?=base_url()?>assets/dist/js/jquery.toast.js"></script>

      <!-- Dashboard js -->
      <script src="<?=base_url()?>/assets/dist/js/dashboard.js" type="text/javascript"></script>
      <!-- End Theme label Script
         =====================================================================-->

      <?php 
        if ($feedback = $this->session->flashdata('feedback')) {
          $feedback_heading = $this->session->flashdata('feedback_heading');
          $feedback_icon = $this->session->flashdata('feedback_icon');
      ?>
        <script>
          $(document).ready(function() {
            if ( !$(this).hasClass('generate-toast') ) {
                  var code = $.toast({
                      heading: '<?=$feedback_heading;?>',
                      text: '<?=$feedback;?>',
                      position: 'top-right', 
                      icon: '<?=$feedback_icon;?>'
                  });
              };
            });
        </script>
      <?php }?>
      <script>
         function dash() {
         // single bar chart
         var ctx = document.getElementById("singelBarChart");
         var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
         labels: ["Sun", "Mon", "Tu", "Wed", "Th", "Fri", "Sat"],
         datasets: [
         {
         label: "My First dataset",
         data: [40, 55, 75, 81, 56, 55, 40],
         borderColor: "rgba(0, 150, 136, 0.8)",
         width: "1",
         borderWidth: "0",
         backgroundColor: "rgba(0, 150, 136, 0.8)"
         }
         ]
         },
         options: {
         scales: {
         yAxes: [{
             ticks: {
                 beginAtZero: true
             }
         }]
         }
         }
         });
               //monthly calender
               $('#m_calendar').monthly({
                 mode: 'event',
                 //jsonUrl: 'events.json',
                 //dataType: 'json'
                 xmlUrl: 'events.xml'
             });
         
         //bar chart
         var ctx = document.getElementById("barChart");
         var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
         labels: ["January", "February", "March", "April", "May", "June", "July", "august", "september","october", "Nobemver", "December"],
         datasets: [
         {
         label: "My First dataset",
         data: [65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56],
         borderColor: "rgba(0, 150, 136, 0.8)",
         width: "1",
         borderWidth: "0",
         backgroundColor: "rgba(0, 150, 136, 0.8)"
         },
         {
         label: "My Second dataset",
         data: [28, 48, 40, 19, 86, 27, 90, 28, 48, 40, 19, 86],
         borderColor: "rgba(51, 51, 51, 0.55)",
         width: "1",
         borderWidth: "0",
         backgroundColor: "rgba(51, 51, 51, 0.55)"
         }
         ]
         },
         options: {
         scales: {
         yAxes: [{
             ticks: {
                 beginAtZero: true
             }
         }]
         }
         }
         });
             //counter
             /*
             $('.count-number').counterUp({
                 delay: 10,
                 time: 5000
             });
             */
         }
         dash();         
      </script>
      
      <script>
        //Summernote
        function sumnote() {
          var note = $('#summernote');
          $(note).summernote({
             height: 200, // set editor height
             minHeight: null, // set minimum height of editor
             maxHeight: null, // set maximum height of editor
             callbacks: {
                onImageUpload : function(files, editor, welEditable) {
         
                     for(var i = files.length - 1; i >= 0; i--) {
                             sendFile(files[i], this);
                    }
                }
              }
          });
        }
        function sendFile(file, el) {
          var form_data = new FormData();
          form_data.append('file', file);
          $.ajax({
            data: form_data,
            type: "POST",
            url: "<?=base_url('admin_controller/editor_upload')?>",
            cache: false,
            contentType: false,
            processData: false,
            success: function(url) {
                $(el).summernote('editor.insertImage', url);
            }
          });
        }
         sumnote();
      </script>
      <script>
           getPagination('#table-id');
            $('#maxRows').trigger('change');
            function getPagination (table){

                $('#maxRows').on('change',function(){
                  $('.pagination').html('');            // reset pagination div
                  var trnum = 0 ;                 // reset tr counter 
                  var maxRows = parseInt($(this).val());      // get Max Rows from select option
                  
                  var totalRows = $(table+' tbody tr').length;    // numbers of rows 
                 $(table+' tr:gt(0)').each(function(){      // each TR in  table and not the header
                  trnum++;                  // Start Counter 
                  if (trnum > maxRows ){            // if tr number gt maxRows
                    
                    $(this).hide();             // fade it out 
                  }if (trnum <= maxRows ){$(this).show();}// else fade in Important in case if it ..
                 });                      //  was fade out to fade it in 
                 if (totalRows > maxRows){            // if tr total rows gt max rows option
                  var pagenum = Math.ceil(totalRows/maxRows); // ceil total(rows/maxrows) to get ..  
                                        //  numbers of pages 
                  for (var i = 1; i <= pagenum ;){      // for each page append pagination li 
                  $('.pagination').append('<li data-page="'+i+'">\
                                <span>'+ i++ +'<span class="sr-only">(current)</span></span>\
                              </li>').show();
                  }                     // end for i 
               
                   
                }                         // end if row count > max rows
                $('.pagination li:first-child').addClass('active'); // add active class to the first li 
                  
                  
                  //SHOWING ROWS NUMBER OUT OF TOTAL DEFAULT
                 showig_rows_count(maxRows, 1, totalRows);
                  //SHOWING ROWS NUMBER OUT OF TOTAL DEFAULT

                  $('.pagination li').on('click',function(e){   // on click each page
                  e.preventDefault();
                  var pageNum = $(this).attr('data-page');  // get it's number
                  var trIndex = 0 ;             // reset tr counter
                  $('.pagination li').removeClass('active');  // remove active class from all li 
                  $(this).addClass('active');         // add active class to the clicked 
                  
                  
                  //SHOWING ROWS NUMBER OUT OF TOTAL
                 showig_rows_count(maxRows, pageNum, totalRows);
                  //SHOWING ROWS NUMBER OUT OF TOTAL
                  
                  
                  
                   $(table+' tr:gt(0)').each(function(){    // each tr in table not the header
                    trIndex++;                // tr index counter 
                    // if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
                    if (trIndex > (maxRows*pageNum) || trIndex <= ((maxRows*pageNum)-maxRows)){
                      $(this).hide();   
                    }else {$(this).show();}         //else fade in 
                   });                    // end of for each tr in table
                    });                   // end of on click pagination list
              });
                                // end of on select change 
               
                          // END OF PAGINATION 
              
            } 


                

          // SI SETTING
          $(function(){
            // Just to append id number for each row  
          // default_index();
                    
          });

          //ROWS SHOWING FUNCTION
          function showig_rows_count(maxRows, pageNum, totalRows) {
             //Default rows showing
                  var end_index = maxRows*pageNum;
                  var start_index = ((maxRows*pageNum)- maxRows) + parseFloat(1);
                  var string = 'Showing '+ start_index + ' to ' + end_index +' of ' + totalRows + ' entries';               
                  $('.rows_count').html(string);
          }

          // // CREATING INDEX
          // function default_index() {
          //   $('table tr:eq(0)').prepend('<th> ID </th>')

          //           var id = 0;

          //           $('table tr:gt(0)').each(function(){  
          //             id++
          //             $(this).prepend('<td>'+id+'</td>');
          //           });
          // }

          // All Table search script
          function FilterkeyWord_all_table() {
            
          // Count td if you want to search on all table instead of specific column

            var count = $('.table').children('tbody').children('tr:first-child').children('td').length; 

                  // Declare variables
            var input, filter, table, tr, td, i;
            input = document.getElementById("search_input_all");
            var input_value =     document.getElementById("search_input_all").value;
                  filter = input.value.toLowerCase();
            var input_value1 = document.getElementById("search_input_caste").value;
                  filter1 = input_value1.toLowerCase();
            var input_value2 = document.getElementById("search_input_religion").value;
                  filter2 = input_value2.toLowerCase();
            if(input_value !='' || input_value1!='' || input_value2!=''){
                  table = document.getElementById("table-id");
                  tr = table.getElementsByTagName("tr");

                  // Loop through all table rows, and hide those who don't match the search query
                  for (i = 1; i < tr.length; i++) {
                    
                    var flag = 0;
                     
                    for(j = 0; j < count; j++){
                      td = tr[i].getElementsByClassName("gender")[j];
                      td1 = tr[i].getElementsByClassName("caste")[j];
                      td2 = tr[i].getElementsByClassName("religion")[j];
                      
                      if (input_value!="" && td && input_value2=="") {
                          if (td.innerHTML.toLowerCase() == filter) {
                            flag = 1;
                          }
                        }
                        
                     if (input_value=="" && td2 && input_value2!="" && input_value1=="") {
                          if (td2.innerHTML.toLowerCase() == filter2) {
                            flag = 1;
                          }
                        }
                   
                    if (input_value!="" && input_value2!="" && td && td2 && input_value1=="") {
                          if (td.innerHTML.toLowerCase() == filter && td2.innerHTML.toLowerCase() == filter2) {
                            flag = 1;  
                          } 
                        }
                        
                    if (input_value=="" && input_value2!="" && td2 && input_value1!="" && td1) {
                          if (td1.innerHTML.toLowerCase() == filter1 && td2.innerHTML.toLowerCase() == filter2) {
                            flag = 1; console.log(input_value1);
                          }
                        }
                        
                        
                    if (input_value!="" && input_value2!="" && td && td2 && input_value1!="" && td1) {
                          if (td.innerHTML.toLowerCase() == filter && td1.innerHTML.toLowerCase() == filter1 && td2.innerHTML.toLowerCase() == filter2) {
                            flag = 1;  
                          }
                        }
               
                      }
                    if(flag==1){
                               tr[i].style.display = "";
                    }else {
                       tr[i].style.display = "none";
                    }
                  }
              }else {
                //RESET TABLE
                $('#maxRows').trigger('change');
              }
          }
          
          
          	function selectCaste() {
			    var religion = $("#search_input_religion").val();
			    $('#search_input_caste')
			        .empty()
			        .append('<option selected="selected" value="" >All Caste</option>');
			    $.ajax({
			        url: "http://localhost/perfomdigi/hindu-humsfar-react/backend//Register_controller/selectCaste",
			        dataType: 'json',
			        method: "POST",
			        data: {
			            religion: religion
			        },
			        success: function(data) {
			            for (i = 0; i < data.length; i++) {
			                $('#search_input_caste')
			                    .append($("<option></option>")
			                        .attr("value", data[i])
			                        .text(data[i]));
			            }
			        }
			    });
			}

          
          

          // All Table search image script
          function image_all_table() {
            
          // Count td if you want to search on all table instead of specific column

            var count = $('.table').children('tbody').children('tr:first-child').children('td').length; 

                  // Declare variables
            var input, input1, filter, filter1, table, tr, td, i;
            input = document.getElementById("search_input_all1");
            var input_value =     document.getElementById("search_input_all1").value;
            input1 = document.getElementById("search_input_all");
            var input_value1 =     document.getElementById("search_input_all").value;
                  filter = input.value.toLowerCase();
                  filter1 = input1.value.toLowerCase();
            if(input_value !=''){
                  table = document.getElementById("table-id");
                  tr = table.getElementsByTagName("tr");

                  // Loop through all table rows, and hide those who don't match the search query
                  for (i = 1; i < tr.length; i++) {
                    
                    var flag = 0;
                     
                    for(j = 0; j < count; j++){
                      td = tr[i].getElementsByClassName("image")[j];
                      td1 = tr[i].getElementsByClassName("gender")[j];
                      if (td || td1) {
                       
                          var td_text = td.innerHTML;
                          var td_text1 = td1.innerHTML;
                          <?php $link_var = 'assets/dist/img/pp.png'; ?>
                          if (filter == 0) {
                            // alert(td.innerHTML.trim());
                            if (td.innerHTML.trim() == '<img src="http://192.168.1.4/ravi/admin-mat/assets/dist/img/pp.png" class="img-circle" alt="User Image" width="50" height="50">' && td1.innerHTML.toLowerCase() == filter1) {
                            //var td_text = td.innerHTML;  
                            //td.innerHTML = 'shaban';
                              flag = 1;
                            } else {
                              //DO NOTHING
                            }
                          } else {
                            if (td.innerHTML.trim() != '<img src="http://192.168.1.4/ravi/admin-mat/assets/dist/img/pp.png" class="img-circle" alt="User Image" width="50" height="50">' && td1.innerHTML.toLowerCase() == filter1) {
                            //var td_text = td.innerHTML;  
                            //td.innerHTML = 'shaban';
                              flag = 1;
                            } else {
                              //DO NOTHING
                            }
                          }
                          // if (td.innerHTML.toLowerCase() == filter) {
                          // //var td_text = td.innerHTML;  
                          // //td.innerHTML = 'shaban';
                          //   flag = 1;
                          // } else {
                          //   //DO NOTHING
                          // }
                        }
                      }
                    if(flag==1){
                               tr[i].style.display = "";
                    }else {
                       tr[i].style.display = "none";
                    }
                  }
              }else {
                //RESET TABLE
                $('#maxRows').trigger('change');
              }
          }
       </script>
   </body> 
</html>