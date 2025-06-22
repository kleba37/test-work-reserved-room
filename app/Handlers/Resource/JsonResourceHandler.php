<?php

namespace App\Handlers\Resource;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class JsonResourceHandler implements JsonResourceHandlerInterface
{
	/**
	 * @throws BindingResolutionException
	 * @throws \ReflectionException
	 */
	public function handle(Request $request, Collection $data, string $resource): array
	{

		if (!class_exists($resource)) {
			throw new \InvalidArgumentException("Class $resource does not exist");
		}

		$reflection = new \ReflectionClass($resource);
		return $reflection->newInstanceArgs([$data])->toArray($request);
	}
}
