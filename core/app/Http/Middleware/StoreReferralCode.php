<?php

namespace App\Http\Middleware;


use App\Reflink;
use Closure;

class StoreReferralCode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $response = $next($request);

        if ($request->has('ref')){
            $referral = Reflink::whereLink($request->get('ref'))->first();
            $response->cookie('ref', $referral->id, 7 * 24 * 60);
        }

        return $response;
    }
}
