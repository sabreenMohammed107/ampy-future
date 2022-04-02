@extends('layout.web')

@section('title', 'الحركات المالية')

@section('content')



    <div class="row">
        <div class="col-12">
            <div class="card" style="background: #ffffff;box-shadow: 0 1px 1px rgb(0 0 0 / 10%);">

                {{-- <div class="row"> --}}
                    <div class="col-sm-3">
                        <div class="form-group">
                            <br />
                            <label for="">السنه </label>
                            <select class="form-control dynamic" name="year_id" data-dependent="users" id="year_id">
                                <option value="">اختر </option>

                                @foreach ($years as $year)
                                    <option  value="{{ $year->id }}">
                                        {{ $year->year }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                {{-- </div> --}}
                <div class="box-body " id="months">
                    @include('admin.transaction.preIndex')
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
            $('.dynamic').change(function() {

                // if ($(this).val() != '') {
                var value = $(this).val();

                $.ajax({
                    url: "{{ route('dynamicTransaction.fetch') }}",
                    method: "get",
                    data: {
                        value: value,
                    },
                    success: function(result) {
                        $('#months').html(result);
                        $("#table").bootstrapTable();
                    }

                })
                // }
            });
            // end dynamic
            $('#months').prop('selectedIndex',0);
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
