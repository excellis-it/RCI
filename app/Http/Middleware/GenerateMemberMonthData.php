<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\AutoRun\MemberPayGenerate;

class GenerateMemberMonthData
{
    public function handle(Request $request, Closure $next)
    {
        // Call the controller logic
        $controller = new MemberPayGenerate();
        $controller->paygenerate();

        // Proceed with the request
        return $next($request);
    }
}
