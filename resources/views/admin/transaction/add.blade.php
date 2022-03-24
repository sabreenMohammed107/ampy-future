@extends('layout.web')

@section('title', 'الحركات المالية')

@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-md-10">
            <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">اضافة</h3>
        </div>






                  <form action="{{route('transaction.store')}}" method="POST">
				  @csrf
                  <div class="box-body">





                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label  >{{ __('  الشهر ') }}</label>
                                    <select name="month_id" class="form-control" id="">

                                        @foreach($months as $type)
                                        <option value="{{$type->id}}">{{$type->month_ar}} / {{$type->month_en}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label  >{{ __('  المستخدم ') }}</label>
                                        <select name="user_id" class="form-control" id="">

                                            @foreach($users as $type)
                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label  >{{ __('الراتب') }}</label>
                                                <input type="text" id="newTitle" name="net_salary" value="{{old('net_salary')}}" class="form-control"
                                                   placeholder="الراتب">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label  >{{ __(' التاريخ ') }}</label>
                                                <input type="date" name="transaction_date" class="form-control">

                                                </div>
                                            </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <a href="{{route('transaction.index')}}" class="btn btn-danger">إلغاء</a>
                </div>
                </div>

                  </form>
              </div>
    </div>

@endsection
