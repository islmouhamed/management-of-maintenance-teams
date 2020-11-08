@extends('layouts.backlayout')

@section('content')

<h3><i class="fa fa-tasks"></i> Task Details </h3>
<!-- BASIC FORM ELELEMNTS -->

<div class="row content-panel">


    <div class="col-md-4 right-divider  mt mb centered">
        <hr style="width:50%;">
        <div>
            <b>
                <h1>{{$task->client}} </h1>
                <hr style=" width:50%;">
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
        <b>
            <hr style="width:50%;">
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
                    @elseif($task->user_id==Auth::user()->id)
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <a href="{{url('task/'.$task->id.'/finish')}}" class="btn btn-success" onclick="event.preventDefault();
                                                     document.getElementById('finish-form').submit();">
                                Finish Task</a>



                            <form id="finish-form" action="{{url('task/'.$task->id.'/finish')}}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                    @else
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

<h3><i class="fa fa-users"></i> Apointed Employees </h3>
<div class="row content-panel">
    <div class="col-lg-12">
        <table class="table table-striped table-advance table-hover">

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
