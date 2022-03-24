

@if (count($errors) > 0)
    <div class="col-lg-12" style="direction: rtl;">
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif

 @if(Session::has('flash_success'))
    <div class="col-lg-12" style="direction: rtl;">
        <div class="alert alert-success">
            <strong><i class="fa fa-check-circle"></i> {!! session('flash_success') !!}</strong>
        </div>
    </div>
@endif

@if(Session::has('flash_danger'))
    <div class="col-lg-12" style="direction: rtl;">
        <div class="alert alert-danger">
            <strong><i class="fa fa-info-circle"></i> {!! session('flash_danger') !!}</strong>
        </div>
    </div>
@endif

@if(Session::has('flash_delete'))
    @section('script')
    Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
    )
    @endsection
@endif
