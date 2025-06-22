<?php

namespace App\Http\Requests;

use App\DTO\Booking\BookingDTO;
use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
	/**
	 * @return bool
	 */
    public function authorize(): bool
    {
        return true;
    }

	/**
	 * @return array
	 */
    public function rules(): array
    {
	    return [
			'room' => 'required|integer',
		    'dateFrom' => 'nullable|date',
		    'dateTo' => 'nullable|date',
	    ];
    }

	/**
	 * @throws \Exception
	 */
	public function toDTO(): BookingDTO
	{
		return new BookingDTO(
			room: $this->input('room'),
			dateFrom: new \DateTimeImmutable($this->input('dateFrom')),
			dateTo: new \DateTimeImmutable($this->input('dateTo')),
		);
	}
}
