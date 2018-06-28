<?php

namespace Vanguard\Http\Middleware;

use Closure;
use Config;
use Illuminate\Contracts\Auth\Guard;

class Authenticate
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;
    protected $appInformation;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->appInformation = Config::get('appInformation');
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }

        $data = $request->except('_token');

        $appSecret = $this->appInformation[$data['appId']]['secret'];

        if (md5($data['appId'].$appSecret) != $data['appToken']) {
            return response('Unauthorized.', 401);
        }

        return $next($request);
    }
}
