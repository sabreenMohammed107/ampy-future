@extends('layout.web')


@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-10">
            <div class="box box-primary px-5">
                <div class="box-header">
                    <h3 class="box-title">البيانات المالية</h3>
                </div>

                <form action="{{ route('payroll-rules.update', $row->id) }}" method="post">

                    @method('PUT')
                    @csrf
                    <div class="box-body">
                        <input type="hidden" name="user_id" value="{{ $row->user_id }}">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{ __('  الراتب الاساسى ') }}</label>
                                <input type="text" id="newTitle" name="basic_salary" class="form-control"
                                    placeholder=" الراتب الاساسى">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{ __('التسويات') }}</label>
                                <input type="text" id="newTitle" name="settlements" class="form-control"
                                    placeholder=" التسويات">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{ __('البدلات') }}</label>
                                <input type="text" id="newTitle" name="allowances" class="form-control"
                                    placeholder=" البدلات">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{ __('الضرايب') }}</label>
                                <input type="text" id="newTitle" name="taxes" class="form-control" placeholder=" الضرايب">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>{{ __('التأمينات') }}</label>
                                <input type="text" id="newTitle" name="insurance" class="form-control"
                                    placeholder=" التأمينات">
                            </div>
                        </div>








                        <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                            <button type="submit" class="btn btn-primary">حفظ</button>
                            <a href="{{ route('payroll-rules.index') }}" class="btn btn-danger">إلغاء</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        {{-- </div> --}}
    @endsection
