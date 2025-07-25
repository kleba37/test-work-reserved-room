<?php

namespace App\Repository\RoomRepository;

use App\Filter\Room\Filter;
use App\Models\ReservedRoom;
use App\Models\Room;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class RoomRepository implements RoomRepositoryInterface
{
	public function __construct(private Builder $repository)
	{
		$this->repository = Room::query();
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
		$this->repository = Room::query();

		if (!is_null($filter->floor)) {
			$this
				->repository
				->whereIn('floor', $filter->floor)
			;
		}

		if (!is_null($filter->ids)) {
			$this
				->repository
				->whereIn('id', $filter->ids)
			;
		}

		if (!is_null($filter->excludeIds)) {
			$this
				->repository
				->whereNotIn('id', $filter->excludeIds)
			;
		}

		if (!is_null($filter->countRoom)) {
			$this
				->repository
				->where('count_room', 'in', $filter->countRoom)
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
