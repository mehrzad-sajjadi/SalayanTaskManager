<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResponseRequest;
use App\Models\Response;
use App\Models\Task;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;


class ResponseController extends Controller
{
    public function create($task_id){
        $task = Task::findOrFail($task_id);
        if($task->user_id==Auth::id()){
            return Inertia::render("response/create",compact("task"));
        }else{
            return redirect()->route('dashboard')->withErrors("شما اجازه دسترسی ندارید");
        }

    }

    public function store(ResponseRequest $responseRequest){
        $task = Task::findOrFail($responseRequest->task_id );
        $response = new Response();
        $response->task_id = $responseRequest->task_id;
        $task = Task::findOrFail($response->task_id );
        $task->is_done=1;

        $response->report = $responseRequest->report;

        if($responseRequest->hasFile('image')){
            $image = $responseRequest->file("image") ;
            $type = $image->getClientOriginalExtension();
            $time = time();
            $image_name = $time.".".$type;
            $image->storeAs('pics', $image_name, 'public');
            $response->image = $image_name ; 
        }        

        $response->save();
        $task->save();
        
        return redirect()->route(route: 'dashboard')->with("message","گزارش با موفقیت ثبت شد");                
    }

    public function show($id){
        $response = Response::where("task_id",$id)->get()->first();
        if($response->task->user_id == Auth::id() || auth()->user()->is_admin==1 ){
            if($response->image){
                $image_url = Storage::url("pics/".$response->image);
                $image_name = $response->image;
                return Inertia::render("response/show",compact("response","image_url","image_name"));
            }
            return Inertia::render("response/show",compact("response",));                
        }else{
            return redirect()->route('dashboard')->withErrors("شما اجازه دسترسی ندارید");
        }


    }
}
