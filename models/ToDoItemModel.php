<?php

namespace App\Models;

class ToDoItemModel
{
    protected $table = "todo_list";

    protected $id;
    protected $username;
    protected $email;
    protected $text;

    public $status;

    public function isComplete()
    {
        return $this->status;
    }

    public function status()
    {
        $this->status = true;
    }

}