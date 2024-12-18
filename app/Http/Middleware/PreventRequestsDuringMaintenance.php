<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;

class PreventRequestsDuringMaintenance extends Middleware
{
    /**
     * The URIs that should be accessible while in maintenance mode.
     *
     * @var array<int, string>
     */
    protected $except = [
        // Add URIs that should bypass maintenance mode here
    ];
}
