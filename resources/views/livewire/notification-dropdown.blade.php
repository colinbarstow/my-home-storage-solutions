<div>
    <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg show"
         x-placement="bottom-end"
        style="position: absolute; transform: translate3d(-292px, 65px, 0px); top: 0px; left: 0px; will-change: transform;"
    >
        <div class="d-flex flex-column pt-12 bgi-size-cover bgi-no-repeat rounded-top" style="background-image: url('{{ asset('media/misc/bg-1.jpg') }}')">
            {{-- Title --}}
            <h4 class="d-flex flex-center rounded-top">
                <span class="text-white">User Notifications</span>
                <span class="btn btn-text btn-success btn-sm font-weight-bold btn-font-md ml-2">{{ $this->totalNotifications }} new</span>
            </h4>

            {{-- Tabs --}}
            <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-line-transparent-white nav-tabs-line-active-border-success mt-3 px-8" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active show" data-toggle="tab" href="#topbar_notifications_notifications">Notifications</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#topbar_notifications_events">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#topbar_notifications_logs">Logs</a>
                </li>
            </ul>
        </div>


        {{-- Content --}}
        <div class="tab-content">
            {{-- Tabpane --}}
            <div class="tab-pane active show p-8" id="topbar_notifications_notifications" role="tabpanel">

                <div class="scroll pr-7 mr-n7" data-scroll="true" data-height="300" data-mobile-height="200">

                    @foreach($this->notifications as $notification)

                        <div class="d-flex align-items-center mb-6">
                        {{-- Symbol --}}
                        <div class="symbol symbol-40 symbol-light-primary mr-5">
                        <span class="symbol-label">
                            {!! $notification->icon !!}
                        </span>
                        </div>

                        {{-- Text --}}
                        <div class="d-flex flex-column font-weight-bold">
                            <a
                                wire:click="read({{ $notification->id }})"
                                href="javascript:void(0)"
                                class="text-dark text-hover-primary mb-1 font-size-lg"
                            >{{ $notification->message }}</a>
                            <span class="text-muted">{{ $notification->created_at }}</span>
                        </div>
                    </div>

                    @endforeach

                </div>

            </div>

            {{-- Tabpane --}}
            <div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
                {{-- Nav --}}
                <div class="navi navi-hover scroll my-4" data-scroll="true" data-height="300" data-mobile-height="200">
                    {{-- Item --}}
                    <a href="#" class="navi-item">
                        <div class="navi-link">
                            <div class="navi-icon mr-2">
                                <i class="flaticon2-line-chart text-success"></i>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold">
                                    New report has been received
                                </div>
                                <div class="text-muted">
                                    23 hrs ago
                                </div>
                            </div>
                        </div>
                    </a>

                    {{-- Item --}}
                    <a href="#" class="navi-item">
                        <div class="navi-link">
                            <div class="navi-icon mr-2">
                                <i class="flaticon2-paper-plane text-danger"></i>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold">
                                    Finance report has been generated
                                </div>
                                <div class="text-muted">
                                    25 hrs ago
                                </div>
                            </div>
                        </div>
                    </a>

                    {{-- Item --}}
                    <a href="#" class="navi-item">
                        <div class="navi-link">
                            <div class="navi-icon mr-2">
                                <i class="flaticon2-user flaticon2-line- text-success"></i>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold">
                                    New order has been received
                                </div>
                                <div class="text-muted">
                                    2 hrs ago
                                </div>
                            </div>
                        </div>
                    </a>

                    {{-- Item --}}
                    <a href="#" class="navi-item">
                        <div class="navi-link">
                            <div class="navi-icon mr-2">
                                <i class="flaticon2-pin text-primary"></i>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold">
                                    New customer is registered
                                </div>
                                <div class="text-muted">
                                    3 hrs ago
                                </div>
                            </div>
                        </div>
                    </a>

                    {{-- Item --}}
                    <a href="#" class="navi-item">
                        <div class="navi-link">
                            <div class="navi-icon mr-2">
                                <i class="flaticon2-sms text-danger"></i>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold">
                                    Application has been approved
                                </div>
                                <div class="text-muted">
                                    3 hrs ago
                                </div>
                            </div>
                        </div>
                    </a>

                    {{-- Item --}}
                    <a href="#" class="navi-item">
                        <div class="navi-link">
                            <div class="navi-icon mr-2">
                                <i class="flaticon2-pie-chart-3 text-warning"></i>
                            </div>
                            <div class="navinavinavi-text">
                                <div class="font-weight-bold">
                                    New file has been uploaded
                                </div>
                                <div class="text-muted">
                                    5 hrs ago
                                </div>
                            </div>
                        </div>
                    </a>

                    {{-- Item --}}
                    <a href="#" class="navi-item">
                        <div class="navi-link">
                            <div class="navi-icon mr-2">
                                <i class="flaticon-pie-chart-1 text-info"></i>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold">
                                    New user feedback received
                                </div>
                                <div class="text-muted">
                                    8 hrs ago
                                </div>
                            </div>
                        </div>
                    </a>

                    {{-- Item --}}
                    <a href="#" class="navi-item">
                        <div class="navi-link">
                            <div class="navi-icon mr-2">
                                <i class="flaticon2-settings text-success"></i>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold">
                                    System reboot has been successfully completed
                                </div>
                                <div class="text-muted">
                                    12 hrs ago
                                </div>
                            </div>
                        </div>
                    </a>

                    {{-- Item --}}
                    <a href="#" class="navi-item">
                        <div class="navi-link">
                            <div class="navi-icon mr-2">
                                <i class="flaticon-safe-shield-protection text-primary"></i>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold">
                                    New order has been placed
                                </div>
                                <div class="text-muted">
                                    15 hrs ago
                                </div>
                            </div>
                        </div>
                    </a>

                    {{-- Item --}}
                    <a href="#" class="navi-item">
                        <div class="navi-link">
                            <div class="navi-icon mr-2">
                                <i class="flaticon2-notification text-primary"></i>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold">
                                    Company meeting canceled
                                </div>
                                <div class="text-muted">
                                    19 hrs ago
                                </div>
                            </div>
                        </div>
                    </a>

                    {{-- Item --}}
                    <a href="#" class="navi-item">
                        <div class="navi-link">
                            <div class="navi-icon mr-2">
                                <i class="flaticon2-fax text-success"></i>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold">
                                    New report has been received
                                </div>
                                <div class="text-muted">
                                    23 hrs ago
                                </div>
                            </div>
                        </div>
                    </a>

                    {{-- Item --}}
                    <a href="#" class="navi-item">
                        <div class="navi-link">
                            <div class="navi-icon mr-2">
                                <i class="flaticon-download-1 text-danger"></i>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold">
                                    Finance report has been generated
                                </div>
                                <div class="text-muted">
                                    25 hrs ago
                                </div>
                            </div>
                        </div>
                    </a>

                    {{-- Item --}}
                    <a href="#" class="navi-item">
                        <div class="navi-link">
                            <div class="navi-icon mr-2">
                                <i class="flaticon-security text-warning"></i>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold">
                                    New customer comment recieved
                                </div>
                                <div class="text-muted">
                                    2 days ago
                                </div>
                            </div>
                        </div>
                    </a>

                    {{-- Item --}}
                    <a href="#" class="navi-item">
                        <div class="navi-link">
                            <div class="navi-icon mr-2">
                                <i class="flaticon2-analytics-1 text-success"></i>
                            </div>
                            <div class="navi-text">
                                <div class="font-weight-bold">
                                    New customer is registered
                                </div>
                                <div class="text-muted">
                                    3 days ago
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            {{-- Tabpane --}}
            <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
                {{-- Nav --}}
                <div class="d-flex flex-center text-center text-muted min-h-200px">
                    All caught up!
                    <br/>
                    No new notifications.
                </div>
            </div>
        </div>
    </div>

</div>
