@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-dark">
                    <div class="panel-heading">User Type</div>
                    <div class="panel-body">
                        <div class="pull-left">
                            <h4>List of User Types</h4>
                            <a href="{{ url('add_user_type') }}" class="btn btn-success">Add New User Type</a>
                            <a href="{{ url('/') }}" class="btn btn-dark">Back</a>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-responsive table-striped" id="dataTable" style="border:1px solid rgba(0,0,0,0.6);">
                                    <thead>
                                        <tr>
                                            <td style="vertical-align: middle;">Code</td>
                                            <td style="vertical-align: middle;">User Type Description</td>
                                            <td>Officer</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user_types as $object)
                                            <tr>
                                                <td>{{ $object->utyCode }}</td>
                                                <td>{{ ucwords($object->utyDesc) }}</td>
                                                <td>
                                                    @if($object->isOfficer == 1)
                                                        <input type="checkbox" name="isOfficer" disabled="true" checked>
                                                    @else
                                                        <input type="checkbox" name="isOfficer" disabled="true">
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('view_user_type') }}/{{ $object->id }}" class="btn btn-primary"><b class="glyphicon glyphicon-eye-open"></b>&nbsp;View</a>
                                                    <a href="{{ url('user_type') }}/{{ $object->id }}" class="btn btn-danger"><b class="glyphicon glyphicon-remove"></b>&nbsp;Delete</a>
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
