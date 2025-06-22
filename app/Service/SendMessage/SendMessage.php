<?php

namespace App\Service\SendMessage;

use App\Service\SendMessage\Adapter\AdapterInterface;

readonly class SendMessage implements SendMessageInterface
{
	public function __construct(private AdapterInterface $adapter) {}

	public function send(string $message = ''): void
	{
		$this->adapter->send($message);
	}
}
