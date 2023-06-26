 <!-- Bootstrap core JavaScript-->
    <script src="/assets/Admin/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/Admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="/assets/Admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script>
      $(function() {
          setTimeout(function() {
              $('.alert-success').slideUp();
          }, 5000);
      });
  </script>
       
  <script src="/assets/Admin/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="/assets/Admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
 
  <script>
    $(document).ready(function() {
     
    $('#table').dataTable({}); // dòng này để nhúng bảng biểu thành dạng bảng được phân trang
         
    } ); 
  </script> 

    <!-- Custom scripts for all pages-->
    <script src="/assets/Admin/js/sb-admin-2.min.js"></script>
    <script src="/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
      CKEDITOR.replace( 'noidung');
    </script>