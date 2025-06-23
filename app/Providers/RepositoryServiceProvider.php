<?php

namespace App\Providers;

use App\Handlers\Resource\JsonResourceHandler;
use App\Handlers\Resource\JsonResourceHandlerInterface;
use App\Repository\ReservedRoomRepository\ReservedRoomRepository;
use App\Repository\ReservedRoomRepository\ReservedRoomRepositoryInterface;
use App\Repository\RoomRepository\RoomRepository;
use App\Repository\RoomRepository\RoomRepositoryInterface;
use App\Service\SendMessage\Adapter\EmailSenderAdapter;
use App\Service\SendMessage\SendMessageInterface;
use App\Service\SendMessage\SendMessage;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
	public function boot()
	{

	}
	public function register(): void
	{
		$this->app->bind(ReservedRoomRepositoryInterface::class, ReservedRoomRepository::class);
		$this->app->bind(RoomRepositoryInterface::class, RoomRepository::class);
		$this->app->bind(JsonResourceHandlerInterface::class, JsonResourceHandler::class);
		$this->app->bind(SendMessageInterface::class, static fn() => new SendMessage(new EmailSenderAdapter()));
	}
}
