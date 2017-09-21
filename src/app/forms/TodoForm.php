<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;

class TodoForm extends Form
{
    public function initialize()
    {
        $this->add(
            new Text('content', [
                'size' => 64,
                'placeholder' => 'Your todo here',
                'class' => 'form-control',
                'autofocus' => 'true',
            ])
        );
    }
}