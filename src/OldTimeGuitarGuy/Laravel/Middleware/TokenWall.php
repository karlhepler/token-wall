<?php

namespace OldTimeGuitarGuy\Laravel\Middleware;

use Cookie;
use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TokenWall
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // If it's not enabled, then bypass
        if (! $this->isEnabled() ) {
            return $next($request);
        }

        // Grab the token
        $token = config('token-wall.token', 'token');

        // If the token exists as a cookie, then go to next
        if ( Cookie::has($token) ) {
            return $next($request);
        }

        // If the request has a token in it,
        // then set a cookie & go to next request
        if ( $request->token === $token ) {
            Cookie::queue(
                $token,                     // Name
                true,                       // Value
                1440,                       // Minutes
                config('session.path'),     // Path
                config('session.domain'),   // Domain
                config('session.secure'),   // Secure
                config('session.http_only') // HTTP Only
            );

            return $next($request);
        }

        // Disallow
        return response('Access Denied');
    }

    ///////////////////////
    // PROTECTED METHODS //
    ///////////////////////

    /**
     * Determine if the token wall is enabled
     *
     * @return boolean
     */
    protected function isEnabled()
    {
        return config('token-wall.enabled', true)
            && $this->isBeforeExpiration();
    }

    /**
     * Determine if NOW is before the expiration datetime
     *
     * @return boolean
     */
    protected function isBeforeExpiration()
    {
        // If this doesn't expire,
        // then we're always before expiration
        if (! $this->expires()) {
            return true;
        }

        return Carbon::now()->lte(
            Carbon::createFromFormat(
                'Y-m-d H:i:s',
                config('token-wall.expires.datetime'),
                config('token-wall.expires.timezone')
            )
        );
    }

    /**
     * Determine if the token wall expires
     *
     * @return boolean
     */
    protected function expires()
    {
        return config('token-wall.expires', false) !== false
            && !empty(config('token-wall.expires', []));
    }
}
