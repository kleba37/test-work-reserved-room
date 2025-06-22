<?php

namespace App\Http\Resources\Room;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RoomCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
		$result = [];

        foreach ($this->resource as $item) {
			$resource = new Room($item);
			$result[] = $resource->toArray($request);
        }

		return $result;
    }
}
