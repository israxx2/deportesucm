<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use auth;
use Session;
use Closure;

class MDusuarioAdmin
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
        if($this->auth->user() == null){
            Session::flash('message_error','No tiene permisos suficientes para acceder');
            return redirect()->to('/login');
        }

        if($this->auth->user()->tipo !='admin'){
            Session::flash('message_error','No tiene permisos suficientes para acceder');
            return redirect()->to('/login');
        }
        return $next($request);
    }
}
