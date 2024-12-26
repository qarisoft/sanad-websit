<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

abstract class Controller
{
    public $ok = 'ok';

    public function tryCaller(callable $action)
    {
        try {
            return call_user_func($action);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 0,
                'message' => 'something went wrong',
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function response(int $stats, string $msg, $data = null): JsonResponse
    {
        return response()->json([
            'status' => $stats,
            'message' => __($msg),
            'data' => $data,
        ]);
    }
}
