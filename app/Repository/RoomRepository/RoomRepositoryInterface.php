<?php

namespace App\Repository\RoomRepository;

use App\Filter\Room\Filter;
use App\Models\Room;
use Illuminate\Support\Collection;

interface RoomRepositoryInterface
{
	public function findById(int $id): Room;

	public function findOneByFilter(Filter $filter): Room;

	/**
	 * @return Collection<Room>
	 */
	public function findByFilter(Filter $filter): Collection;
}
