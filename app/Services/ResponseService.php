<?php

namespace App\Services;

use App\Interfaces\ResponseInterface;
use Illuminate\Http\JsonResponse;

class ResponseService implements ResponseInterface
{
    /**
     * {@inheritdoc}
     */
    public static function response(int $statusCode, string $statusMessage, bool $isError, $data): JsonResponse
    {
        return response()->json([
            'error' => $isError,
            'message' => $statusMessage,
            'data' => $data
        ], $statusCode);
    }
}
