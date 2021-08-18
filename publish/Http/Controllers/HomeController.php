<?php

namespace App\Http\Controllers\Pages;

use Inertia\Inertia;

class HomeController
{
    public function __invoke()
    {
        return Inertia::render('Home/Home', [
            'form' => HomeConfig::loadResourceArray(),
        ]);
    }
}
