<?php

namespace App\Http\Controllers\Api\Room;

use App\Filter\ReservedRoom\ReservedRoomFilter;
use App\Http\Controllers\Controller;
use App\Repository\ReservedRoomRepository\ReservedRoomRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GetRoomListController extends Controller
{
	public function __invoke(ReservedRoomRepositoryInterface $roomRepository): JsonResponse
	{
		$filter = new ReservedRoomFilter();
		$filter->status = true;

		$rooms = $roomRepository->findByFilter($filter);

		return new JsonResponse($rooms->toArray(), Response::HTTP_OK);
	}
}
