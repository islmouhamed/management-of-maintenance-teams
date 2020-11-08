@extends('layouts.backlayout')

@section('content')

<!--main content start-->

<!-- /row -->
<div class="container">
    <div class="col-lg-12">
        <h4><i class="fa fa-angle-right"></i> Edit Employe</h4>
        <div class="form-panel">
            <div class="form">
                <form class="cmxform form-horizontal style-form" files="true" id="signupForm" method="POST"
                    action="{{url('/user/'. $user->id)}}" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="form-group ">
                        <label for="username" class="control-label col-lg-2">First Name</label>
                        <div class="col-lg-10">
                            <input class="form-control " id="fname" name="fname" type="text"
                                value=" {{$user->firstname}}" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="username" class="control-label col-lg-2">Last Name</label>
                        <div class="col-lg-10">
                            <input class="form-control " id="lname" name="lname" type="text"
                                value="{{$user->lastname}}" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="username" class="control-label col-lg-2">Date Of Birth</label>
                        <div class="col-lg-10">
                            <input class="form-control " id="db" name="db" type="text" value="{{$user->birthdate}}" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="email" class="control-label col-lg-2">Email</label>
                        <div class="col-lg-10">
                            <input class="form-control " id="email" name="email" type="email"
                                value="{{$user->email}}" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="phonenumber" class="control-label col-lg-2">Phone Number</label>
                        <div class="col-lg-10">
                            <input class="form-control " id="phonenumber" name="phonenumber" type="phonenumber "
                                pattern="0[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}" value="{{$user->phonenumber}}" />
                        </div>
                    </div>
                    <div class=" form-group ">
                        <label for=" password" class="control-label col-lg-2">Password</label>
                        <div class="col-lg-10">
                            <input class="form-control " id="password" name="password" type="password" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="confirm_password" class="control-label col-lg-2">Confirm Password</label>
                        <div class="col-lg-10">
                            <input class="form-control " id="confirm_password" name="confirm_password"
                                type="password" />
                        </div>
                    </div>
                    @if(Auth::user()->role==0)
                    <div class="form-group ">
                        <label for="role" class="control-label col-lg-2">Role</label>
                        <div class="col-lg-10">

                            <select class="js-example-basic-single form-control" name="role">

                                <option value="0" @if($user->role==0) selected @endif > Administrator
                                </option>
                                <option value="1" @if($user->role==1) selected @endif > Emplyee
                                </option>


                            </select>
                        </div>
                        <br>


                    </div>
                    @endif
                    <div class="form-group last">
                        <label class="control-label col-md-3">Image Upload</label>
                        <div class="col-md-9">

                            <input type="file" id="file" name="file" class="default" />

                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-theme" type="submit">Update</button>
                            <a href="{{url('/user/index')}}" class="btn btn-theme04"> Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /form-panel -->
    </div>
    <!-- /col-lg-12 -->
</div>
<!-- /row -->


<!-- /wrapper -->

<!-- /MAIN

CONTENT -->

@endsection
