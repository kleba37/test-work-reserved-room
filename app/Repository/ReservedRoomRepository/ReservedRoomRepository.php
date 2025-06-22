<?php

namespace App\Repository\ReservedRoomRepository;

use App\Filter\ReservedRoom\Filter;
use App\Models\ReservedRoom;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class ReservedRoomRepository implements ReservedRoomRepositoryInterface
{
	public function __construct(private Builder $repository)
	{
		$this->repository = ReservedRoom::query();
	}

	public function findById(int $id): ReservedRoom
	{
		return $this
			->repository
			->find($id)
		;
	}

	private function getQueryBuilder(Filter $filter): Builder
	{
		$this->repository = ReservedRoom::query();

		if (!is_null($filter->excludeRooms)) {
			$this
				->repository
				->whereNotIn('room_id', $filter->excludeRooms)
			;
		}

		if (!is_null($filter->rooms)) {
			$this
				->repository
				->whereIn('room', $filter->rooms)
			;
		}

		if (!is_null($filter->status)) {
			$this
				->repository
				->where('status', $filter->status)
			;
		}

		return $this
			->repository
			->orderBy('id')
		;
	}

	public function findOneByFilter(Filter $filter): ReservedRoom
	{
		$queryBuilder = $this->getQueryBuilder($filter);

		return $queryBuilder
			->distinct()
			->limit(1)
			->first()
		;
	}

	public function findByFilter(Filter $filter): Collection
	{
		$queryBuilder = $this->getQueryBuilder($filter);

		return $queryBuilder
			->distinct()
			->limit($filter->limit)
			->get()
		;
	}
}
