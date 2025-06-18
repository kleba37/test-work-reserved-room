<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class LogoutController extends Controller
{
	public function __invoke(): JsonResponse
	{
		return new JsonResponse([], ResponseAlias::HTTP_OK);
	}
}
