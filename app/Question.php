<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //which field is allowed, with being mass assigned
    protected $guarded = [];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($task)
    {
        //used to be description, makes sense?
        $this->tasks()->create($task);

    }
}
