@extends('layouts.backlayout')

@section('content')

<!--main content start-->

<!-- /row -->
<div class="container">
    <div class="col-lg-12">
        <h4><i class="fa fa-angle-right"></i> Add Employe</h4>
        <div class="form-panel">
            <div class="form">
                <form class="cmxform form-horizontal style-form" id="signupForm" method="POST" action="store">

                    {{ csrf_field() }}

                    <div class="form-group ">
                        <label for="firstname" class="control-label col-lg-2">First Name</label>
                        <div class="col-lg-10">
                            <input class="form-control " id="fname" name="fname" type="text" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="lastname" class="control-label col-lg-2">Last Name</label>

                        <div class="col-lg-10">
                            <input class="form-control " id="lname" name="lname" type="text" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="username" class="control-label col-lg-2">Date Of Birth</label>
                        <div class="col-lg-10">
                            <input class="form-control " placeholder="dd/mm/yyyy" id="db" name="db" type="text" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="email" class="control-label col-lg-2">Email</label>
                        <div class="col-lg-10">
                            <input class="form-control " id="email" name="email" type="email" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="phonenumber" class="control-label col-lg-2">Phone Number</label>
                        <div class="col-lg-10">
                            <input class="form-control " placeholder="NNNNNNNNN" id="phonenumber" name="phonenumber"
                                type="phonenumber" pattern="0[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}" />
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="password" class="control-label col-lg-2">Password</label>
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

                    <div class="form-group ">
                        <label for="role" class="control-label col-lg-2">Role</label>
                        <div class="col-lg-10">

                            <select class="js-example-basic-single form-control" name="role">

                                <option value="0"> Administrator
                                </option>
                                <option value="1" selected> Emplyee
                                </option>


                            </select>
                        </div>
                        <br>

                    </div>

                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-theme" type="submit">Save</button>
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

<!-- /MAIN CONTENT -->
@endsection