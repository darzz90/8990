@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-dark">
                    <div class="panel-heading">Group</div>
                    <div class="panel-body">
                        <h4 class="pull-left"><img src=" {{asset('images/User group.png') }}"> User Type</h4>
                        <a href="{{ url('add_user_type') }}" class="btn btn-dark pull-right"><img src=" {{asset('images/13.png') }}"> Add New User Type</a>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-responsive table-striped" id="dataTable" style="border:1px solid rgba(0,0,0,0.6);">
                                    <thead>
                                        <tr>
                                            <td style="vertical-align: middle;">Type ID</td>
                                            <td style="vertical-align: middle;">User Type</td>
                                            <td>Status</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($userType as $usertype)
                                            <tr>
                                                <td>{{ $usertype->user_type_id }}</td>
                                                <td>{{ $usertype->user_type_description }}</td>
                                                <td>
                                                    @if($usertype->IsActive == 1)
                                                        <span class="label label-success">Active</span>
                                                    @else
                                                        <span class="label label-danger">Not Active</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="" class="btn btn-danger" style="padding: 3px 7px;"><span class="glyphicon glyphicon-remove"></span>&nbsp;Remove</a>
                                                    <a href="" class="btn btn-warning" style="padding: 3px 7px;width: 23%;"><span class="glyphicon glyphicon-edit"></span>&nbsp;Edit</a>
                                                    <a href="{{ url('user_rights') }}/{{ $usertype->user_type_id }}" class="btn btn-dark" style="padding: 3px 7px;width: 25%;"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Rights</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "oSearch": {"bSmart": false},
                "columnDefs": [ {
                    "targets": 0,
                    "searchable": false
                }]
            });
        });
    </script>
@endsection
