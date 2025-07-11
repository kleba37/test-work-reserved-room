<?php

namespace App\Repository\RoomRepository;

use App\Filter\Room\Filter;
use App\Models\ReservedRoom;
use Illuminate\Database\Eloquent\Collection;

interface RoomRepositoryInterface
{
	public function findById(int $id): ReservedRoom;

	public function findOneByFilter(Filter $filter): ReservedRoom;

	/**
	 * @return Collection<ReservedRoom>
	 */
	public function findByFilter(Filter $filter): Collection;
}
