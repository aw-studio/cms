<?php

namespace Lit\Http\Controllers\Pages;

use Lit\Models\User;
use Litstack\Pages\PagesController;

class RootController extends PagesController
{
    /**
     * Authorize request for authenticated fjord-user and permission operation.
     * Operations: read, update
     *
     * @param  User  $user
     * @param  string  $operation
     * @return boolean
     */
    public function authorize(User $user, string $operation): bool
    {
        return true;
    }
}
