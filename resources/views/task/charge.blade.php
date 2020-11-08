@extends('layouts.backlayout')

@section('content')

<h3><i class="fa fa-tasks"></i> Task Details </h3>
<!-- BASIC FORM ELELEMNTS -->

<div class="row content-panel">


    <div class="col-md-4 right-divider mt mb centered">
        <hr style="width:70%;">
        <div class="">
            <b>
                <h1>{{$task->client}} </h1>
                <hr style="width:50%;">
                <b>
                    <h3>
                        <div class="row">
                            <label style="text-align:center;">
                                <h4><i class="fa fa-phone"> </i> Phone Number : </h4>
                            </label>
                            {{$task->phonenumber}}
                        </div>

                    </h3>
                </b>
                <b>
                    <h3>
                        <div class="row">
                            <label style="text-align:center;">
                                <h4><i class="fa fa-user"> </i> E-Mail : </h4>
                            </label>
                            {{$task->email}}
                        </div>

                    </h3>
                </b>

                <b>
                    <h3>
                        <div class="row">
                            <label style="text-align:center;">
                                <h3><i class="fa fa-anchor"> </i> Adress : </h3>
                            </label>
                            {{$task->adresse}}
                        </div>

                    </h3>
                </b>

        </div>
    </div>
    <br>
    <!-- /col-md-4 -->

    <div class="col-md-6">
        <hr style="width:70%;"> <b>
            <h2>
                <div class="row">
                    <label style="text-align:center;">
                        <h4><i class="fa fa-file"> </i> Subject : </h4>
                    </label>
                    {{$task->product}}
                </div>

            </h2>
        </b>
        <h3>{{$task->description}}</h3>
        <br>

    </div>
    <!-- /col-md-4 -->
    <div class="col-md-2 profile-text">

        <div class="col-md-2 ">
            <div class=" hidden-sm hidden-xs">
                <div>
                    @if( $task->end_time!=null)

                    <p><img src="{{asset('img/completed.jpg') }}" width="140"></p>

                    @elseif($task->start_time!=null)
                    <p><img src="{{asset('img/inprogress.jpg') }}" width="140"></p>
                    @endif
                </div>

            </div>
        </div>
    </div>
    <!-- /col-md-4 -->
</div>
<!-- /row -->
<br>
@if($task->end_time==null )
<h3><i class=" fa fa-angle-right"></i> Appoint Employees </h3>
<div class="row content-panel">
    <div class="col-lg-12">
        <form class="contact-form php-mail-form" role="form" action="{{url('/task/'. $task->id.'/appoint')}}"
            method="POST">


            @csrf
            @method('PUT')
            <div class="form-group ">
                <label for="username" class="control-label col-lg-4">Team leader </label>
                <div class="col-lg-8">

                    <select class="js-example-basic-single form-control col-lg-10 " name="leader">
                        @foreach($task->users as $user)
                        <option value="{{$user->id}}" @if($user->id==$task->user_id)selected
                            @endif>
                            {{$user->firstname}} {{$user->lastname}}
                        </option>
                        @endforeach
                        @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->firstname}} {{$user->lastname}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <p align="center"> The leader is automatiqually appointed to the task</p>

            </div>
            <br> <br>
            <div class="form-group ">
                <label for="username" class="control-label col-lg-4">Employees</label>
                <div class="col-lg-8">
                    <select class="js-example-basic-multiple  form-control col-lg-10" name="team[]" multiple="multiple"
                        le="Search here..">
                        @foreach($task->users as $user)
                        <option value=" {{$user->id}}" selected>
                            <img src="{{$user->image}}" class="img-circle" width="30">
                            {{$user->firstname}} {{$user->lastname}}</option>
                        @endforeach
                        @foreach($users as $user)
                        <option value="{{$user->id}}"> {{$user->firstname}} {{$user->lastname}}</option>
                        @endforeach

                    </select> </div>

            </div>

            <br> <br>

            <div class="loading"> <br> <br> </div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>

            <div class="form-send">
                <button type="submit" class="btn btn-large btn-primary"> Save </button>

                <a href="{{url('/task/index')}}" class="btn btn-theme04"> Cancel</a> </div>
            <br> <br>
        </form>

    </div>
</div>

@endif
<br> <br>

<h3><i class="fa fa-users"></i> Apointed Employees </h3>
<div class="row content-panel">
    <div class="col-lg-12">
        <table class="display table table-bordered table-hover" id="hidden-table-info">

            <hr>
            <thead>
                <tr>
                    <th> Lead By </th>
                    <th><i class="fa fa-user"></i> Photo</th>
                    <th> Name</th>
                    <th class="hidden-phone"><i class="fa fa-calendar"></i> Birth Date</th>
                    <th><i class="fa fa-envelope"></i> Email</th>
                    <th><i class="fa fa-phone"></i> Phone Number</th>


                </tr>
            </thead>
            <tbody>
                @foreach( $task->users as $user)
                <tr>
                    <td>
                        @if($task->user_id==$user->id) <i class="fa fa-bullhorn"></i> @endif
                    </td>
                    <td>
                        <img src="{{asset($user->image) }}" class="img-circle" width="30">
                    </td>
                    <td>
                        <a href="{{url('user/'. $user->id)}}">{{$user->firstname}} {{$user->lastname}}</a>
                    </td>
                    <td class="hidden-phone">{{$user->birthdate}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phonenumber}} </td>

                </tr>

                @endforeach

            </tbody>
        </table>
    </div>
</div>











@endsection
