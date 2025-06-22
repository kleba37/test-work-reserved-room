<?php

namespace App\Http\Controllers\Api\Booking;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookingRequest;
use App\Models\ReservedRoom;
use App\Service\SendMessage\SendMessageInterface;
use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class BookingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(
		BookingRequest $request,
	    SendMessageInterface $sendMessage
    ): JsonResponse
    {
	    try {
	        $request->validated();
			$data = $request->toDTO();

			$reserved = new ReservedRoom([
				'room_id' => $data->room,
				'reserved_at' => $data->dateFrom,
				'reserved_to' => $data->dateTo,
				'status' => true
			]);
			$reserved->save();

			$sendMessage->send(
				'New booking created for room ' . $data->room .
				' from ' . $data->dateFrom->format('Y-m-d H:i:s') .
				' to ' . $data->dateTo->format('Y-m-d H:i:s')
			);

			return new JsonResponse(
				data: [
					'status' => 'ok',
					'message' => 'Booking created successfully'
				],
				status: Response::HTTP_OK
			);
	    } catch (Exception $exception) {
			return new JsonResponse(
				data: [
					'status' => 'error',
					'message' => 'Booking creation failed: ' . $exception->getMessage()
				],
				status: Response::HTTP_INTERNAL_SERVER_ERROR
			);
	    }
    }
}
