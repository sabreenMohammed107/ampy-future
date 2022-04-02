@extends('layout.web')


@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-10">
            <div class="box box-primary px-5">
        <div class="box-header">
          <h3 class="box-title">تعديل</h3>
        </div>







{!! Form::model($user, ['method' => 'PATCH','enctype' =>
'multipart/form-data','route' => ['emps.update', $user->id]]) !!}  <div class="box-body">
    <div class="box-body">
        <div class="widget-body-form row">
            <div class="col-lg-3">
                <img src="{{ asset('uploads/users') }}/{{ $user->image }}" style="height: 250px" width="100%" class="col-12 h-150">
            </div>
            <div class="col-lg-9">
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
        <a href="{{route('emps.index')}}" class="btn btn-danger">إلغاء</a>
    </div>
</div>
        </div>
    </div>
{!! Form::close() !!}
    </div>
</div>
{{-- </div> --}}

@endsection
