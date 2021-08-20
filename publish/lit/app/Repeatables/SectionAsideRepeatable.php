<?php

namespace Lit\Repeatables;

use Ignite\Crud\Fields\Block\Repeatable;
use Ignite\Crud\Fields\Block\RepeatableForm;
use Ignite\Page\Table\ColumnBuilder;

class SectionAsideRepeatable extends Repeatable
{
    /**
     * Repeatable type.
     *
     * @var string
     */
    protected $type = 'SectionAside';

    /**
     * The represantive view of the repeatable.
     *
     * @var string
     */
    protected $view = 'rep.SectionAside';

    /**
     * Build the repeatable preview.
     *
     * @param  ColumnBuilder $preview
     * @return void
     */
    public function preview(ColumnBuilder $preview): void
    {
        $preview->col('Abschnitt mit Marginalspalte');
    }

    /**
     * Build the repeatable form.
     *
     * @param  RepeatableForm $form
     * @return void
     */
    public function form(RepeatableForm $form): void
    {
        $form->block('content')
            ->title('Inhalt')
            ->repeatables(function ($repeatables) {
                // You cannot add nested blocks here!
                $repeatables->add(TextRepeatable::class)->button('Text')->icon(fa('align-justify'))->variant('secondary');
                $repeatables->add(ImageRepeatable::class)->button('Bild')->icon(fa('image'))->variant('secondary');
            });

        $form->block('aside')
            ->title('Marginalspalte')
            ->repeatables(function ($repeatables) {
                // You cannot add nested blocks here!
                $repeatables->add(TextRepeatable::class)->button('Text')->icon(fa('align-justify'))->variant('secondary');
                $repeatables->add(ImageRepeatable::class)->button('Bild')->icon(fa('image'))->variant('secondary');
                $repeatables->add(InfoBoxRepeatable::class)->button('Infobox')->icon(fa('info'))->variant('secondary');
            })->width(5);
    }
}
