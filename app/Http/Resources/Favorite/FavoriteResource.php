<?php

namespace App\Http\Resources\Favorite;

use App\Http\Resources\Song\SongResource;
use Illuminate\Http\Resources\Json\JsonResource;

class FavoriteResource extends JsonResource
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
            'song' => new SongResource($this->song),
        ];
    }
}
