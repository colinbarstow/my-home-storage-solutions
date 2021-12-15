{{-- List Widget 9 --}}

<div class="card card-custom {{ @$class }}">
    {{-- Header --}}
    <div class="card-header align-items-center border-0 mt-4">
        <h3 class="card-title align-items-start flex-column">
            <span class="font-weight-bolder text-dark">Recent Activities</span>
        </h3>
    </div>

    {{-- Body --}}
    <div class="card-body pt-4">
        <div class="timeline timeline-6 mt-3">
            <!--begin::Item-->
            @foreach($logs->take(10) as $log)
                <div class="timeline-item align-items-start">
                    <!--begin::Label-->
                    <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">{{ \Carbon\Carbon::parse($log->created_at)->toFormattedDateString() }}</div>
                    <!--end::Label-->
                    <!--begin::Badge-->
                    <div class="timeline-badge">
                        <i class="fa fa-genderless text-warning icon-xl"></i>
                    </div>
                    <!--end::Badge-->
                    <!--begin::Text-->
                    <div class="font-weight-mormal font-size-lg timeline-content text-muted pl-3">
                        {{ $log->properties['customProperty'] }}
                        <span>
                            <small>actioned by {{$log->causer->fullName()}}</small>
                        </span>
                    </div>
                    <!--end::Text-->
                </div>
            @endforeach

        </div>
    </div>
</div>
