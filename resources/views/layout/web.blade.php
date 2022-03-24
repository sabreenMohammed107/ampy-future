@include('layout.head')

<body class="skin-blue sidebar-mini">
    <div class="wrapper">
        @include('layout.header')


        @include('layout.menu')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            @yield('title')

            {{-- <small>Control panel</small> --}}
          </h1>

        </section>

        <!-- Main content -->
        <section class="content">
            @include('layout.messages')



            @yield('content')
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">

        <strong>Copyright &copy; 2020 <a href="#">Senior Consulting</a>.</strong> All rights reserved.
      </footer>



    </div><!-- ./wrapper -->


@include('layout.footerScripts')
