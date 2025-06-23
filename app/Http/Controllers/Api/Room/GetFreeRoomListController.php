<?php

namespace App\Http\Controllers\Api\Room;

use App\Filter\ReservedRoom\ReservedRoomFilter;
use App\Filter\Room\RoomFilter;
use App\Handlers\Resource\JsonResourceHandlerInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservedPeriodRequest;
use App\Http\Resources\Room\RoomCollection;
use App\Models\ReservedRoom;
use App\Repository\ReservedRoomRepository\ReservedRoomRepositoryInterface;
use App\Repository\RoomRepository\RoomRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GetFreeRoomListController extends Controller
{
	/**
	 * @throws \Exception
	 */
	public function __invoke(
		ReservedPeriodRequest $request,
		ReservedRoomRepositoryInterface $reservedRoomRepository,
		RoomRepositoryInterface $roomRepository,
		JsonResourceHandlerInterface $jsonResourceHandler
	): JsonResponse
    {
		$request->validated();
		$data = $request->toDTO();

	    $filter = new ReservedRoomFilter();
	    $filter->status = true;

		$filter->reservedFrom = $data->dateFrom;
		$filter->reservedTo = $data->dateTo;

	    $reservedRooms = $reservedRoomRepository->findByFilter($filter);

	    $excludeIds = $reservedRooms->map(static fn(ReservedRoom $reservedRoom) => $reservedRoom->room->id)->toArray();

		$filterRoom = new RoomFilter();
		$filterRoom->excludeIds = $excludeIds;

		$rooms = $roomRepository->findByFilter($filterRoom);

		$response = $jsonResourceHandler->handle(
			request: $request,
			data: $rooms,
			resource: RoomCollection::class
		);

	    return new JsonResponse($response, Response::HTTP_OK);
    }
}
