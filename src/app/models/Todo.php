<?php

use Phalcon\Mvc\Model;

class Todo extends Model
{
    public $id;

    public $content;

    public $is_done = false;
}