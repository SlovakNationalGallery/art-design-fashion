<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MediaResource extends JsonResource
{
    public static $wrap = 'media';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $array = parent::toArray($request);
        // $array['srcset'] = $this->getSrcset();
        // $array['url'] = $this->getUrl();
        // $array['html'] = $this->toHtml();
        $array['thumbnail'] = $this->getUrl('thumbnail');
        return $array;
    }
}
