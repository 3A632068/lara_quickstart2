<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //Eloquent 模型
    protected $fillable = ['name'];
    //Eloquent關聯-user關聯
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
