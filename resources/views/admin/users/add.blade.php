@extends('layout.web')


@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-10">
            <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">اضافه مستخدم</h3>
        </div>









{!! Form::open(array('route' => 'users.store','method'=>'POST','enctype' =>
'multipart/form-data')) !!}
<div class="box-body">

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>إسم المستخدم:</strong>
            {!! Form::text('name', null, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>البريد الإلكترونى:</strong>
            {!! Form::text('email', null, array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>العنوان عربى:</strong>
            {!! Form::text('address_ar', null, array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>العنوان انجليزى:</strong>
            {!! Form::text('address_en', null, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>كلمه السر:</strong>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>تأكيد كلمه السر :</strong>
            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
        </div>
    </div>
     <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>الشركات:</strong>
            {!! Form::select('company', $companies,'company_id', array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong> كود الموظف:</strong>
            {!! Form::text('emp_code', null, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>رقم الهوية:</strong>
            {!! Form::text('n_id', null, array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>موبايل:</strong>
            {!! Form::text('mobile', null, array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong> رقم الموظف:</strong>
            {!! Form::text('emp_no', null, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>المسمى الوظيفى بالعربي:</strong>
            {!! Form::text('job_title_ar', null, array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>المسمى الوظيفى بالانجليزية:</strong>
            {!! Form::text('job_title_en', null, array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>الحساب البنكي:</strong>
            {!! Form::text('bank_account', null, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>تاريخ التعيين:</strong>
            {!! Form::date('hire_date', \Carbon\Carbon::now(), array('class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
            <strong> الصورة:</strong>
            {!! Form::file('image', null, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 text-center">
        <button type="submit" class="btn btn-primary">حفظ</button>
        <a href="{{route('users.index')}}" class="btn btn-danger">إلغاء</a>
    </div>
</div>
{!! Form::close() !!}
</div>

@endsection
