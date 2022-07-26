<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use App\Http\Helpers\ServiceResponse;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use Propaganistas\LaravelPhone\Exceptions\NumberParseException;
use Illuminate\Support\Str;

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
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($request->expectsJson()) {
            if ($exception instanceof ClientException) {
                $resp = new ServiceResponse;
                $resp->status = false;
                $resp->message = '401 Unauthorized';
                $resp->data = null;
                return response()->json($resp, 200);
            } elseif ($exception instanceof RequestException) {
                $resp = new ServiceResponse;
                $resp->status = false;
                $resp->message = 'Guzzle Request Exception';
                $resp->data = null;
                return response()->json($resp, 200);
            } elseif ($exception instanceof NumberParseException) {
                $resp = new ServiceResponse;
                $resp->status = false;
                $resp->message = $exception->getMessage();
                $resp->data = null;
                return response()->json($resp, 200);
            }
        }

        if ($this->isHttpException($exception)) {
            switch ($exception->getStatusCode()) {
                    // not found
                case 404:
                    if (Str::contains($request->url(), ['/results'])) {
                        return redirect()->route('front.properties', ['location_id' => $request->location_id, 'purpose_id' => $request->purpose_id]);
                    }
                    break;
                default:
                    return $this->renderHttpException($exception);
                    break;
            }
        }

        return parent::render($request, $exception);
    }
}
