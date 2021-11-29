<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'ordering' => $this->ordering,
            'name_ge' => $this->name_ge,
            'name_en' => $this->name_en,
            'publish_date' => $this->publish_date,
            'keywords' => $this->keywords,
            'url' => $this->url,
            'body_ge' => $this->body_ge,
            'body_en' => $this->body_en,
            'body_small_ge' => $this->body_small_ge,
            'body_small_en' => $this->body_small_en,
            'picture' => "govt/images/resource/blog-image-14.jpg",
        ];
    }
}
