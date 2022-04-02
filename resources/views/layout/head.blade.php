<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Ampy - Future</title>
  <!-- Bootstrap 3.3.4 -->
    <link href="{{ asset('adminassets/dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    {{-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" /> --}}
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <!-- DATA TABLES -->
<!-- DATA TABLES -->
<link href="{{ asset('adminassets/plugins/datatables/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('adminassets/dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{ asset('adminassets/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{ asset('adminassets/plugins/iCheck/flat/blue.css') }}" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="{{ asset('adminassets/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="{{ asset('adminassets/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="{{ asset('adminassets/plugins/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="{{ asset('adminassets/plugins/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="{{ asset('adminassets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css" />
    <!--============================================ -->
    <link rel="stylesheet" href="{{ asset('adminassets/plugins/css/data-table/bootstrap-table.css')}}">
    <link rel="stylesheet" href="{{ asset('adminassets/plugins/css/data-table/bootstrap-editable.css')}}">


    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    @yield('style')
    <style>
         .bootstrap-table .table:not(.table-condensed) > tbody > tr > td{
             /* text-indent: 10px; */
             padding-right: 10px !important;

         }

         .modal-danger .modal-body{
            background-color: #fff !important;
            color:#000 !important;
            text-align: center
         }
         .modal-secondary .modal-header {
    background: #444;
    color: #fff;
    border-bottom-color: #f4f4f4;
}
         .modal-danger .modal-footer{
            background-color: #fff !important;
            color:#000 !important;
         }
         .modal-secondary .modal-body{
            background-color: #fff !important;
            color:#000 !important;
            text-align: center
         }
         .modal-secondary .modal-footer{
            background-color: #fff !important;
            color:#000 !important;
         }
         .btn-outline {
    border: 1px solid #000;
    background: transparent;
    color: #000;
}
.btn-outline:hover, .btn-outline:focus, .btn-outline:active {
    border: 1px solid rgb(88, 2, 2);
    background: rgb(88, 2, 2);
    color: #fff;
}
.modal-danger .modal-footer{
    border-color: #000;
}
table .fa {
    font-size: 25px;
}
    </style>
</head>
