<?php namespace App\Exceptions;

use Exception;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler {

    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        'Symfony\Component\HttpKernel\Exception\HttpException'
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {

        if($e instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException):
        
            return $this->check_for_301($request, $e);
        
        endif;

        return parent::render($request, $e);
    }

    public function check_for_301($request, $e){

        
        $checker = new \App\Services\Cacheturbator(new \App\Services\Check301);

        //$checker = new \App\Services\Check301;

        $route   = $checker->check(\Request::path());

        if (is_array($route) && isset($route['routename'])):

            $params = isset($route['params']) ? $route['params'] : array();

            return redirect()->route($route['routename'], $params, '301');

        endif;


        return parent::render($request, $e);

    }

}
