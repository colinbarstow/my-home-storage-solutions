<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitStyle extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'model',
        'minimum_width',
        'maximum_width',
        'minimum_height',
        'maximum_height',
        'minimum_depth',
        'maximum_depth',
        'can_have_partitions',
        'minimum_partitions',
        'maximum_partitions',
    ];

    public function partitionRules()
    {
        return $this->hasMany(PartitionRule::class);
    }
}
