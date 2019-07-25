<?php

namespace App\Http\Middleware;

use Closure;

class CheckError
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function render($request, Exception $e)
    {
        if ($e instanceof 
        \Symfony\Component\HttpKernel\Exception\NotFoundHttpException){

            // return response(redirect(url('/')), 404);
            return abort(404);
        }
        return parent::render($request, $e);

    }
}
