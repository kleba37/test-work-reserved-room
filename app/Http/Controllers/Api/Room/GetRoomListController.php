<?php

namespace App\Http\Controllers\Api\Room;

use App\Filter\Room\RoomFilter;
use App\Handlers\Resource\JsonResourceHandlerInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\Room\RoomCollection;
use App\Repository\RoomRepository\RoomRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GetRoomListController extends Controller
{
	public function __invoke(
		Request $request,
		RoomRepositoryInterface $roomRepository,
		JsonResourceHandlerInterface $jsonResourceHandler
	): JsonResponse
	{
		$filter = new RoomFilter();

		$rooms = $roomRepository->findByFilter($filter);

		$data = $jsonResourceHandler->handle($request, $rooms, RoomCollection::class);

		return new JsonResponse($data, Response::HTTP_OK);
	}
}
