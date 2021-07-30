<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class CategoryResource extends JsonResource
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
            'thumbnail' => str_contains($this->galleries[$this->galleries->count() - 1]->image, 'http') ? $this->galleries[$this->galleries->count() - 1]->image : asset('storage/' . $this->galleries()->latest()->first()->image),
            'galleries' => GalleryResource::collection($this->galleries()->orderBy('id', 'DESC')->get())
        ];
    }
}
