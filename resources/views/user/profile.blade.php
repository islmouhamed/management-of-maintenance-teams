@extends('layouts.backlayout')

@section('content')


<div class="col-lg-12">
    <div class="row content-panel">

        <div class="col-md-4 centered profile-pic right-divider ">
            <hr style="width:50%;">
            <div class="">
                <div class="profile-pic ">
                    <p><img src="{{asset(Auth::user()->image) }}" class="img-circle" style="
                     @if($user->avaible=='0')
                            background-color:red;
                                @elseif($user->avaible=='1')
                                background-color:green; @endif
                                border:0px; padding:5px  ">
                    </p>

                    <h1>{{$user->firstname}} {{$user->lastname}}</h1>
                    <h5>{{$user->getRole()}}</h5>
                    <hr style="width:50%;">
                    <b>
                        <h2>
                            <div class="row">
                                <label style="text-align:center;">
                                    <h4><i class="fa fa-calendar"> </i> Birth Date : </h4>
                                </label>
                                {{$user->birthdate}}
                            </div>

                        </h2>
                    </b>
                    <b>
                        <h2>
                            <div class="row">
                                <label style="text-align:center;">
                                    <h4><i class="fa fa-user"> </i> E-mail : </h4>
                                </label>
                                {{$user->email}}
                            </div>

                        </h2>
                    </b>

                    <b>
                        <h2>
                            <div class="row">
                                <label style="text-align:center;">
                                    <h4><i class="fa fa-phone"> </i> Phone Numbers : </h4>
                                </label>
                                {{$user->phonenumber}}
                            </div>

                        </h2>
                    </b>

                    <b>
                        <h2>
                            <div class="row">
                                <!-- @if($user->avaible=='0')
                                <span class="label label-danger label-mini"> Not Available</span>
                                @elseif($user->avaible=='1')
                                <span class="label label-success label-mini"> Available</span> @endif

-->
                                <a href="{{url('user/'. $user->id .'/edit')}}" class="btn btn-primary btn-xs">
                                    <h4>Edit profile
                                        <i class="fa fa-pencil"></i>
                                    </h4>
                                </a>
                            </div>
                        </h2>
                    </b>
                </div>

            </div>
        </div>
        <!-- /col-md-4 -->
        <hr style="width:50%;">
        <!-- /col-md-4 -->
        <div class="col-md-8 ">




            <ul>


                <li>
                    <p class="green">
                        <h3> {{$user->firstname}} {{$user->lastname}} participated in {{$user->tasks()->count()}} tasks
                        </h3>

                    </p>
                </li>
                <br> <br>
                <li>
                    <a href="#">
                        <div class="task-info">
                            <div class="desc">
                                <h4> Completed Tasks :
                                    {{$user->finished_tasks->count()}} /
                                    {{$user->all_finished_tasks()->count()}} finished tasks </h4>
                            </div>
                            <div class="percent">
                                <h4> @if($user->all_finished_tasks()->count()==0) {{$finish=0}}
                                    @else
                                    {{$finish=round($user->finished_tasks->count()/$user->all_finished_tasks()->count()*100)}}
                                    @endif % </h4>
                            </div>
                        </div>
                        <div class="progress progress-striped">
                            <div class="progress-bar progress-bar-success" role="progressbar"
                                aria-valuenow="{{$finish}}" aria-valuemin="0" aria-valuemax="100"
                                style="width: {{$finish}}%">
                                <span class="sr-only"> {{$finish}}%
                                    Complete (success) </span>
                            </div>
                        </div>
                    </a>
                </li>
                <br> <br>
                <li>
                    <a href="#">
                        <div class="task-info">
                            <div class="desc">
                                <h4> Completed tasks : {{$user->finished_tasks->count()}} /
                                    {{$user->all_tasks()->count()}}
                                    Tasks </h4>
                            </div>
                            <div class="percent">
                                <h4> {{$allfinished=round($user->finished_tasks->count()/$user->all_tasks()->count()*100)}}
                                    % </h4>
                            </div>
                        </div>
                        <div class="progress progress-striped">
                            <div class="progress-bar progress-bar-warning" role="progressbar"
                                aria-valuenow="{{$allfinished}}" aria-valuemin="0" aria-valuemax="100"
                                style="width: {{$allfinished}}%">
                                <span class="sr-only">{{$allfinished}}% Complete (warning)</span>
                            </div>
                        </div>
                    </a>
                </li>

            </ul>

        </div>

        <!-- /col-md-4 -->
    </div>
    <!-- /row -->
</div>
<!-- /col-lg-12 -->
<hr style="width:70%;">
<!-- /row -->

<!-- /container -->
<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel">
            <table class="table  table-advance table-hover">
                <h4><i class="fa fa-tasks"></i> List of tasks </h4>
                <hr>
                <thead>
                    <tr>
                        <th> Lead By </th>
                        <th>Name</th>
                        <th class="hidden-phone"><i class="fa fa-question-circle"></i> Email</th>
                        <th class="hidden-phone"><i class="fa fa-bookmark"></i> Phone Number</th>
                        <th><i class=" fa fa-edit"></i> Adresse</th>
                        <th><i class=" fa fa-edit"></i> Subject</th>
                        <th class="hidden-phone"><i class=" fa fa-date"></i> Report Date
                        </th>
                        <th><i class=" fa fa-edit"></i> start of intervention
                        </th>
                        <th><i class=" fa fa-edit"></i> end of intervention
                        </th>


                        <th> Action </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $user->tasks as $task)
                    <tr bgcolor="@if(isset($task->end_time)) lightgreen @elseif(isset($task->start_time)) orange @else pink  @endif

                       ">
                        <td>
                            @if($task->user_id==$user->id) <i class="fa fa-bullhorn"></i> @endif
                        </td>
                        <td>
                            {{$task->client}}
                        </td>
                        <td class=" hidden-phone">{{$task->email}}</td>
                        <td class="hidden-phone">{{$task->phonenumber}} </td>
                        <td>{{$task->adresse}} </td>
                        <td>{{$task->product}} </td>
                        <td class="hidden-phone">{{$task->created_at}} </td>
                        <td>{{$task->start_time}} </td>
                        <td>{{$task->end_time}} </td>




                        <td>
                            <a href="{{url('task/'.$task->id.'/profil')}}" class="btn btn-default btn-xs"><i
                                    class="fa fa-eye"></i>
                            </a>




                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- /content-panel -->
    </div>
    <!-- /col-md-12 -->
</div>

<!-- /wrapp
er -->











@endsection