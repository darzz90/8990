@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>List of Branches</h4>
                <div class="panel panel-dark">
                    <div class="panel-heading">Branch</div>
                    <div class="panel-body">
                        <div>
                            <div class="pull-left">
                                <a href="{{ url('add_branch') }}" class="btn btn-success"><b class="glyphicon glyphicon-plus"></b>&nbsp;Add New Branch</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/') }}" class="btn btn-dark"><b class="glyphicon glyphicon-arrow-left"></b>&nbsp;Back</a>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-5" style="margin-top: 5px;">
                                        @if(Session::has('message'))
                                            <div class="alert alert-dismissible alert-success">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                {{ Session::get('message') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <table class="table table-bordered table-responsive table-striped" id="dataTable" >
                                    <thead>
                                        <tr>
                                            <td>Code</td>
                                            <td>Branch Name</td>
                                            <td>Address</td>
                                            <td>Contact</td>
                                            <td>Phone No.</td>
                                            <td>Mobile No.</td>
                                            <td>Email Address</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($branches as $object)
                                            <tr>
                                                <td>{{ $object->BranchCode }}</td>
                                                <td>{{ $object->BranchName }}</td>
                                                <td>{{ $object->AddressLine1 }}</td>
                                                <td>{{ $object->ContactPerson }}</td>
                                                <td>{{ $object->TelNo }}</td>
                                                <td>{{ $object->CellNo }}</td>
                                                <td>{{ $object->Email }}</td>
                                                <td>
                                                    <a href="{{ url('view_branch') }}/{{ $object->id }}" class="btn btn-primary"><b class="glyphicon glyphicon-eye-open"></b>&nbsp;View</a>
                                                    <a href="{{ url('branch') }}/{{ $object->id }}" class="btn btn-danger"><b class="glyphicon glyphicon-remove"></b>&nbsp;Delete</a>
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
