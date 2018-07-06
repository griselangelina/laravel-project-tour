<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
		'http://localhost/grisell/public/tour/submit/postsubmittour',
		'http://localhost/grisell/public/about/message',
		'http://localhost/grisell/public/footer/emailsubscribe',
		'http://localhost/grisell/public/customtrip/submit',
    ];
}
