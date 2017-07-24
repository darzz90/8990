@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-dark">
                    <div class="panel-heading">User Details</div>
                    <div class="panel-body">
                        <fieldset>
                            <legend>User Details</legend>
                            <table style="font-size: 16px;" class="col-md-5 col-md-offset-2">
                                @foreach($userDetails as $user)
                                <tr style="padding: 5px;">
                                    <td style="padding: 5px;">Username: </td>
                                    <td>{{ $user->username }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px;">Fullname: </td>
                                    <td>{{ $user->username }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px;">User Type: </td>
                                    <td>{{ $user->username }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 5px;">Branch: </td>
                                    <td>{{ $user->username }}</td>
                                </tr>
                                @endforeach
                            </table>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
