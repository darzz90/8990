@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-dark">
                    <div class="panel-heading">
                        View User Type
                    </div>
                    <div class="panel-body">
                        <a href="{{ url('user_type') }}" class="btn btn-dark"><b class="glyphicon glyphicon-arrow-left"></b>&nbsp;Back</a>
                        <div>
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
                        </div>
                        @foreach($user_type as $object)
                            <div class="row">
                                <div class="col-md-10 col-lg-offset-1">
                                    <table>
                                        <tr>
                                            <td style="font-size: 14px;">User Type Code</td>
                                            <td style="padding: 10px;">
                                                <input type="text" name="user_type_code" class="form-control" disabled value="{{ $object->utyCode }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 14px;">User Type Description</td>
                                            <td style="padding: 10px;">
                                                <input type="text" name="user_type_description" class="form-control" disabled value="{{ ucwords($object->utyDesc) }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 14px;">Officer?</td>
                                            <td style="padding: 10px;">
                                                <input type="checkbox" name="is_officer" disabled @if($object->isOfficer == 1) checked @endif>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td style="padding: 10px;">
                                                <a href="{{ url('user_type/update') }}/{{ $object->id }}" class="btn btn-primary"><b class="glyphicon glyphicon-edit"></b>&nbsp;Edit</a>
                                                <a href="{{ url('user_type') }}" class="btn btn-danger">Back</a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
