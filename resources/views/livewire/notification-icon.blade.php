
<div>
    <style>
        .icon-badge {
            background-color: red;
            font-size: 12px;
            color: white;
            text-align: center;
            width:20px;
            height:20px;
            border-radius: 50%;
            position: absolute; /* changed */
            top: -5px; /* changed */
            left: 18px; /* changed */
        }
    </style>

    <div class="dropdown">

        <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">

            <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 pulse pulse-primary" wire:click="toggle">
                {!! Metronic::getSVG("media/svg/icons/General/Notifications1.svg", "svg-icon-xl svg-icon-primary") !!}

                @if($this->unreadNotifications)
                    <span class="icon-badge">{{ $this->totalNotifications }}</span>
                @endif

            </div>
        </div>

        @if($this->showDropdown)

            <livewire:notification-dropdown/>

        @endif

    </div>

</div>
