<?php

namespace App\Http\Controllers\Api\Room;

use App\Models\Room;
use App\Repository\RoomRepository\RoomRepositoryInterface;
use Illuminate\Http\JsonResponse;

class GetRoomListController
{
	public function __invoke(RoomRepositoryInterface $roomRepository): JsonResponse
	{
		$rooms = Room::all();

		return new JsonResponse($rooms->toArray(), 200);
	}
}
