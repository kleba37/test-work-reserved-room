<?php

namespace App\Service\SendMessage\Adapter;

use Illuminate\Support\Facades\Log;

class EmailSenderAdapter implements AdapterInterface
{
	public function __construct() {}

	public function send(string $message = ''): void
	{
		Log::info('Sending message: ' . $message);
	}
}
