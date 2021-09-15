<?php

namespace App\Http\Controllers;

use App\Http\Resources\Task;
use App\Models\task as ModelsTask;
use App\Models\Task as AppModelsTask;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return ModelsTask::all();
    }

    public function show($id)
    {

        return ModelsTask::findOrFail($id);
    }

    public function showByUserId($id)
    {
        return ModelsTask::where('userid', $id)->get();
    }

    public function showByProjectId($id)
    {
        return ModelsTask::where('projectid', $id)->get();
    }
}
