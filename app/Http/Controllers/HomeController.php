<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    $usersChart = \App::call('App\Http\Controllers\UserChartController@index');

        return view('home',['usersChart' => $usersChart ]);
    }
   /* public function store(){

        $task =  new Task();
        $task->name = $request['name'];
        $task->email = $request['email'];
        $task->phone = $request['phone'];
        $task->subject = $request['subject'];
        $task->description = $request['description'];
        $task->save();

        return redirect('/welcome');

    }*/
}