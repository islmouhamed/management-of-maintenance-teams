@extends('layouts.backlayout')

@section('content')
<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel">
            <table class="display table table-advance table-hover">
                <h4><i class="fa fa-users"></i> List of employes </h4>
                <hr>
                <thead>
                    <tr>
                        <th><i class="fa fa-user"></i> Photo</th>
                        <th> Name</th>

                        <th class="hidden-phone"><i class="fa fa-calendar"></i> Birth Date</th>
                        <th class="hidden-phone"><i class="fa fa-envelope"></i> Email</th>

                        <th class="hidden-phone"><i class="fa fa-phone"></i> Phone Number</th>
                        <th><i class=" fa fa-check-circle"></i> Status</th>

                        <th> <i class=" fa fa-question-circle"></i> Actions </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach( $users as $user)
                    <tr>
                        <td>
                            <img src="{{asset($user->image) }}" class="img-circle" width="40">
                        </td>
                        <td>
                            <a href="{{url('user/'. $user->id)}}">{{$user->firstname}} {{$user->lastname}}</a>
                        </td>
                        <td class="hidden-phone">{{$user->birthdate}}</td>
                        <td class="hidden-phone">{{$user->email}}</td>
                        <td class="hidden-phone">{{$user->phonenumber}}</td>

                        <td>@if($user->avaible=='0')
                            <span class="label label-danger label-mini"> Not Available</span>
                            @elseif($user->avaible=='1')
                            <span class="label label-success label-mini"> Available</span> @endif
                        </td>
                        <td>

                            <form action="{{url('/user/'. $user->id)}}" method="post">

                                <a href="{{url('user/'. $user->id)}}" class="btn btn-default btn-xs"><i
                                        class="fa fa-eye"></i> </a>

                                @if(Auth::user()->role=="0" || Auth::user()->id==$user->id)
                                <a href="{{url('user/'. $user->id .'/edit')}}" class="btn btn-primary btn-xs"><i
                                        class="fa fa-pencil"></i> </a>
                                @endif
                                @if(Auth::user()->role=="0" && $user->role!=0)
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger btn-xs"><i
                                        class="fa fa-trash-o "></i></button>
                                @endif
                            </form>


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