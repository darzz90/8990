@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-dark">
                    <div class="panel-heading">New User Entry</div>
                    <div class="panel-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                        <form class="form-horizontal" method="POST" action="addUser">
                            {{ csrf_field() }}
                            <fieldset>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-6">
                                        <button type="submit" class="btn btn-success" style="width:30%;">
                                            <span class="glyphicon glyphicon-check"></span>
                                            Add
                                        </button>
                                        <a href="{{ url('user') }}" class="btn btn-danger">Cancel</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputUsername" class="col-md-3 control-label">Username</label>
                                    <div class="col-md-6">
                                        @if(Session::has('error-message'))
                                            <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Username" value="{{ Session::get('username') }}">
                                        @else
                                            <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Username">
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="New Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword" class="col-md-3 control-label">Confirm Password</label>
                                    <div class="col-md-6">
                                        <input type="password" name="confirm_password" class="form-control" id="inputPassword" placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputFullname" class="col-md-3 control-label">Full Name</label>
                                    <div class="col-md-8">
                                        @if(Session::has('error-message'))
                                            <input type="text" name="full_name" class="form-control" id="inputFullname" placeholder="Full Name" value="{{ Session::get('fullname') }}">
                                        @else
                                            <input type="text" name="full_name" class="form-control" id="inputFullname" placeholder="Full Name">
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputUserType" class="col-md-3 control-label">User Type</label>
                                    <div class="col-md-5">
                                        <select name="user_type" class="form-control" style="outline: none;" id="inputUserType">
                                            <option selected hidden>Choose User Type</option>
                                            @foreach($user_type as $userType)
                                                <option value="{{ $userType->user_type_id }}">{{ $userType->user_type_description }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputUserType" class="col-md-3 control-label">Branch</label>
                                    <div class="col-md-5">
                                        <select name="user_branch" class="form-control" style="outline: none;" id="inputUserType">
                                            <option selected hidden>Choose Branch</option>
                                            @foreach($branches as $branch_list)
                                                <option value="{{ $branch_list->branch_code }}">{{ ucwords($branch_list->branch_city) }} - {{ ucwords($branch_list->branch_province) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-5 col-md-offset-3">
                                        <label>
                                            <input type="checkbox" name="checkbox_active"> &nbsp; Is Active?
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                            @if(Session::has('message'))
                                <div class="alert alert-success">{{ Session::get('message') }}</div>
                            @endif
                            @if(Session::has('error-message'))
                                <div class="alert alert-danger">{{ Session::get('username') }}{{ Session::get('error-message') }}</div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
