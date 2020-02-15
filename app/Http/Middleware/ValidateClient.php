<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ValidateClient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return  mixed
     */
    public function handle($request, Closure $next)
    {
        $data = [
            'client-id' => request()->header('client-id'),
            'client-secret' => request()->header('client-secret'),
        ];

        $rules = [
            'client-id'=>'required|exists:oauth_clients,id',
            'client-secret'=>'required|exists:oauth_clients,secret'
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return $next($request);
    }
}
