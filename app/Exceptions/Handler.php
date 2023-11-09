<?php

namespace App\Exceptions;

use App\Constants\ResponseCode;
use ErrorException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $type = 'common';

    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->renderCustomForbiddenResponse();

        $this->renderCustomNotFoundResponse();

        $this->renderCustomMethodNotAllowedResponse();

        $this->renderCustomDatabaseError();

        $this->renderCustomSystemError();

        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Convert a validation exception into a JSON response. Response code: 400
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Validation\ValidationException  $exception
     * @return \Illuminate\Http\JsonResponse
     */
    protected function invalidJson($request, ValidationException $exception)
    {
        $this->type = 'invalid-json';

        return globalResponse(
            ResponseCode::BAD_REQUEST,
            ResponseCode::BAD_REQUEST_MESSAGE,
            true,
            $exception->errors()
        );
    }

    /**
     * Custom 403 Forbidden response.
     *
     * @return void
     */
    private function renderCustomForbiddenResponse()
    {
        $this->type = 'forbidden';

        return $this->renderable(function (AccessDeniedHttpException $e, $request) {
            return globalResponse(
                ResponseCode::FORBIDDEN,
                $e->getMessage(),
                true,
                $request->all()
            );
        });
    }

    /**
     * Custom 404 Not Found repsonse.
     *
     * @return void
     */
    private function renderCustomNotFoundResponse()
    {
        $this->type = 'not-found';

        return $this->renderable(function (NotFoundHttpException $e, $request) {
            return globalResponse(
                ResponseCode::NOT_FOUND,
                'Resource not found.',
                true,
                $request->all()
            );
        });
    }

    /**
     * Custom 405 Forbidden response.
     *
     * @return void
     */
    private function renderCustomMethodNotAllowedResponse()
    {
        $this->type = 'method-not-allowed';

        return $this->renderable(function (MethodNotAllowedHttpException $e, $request) {
            return globalResponse(
                ResponseCode::METHOD_NOT_ALLOWED,
                $e->getMessage(),
                true,
                $request->all()
            );
        });
    }

    /**
     * Custom database error response. Response Code: 500
     *
     * @return void
     */
    private function renderCustomDatabaseError()
    {
        $this->type = 'database-error';

        return $this->renderable(function (QueryException $e, $request) {
            return globalResponse(
                ResponseCode::INTERNAL_SERVER_ERROR,
                'Something went wrong.',
                true,
                $request->all()
            );
        });
    }

    /**
     * Custom system error message. Response Code: 500
     *
     * @return void
     */
    private function renderCustomSystemError()
    {
        $this->type = 'system-error';

        return $this->renderable(function (ErrorException $e, $request) {
            return globalResponse(
                ResponseCode::INTERNAL_SERVER_ERROR,
                'Something went wrong.',
                true,
                $request->all()
            );
        });
    }
}
