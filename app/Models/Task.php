<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $primaryKey = 'taskid';

    function project()
    {
        $this->belongsTo('task', 'task.id', 'project.id');;
    }
}
