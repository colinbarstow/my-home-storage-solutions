<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'measurement' => 'boolean'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function isAMeasurement()
    {
        if($this->measurement) return true;
        return false;
    }

    public function isAMeasurementAsString()
    {
        if($this->measurement){
            return 'This is a measurement';
        } else {
            return 'This is not a measurement';
        }
    }

    public function titleToLower()
    {
        return strtolower($this->title);
    }

    public function rendered()
    {
        switch($this->type){
            case 'number':
                return $this->renderNumberInput();
                break;
            case 'text':
                return $this->renderTextInput();
                break;
            case 'textarea':
                return $this->renderTextAreaInput();
                break;
        }
    }

    public function renderNumberInput()
    {
        if($this->isAMeasurement())   {
            $dets = SiteConfiguration::find(1);
            $m = $dets->measurement;
        } else {
            $m = '';
        }


        return '<div class="form-group" style="width:100%">' .
                '<label for="' . $this->titleToLower() . '" style="font-size: 12px">' . $this->titleToLower() . ' ' . $m. '</label>' .
                '<input style="background-color: #fffcfc; margin-top: 5px;" class="form-control" wire:model.defer="atts.' . $this->titleToLower() . '" wire:key="' . $this->id . '" type="number" id="' . $this->titleToLower() . '" placeholder="' . $this->title . ' *" required>' .
                '</div>';
    }

    public function renderTextInput()
    {
        if($this->isAMeasurement())   {
            $dets = SiteConfiguration::find(1);
            $m = $dets->measurement;
        } else {
            $m = '';
        }

        return '<div class="form-group" style="width:100%">' .
                '<label style="font-size: 12px">' . $this->titleToLower() . ' ' . $m. '</label>' .
                '<input style="background-color: #fffcfc; margin-top: 5px;" class="form-control" wire:model.defer="atts.' . $this->titleToLower() . '" wire:key="' . $this->id . '" type="text" id="' . $this->titleToLower() . '" placeholder="' . $this->title . ' *" required>' .
                '</div>';
    }

    public function renderTextAreaInput()
    {
        if($this->isAMeasurement())   {
            $dets = SiteConfiguration::find(1);
            $m = $dets->measurement;
        } else {
            $m = '';
        }

        return '<div class="form-group" style="width:100%;">' .
                '<label style="font-size: 12px">' . $this->titleToLower() . ' ' . $m. '</label>' .
                '<textarea style="background-color: #fffcfc; margin-top: 5px;" class="form-control" wire:model.defer="atts.' . $this->titleToLower() . '" wire:key="' . $this->id . '" id="' . $this->titleToLower() . '" placeholder="' . $this->title . ' *" required></textarea>' .
                '</div>';
    }
}
