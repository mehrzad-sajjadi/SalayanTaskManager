<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(){
        $id = Auth::id();
        $now = Carbon::now()->format("Y-m-d H:i:s");
        $tasks = Task::where("user_id",$id)->latest()->paginate(5)->toArray();
        return Inertia::render('Dashboard',compact("tasks","now"));
    }
}
