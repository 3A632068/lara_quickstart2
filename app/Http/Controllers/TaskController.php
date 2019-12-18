<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    //限制三個處理任務路由只讓已認證的使用者存取
    public function __construct()
    {
        $this->middleware('auth');
    }

    //回傳視圖
    public function index(Request $request)
    {
        //顯示已有的任務
        $tasks = Task::where('user_id', $request->user()->id)->get();

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);

    }

    //驗證
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        //建立任務
        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect('/tasks');
    }
}
