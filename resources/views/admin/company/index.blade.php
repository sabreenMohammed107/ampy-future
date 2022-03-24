@extends('layout.web')

@section('title', 'الشركة')

@section('content')




    <div class="box">
        <div class="box-header">
            <h3 class="box-title">بيانات الرئيسية</h3>
            {{-- <a href="{{ route('company.create') }}" class="btn btn-info btn-lg pull-right"> اضافة </a> --}}

        </div><!-- /.box-header -->
        <div class="box-body">

            <div class="box-body">
                <table id="table" data-toggle="table" data-pagination="true" data-search="true"  data-resizable="true" data-cookie="true"
                data-show-export="true" data-locale="ar-SA"  style="direction: rtl" >
                                   <thead>
                                    <th data-field="state" data-checkbox="false"></th>
                                    <th data-field="id">#</th>

                            <th>اسم الشركة</th>
                            <th>الصورة </th>
                            <th>من نحن </th>
                            <th>لماذا نحن </th>
                            <th> السياسة </th>
                            <th>تعديل</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rows as $index => $row)

                            <tr>
                                <td></td>
                                <td>{{ $index + 1 }}</td>

                                <td>{{ $row->name }}</td>
                                <td><img src="{{ asset('uploads/companies') }}/{{ $row->logo }}" width="80" height="80" class="img-table"/></td>
                                <td>{{ $row->who_we_are }}</td>
                                <td>{{ $row->what_we_do }}</td>
                                <td>{{ $row->ploicy }}</td>
<td><div class="btn-group">


    <a href="{{ route('company.edit', $row->id) }}">
        <p class=" fa fa-edit"></p>
    </a>




</div></td>

                            </tr>

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
