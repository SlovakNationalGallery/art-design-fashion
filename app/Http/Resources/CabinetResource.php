<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CabinetResource extends JsonResource
{
    public static $wrap = 'cabinet';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $array = parent::toArray($request);
        $array['images'] = MediaResource::collection($this->getMedia('images'));
        return $array;
    }
}
