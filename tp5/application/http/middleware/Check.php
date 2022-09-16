<?php

namespace app\http\middleware;

class Check
{
    public function handle($request, \Closure $next)
    {
        if(!$request->param('name')){
            $request->name = 'name is none';
        }
        return $next($request);
    }
}
