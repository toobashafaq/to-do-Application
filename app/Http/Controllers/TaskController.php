<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index(){
        $tasks=Task::orderBy('id','DESC')->get();
        return view('welcome',compact('tasks'));
    }
    public function showAllTask(){
        $tasks=Task::orderBy('id','DESC')->get();
        return view('show',compact('tasks'));
    }
    public function addTask(Request $request){
        
        $task= new Task;
        $task->name=$request->name;
        $task->save();

       
        return response()->json(['success'=>true,'msg'=>'Task Added']);
        
        // return response()->json(['success'=>false,'msg'=>$task->errors()]);

    }

    public function deleteTask($id){
        $id = ($id);
        $delete = Task::where("id",$id)->delete();
        return response()->json(['success'=>true,'msg'=>'Task Deleted']);
    }
    public function updateTask(Request $request){

        $task_mark_as_completed= Task::find($request->id);
        $task_mark_as_completed->isComplete=1;
        $task_mark_as_completed->save();
     
        return response()->json(['success'=>true,'msg'=>'Task Mark as completed...']);
    }

}
