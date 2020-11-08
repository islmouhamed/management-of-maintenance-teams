@extends('layouts.backlayout')

@section('content')
<h3><i class=" fa fa-tasks"></i> Tasks </h3>
<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel">
            <table class="table table-advance table-hover">

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
                    @foreach( $tasks as $task)
                    <tr bgcolor="@if(isset($task->end_time)) lightgreen @elseif(isset($task->start_time))   #ff9933 @else pink  @endif

">
                        <td>
                            {{$task->client}}
                        </td>
                        <td class="hidden-phone">{{$task->email}}</td>
                        <td class="hidden-phone">{{$task->phonenumber}} </td>
                        <td class="hidden-phone">{{$task->adresse}} </td>
                        <td>{{$task->product}} </td>
                        <td class="hidden-phone">{{$task->created_at}} </td>
                        <td>{{$task->start_time}} </td>
                        <td>{{$task->end_time}} </td>


                        <td>

                            @if(Auth::user()->role=="0")

                            <form action="{{url('/task/'. $task->id)}}" method="post">


                                <a href="{{url('task/'.$task->id.'/charge')}}" class="btn btn-default btn-xs"><i
                                        class="fa fa-eye"></i>
                                </a>

                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash-o "></i></button>
                            </form>
                            @endif

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