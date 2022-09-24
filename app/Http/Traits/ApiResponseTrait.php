<?php

namespace App\Http\Traits;

trait ApiResponseTrait
{
    public function successResponse($statusCode, $data)
    {
        $response = [
            'success' => true,
            'data' => $data,
        ];
        return response()->json($response, $statusCode);
    }

    public function errorResponse($statusCode, $message)
    {
        $response = [
            'success' => false,
            'message' => $message,
        ];
        return response()->json($response, $statusCode);
    }
}
