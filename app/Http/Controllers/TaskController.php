<?php

namespace App\Http\Controllers;

use App\Helpers\DateConvertor;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Morilog\Jalali\Jalalian;

class TaskController extends Controller
{

    public function index(){
        $time = Carbon::now()->format("Y/m/d H:i:s");
        $tasks = Task::where("is_done",0)->whereDate("deadline",">=",$time)->latest()->paginate(5)->toArray();
        return Inertia::render("task/index",compact("tasks"));
    }


    public function create($id){
        $user = User::findOrFail($id);
        $start_time =Jalalian::now()->format("Y/m/d");

        return Inertia::render("task/create",compact("user","start_time"));
    }

    public function store(TaskRequest $taskRequest){
        $deadline = DateConvertor::shamsi2miladi( $taskRequest->deadline);
        $task = new Task();
        $task->name = $taskRequest->name;
        $task->deadline =  $deadline;
        $task->user_id = $taskRequest->user_id;
        $task->save();
        return redirect()->route("user_show",$task->user_id)->with("message","تسک با موفقیت اضافه شد");            
    }

    public function delete(Task $task){
        $task->delete();
    }

    public function edit(Task $task){
        $start_time =Jalalian::now()->format("Y/m/d");
        $users = User::all();
        return Inertia::render("task/edit",compact("task","start_time","users"));
    }


    
    public function update(TaskRequest $taskRequest,Task $task){
        $deadline = DateConvertor::shamsi2miladi( $taskRequest->deadline);
        $task->name = $taskRequest->name ;
        $task->user_id = $taskRequest->user_id ;
        $task->deadline = $deadline;
        $task->save();
        return redirect()->route("user_show",$task->user_id)->with("message","تسک با موفقیت ویرایش شد");
    }

    public function not_done(){
        $time = Carbon::now()->format("Y/m/d H:i:s");
        $tasks = Task::where("is_done",0)->whereDate("deadline","<",$time)->latest()->paginate(5)->toArray();
        return Inertia::render("task/not_done",compact("tasks"));
    }

    public function done(){
        $tasks = Task::where("is_done",1)->latest()->paginate(5)->toArray();
        return Inertia::render("task/done",compact("tasks"));
    }

    public function create2(){
        $users = User::all()->toArray();
        $start_time =Jalalian::now()->format("Y/m/d");
        return Inertia::render("task/create2",compact("users","start_time"));
    }
    
    public function store2(TaskRequest $taskRequest){
        $deadline = DateConvertor::shamsi2miladi( $taskRequest->deadline);
        $task = new Task();
        $task->name = $taskRequest->name;
        $task->deadline = $deadline;
        $task->user_id = $taskRequest->user_id;

        $check=Task::where("name",$task->name)->where("user_id",$task->user_id )->first();
        if($check){
            return redirect()->route("task_index")->withErrors("این تسک قبلا به این شخص محول شده");
        }else{
            $task->save();
            return redirect()->route("user_show",$task->user_id)->with("message","تسک با موفقیت اضافه شد");
        }
        
    
    }

}
