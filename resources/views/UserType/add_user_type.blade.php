@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-dark">
                    <div class="panel-heading">New User Type Entry</div>
                    <div class="panel-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                            @if(Session::has('message'))
                                <div class="alert alert-success alert-dismissable">
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                        <form class="form-horizontal" method="POST" action="addUserType">
                            {{ csrf_field() }}
                            <fieldset>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-6">
                                        <button type="submit" class="btn btn-success" style="width:30%;">Add</button>
                                        <a href="{{ url('user_type') }}" class="btn btn-danger">Cancel</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputUsername" class="col-md-3 control-label">User Type Description</label>
                                    <div class="col-md-6">
                                        <input type="text" name="user_type_description" class="form-control" id="inputGroup" placeholder="User Type Description">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <label>
                                            <input type="checkbox" name="isActive">
                                            Is Active
                                        </label>
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
