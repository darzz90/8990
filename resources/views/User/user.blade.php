@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-dark">
                    <div class="panel-heading">Users</div>
                    <div class="panel-body">
                        <h4 class="pull-left"><span class="glyphicon glyphicon-user">Users</span></h4>
                        <div class="pull-right">
                            <a href="{{ url('add_user') }}" class="btn btn-dark"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add New User</a>
                            <a href="#" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-sm"><span class="glyphicon glyphicon-upload"></span>&nbsp;Upload Users</a>
                        </div>
                        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h5 class="modal-title" id="myModalLabel">Modal title</h5>
                                        </div>
                                        <div class="modal-body">
                                            Upload CSV File:
                                            <input type="file" name="csv_file" style="margin-top: 10px;">
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-responsive table-striped" id="dataTable" style="border:1px solid rgba(0,0,0,0.6);">
                                    <thead>
                                    <tr>
                                        <td style="vertical-align: middle;">Username</td>
                                        <td style="vertical-align: middle;">User Type</td>
                                        <td>Status</td>
                                        <td>Action</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $object)
                                            <tr>
                                                <td>{{ $object->username }}</td>
                                                <td>System Admin</td>
                                                <td>
                                                    @if($object->IsActive)
                                                        <span class="text-info text-success">Active</span>
                                                    @else
                                                        <span class="text-info text-danger">Not Active</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="" class="btn btn-danger" style="padding: 3px 7px;"><span class="glyphicon glyphicon-remove"></span>&nbsp;Remove</a>
                                                    <a href="" class="btn btn-warning" style="padding: 3px 7px;width: 23%;"><span class="glyphicon glyphicon-edit"></span>&nbsp;Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td>eduardo</td>
                                            <td>System Admin</td>
                                            <td><span class="text-info text-success">Active</span></td>
                                            <td>
                                                <a href="" class="btn btn-danger" style="padding: 3px 7px;"><span class="glyphicon glyphicon-remove"></span>&nbsp;Remove</a>
                                                <a href="" class="btn btn-warning" style="padding: 3px 7px;width: 23%;"><span class="glyphicon glyphicon-edit"></span>&nbsp;Edit</a>
                                            </td>
                                        </tr>
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
