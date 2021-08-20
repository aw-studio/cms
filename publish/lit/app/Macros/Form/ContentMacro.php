<?php

namespace Lit\Macros\Form;

use Ignite\Crud\BaseForm as Form;
use Lit\Repeatables\AccordionRepeatable;
use Lit\Repeatables\ImageRepeatable;
use Lit\Repeatables\InfoBoxRepeatable;
use Lit\Repeatables\SectionAsideRepeatable;
use Lit\Repeatables\SectionCardsRepeatable;
use Lit\Repeatables\TextRepeatable;

class ContentMacro
{
    public function register()
    {
        Form::macro('contentMacro', function () {
            $this->block('content')
                ->title('Content')
                ->repeatables(function ($repeatables) {
                    $repeatables->add(TextRepeatable::class)->button('Text')->icon(fa('align-justify'))->variant('info');
                    $repeatables->add(ImageRepeatable::class)->button('Bild')->icon(fa('image'))->variant('dark');
                    $repeatables->add(InfoBoxRepeatable::class)->button('Infobox')->icon(fa('info'))->variant('dark');
                    $repeatables->add(SectionCardsRepeatable::class)->button('Cards')->icon(fa('th'))->variant('warning');
                    $repeatables->add(SectionAsideRepeatable::class)->button('Abschnitt mit Marginalspalte')->icon(fa('columns'))->variant('warning');
                    $repeatables->add(AccordionRepeatable::class)->button('Accordion')->icon(fa('chevron-down'))->variant('success');
                });
        });
    }
}
