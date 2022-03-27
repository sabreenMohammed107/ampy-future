@extends('layout.web')

@section('title', ' المرتبات')

@section('content')


<div class="row">
    <div class="col-12">
        <div class="card" style="background: #ffffff;box-shadow: 0 1px 1px rgb(0 0 0 / 10%);">
            <div class="box-header">
                <h3 class="box-title">بيانات مرتبات شهر {{$row->month_ar ?? ''}}</h3>
                {{-- <a href="{{ route('year.create') }}" class="btn btn-info btn-lg pull-right"> اضافة </a> --}}

            </div>

            <div class="box-body ">
                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-resizable="true"
                    data-cookie="true" data-show-export="true" data-locale="ar-SA" style="direction: rtl">
                    <thead>
                        <th data-field="state" data-checkbox="false"></th>
                        <th data-field="id">#</th>

                        <th>كود الموظف</th>
                        <th>اسم الموظف</th>
                        <th> المرتب الاساسى</th>
                        <th>التسويات </th>
                        <th> البدلات</th>
                        <th> الضرائب</th>
                        <th> التأمينات</th>
                        <th>الاجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $index => $row)
                            <tr>
                                <td></td>
                                <td>{{ $index + 1 }}</td>

                                <td>{{ $row->user->emp_code ?? '' }}</td>
                                <td>{{ $row->user->name ?? '' }}</td>
                                <td>{{ $row->transaction_details[0]->basic_salary ?? '' }}</td>
                                <td>{{ $row->transaction_details[0]->settlements ?? '' }}</td>
                                <td>{{ $row->transaction_details[0]->allowances ?? '' }}</td>
                                <td>{{ $row->transaction_details[0]->taxes ?? '' }}</td>
                                <td>{{ $row->transaction_details[0]->insurance ?? '' }}</td>


                                <td>
                                    <div class="btn-group">



                                        <a href="#changeValues{{ $row->id }}" data-toggle="modal"
                                            data-target="#changeValues{{ $row->id }}">
                                            <p class="fa  fa-edit"></p>
                                        </a>

                                    </div>
                                </td>

                            </tr>
                            <!--/Edit Customer-->
                            <!-- Delete Modal -->

                                    <div class="modal fade dir-rtl" id="changeValues{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-success">
                                                <h5 class="modal-title" id="exampleModalLabel">تعديل البيانات المالية </h5>
                                                <button type="button" class="close m-0 p-0 text-white" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <h3><i class="fa fa-edit text-success"></i></h3>
                                    <form role="form" action="{{ route('updateDetailsValues') }}">
                                        @csrf
                                        <div class="card-body">
                                            <div class="row">

                                                <input type="hidden" name="transaction_id" value="{{ $row->id }}">


                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>{{ __('  الراتب الاساسى ') }}</label>
                                                        <input type="text" id="newTitle" name="basic_salary" value="{{ $row->transaction_details[0]->basic_salary ?? '' }}" class="form-control"
                                                            placeholder=" الراتب الاساسى">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>{{ __('التسويات') }}</label>
                                                        <input type="text" id="newTitle" value="{{ $row->transaction_details[0]->settlements ?? '' }}" name="settlements" class="form-control"
                                                            placeholder=" التسويات">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>{{ __('البدلات') }}</label>
                                                        <input type="text" id="newTitle" value="{{ $row->transaction_details[0]->allowances ?? '' }}" name="allowances" class="form-control"
                                                            placeholder=" البدلات">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>{{ __('الضرايب') }}</label>
                                                        <input type="text" id="newTitle" value="{{ $row->transaction_details[0]->taxes ?? '' }}" name="taxes" class="form-control" placeholder=" الضرايب">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>{{ __('التأمينات') }}</label>
                                                        <input type="text" id="newTitle" value="{{ $row->transaction_details[0]->insurance ?? '' }}" name="insurance" class="form-control"
                                                            placeholder=" التأمينات">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success "
                                                    data-dismiss="modal">الغاء</button>
                                            <button type="submit" class="btn btn-danger">تأكيد</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
    <!-- /.row -->
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {

            $("#example1").dataTable();
            $('#example2').dataTable({
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": false,
                "bSort": true,
                "bInfo": true,
                "bAutoWidth": false
            });
        });
    </script>
@endsection
