<?php

namespace App\Models;

use App\Concerns\Cartify;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Cashier\Billable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, Billable, TwoFactorAuthenticatable, Cartify;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function adminProfile()
    {
        return $this->hasOne(AdminProfile::class);
    }

    public function fullName()
    {
        return ucwords($this->first_name . ' ' . $this->last_name);
    }

    public function getCodeFile()
    {
        $txt = '';
        foreach(json_decode(decrypt($this->two_factor_recovery_codes, true)) as $code){
            $use = trim($code);
            $txt .= $use . "\n";
        }
        Storage::put('public/admin_users/profiles/' . $this->id . '/recovery_codes/recovery_codes.txt', $txt);
    }

    public function billingAddress()
    {
        return $this->hasOne(BillingAddress::class);
    }

    public function shippingAddress()
    {
        return $this->hasOne(ShippingAddress::class);
    }

    public function totalValue()
    {
        $price = 0;
        foreach($this->orders as $order){
            $price += $order->total;
        }

        return '£'.number_format($price,2);
    }


    //Stripe



}
