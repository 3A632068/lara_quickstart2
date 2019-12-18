<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //Eloquent 模型
    protected $fillable = ['name'];
}
