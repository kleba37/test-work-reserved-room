<?php

namespace App\Filter\ReservedRoom;

abstract class Filter
{
	public ?array $rooms = null;
	public ?array $excludeRooms = null;
	public ?bool $status = null;
	public ?\DateTimeInterface $reservedFrom = null;
	public ?\DateTimeInterface $reservedTo = null;

	public int $limit = 100;
}
