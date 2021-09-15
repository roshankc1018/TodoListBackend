<?php

namespace App\Http\Controllers;

use App\Models\UserAndProject;
use Illuminate\Http\Request;

class UserAndProjectController extends Controller
{
    public function index()
    {
        return UserAndProject::all();
    }

    public function show($id)
    {
        return UserAndProject::findOrFail($id);
    }

    public function showByUserId($id)
    {
        return UserAndProject::where('userid', $id)->get();
    }
    public function showByprojectId($id)
    {
        return UserAndProject::where('projectid', $id)->get();
    }

    //for testing api
    public function showUserData($id)
    {

        return UserAndProject::join('projects', "user_and_projects.projectid", "=", "projects.projectid")
            ->join('tasks', "user_and_projects.userid", "=", "tasks.userid")
            ->where('user_and_projects.userid', $id and "user_and_projects.projectid",  "projects.projectid")
            ->orWhere(
                'user_and_projects.projectid',
                (UserAndProject::where('user_and_projects.userid', $id)->pluck('user_and_projects.projectid'))
            )
            ->get(
                ["projects.projectname", "tasks.userid", "tasks.hours"]
            );
    }



    public function showUserData2($id)
    {



        return UserAndProject::join('projects', "user_and_projects.projectid", "=", "projects.projectid")
            ->join('tasks', "user_and_projects.userid", "=", "tasks.userid")
            ->where('user_and_projects.userid', $id)
            ->orWhere(
                'user_and_projects.projectid',
                (UserAndProject::where('user_and_projects.userid', $id)->pluck('user_and_projects.projectid'))
            )
            ->groupBy("projects.projectname")
            ->select(
                "projects.projectname",
                UserAndProject::raw('GROUP_CONCAT(DISTINCT tasks.userid SEPARATOR ", ") AS userid'),
                UserAndProject::raw('SUM(  tasks.hours ) AS hours'),

            )


            ->get(
                ["projects.projectname", "tasks.userid", "tasks.hours"]
            );
    }
}
