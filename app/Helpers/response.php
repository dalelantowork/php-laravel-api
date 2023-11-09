<?php

use App\Constants\ResponseCode;
use App\Services\ResponseService;

if (!function_exists('globalResponse')) {
    function globalResponse(int $statusCode, string $statusMessage, bool $isError, $data)
    {
        return ResponseService::response($statusCode, $statusMessage, $isError, $data);
    }
}

if (!function_exists('forbiddenResponse')) {
    /**
     * Returns a forbidden response for unused api resource actions.
     */
    function forbiddenResponse(string $message = ResponseCode::FORBIDDEN_MESSAGE)
    {
        return globalResponse(
            ResponseCode::FORBIDDEN,
            $message,
            true,
            null
        );
    }
}
