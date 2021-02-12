<?php

namespace App\Exceptions;

use Dotenv\Exception\ValidationException;
use http\Env\Request;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationData;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {

        if (Request()->header('Content-Type') == 'application/json') {


            $this->renderable(function (NotFoundHttpException $e, $request) {
                return $this->errors($e->getStatusCode(), $e);
            });
        }

        $this->reportable(function (Throwable $e) {
        });

    }

    public function errors($statusCode, $exception)
    {
        $messgaes = [
            '401' => ['message' => 'Unauthorized', 'statusCode' => "401"],
            '403' => ['message' => 'Forbidden', 'statusCode' => "403"],
            '404' => ['message' => 'Not Found', 'statusCode' => "404"],
            '405' => ['message' => 'Method Not Allowed', 'statusCode' => "405"],
            '500' => ['message' => ' Not Allowed  Page', 'statusCode' => "500"],
        ];
        $msgs = $messgaes[$statusCode] ? $messgaes[$statusCode] : $messgaes["500"];
        return response()->json($msgs, $statusCode);

    }
}