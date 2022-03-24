  <!-- jQuery 2.1.4 -->
  <script src="{{ asset('adminassets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
  <!-- jQuery UI 1.11.2 -->
  <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.2 JS -->
  <script src="{{ asset('adminassets/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
     <!-- DATA TABES SCRIPT -->
     <script src="{{ asset('adminassets/plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
     <script src="{{ asset('adminassets/plugins/datatables/dataTables.bootstrap.js') }}" type="text/javascript"></script>
  <!-- Morris.js charts -->
  <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="{{ asset('adminassets/plugins/morris/morris.min.js') }}" type="text/javascript"></script>
  <!-- Sparkline -->
  <script src="{{ asset('adminassets/plugins/sparkline/jquery.sparkline.min.js') }}" type="text/javascript"></script>
  <!-- jvectormap -->
  <script src="{{ asset('adminassets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('adminassets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}" type="text/javascript"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{ asset('adminassets/plugins/knob/jquery.knob.js') }}" type="text/javascript"></script>
  <!-- daterangepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
  <script src="{{ asset('adminassets/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>

  <!-- datepicker -->
  <script src="{{ asset('adminassets/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="{{ asset('adminassets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript"></script>
  <!-- Slimscroll -->
  <script src="{{ asset('adminassets/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
  <!-- FastClick -->
  <script src='{{ asset('adminassets/plugins/fastclick/fastclick.min.js') }}'></script>
 <!-- data table JS ============================================ -->
 <script src="{{asset('adminassets/plugins/data-table/bootstrap-table.js')}}"></script>
 <script src="{{asset('adminassets/plugins/data-table/tableExport.js')}}"></script>
 <script src="{{asset('adminassets/plugins/data-table/data-table-active.js')}}"></script>
 <script src="{{asset('adminassets/plugins/data-table/bootstrap-table-editable.js')}}"></script>
 <script src="{{asset('adminassets/plugins/data-table/bootstrap-editable.js')}}"></script>
 <script src="{{asset('adminassets/plugins/data-table/bootstrap-table-resizable.js')}}"></script>
 <script src="{{asset('adminassets/plugins/data-table/colResizable-1.5.source.js')}}"></script>
 <script src="{{asset('adminassets/plugins/data-table/bootstrap-table-export.js')}}"></script>

 <script src="{{asset('adminassets/plugins/data-table/bootstrap-table-ar-SA.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('adminassets/dist/js/app.min.js') }}" type="text/javascript"></script>

  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  {{-- <script src="{{ asset('adminassets/dist/js/pages/dashboard.js') }}" type="text/javascript"></script> --}}
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('adminassets/dist/js/demo.js') }}" type="text/javascript"></script>

    @yield('scripts')
    <script >
        $(function () {

            $('.summernote').summernote();

          $("#example1").dataTable();
          $('#example2').dataTable({
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": false,
            "bInfo": false,
            "bAutoWidth": false
          });

          $('#inputGroupFile02').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })
        });
      </script>
</body>

</html>
