<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class UnitStyleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'                  => $this->id,
            'title'               => $this->title,
            'image'               => Storage::url($this->image),
            'model'               => Storage::url($this->model),
            'minimum_width'       => $this->minimum_width,
            'maximum_width'       => $this->maximum_width,
            'minimum_height'      => $this->minimum_height,
            'maximum_height'      => $this->maximum_height,
            'minimum_depth'       => $this->minimum_depth,
            'maximum_depth'       => $this->maximum_depth,
            'can_have_partitions' => $this->can_have_partitions === 1,
            'minimum_partitions'  => $this->minimum_partitions,
            'maximum_partitions'  => $this->maximum_partitions,
            'partition_rules'     => $this->partitionRules()->orderBy('position', 'asc')->get()->toArray()
        ];
    }
}
