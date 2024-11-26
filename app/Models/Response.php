<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;
    protected $fillable=[
        "task_id",
        "report",
        "image",
    ];
    
    public $appends=["task_name"];

    public function task(){
        return $this->BelongsTo(Task::class);
    }

    public function getTaskNameAttribute(){
        return $this->task->name;
    }
    // public function getTaskNameAttribute(){
    //     return $this->task->name;
    // }

}
