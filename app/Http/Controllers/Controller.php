<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function responseSuccess(ResourceCollectionInterface|ResourceInterface $data = null, int $status = 200): JsonResponse
    {
        return response()->json([
            'data' => $data
        ], $status);
    }
}
