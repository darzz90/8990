@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-dark">
                    <div class="panel-heading">Branch</div>

                    <div class="panel-body">
                        <div>
                            <div class="pull-left"><h4><span class="glyphicon glyphicon-list-alt"></span>&nbsp;Branch List</h4></div>
                            <div class="pull-right">
                                <a href="add_branch" class="btn btn-dark">Add New Branch</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-responsive table-striped" id="dataTable" >
                                    <thead>
                                        <tr>
                                            <td>Branch Code</td>
                                            <td>Branch Address</td>
                                            <td>Branch City</td>
                                            <td>Branch Province</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($branches as $object)
                                            <tr>
                                                <td>{{ $object->branch_code }}</td>
                                                <td>{{ $object->branch_address }}</td>
                                                <td>{{ $object->branch_city }}</td>
                                                <td>{{ $object->branch_province }}</td>
                                                <td>
                                                    <a href="" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>&nbsp;Remove</a>
                                                    <a href="" class="btn btn-warning" style="width: 38%;"><span class="glyphicon glyphicon-edit"></span>&nbsp;Edit</a>
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
