@extends('layout.web')

@section('title', 'الشهور')

@section('content')



<div class="row">
    <div class="col-12">
        <div class="card" style="background: #ffffff;box-shadow: 0 1px 1px rgb(0 0 0 / 10%);">
            <div class="box-header">
                <h3 class="box-title">بيانات الرئيسية</h3>
                {{-- <a href="{{ route('month.create') }}" class="btn btn-info btn-lg pull-right"> اضافة </a> --}}

            </div>

            <div class="box-body ">
                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-resizable="true"
                    data-cookie="true" data-show-export="true" data-locale="ar-SA" style="direction: rtl">
                    <thead>
                        <th data-field="state" data-checkbox="false"></th>
                        <th data-field="id">#</th>

                        <th>الشهر باللغة العربية</th>
                        <th>الهشر باللغه الانجليزية</th>
                        <th>السنة</th>
                        <th>الاجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rows as $index => $row)
                            <tr>
                                <td></td>
                                <td>{{ $index + 1 }}</td>

                                <td>{{ $row->month_ar }}</td>
                                <td>{{ $row->month_en }}</td>
                                <td>{{ $row->year->year ?? '' }}</td>


                                <td>
                                    <div class="btn-group">


                                        {{-- <a href="{{ route('month.edit', $row->id) }}">
                                            <p class=" fa fa-edit"></p>
                                        </a>


                                        <a href="#del{{ $row->id }}" data-toggle="modal"
                                            data-target="#del{{ $row->id }}">
                                            <p class="fa  fa-times"></p>
                                        </a> --}}

                                    </div>
                                </td>

                            </tr>
                            <!--/Edit Customer-->
                            <!-- Delete Modal -->

                            <div class="modal modal-danger" id="del{{ $row->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{ route('month.destroy', $row->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-content">
                                            <div class="modal-header ">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h5 class="modal-title" id="exampleModalLabel">تأكيد الحذف</h5>
                                                </button>
                                            </div>
                                            <div class="modal-body bg-light">
                                                <p><i class="fa fa-fire "></i></p>
                                                <p>حذف جميع البيانات ؟</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-outline pull-left">موافق </button>

                                                <button type="button" class="btn btn-outline "
                                                    data-dismiss="modal">الغاء</button>
                                            </div>
                                        </div>
                                    </form>
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
