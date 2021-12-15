<?php

namespace App\Models;

use App\Classes\Theme\Metronic;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function makeNew($class, $modelInstance)
    {
        switch($class){
            case 'App\Models\Order':
                self::makeOrderNotification($modelInstance);
                break;
            case 'App\Models\Contact':
                self::makeContactNotification($modelInstance);
                break;
        }
    }

    public static function makeOrderNotification($modelInstance)
    {
        $notification = self::create([
            'type' => 'App\Models\Order',
            'message' => 'A new order has been placed',
            'url' => '/orders/' . $modelInstance->id,
        ]);

        self::broadcast($notification);
    }

    public static function makeContactNotification($modelInstance)
    {
        $notification = self::create([
            'type' => 'App\Models\Contact',
            'message' => 'A new contact has been received',
            'url' => '/contacts/' . $modelInstance->id,
        ]);

        self::broadcast($notification);
    }

    public static function broadcast($notification)
    {
        switch($notification->type){
            case 'App\Models\Order':
                self::sendOrderEmail($notification);
                break;

        }
    }

    public static function sendOrderEmail($notification)
    {

    }

    public function sendOrderNotification($notification)
    {

    }

    public function getIcon()
    {
        switch($this->type){
            case 'App\Models\Order':
                return Metronic::getSVG("media/svg/icons/Shopping/Cart2.svg", "svg-icon-lg svg-icon-primary");
                break;
        }
    }
}
