<?php

namespace App\Constants;

use App\Constants\BaseConstant;

class ResponseCode extends BaseConstant
{
    public const SUCCESS = 200;
    public const SUCCESS_MESSAGE = 'OK';

    public const ACCEPTED = 202;
    public const ACCEPTED_MESSAGE = 'Accepted';

    public const BAD_REQUEST = 400;
    public const BAD_REQUEST_MESSAGE = 'Please fill out valid data';

    public const UNAUTHORIZED = 401;
    public const UNAUTHORIZED_MESSAGE = 'Unauthorized';

    public const FORBIDDEN = 403;
    public const FORBIDDEN_MESSAGE = 'Forbidden';

    public const NOT_FOUND = 404;
    public const NOT_FOUND_MESSAGE = 'Not Found';

    public const METHOD_NOT_ALLOWED = 405;
    public const METHOD_NOT_ALLOWED_MESSAGE = 'Method Not Allowed';

    public const TOO_MANY_REQUESTS = 429;
    public const TOO_MANY_REQUESTS_MESSAGE = 'Too Many Requests';

    public const INTERNAL_SERVER_ERROR = 500;
    public const INTERNAL_SERVER_ERROR_MESSAGE = 'Internal Server Error';
}
