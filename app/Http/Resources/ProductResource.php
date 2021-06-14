<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'created_at' => $this->created_at->diffForHumans(),
            'price' => $this->price,
            'thumbnail' => $this->getMedia("images")->count() == 0 ? "https://picsum.photos/550/600" : $this->getFirstMediaUrl("images")
        ];
    }
}
