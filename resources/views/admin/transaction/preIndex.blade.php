<table id="table" data-toggle="table" data-pagination="true" data-search="true" data-resizable="true" data-cookie="true"
    data-show-export="true" data-locale="ar-SA" style="direction: rtl">
    <thead>
        <th data-field="state" data-checkbox="false"></th>
        <th data-field="id">#</th>

        <th>الشهر باللغة العربية</th>
        <th>الهشر باللغه الانجليزية</th>
        <th>السنة</th>
        <th>الحالة</th>
        <th>الاجراءات</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rows as $index => $row)
            <?php
            $exist = App\Models\Transaction::where('month_id', $row->id)->first();
            ?>
            <tr>
                <td></td>
                <td>{{ $index + 1 }}</td>

                <td>{{ $row->month_ar }}</td>
                <td>{{ $row->month_en }}</td>
                <td>{{ $row->year->year ?? '' }}</td>
                <td>
                    @if ($exist && $exist->revision_status != 1)
                        <label>لم يتم مراجعة بيانات </label>
                    @elseif($exist && $exist->revision_status == 1)
                        <label>تم مراجعة بيانات </label>
                        @else
                        <label>عدم وجود كشف حساب </label>
                    @endif
                </td>

                <td>

                    <div class="btn-group">
                        @if ($exist)
                            <a href="{{ route('transaction.show', $row->id) }}" title="عرض كشف حساب">
                                <p class=" fa fa-eye"></p>
                            </a>
                            @if ($exist->revision_status != 1)
                                <a href="#revision{{ $row->id }}" data-toggle="modal" title=" المراجعة"
                                    data-target="#revision{{ $row->id }}">
                                    <p class="fa fa-edit"></p>
                                </a>

                            @endif
                        @else
                            {{-- <a href="{{ route('month.edit', $row->id) }}" title="انشاء كشف حساب">
                                <p class="fa fa-list"></p>
                            </a> --}}
                            <a href="#payroll{{ $row->id }}" data-toggle="modal" title="انشاء كشف حساب"
                                data-target="#payroll{{ $row->id }}">
                                <p class="fa fa-list"></p>
                            </a>
                        @endif






                    </div>

            <div class="modal modal-secondary" id="payroll{{ $row->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{ route('transaction.store') }}" method="POST">

                        @csrf
                        <input type="hidden" name="month_id" value="{{ $row->id }}">
                        <div class="modal-content">
                            <div class="modal-header ">
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h5 class="modal-title" id="exampleModalLabel">تأكيد عمل كشف حساب</h5>
                                </button>
                            </div>
                            <div class="modal-body bg-light">
                                <p><i class="fa fa-fire "></i></p>
                                <p> هل تريد عمل كشف حساب شهر {{ $row->month_ar }} - {{ $row->year->year ?? '' }} ؟</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-outline pull-left">موافق </button>

                                <button type="button" class="btn btn-outline " data-dismiss="modal">الغاء</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div class="modal modal-secondary" id="revision{{ $row->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{ route('sendNotification') }}" method="POST">

                        @csrf
                        <input type="hidden" name="month_id" value="{{ $row->id }}">
                        <div class="modal-content">
                            <div class="modal-header ">
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h5 class="modal-title" id="exampleModalLabel">تأكيد مراجعة كشف حساب</h5>
                                </button>
                            </div>
                            <div class="modal-body bg-light">
                                <p><i class="fa fa-fire "></i></p>
                                <p> هل تريد تأكيد مراجعة حساب شهر {{ $row->month_ar }} - {{ $row->year->year ?? '' }}
                                    ؟</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-outline pull-left">موافق </button>

                                <button type="button" class="btn btn-outline " data-dismiss="modal">الغاء</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
                </td>

            </tr>
            <!--/Edit Customer-->
            <!-- Delete Modal -->

        @endforeach
    </tbody>
</table>
