<?php

namespace App\Service\SendMessage;

interface SendMessageInterface
{
	public function send(string $message = ''): void;
}
