<!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Mrfi Web <?= date('Y'); ?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>
  <script src="<?= base_url('assets/js/script.js'); ?>"></script>

  <script type="text/javascript" src="<?= base_url().'assets/js/jquery.js'?>"></script>
  <script type="text/javascript" src="<?= base_url().'assets/js/bootstrap.js'?>"></script>
  <script type="text/javascript" src="<?= base_url().'assets/js/jquery.dataTables.js'?>"></script>
  
  <script src="<?= base_url().'assets/js/dataTables.bootstrap.js'?>"></script>
  <script src="<?= base_url(). 'assets/js/bootstrap.js'?>"></script>

  <script type="text/javascript"> 
      
     $.ajaxPrefilter(function( options, originalOptions, jqXHHR ) {options.async = true;});
  
$(function() {
     
      tampilData();

     // Add data
      $('.addData').on('click', function() {
                  $('input[name=nrp]').val('');
                  $('input[name=name]').val('');
                  $('input[name=email]').val('');
                  $('input[name=jurusan]').val('');
                  
        $('#subMenuModal').modal('show');

        $('#subMenuModal').find('.modal-title').text('Add new data');
        $('#myForm').attr('action','<?= base_url(); ?>shcool/addData');
          
      });

      $('#btnSave').on('click', function() {

           var url = $('#myForm').attr('action');
           var data = $('#myForm').serialize();
           

          $.ajax({
                 url : url,
                 method : 'post',
                 type : 'ajax',
                 async : false,
                 dataType : 'JSON',
                 data : data,
                 success : function(response) {
                  
                    
                     $('#subMenuModal').modal('hide');
                     //$('#myForm')[0].reset("");
                     //alert('Add new data success');
                     //$('#alert-success').html('Adeed success').style('active');//fadein().delay(4000).fadeOut('slow');
                      
                     tampilData();
                           
                },
                 error: function(){
                  alert('failled');
                   $('.alert-success').html('Adeed failled');
                }

          });

       });


 
     

      // Edit
       $('#show_data').on('click', '.item_edit',function(){
          var id = $(this).attr('data');         
          $('#subMenuModal').modal('show');
          $('#subMenuModal').find('.modal-title').text('Edit Data');
          $('#myForm').attr('action', 'http://localhost/web-login/shcool/update');

          $.ajax({
              url: 'http://localhost/web-login/shcool/edit',
              type: 'ajax',
              data:{id: id},
              method:'get',
              async: false,
              dataType: 'JSON',
              success: function(data){

                  $('input[name=nrp]').val(data.nrp);
                  $('input[name=name]').val(data.name);
                  $('input[name=email]').val(data.email);
                  $('input[name=jurusan]').val(data.jurusan);
                  $('input[name=id]').val(data.id);
                  tampilData();
               },
               error: function(){
                alert('failled update');
               }
               
          })  
          
       });

      // delete
       $('#show_data').on('click', '.item_hapus', function(){
          var id = $(this).attr('data');
          confirm('Are you sure');
          $.ajax({
            type: 'ajax',
            method: 'get',
            async: false,
            url: 'http://localhost/web-login/shcool/delete',
            data: {id: id},
            dataType: 'JSON',
            success: function(response){
             
             //.style('active');
                     // .fadein().delay(4000).fadeOut('slow');
                tampilData();
            },
            error: function(){
              alert('error deleting');
            }
          });


          return false;
       });



//        $('#mydata').dataTable();

      function tampilData() {
          $.ajax ({
            url: 'http://localhost/web-login/shcool/getData',
            type: 'POST',
            async: false,
            dataType :'JSON',
            success: function(data){
             var html = '';
              var i = 0 ;
              for(i ;  i < data.length; i++){
                  html += 
                               '<tr><td>' + data[i].id + '</td>' +
                                 '<td>' + data[i].nrp + '</td>' +
                                 '<td>' + data[i].name + '</td>' +
                                 '<td>' + data[i].email + '</td>' +
                                 '<td>' + data[i].jurusan + '</td>' +

                                 '<td style="text-align:right;">' +

                                       '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="' + data[i].id+ ' ">Edit</a> ' +
                                       '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].id+'">Hapus</a>'+ '</td>'
                                 '</tr>';
                };
                
                 $('#show_data').html(html); 

              },
             
               error: function (data) {
                  alert('error');
                 }
          });
      };
              
       //Searchhing
       $('#search').on('keyup', function(){
         
          $.ajax({
            url:'http://localhost/web-login/shcool/search?search=' + $('#search').val(),
            method: 'get',
            dataType: 'json',
            success: function(data){
              
              var html = '';
              var i = 0 ;
              for(i ;  i < data.length; i++){
                  html += 
                                '<tr><td>' + data[i].id + '</td>' +
                                 '<td>' + data[i].nrp + '</td>' +
                                 '<td>' + data[i].name + '</td>' +
                                 '<td>' + data[i].email + '</td>' +
                                 '<td>' + data[i].jurusan + '</td>' +

                                 '<td style="text-align:right;">' +

                                       '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="' + data[i].id+ ' ">Edit</a> ' +
                                       '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].id+'">Hapus</a>'+ '</td>'
                                 '</tr>';
                };
                
                 $('#show_data').html(html);

              
            
            }, error: function(){
              alert('failled');
            }

          });
       });       
              
       
    
 });
 
  </script>
</body>

</html>








