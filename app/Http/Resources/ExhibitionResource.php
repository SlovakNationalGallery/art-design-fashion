<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExhibitionResource extends JsonResource
{
    public static $wrap = 'exhibition';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $array = parent::toArray($request);
        $array['cabinets'] = CabinetResource::collection($this->cabinets);
        return $array;
    }
}
