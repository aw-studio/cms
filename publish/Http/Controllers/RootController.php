<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Litstack\Pages\ManagesPages;

class RootController
{
    use ManagesPages;

    /**
     * Handle page request.
     *
     * @param  Request $request
     * @param  string  $slug
     * @return void
     */
    public function __invoke(Request $request, $slug)
    {
        return Inertia::render('Root/Root', [
            'form' => $this->getLitstackPage($slug),
        ]);
    }
}
