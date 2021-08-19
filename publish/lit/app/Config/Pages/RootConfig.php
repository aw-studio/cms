<?php

namespace Lit\Config\Pages;

use App\Http\Controllers\Pages\RootController;
use Ignite\Crud\Fields\Block\Repeatables;
use Illuminate\Routing\Route;
use Lit\Http\Controllers\Pages\RootController as ListackRootController;
use Lit\Repeatables\AccordionRepeatable;
use Lit\Repeatables\ImageRepeatable;
use Lit\Repeatables\SectionCardsRepeatable;
use Lit\Repeatables\TextRepeatable;
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
    public function repeatables(Repeatables $repeatables)
    {
        $repeatables->add(TextRepeatable::class)->button('Text')->icon(fa('align-justify'))->variant('info');
        $repeatables->add(ImageRepeatable::class)->button('Bild')->icon(fa('image'))->variant('dark');
        $repeatables->add(SectionCardsRepeatable::class)->button('Cards')->icon(fa('th'))->variant('warning');
        $repeatables->add(AccordionRepeatable::class)->button('Accordion')->icon(fa('chevron-down'))->variant('success');
    }
}
