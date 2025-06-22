<?php

namespace App\Handlers\Resource;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface JsonResourceHandlerInterface
{
	public function handle(Request $request, Collection $data, string $resource): array;
}
