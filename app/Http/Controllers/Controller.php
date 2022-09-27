<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function successResponse($message, $data = array())
    {
        return response()->json(['data' => $data, 'message' => $message, 'errors' => []], 200, [], JSON_PRETTY_PRINT);
    }

    public function errorResponse($message, $errors = array())
    {
        return response()->json(['data' => [], 'message' => $message, 'errors' => $errors], 404, [], JSON_PRETTY_PRINT);
    }
}
