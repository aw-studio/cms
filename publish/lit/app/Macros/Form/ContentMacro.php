<?php

namespace Lit\Macros\Form;

use Ignite\Crud\BaseForm as Form;

class ContentMacro
{
    public function register()
    {
        Form::macro('contentMacro', function () {
            $this->block('content')
                ->title('Content')
                ->repeatables(function ($repeatables) {
                    $repeatables->add('text', function ($form, $preview) {
                        $preview->col('{text}');
                        $form->input('text')
                            ->title('Text');
                    });
                    $repeatables->add('image', function ($form, $preview) {
                        $preview->col('Image');
                        $form->image('image');
                    });
                    $repeatables->add('cards', function ($form, $preview) {
                        $preview->col('Cards');
                        $form->block('cards')
                            ->title('Cards')
                            ->repeatables(function ($repeatables) {
                                $repeatables->add('card', function ($form, $preview) {
                                    $preview->col('{title}');
                                    $form->input('title')
                                        ->title('Title');
                                    $form->input('text')
                                        ->title('Text');
                                });
                            });
                    });
                    $repeatables->add('accordion', function ($form, $preview) {
                        $preview->col('Accordion');
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
                    });
                });
        });
    }
}
