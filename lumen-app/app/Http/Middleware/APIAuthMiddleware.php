<?php namespace App\Http\Middleware;

use Closure;

class APIAuthMiddleware {

    /**
	 * THIS NEEDS UPDATED TO USE Auth::Basic
     *
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    	// grab POSTed parameters
    	$params 	= $request->all();

    	if ( ! isset($params['key']) OR $params['key'] != 'Stack01!')
    		return $this->_invalid();

        return $next($request);
    }

    private function _invalid()
    {
    	echo json_encode(array('success' => FALSE, 'data' => 'invalid api key'));
    	exit;
    }

}
