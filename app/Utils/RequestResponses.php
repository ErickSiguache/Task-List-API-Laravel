<?php

namespace App\Utils;

use Illuminate\Http\JsonResponse;

class RequestResponses {
    public static function response200(string $message, object | array $data = []): JsonResponse {
        return response()->json([
            "message" => $message,
            "data" => $data
        ], 200);
    }

    public static function response201(string $message): JsonResponse {
        return response()->json([
            "status" => true,
            "message" => $message,
        ], 201);
    }

    public static function responseError(int $status, string $message): JsonResponse {
        return response()->json([
            "status" => $status,
            "message" => $message
        ], $status);
    }
}