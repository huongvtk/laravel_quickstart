<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task; 

use Illuminate\Http\Response;

use App\Http\Requests\StoreTaskPost; 

class TaskController extends Controller
{
    public function index()
    {
        return view('tasks');
    }

    public function create()
    {
        //
    }

    public function store(StoreTaskPost $request)
    {
        
        $task = new Task;
        $task->name = $request->name;
        if ($task->save()) {
            return redirect('/')->with(['flash' => 'success', 'messages' => trans('message.addCom')]);
        } else
            return redirect('/')->with(['flash' => 'error', 'messages' => trans('message.addFail')]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        if ($task->delete()) {
            return redirect('/')->with(['flash' => 'success', 'messages' => trans('message.delCom') ]);
        } else 
            return redirect('/')->with(['flash' => 'error', 'messages' => trans('message.delFail') ]);
    }
}
