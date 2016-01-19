<?php

namespace App\Http\Middleware;

use Closure;
use Storage;

class DeleteYoutubeFiles
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
        
        $files = Storage::files('/home/matt/downloads/');
        Storage::delete($files);

        return $response;
    }
}
