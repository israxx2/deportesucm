<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use auth;
use Session;
use Closure;

class MDusuarioAlumno
{
    protected $auth;

    public function __construct(Guard $auth){
      $this->auth = $auth;
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
        if($this->auth->user()->tipo !="estudiante"){
            Session::flash('message_error','No tiene permisos para acceder');
            return redirect()->to('/');
        }
        return $next($request);
    }
}
