<?php

namespace App\DTO\Booking;

class BookingDTO
{
	public function __construct(
		public int $room,
		public \DateTimeImmutable $dateFrom,
		public \DateTimeImmutable $dateTo,
	) {}

	public function toArray(): array
	{
		return [
			'room' => $this->room,
			'dateFrom' => $this->dateFrom->format('Y-m-d H:i:s'),
			'dateTo' => $this->dateTo->format('Y-m-d H:i:s'),
		];
	}
}
