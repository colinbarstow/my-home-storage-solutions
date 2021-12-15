<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use Illuminate\Support\Collection;
use Livewire\Component;

class NotificationIcon extends Component
{
    public $unreadNotifications = false;

    public $showDropdown = false;

    public $totalNotifications = 0;

    protected $listeners = [
        'newNotification' => 'update'
    ];

    public function mount()
    {
        $this->getNotifications();
        $this->newNotifications();
    }

    public function update():void
    {
        $this->getNotifications();
        $this->newNotifications();
    }

    public function toggle()
    {
        $this->showDropdown = !$this->showDropdown;
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
        $this->totalNotifications = $this->notifications();
    }

    private function notifications()
    {
        $notifications = Notification::all();

        if($notifications->count() < 1) return 0;

        return $notifications->count();
    }

    public function render()
    {
        return view('livewire.notification-icon');
    }
}
