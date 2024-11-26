<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate(5);
        return Inertia::render("user/index",compact("users"));
    }

    public function show(User $user){
        $tasks = Task::where("user_id",$user->id)->latest()->paginate(5)->toArray();
        return Inertia::render("user/show",compact("tasks","user"));
    }

    
}
