@extends('layout.web')

@section('title', 'السنين')

@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-md-10">
            <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">اضافة</h3>
        </div>






                  <form action="{{route('year.store')}}" method="POST">
				  @csrf
                  <div class="box-body">

                        <div class="col-sm-12">
                        <div class="form-group">
                            <label  >{{ __('  السنه ') }}</label>
                                <input type="number" id="newTitle" name="year" value="{{old('year')}}" class="form-control"
                                   placeholder=" السنة">
                            </div>
                        </div>





                <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <a href="{{route('year.index')}}" class="btn btn-danger">إلغاء</a>
                </div>
                </div>

                  </form>
              </div>
    </div>

@endsection
