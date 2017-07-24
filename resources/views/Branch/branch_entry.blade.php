@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-dark">
                    <div class="panel-heading">Branch Entry</div>
                    <div class="panel-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                        <div class="row" style="margin-left: 20px;">
                            <div class="col-md-12">
                                <form method="POST" action="addBranch">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-7 col-md-offset-3">
                                            <div class="pull-right">
                                                <button class="btn btn-success">Add Branch</button>
                                                <a href="{{ url('branch') }}" class="btn btn-danger">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-5" style="margin-top: 30px;">
                                                <label><span style="font-size: 17px;">Branch Code</span></label>
                                                <input type="text" class="form-control" name="branch_code" id="branch_code">
                                            </div>
                                        </div>
                                        <div class="form-group" >
                                            <div class="col-md-8" style="margin-top: 20px;">
                                                <label><span style="font-size: 17px;">Branch Address</span></label>
                                                <input type="text" class="form-control" name="branch_address" placeholder="Branch Address">
                                            </div>
                                        </div>
                                        <div class="form-group" >
                                            <div class="col-md-8" style="margin-top: 20px;">
                                                <label><span style="font-size: 17px;">Branch Province</span></label>
                                                <input type="text" class="form-control" name="branch_province" placeholder="Branch Province">
                                            </div>
                                        </div>
                                        <div class="form-group" >
                                            <div class="col-md-8" style="margin-top: 20px;">
                                                <label><span style="font-size: 17px;">Branch City</span></label>
                                                <input type="text" class="form-control" name="branch_city" placeholder="Branch City">
                                            </div>
                                        </div>
                                    </div>
                                    @if(Session::has('message'))
                                        <div class="alert alert-success"> {{ Session::get('message') }}</div>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
