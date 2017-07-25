@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-dark">
                    <div class="panel-heading">Update Security Policy</div>
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
                                <a href="{{ url('/branch') }}" class="btn btn-dark"><b class="glyphicon glyphicon-arrow-left"></b>&nbsp;Back</a>
                                @foreach($security_data as $object)
                                        <form method="POST" action="updateSecurity/{{ $object->id }}">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div>
                                                    @if(Session::has('message'))
                                                        <div class="alert alert-success">
                                                            {{ Session::get('message') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <table>
                                                    <tr>
                                                        <td style="font-size: 15px;">Minimum Password Length</td>
                                                        <td style="padding: 10px;"><input type="text" name="minimum_password" class="form-control" value="{{ $object->passwordLength }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 15px;">Required No. of Digits in the Password</td>
                                                        <td style="padding: 10px;"><input type="text" name="number_of_digits_in_password" class="form-control" value="{{ $object->passwordDigit }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 15px;">Required No. of Special Characters in the Password</td>
                                                        <td style="padding: 10px;"><input type="text" name="number_of_special_characters" class="form-control" value="{{ $object->passwordSpecial }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 15px;">Can the password be reused?</td>
                                                        <td style="padding: 10px;">
                                                            <select name="password_reused" class="form-control">
                                                                @if($object->ispasswordreuse == 1)
                                                                    <option value="1" selected hidden>Yes</option>
                                                                    <option value="0">No</option>
                                                                @else
                                                                    <option value="1">Yes</option>
                                                                    <option value="0" selected hidden>No</option>
                                                                @endif
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 15px;">No. of Days Before a Password Expires</td>
                                                        <td style="padding: 10px;"><input type="text" name="number_of_days_password_expires" class="form-control" value="{{ $object->passwordChangeFreq }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 15px;">No. of Login Attempts</td>
                                                        <td style="padding: 10px;"><input type="text" name="login_attempts" class="form-control" value="{{ $object->loginAttempts }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 15px;">No. of Minutes Before a Session is Invalidated</td>
                                                        <td style="padding: 10px;"><input type="text" name="minutes_of_session_invalidated" class="form-control" value="{{ $object->sessionTimeout }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>

                                                        </td>
                                                        <td style="padding: 10px;">
                                                            <button class="btn btn-success"><b class="glyphicon glyphicon-save"></b>&nbsp;Update</button>&nbsp;
                                                            <a href="{{ url('branch') }}" class="btn btn-danger" style="width: 30%;">Cancel</a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
