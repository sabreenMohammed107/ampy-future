 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <img src="{{ asset('adminassets/AMBY LOGO 34 PNG.webp')}}" style="width: 50% !important" alt="">

        {{-- <div class="pull-left image"> --}}
          {{-- <img src="{{ asset('adminassets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" /> --}}
        {{-- </div> --}}
        {{-- <div class="pull-left info">
          <p>Ampy-Future</p>

          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div> --}}
      </div>

      <ul class="sidebar-menu">
        {{-- <li class="header">MAIN NAVIGATION</li> --}}

        <li class="active treeview">
          <a href="{{ url('/dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>الرئيسية</span>
          </a>

        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>الإعدادات</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('users.index') }}"><i class="fa fa-circle-o"></i> المستخدمين </a></li>


            <li><a href="{{ route('company.edit', $company->id) }}"><i class="fa fa-circle-o"></i> بيانات الشركة </a></li>
            <li><a href="{{ route('bank.edit', $bank->id) }}"><i class="fa fa-circle-o"></i> بيانات البنك </a></li>


            <li><a href="{{  route('faq.index') }}"><i class="fa fa-circle-o"></i> الاسئلة الشائعة </a></li>
            <li><a href="{{  route('message.index') }}"><i class="fa fa-circle-o"></i>  رسائل التواصل </a></li>

        </ul>
        </li>



        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>الحركات المالية</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{  route('year.index') }}"><i class="fa fa-circle-o"></i> السنوات المالية </a></li>
            {{-- <li><a href="{{  route('month.index') }}"><i class="fa fa-circle-o"></i> الشهور </a></li> --}}

            <li><a href="{{ route('emps.index') }}"><i class="fa fa-circle-o"></i> بيانات الموظفين </a></li>
            <li><a href="{{  route('payroll-rules.index') }}"><i class="fa fa-circle-o"></i> قواعد المرتبات </a></li>

            <li><a href="{{  route('transaction.index') }}"><i class="fa fa-circle-o"></i> الحركات المالية </a></li>

            {{-- <li><a href="#"><i class="fa fa-circle-o"></i> إشعارات اخري </a></li> --}}
          </ul>
        </li>








      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
