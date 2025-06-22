<?php

namespace App\Service\SendMessage\Adapter;

interface AdapterInterface
{
	public function send(string $message = ''): void;
}
