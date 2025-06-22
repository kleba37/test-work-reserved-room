<?php

namespace App\DTO\Room;

class ReservedPeriodDTO
{
	public function __construct(
		public \DateTimeImmutable $dateFrom,
		public \DateTimeImmutable $dateTo,
	) {}

	public function toArray(): array
	{
		return [
			'dateFrom' => $this->dateFrom->format('Y-m-d H:i:s'),
			'dateTo' => $this->dateTo->format('Y-m-d H:i:s'),
		];
	}
}
