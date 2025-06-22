<?php

namespace App\Http\Resources\Room;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Room extends JsonResource
{
    public function toArray(Request $request): array
    {
		$data = $this->resource;

		return [
			'id' => $data->id,
			'count_room' => $data->count_room,
			'floor' => $data->floor
		];
    }
}
