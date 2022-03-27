@extends('layout.web')


@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-10">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">تعديل</h3>
                </div>





                <form action="{{ route('company.update', $row->id) }}" method="post" enctype="multipart/form-data">

                    @method('PUT')
                    @csrf

                    <div class="box-body">
                        <div class="widget-body-form row">
                            <div class="col-lg-3">
                                <img src="{{ asset('uploads/companies') }}/{{ $row->logo }}" style="height: 250px"
                                    width="100%" class="col-12 h-150">
                            </div>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">اسم الشركة</label>
                                            <input type="text" name="name_ar" value="{{ $row->name_ar }}"
                                                class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">اسم الشركة بالاجنليزية</label>
                                            <input type="text" name="name_en" value="{{ $row->name_en }}"
                                                class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for=""> موبايل</label>
                                            <input type="text" name="mobile" value="{{ $row->mobile }}"
                                                class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for=""> بريد الكترونى</label>
                                            <input type="text" name="email" value="{{ $row->email }}"
                                                class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for=""> موقع الكترونى</label>
                                            <input type="text" name="website" value="{{ $row->website }}"
                                                class="form-control" id="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">من نحن عربى</label>
                                            <textarea class="form-control " name="who_we_are_ar">{{ $row->who_we_are_ar }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">من نحن انجليزى</label>
                                            <textarea class="form-control " name="who_we_are_en">{{ $row->who_we_are_en }}</textarea>
                                        </div>
                                    </div>


                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">لماذا نحن عربى</label>
                                            <textarea class="form-control " name="what_we_do_ar">{{ $row->what_we_do_ar }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">لماذا نحن انجليزى</label>
                                            <textarea class="form-control " name="what_we_do_en">{{ $row->what_we_do_en }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for=""> سياسة الشركة عربى</label>
                                            <textarea class="form-control " name="ploicy_ar">{{ $row->ploicy_ar }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for=""> سياسة الشركة انجليزى</label>
                                            <textarea class="form-control " name="ploicy_en">{{ $row->ploicy_en }}</textarea>
                                        </div>
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
                                            <label>{{ __('  البنك ') }}</label>
                                            <select name="bank_id" class="form-control" id="">

                                                @foreach ($banks as $type)
                                                    <option value="{{ $type->id }}"
                                                        {{ $row->bank_id == $type->id ? 'selected' : '' }}>
                                                        {{ $type->name_ar }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>




                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    {{ __('نشط') }}
                                                    <input type="checkbox" @if ($row->active == 1) checked @endif
                                                        id="newTitle" name="active" value="1" />

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
