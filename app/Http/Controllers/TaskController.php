<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Task;
use App\User;



class TaskController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */

    public function store(Request $request){

        $task =  new Task();
        $task->client = $request['name'];
        $task->email = $request['email'];
        $task->phonenumber = $request['phone'];
        $task->product = $request['subject'];
        $task->adresse = $request['adresse'];
        $task->description = $request['description'];
        $task->save();

        return redirect('/welcome');

    }
    public function index() {
        $tasks=Task::all();
        return view('task.index',['tasks' => $tasks]);
         }

         public function index_user($id) {
            $user=User::find($id);
            return view('task.index_user',['user' => $user]);
             }

     public function destroy(Request $request,$id) {
            $task=Task::find($id);
            if($task->end_time==null){

            $users=$task->users()->get();
          foreach ($users as $user) {

               $user->avaible=1;
               $user->save();
            }
            $task->users()->sync(null);
        }

            $task->delete();
            return redirect('/task/index');
            //return $request->all();
             }

public function charge($id){
$task=Task::find($id);
$users=User::all()->where('avaible',true);
return view('task.charge',['task'=>$task,'users'=>$users]);

}



public function profil($id){
    $task=Task::find($id);
    return view('task.profil',['task'=>$task]);

    }
    public function finish(Request $request,$id){
        $task=Task::find($id);
        $current_date = date('Y-m-d H:i:s');
        $task->end_time=$current_date;

        $task->save();

$users=$task->Users()->get();
foreach ($users as $user) {
    # code...
    $user->avaible=1;
    $user->save();
}


        return redirect('/task/index');
        }

public function appoint(Request $request,$id){

  $members=  $request['team'];
  $members=array_add($members,count($members),$request['leader']);
$selected=User::whereIn('id',$members)->get();
$task=Task::find($id);
$task->user_id=$request['leader'];

$task->users()->sync($selected);
foreach ($selected as $usr) {
$usr->avaible=0;
$usr->save();
}

$current_date = date('Y-m-d H:i:s');
$task->start_time=$current_date;

$task->save();
return redirect('/task/index');
}


}
