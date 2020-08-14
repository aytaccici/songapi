<?php

namespace App\Http\Resources\Category;

use App\Http\Resources\Song\FavoriteResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'   => $this->id,
            'name' => $this->name,
            'image' => config('app.url').'/'.$this->image_path,
            $this->mergeWhen($request->route()->getActionMethod() == 'show', [
                'songs' => FavoriteResource::collection($this->songs),
            ])
        ];
    }
}
