<?php

namespace App\Http\Middleware;

use Closure;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // ci assicuriamo che la locale esiste
        // blog.dev/it/posts/66
        // it = [1]
        // posts = [2]
        // 66 = [3]
        $locale = $request->segment(1);

        //se non esiste mettiamo quella di default e reidirizziamo
        // controlliamo le locales supportate
        // if (! in_array($locale, config('app.locales'))) {
        if (! array_key_exists($locale, config('app.locales'))) {
            //prendiamo tutti i segmenti dell'url
            $segments = $request->segments();

            // impostiamo il primo elemento come il fallback
            $segments[0] = config('app.fallback_locale');

            //reindirizziamo a un url con una locale valida
            return redirect(implode('/', $segments));
        }

        //La locale è stata trovata. La impostiamo

        app()->setLocale($locale);

        return $next($request);
    }
}
