<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Task;


class UserController extends Controller
{

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id)
    {
        $user=User::find($id);
        $task=Task::all()->where($id == 'client');

        return view('user.profile', [ 'user' => $user, ' task'=> $task]);
    }

    public function index() {
$users=User::all();

return view('user.index',['users' => $users]);
 }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $user =  new User();
        $user->firstname = $request['fname'];
        $user->lastname = $request['lname'];
        $user->birthdate = $request['db'];

        $user->email = $request['email'];
        $user->phonenumber= $request['phonenumber'];
        $user->role=$request['role'];
        $user->password = Hash::make($request['password']);
        $user->save();

        return redirect('user');
    }
    public function edit($id)
    {
        $user=User::find($id);
        return view('user.edit',['user' => $user]);
    }
    public function update(Request $request,$id)
    {
        $user=User::find($id);
        $user->firstname = $request['fname'];
        $user->lastname = $request['lname'];
        $user->email = $request['email'];
        $user->phonenumber = $request['phonenumber'];
        $user->role=$request['role'];

        if ($request->has('file')) {
            // Get image file
            $image = $request->file('file');
            // Make a image name based on user name and current timestamp
            $filename = str_slug($request->input('name')).'_'.time();
            // Define folder path
            $folder = 'uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = 'storage/'.$folder . $filename. '.' . $image->getClientOriginalExtension();
            // Upload image

            $name = !is_null($filename) ? $filename : str_random(25);

            $file = $image->storeAs($folder, $name.'.'.$image->getClientOriginalExtension(), 'public');


            // Set user profile image path in database to filePath
            $user->image = $filePath;
        }


        $user->save();
        return redirect('/user');
    }

    public function destroy(Request $request,$id) {
        $user=User::find($id);
        $user->delete();
        return redirect('/user');
        //return $request->all();
         }



}