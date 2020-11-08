<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','lastname','birthdate','phonenumber', 'email', 'password','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function tasked()
    {
        return $this->belongsToMany('App\Task')->where('end_time',null);
    }


    public function tasks()
    {
        return $this->belongsToMany('App\Task');
    }

    public function finished_tasks()
    {
        return $this->belongsToMany('App\Task')->where('end_time','<>',null);
    }

    public function appointed_tasks()
    {
        return $this->belongsToMany('App\Task')->where('end_time',null)->where('start_time','<>',null);
    }

    public function all_tasks()
    {
        return Task::all();
    }
    public function all_tasked()
    {
        return Task::where('start_time','<>',null)->where('end_time',null)->get();
    }

    public function all_finished_tasks()
    {

        return Task::where('start_time','<>',null)->where('end_time','<>',null)->get();
    }

    public function unapointed_tasks()
    {
        return Task::where('start_time',null)->get();
    }

public function getRole(){
    switch ($this->role) {
        case '0':
            # code...
            return 'Administrator';

        default:
            # code...
            return 'Employee';
    }
}


}