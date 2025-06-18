<?php

namespace App\Repository\RoomRepository;

use App\Filter\Room\Filter;
use App\Models\Room;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class RoomRepository implements RoomRepositoryInterface
{
	private $repository;

	public function __construct()
	{
		$this->repository = DB::table('room');
	}

	public function findById(int $id): Room
	{
		return $this
			->repository
			->find($id)
		;
	}

	public function findOneByFilter(Filter $filter): Room
	{
		$repository = $this->repository;

		if (!is_null($filter->number)) {
			$repository
				->where('number', ':number')
				->setBindings(['number' => $filter->number])
			;
		}

		if (!is_null($filter->status)) {
			$repository
				->where('status', ':status')
				->setBindings(['status' => $filter->status])
			;
		}

		return $repository->first();
	}

	public function findByFilter(Filter $filter): Collection
	{
		$repository = $this->repository;

		if (!is_null($filter->number)) {
			$repository
				->where('number', ':number')
				->setBindings(['number' => $filter->number])
			;
		}

		if (!is_null($filter->status)) {
			$repository
				->where('status', ':status')
				->setBindings(['status' => $filter->status])
			;
		}

		return $repository->get();
	}
}
