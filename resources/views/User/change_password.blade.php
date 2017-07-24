@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-dark">
                    <div class="panel-heading">Change Password</div>
                    <div class="panel-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                            @if(Session::has('message'))
                                <div class="alert alert-danger">
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                            @if(Session::has('success-message'))
                                <div class="alert alert-dismissable alert-success">
                                    {{ Session::get('success-message') }}
                                </div>
                            @endif
                        <form class="form-horizontal" method="POST" action="changePassword">
                            {{ csrf_field() }}
                            <fieldset>
                                <legend>You are logged in as <span class="text-info">{{ ucwords(auth::user()->name) }}</span></legend>
                                <div class="form-group">
                                    <label for="inputPassword" class="col-md-3 control-label">Current Password</label>
                                    <div class="col-md-9">
                                        <input type="password" name="current_password" class="form-control" id="inputPassword" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword" class="col-md-3 control-label">New Password</label>
                                    <div class="col-md-9">
                                        <input type="password" name="new_password" class="form-control" id="inputPassword" placeholder="New Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword" class="col-md-3 control-label">Confirm Password</label>
                                    <div class="col-md-9">
                                        <input type="password" name="confirm_password" class="form-control" id="inputPassword" placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-9 col-lg-offset-3">
                                        <button type="submit" class="btn btn-dark">Change Password</button>
                                        <a href="{{ url('/') }}" class="btn btn-danger" style="width: 30%;">Cancel</a>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
