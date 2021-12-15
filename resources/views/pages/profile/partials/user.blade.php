<div class="d-flex align-items-center">
    <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
        <div class="symbol-label" @if(Auth::user()->adminProfile->image !== null) style="background-image:url('{{\Illuminate\Support\Facades\Storage::url(Auth::user()->adminProfile->image) }}')" @else style="background-image:url({{ asset('media/users/blank.png') }})" @endif></div>
        <i class="symbol-badge bg-success"></i>
    </div>
    <div>
        <a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">{{ Auth::user()->fullName() }}</a>
        <div class="text-muted">{{ Auth::user()->adminProfile->job_title }}</div>
        {{--                                        <div class="mt-2">--}}
        {{--                                            <a href="#" class="btn btn-sm btn-primary font-weight-bold mr-2 py-2 px-3 px-xxl-5 my-1">Chat</a>--}}
        {{--                                            <a href="#" class="btn btn-sm btn-success font-weight-bold py-2 px-3 px-xxl-5 my-1">Follow</a>--}}
        {{--                                        </div>--}}
    </div>
</div>
