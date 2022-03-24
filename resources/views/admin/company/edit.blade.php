@extends('layout.web')


@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-10">
            <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">تعديل</h3>
        </div>





        <form action="{{route('company.update',$row->id)}}"  method="post" enctype="multipart/form-data">

            @method('PUT')
              @csrf

                <div class="box-body">
                    <div class="widget-body-form row">
                        <div class="col-lg-3">
                            <img src="{{ asset('uploads/companies') }}/{{ $row->logo }}" style="height: 250px" width="100%" class="col-12 h-150">
                        </div>
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">اسم الشركة</label>
                                        <input type="text" name="name" value="{{$row->name}}" class="form-control" id="">
                                    </div>
                                </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">من نحن</label>
                            <textarea class="form-control " name="who_we_are">{{$row->who_we_are}}</textarea>                        </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">لماذا نحن</label>
                            <textarea class="form-control " name="what_we_do">{{$row->what_we_do}}</textarea>                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for=""> سياسة الشركة</label>
                            <textarea class="form-control " name="ploicy">{{$row->ploicy}}</textarea>                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">لوجو الشركة</label>
                            <div class="custom-file">
                                <input type="file" name="logo" class="custom-file-input" id="customFile">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label  >{{ __('  البنك ') }}</label>
                            <select name="bank_id" class="form-control" id="">

                                @foreach($banks as $type)
                                <option value="{{$type->id}}" {{ $row->bank_id == $type->id ? 'selected' : '' }}
                                    >{{$type->name}}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>




                    <div class="col-sm-2">
                        <div class="form-group">
                            <div class="checkbox">
                              <label>
                                {{ __('نشط') }}
                                <input type="checkbox" @if($row->active==1) checked @endif id="newTitle" name="active"  value="1"/>

                              </label>
                            </div>

                    </div>
                    </div>
                </div>
                        </div>
                    </div>
                </div>
            <!-- /.card-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">حفظ</button>
                {{-- <a href="{{route('company.index')}}" class="btn btn-danger">إلغاء</a> --}}
            </div>
        </form>
            </div>
    </div>

@endsection


