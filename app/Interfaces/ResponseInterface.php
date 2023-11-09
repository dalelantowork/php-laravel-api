<?php

namespace App\Interfaces;

use Illuminate\Http\JsonResponse;

interface ResponseInterface
{
    /**
     * Global response format for all APIs
     *
     * @param int $statusCode
     * @param string $statusMessage
     * @param bool $isError
     * @param mixed $data
     * @return \Illuminate\Http\JsonResponse
     */
    public static function response(int $statusCode, string $statusMessage, bool $isError, $data): JsonResponse;
}
