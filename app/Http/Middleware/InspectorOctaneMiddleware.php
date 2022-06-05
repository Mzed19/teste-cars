<?php


namespace App\Http\Middleware;

use Inspector\Laravel\Middleware\WebRequestMonitoring;

class InspectorOctaneMiddleware extends WebRequestMonitoring
{
    public function terminate($request, $response)
    {
        parent::terminate($request, $response);

        inspector()->flush();
    }
}
