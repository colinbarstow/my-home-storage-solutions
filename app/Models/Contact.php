<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function responses()
    {
        return $this->hasMany(Contact::class, 'parent_id');
    }

    public function status()
    {
        switch($this->status) {
            case 1:
                return 'Received';
                break;
            case 2:
                return 'Read';
                break;
            case 3:
                return 'Replied';
                break;
        }
    }
}
