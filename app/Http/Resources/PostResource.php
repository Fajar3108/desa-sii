<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'thumbnail' => str_contains($this->thumbnail, "http") ? $this->thumbnail : asset("storage/" . $this->thumbnail),
            'tags' => $this->tags,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
