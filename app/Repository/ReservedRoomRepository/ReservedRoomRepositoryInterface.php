<?php

namespace App\Repository\ReservedRoomRepository;

use App\Filter\ReservedRoom\Filter;
use App\Models\ReservedRoom;
use Illuminate\Support\Collection;

interface ReservedRoomRepositoryInterface
{
	public function findById(int $id): ReservedRoom;

	public function findOneByFilter(Filter $filter): ReservedRoom;

	/**
	 * @return Collection<ReservedRoom>
	 */
	public function findByFilter(Filter $filter): Collection;
}
