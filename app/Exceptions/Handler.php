<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
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
        // if ($this->isHttpException($exception))
        // {
        //     switch($exception->getStatusCode())
        //     {
        //         case 404:
        //             return redirect()->route('notfound');
        //         break;
        //         case 500:
        //             return redirect()->route('notfound');
        //         break;
        //         default:
        //             return $this->renderHttpException($exception);
        //         break;
        //     }
        // } else {
        //     return parent::render($request, $exception);
        // }
        if ($exception instanceof \Spatie\Permission\Exceptions\UnauthorizedException) {
                  return redirect('/errors/noRole');
            }

        // if ($e instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException){

        //         // return response(redirect(url('/')), 404);
        //         return redirect('/errors/404');
        //     }

            return parent::render($request, $exception);
        }

    }


