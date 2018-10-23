<?php

namespace DRL\LaravelCors;

use Closure;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure                  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request)
            ->header('Access-Control-Allow-Methods', $this->toString($this->allowMethods()))
            ->header('Access-Control-Allow-Headers', $this->toString($this->allowHeaders()))
            ->header('Access-Control-Expose-Headers', $this->toString($this->exposeHeaders()))
            ->header('Access-Control-Allow-Origin', $this->allowedOriginsToString())
            ->header('Access-Control-Max-Age', $this->maxAge());

        return $response;
    }

    /**
     * Get the allow_origins config value.
     *
     * @return array
     */
    protected function allowOrigins(): array
    {
        $origins = config('cors.allow_origins');

        return array_wrap($origins);
    }

    /**
     * Get the allow_methods config value.
     *
     * @return array
     */
    protected function allowMethods(): array
    {
        $methods = config('cors.allow_methods');

        return array_wrap($methods);
    }

    /**
     * Get the allow_headers config value.
     *
     * @return array
     */
    protected function allowHeaders(): array
    {
        $headers = config('cors.allow_headers');

        return array_wrap($headers);
    }

    /**
     * Get the expose_headers config value.
     *
     * @return array
     */
    protected function exposeHeaders(): array
    {
        $headers = config('cors.expose_headers');

        return array_wrap($headers);
    }

    /**
     * Get the max_age config value.
     *
     * @return int
     */
    protected function maxAge(): int
    {
        return config('cors.max_age');
    }

    /**
     * Transform array of settings into a string.
     *
     * @param  array  $array
     * @return string
     */
    protected function toString(array $array): string
    {
        return implode(', ', $array);
    }

    /**
     * Transform array of origins into a string.
     *
     * @return string
     */
    protected function allowedOriginsToString(): string
    {
        $origins = $this->allowOrigins();

        if (in_array('*', $origins)) {
            return '*';
        }

        $origin = request()->header('Origin');

        if (!in_array($origin, $origins)) {
            return '';
        }

        return $origin;
    }
}
