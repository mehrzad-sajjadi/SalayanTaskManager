<?php

namespace App\Models;

use App\Helpers\DateConvertor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable=[
        "name",
        "deadline",
        "user_id",
        "is_done",
    ];
    public function user(){
        return $this->BelongsTo(User::class);
    }

    public $appends=["shamsi_deadline","user_name"];

    public function getShamsiDeadlineAttribute(){
        return DateConvertor::miladi2shamsi($this->deadline);
    }

    public function getUserNameAttribute(){
        return $this->user->name;
    }



}
