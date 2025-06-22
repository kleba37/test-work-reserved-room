<?php

namespace App\Filter\Room;

abstract class Filter
{
	public ?array $ids = null;
	public ?array $excludeIds = null;
	public ?array $floor = null;
	public ?array $countRoom = null;
	public int $limit = 100;
}
