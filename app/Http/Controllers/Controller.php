<?php

namespace App\Http\Controllers;

abstract class Controller
{
    function tryCaller(callable $action)
    {
        try {
            return call_user_func($action);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 0,
                'message' => 'something went wrong',
//            'error' => $e->getMessage()
            ]);
        }
    }
}
