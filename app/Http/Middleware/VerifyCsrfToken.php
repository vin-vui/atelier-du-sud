<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
//gère les en-têtes de proxy dans les requêtes HTTP entrantes, ce qui est particulièrement utile lorsque votre application est derrière un proxy inverse
class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];
}
