@extends('layout.web')

@section('title', 'الاسئلة الشائعة')

@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-md-10">
            <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">تعديل</h3>
        </div>







        <form action="{{route('faq.update',$row->id)}}"  method="post" >

            @method('PUT')
              @csrf
                  <div class="box-body">

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for=""> السؤال</label>
                            <textarea class="form-control " name="question">{{$row->question}}</textarea>                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">  الاجابة</label>
                            <textarea class="form-control " name="answer">{{$row->answer}}</textarea>                        </div>
                    </div>




                <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <a href="{{route('faq.index')}}" class="btn btn-danger">إلغاء</a>
                </div>
                </div>

                  </form>
              </div>
    </div>

@endsection
