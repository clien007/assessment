<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;

class CheckStoreAccess
{
    public function handle(Request $request, Closure $next)
    {
        $store = $request->route('store'); // Assuming the route parameter is 'store'
        if (!Auth::user()->stores->contains($store)) {
            abort(403, 'Unauthorized'); // Or handle unauthorized access as per your application's needs
        }

        return $next($request);
    }
}

