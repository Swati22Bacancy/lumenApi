<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponser
{
    /**
     * Build success response
     */
    public function successResponse($data, $code = Response::HTTP_OK)
    {
        return response($data, $code)->header('Content-Type', 'application/json');
    }

    /**
     * Build valid response
     */
    public function validResponse($data, $code = Response::HTTP_OK)
    {
        return response()->json(['data' => $data], $code);
    }

    /**
     * Build error responses
     */
    public function errorResponse($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    /**
     * Build error responses
     */
    public function errorMessage($message, $code)
    {
        return response($message, $code)->header('Content-Type', 'application/json');
    }
}