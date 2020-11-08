@extends('layouts.backlayout')

@section('content')
<h3><i class=" fa fa-tasks"></i> Your Tasks</h3>
<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel">
            <table class="table   table-advance table-hover">

                <hr>
                <thead>
                    <tr>
                        <th><i class="fa fa-bullhorn"></i> Name</th>
                        <th class="hidden-phone"><i class="fa fa-envelope"></i> Email</th>
                        <th class="hidden-phone"><i class="fa fa-phone"></i> Phone Number</th>
                        <th class="hidden-phone"><i class=" fa fa-anchor"></i> Adresse</th>
                        <th><i class=" fa fa-question-circle"></i> Subject</th>
                        <th class="hidden-phone"><i class=" fa fa-clock-o"></i> Report Date
                        </th>
                        <th><i class=" fa fa-clock-o"></i> start of intervention
                        </th>
                        <th><i class=" fa fa-check-circle"></i> end of intervention
                        </th>


                        <th> Actions </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $user->tasks as $task)
                    <tr bgcolor="@if(isset($task->end_time)) lightgreen @elseif(isset($task->start_time)) orange @else pink  @endif

                       ">
                        <td>
                            {{$task->client}}
                        </td>
                        <td class=" hidden-phone">{{$task->email}}</td>
                        <td class="hidden-phone">{{$task->phonenumber}} </td>
                        <td class="hidden-phone">{{$task->adresse}} </td>
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






@endsection
