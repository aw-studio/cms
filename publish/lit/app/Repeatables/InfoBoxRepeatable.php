<?php

namespace Lit\Repeatables;

use Ignite\Crud\Fields\Block\Repeatable;
use Ignite\Crud\Fields\Block\RepeatableForm;
use Ignite\Page\Table\ColumnBuilder;

class InfoBoxRepeatable extends Repeatable
{
    /**
     * Repeatable type.
     *
     * @var string
     */
    protected $type = 'InfoBox';

    /**
     * The represantive view of the repeatable.
     *
     * @var string
     */
    protected $view = 'rep.InfoBox';

    /**
     * Build the repeatable preview.
     *
     * @param  ColumnBuilder $preview
     * @return void
     */
    public function preview(ColumnBuilder $preview): void
    {
        $preview->col('{title}');
    }

    /**
     * Build the repeatable form.
     *
     * @param  RepeatableForm $form
     * @return void
     */
    public function form(RepeatableForm $form): void
    {
        $form->input('title')
            ->title('Titel');
        $form->wysiwyg('text')
            ->title('Text');
    }
}
