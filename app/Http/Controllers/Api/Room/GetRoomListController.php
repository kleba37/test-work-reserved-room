<?php

namespace App\Http\Controllers\Api\Room;

use App\Filter\Room\RoomFilter;
use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Repository\RoomRepository\RoomRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GetRoomListController extends Controller
{
	public function index(RoomRepositoryInterface $roomRepository): JsonResponse
	{
		$filter = new RoomFilter();
		$filter->status = true;

		$rooms = $roomRepository->findByFilter($filter);

		return new JsonResponse($rooms->toArray(), Response::HTTP_OK);
	}
}
