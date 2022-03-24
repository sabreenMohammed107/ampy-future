@extends('layout.web')

@section('title', 'الشهور')

@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-md-10">
            <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">تعديل</h3>
        </div>






        <form action="{{route('month.update',$row->id)}}"  method="post" >

            @method('PUT')
              @csrf
                  <div class="box-body">

                        <div class="col-sm-6">
                        <div class="form-group">
                            <label  >{{ __('  الشهر باللغة العربية ') }}</label>
                                <input type="text" id="newTitle" name="month_ar" value="{{$row->month_ar}}" class="form-control"
                                   placeholder=" الشهر باللغة العربية">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label  >{{ __('  الشهر باللغة الانجليزية ') }}</label>
                                    <input type="text" id="newTitle" name="month_en" value="{{$row->month_en}}" class="form-control"
                                       placeholder=" الشهر باللغة الانجليزية">
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label  >{{ __('  السنه ') }}</label>
                                    <select name="year_id" class="form-control" id="">

                                        @foreach($years as $type)
                                        <option value="{{$type->id}}" {{ $row->year_id == $type->id ? 'selected' : '' }}
                                            >{{$type->year}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                </div>





                <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <a href="{{route('month.index')}}" class="btn btn-danger">إلغاء</a>
                </div>
                </div>

                  </form>
              </div>
    </div>

@endsection
