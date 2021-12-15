<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'ambient_occlusion_map',
        'height_map',
        'normal_map',
        'roughness_map',
        'colour_map',
    ];

    public function getAmbientOcclusionMapAttribute($value){return Storage::url($value);}
    public function getHeightMapAttribute($value){return Storage::url($value);}
    public function getNormalMapAttribute($value){return Storage::url($value);}
    public function getRoughnessMapAttribute($value){return Storage::url($value);}
    public function getColourMapAttribute($value){return Storage::url($value);}

    public function image()
    {
        return Storage::url($this->image);
    }
}
