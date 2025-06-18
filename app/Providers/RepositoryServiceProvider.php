<?php

namespace App\Providers;

use App\Repository\RoomRepository\RoomRepository;
use App\Repository\RoomRepository\RoomRepositoryInterface;
use Closure;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
	public function boot()
	{

	}
	public function register()
	{
		$this->app->bind(RoomRepositoryInterface::class, RoomRepository::class);
	}
}
