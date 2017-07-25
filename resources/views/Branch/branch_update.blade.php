@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-dark">
                    <div class="panel-heading">Update Branch</div>
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
                                @foreach($branchDisplay as $object)
                                    <a href="{{ url('/view_branch') }}/{{ $object->id }}" class="btn btn-dark"><b class="glyphicon glyphicon-arrow-left"></b>&nbsp;Back</a>
                                <form method="POST" action="/updateBranch/{{ $object->id }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="branch_id">
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
                                                        <td style="font-size: 15px;">Branch Code</td>
                                                        <td style="padding: 10px;"><input type="text" name="branch_code" class="form-control" value="{{ $object->BranchCode }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 15px;">Branch Name</td>
                                                        <td style="padding: 10px;"><input type="text" name="branch_name" class="form-control" value="{{ $object->BranchName }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 15px;vertical-align:top;padding-top: 10px;">Address Line#1</td>
                                                        <td style="padding: 10px;">
                                                            <textarea class="form-control" name="address_line1" value="{{ $object->AddressLine1 }}">{{ $object->AddressLine1 }}</textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 15px;vertical-align: top;padding-top: 10px;">#2</td>
                                                        <td style="padding: 10px;">
                                                            <textarea class="form-control" name="address_line2" value="{{ $object->AddressLine2 }}">{{ $object->AddressLine2 }}</textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 15px;">Contact Person</td>
                                                        <td style="padding: 10px;"><input type="text" name="contact_person" class="form-control" value="{{ $object->ContactPerson }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 15px;">Telephone Number</td>
                                                        <td style="padding: 10px;"><input type="text" name="telephone_number" class="form-control" value="{{ $object->TelNo }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 15px;">Fax Number</td>
                                                        <td style="padding: 10px;"><input type="text" name="fax_number" class="form-control" value="{{ $object->FaxNo }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 15px;">Cellphone Number</td>
                                                        <td style="padding: 10px;"><input type="text" name="cellphone_number" class="form-control" value="{{ $object->CellNo }}"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-size: 15px;">Email Address</td>
                                                        <td style="padding: 10px;"><input type="text" name="email_address" class="form-control" value="{{ $object->Email }}"></td>
                                                    </tr>

                                                <tr>
                                                    <td>

                                                    </td>
                                                    <td style="padding: 10px;">
                                                        <button class="btn btn-success"><b class="glyphicon glyphicon-save"></b>&nbsp;Update</button>&nbsp;
                                                        <a href="{{ url('view_branch') }}/{{ $object->id }}" class="btn btn-danger" style="width: 30%;">Cancel</a>
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
