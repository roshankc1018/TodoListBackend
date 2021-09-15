<?php

namespace App\Http\Controllers;


use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return Project::all();
    }

    public function show($id)
    {
        return Project::findOrFail($id);
    }

    public function showProject($id)
    {
        return Project::join("tasks", "tasks.projectid", "=", "projects.projectid")
            ->where('projects.projectid', $id)
            ->get(
                ["tasks.taskname", "tasks.userid", "tasks.hours"]
            );
    }
}
