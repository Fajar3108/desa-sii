<?php

namespace App\Http\Resources;

use App\Models\Page;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Slider;

class VillageInfoResource extends JsonResource
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
            "name" => $this->name,
            "address" => $this->address,
            "description" => $this->description,
            "no_hp" => $this->no_hp,
            "email" => $this->email,
            "start_day" => $this->start_day,
            "end_day" => $this->end_day,
            "start_time" => $this->start_time->format('H:i'),
            "end_time" => $this->end_time->format('H:i'),
            "sliders" => SliderResource::collection(Slider::all()),
            "menu" => Page::latest()->get(),
        ];
    }
}
