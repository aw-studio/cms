<?php

namespace Lit\Config\Pages;

use App\Http\Controllers\Pages\RootController;
use Ignite\Crud\Fields\Block\Repeatables;
use Illuminate\Routing\Route;
use Lit\Http\Controllers\Pages\RootController as ListackRootController;
use Litstack\Pages\PagesConfig;

class RootConfig extends PagesConfig
{
    /**
     * Fjord controller class.
     *
     * @var string
     */
    public $controller = ListackRootController::class;

    /**
     * App controller class.
     *
     * @var string
     */
    public $appController = RootController::class;

    /**
     * Application route prefix.
     *
     * @param  string|null $locale
     * @return string
     */
    public function appRoutePrefix(string $locale = null)
    {
        return 'root';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Seite',
            'plural'   => 'Weitere Seiten',
        ];
    }

    /**
     * Make repeatbles that should be available for pages.
     *
     * @param  Repeatables $rep
     * @return void
     */
    public function repeatables(Repeatables $rep)
    {
        $rep->add('text', function ($form, $preview) {
            $preview->col('text')->stripHtml()->maxChars('50');

            $form->wysiwyg('text')
                ->title('Text')
                ->translatable($this->translatable());
        });
    }
}
