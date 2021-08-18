<?php

namespace App\Http\Controllers\Pages;

use Inertia\Inertia;
use Lit\Config\Form\Pages\HomeConfig;

class HomeController
{
    public function __invoke()
    {
        return Inertia::render('Home/Home', [
            'form' => HomeConfig::loadResourceArray(),
        ]);
    }
}
