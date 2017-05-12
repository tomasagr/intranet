<?php

namespace Intranet\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function notAllowed($message = 'Not Allowed', $data = []) 
    {
        return response()->json([
                'data' => $data,
                'error' => $message,
                'code' => 401
            ], 401);
    }

    protected function notFound($message = 'Not Found', $data = []) 
    {
        return response()->json([
                'data' => $data,
                'error' => $message,
                'code' => 404
            ], 404);
    }

    protected function success($message = 'success', $data = []) 
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'code' => 200
        ], 200);
    }
}
