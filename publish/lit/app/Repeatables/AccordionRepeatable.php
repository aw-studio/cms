<?php

namespace Lit\Repeatables;

use Ignite\Crud\Fields\Block\Repeatable;
use Ignite\Crud\Fields\Block\RepeatableForm;
use Ignite\Page\Table\ColumnBuilder;

class AccordionRepeatable extends Repeatable
{
    /**
     * Repeatable type.
     *
     * @var string
     */
    protected $type = 'Accordion';

    /**
     * The represantive view of the repeatable.
     *
     * @var string
     */
    protected $view = 'rep.Accordion';

    /**
     * Build the repeatable preview.
     *
     * @param  ColumnBuilder $preview
     * @return void
     */
    public function preview(ColumnBuilder $preview): void
    {
        $preview->col('Accordion');
    }

    /**
     * Build the repeatable form.
     *
     * @param  RepeatableForm $form
     * @return void
     */
    public function form(RepeatableForm $form): void
    {
        $form->block('items')
            ->title('Items')
            ->repeatables(function ($repeatables) {
                $repeatables->add('item', function ($form, $preview) {
                    $preview->col('{title}');
                    $form->input('title')
                        ->title('Title');
                    $form->input('text')
                        ->title('Text');
                });
            });
    }
}
