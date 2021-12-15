<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Livewire\Component;

class NotificationDropdown extends Component
{

    public $notifications = [];

    public $totalNotifications;

    protected $listeners = [
        'newNotification' => 'update'
    ];

    public function mount()
    {
        $this->getNotifications();
        $this->newNotifications();
    }

    public function read($notificationID)
    {
        $notification = Notification::find($notificationID);
        $notification->delete();

        $this->update();

        return redirect($notification->url);
    }

    public function update()
    {
        $this->getNotifications();
        $this->newNotifications();
    }

    public function newNotifications()
    {
        if($this->totalNotifications > 0){
            $this->unreadNotifications = true;
        } else {
            $this->unreadNotifications = false;
        }
    }

    private function getNotifications()
    {
        $this->notifications = $this->notifications()->toArray();
        $this->totalNotifications = count($this->notifications);
    }

    private function notifications(): Collection
    {
        $notifications = Notification::orderBy('id', 'desc')->get();

        if($notifications->count() < 1){
            return new Collection;
        }

        return $notifications
            ->map(function (Notification $notification) {
                return (object)[
                    'id' => $notification->id,
                    'message' => $notification->message,
                    'url' => $notification->url,
                    'created_at' => Carbon::parse($notification->created_at)->diffForHumans(),
                    'icon' => $notification->getIcon()
                ];
            });
    }

    public function render()
    {
        return view('livewire.notification-dropdown');
    }
}
