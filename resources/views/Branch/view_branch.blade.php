@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-dark">
                    <div class="panel-heading">View Branch</div>
                    <div class="panel-body">
                        <div class="row" style="margin-left: 20px;">
                            <div class="col-md-12">
                                <table>
                                    <tr>
                                        <td><a href="{{ url('branch') }}" class="btn btn-dark"><b class="glyphicon glyphicon-arrow-left"></b>&nbsp; Back</a></td>
                                    </tr>
                                    @foreach($getbranch as $object)
                                        <tr>
                                            <td style="font-size: 15px;">Branch Code</td>
                                            <td style="padding: 10px;"><input type="text" name="branch_code" class="form-control disabled" disabled="true" value="{{ $object->BranchCode }}"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 15px;">Branch Name</td>
                                            <td style="padding: 10px;"><input type="text" name="branch_name" class="form-control" disabled="true" value="{{ $object->BranchName }}"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 15px;vertical-align:top;padding-top: 10px;">Address Line#1</td>
                                            <td style="padding: 10px;">
                                                <textarea class="form-control" name="address_line1" disabled="true" value="{{ $object->AddressLine1 }}">{{ $object->AddressLine1 }}</textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 15px;vertical-align: top;padding-top: 10px;">#2</td>
                                            <td style="padding: 10px;">
                                                <textarea class="form-control" name="address_line2" disabled="true" value="{{ $object->AddressLine2 }}">{{ $object->AddressLine2 }}</textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 15px;">Contact Person</td>
                                            <td style="padding: 10px;"><input type="text" name="contact_person" class="form-control" disabled="true" value="{{ $object->ContactPerson }}"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 15px;">Telephone Number</td>
                                            <td style="padding: 10px;"><input type="text" name="telephone_number" class="form-control" disabled="true" value="{{ $object->TelNo }}"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 15px;">Fax Number</td>
                                            <td style="padding: 10px;"><input type="text" name="fax_number" class="form-control" disabled="true" value="{{ $object->FaxNo }}"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 15px;">Cellphone Number</td>
                                            <td style="padding: 10px;"><input type="text" name="cellphone_number" class="form-control" disabled="true" value="{{ $object->CellNo }}"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-size: 15px;">Email Address</td>
                                            <td style="padding: 10px;"><input type="text" name="email_address" class="form-control" disabled="true" value="{{ $object->Email }}"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td style="padding: 10px;">
                                                <a href="{{ url('branch/update') }}/{{ $object->id }}" class="btn btn-primary"><b class="glyphicon glyphicon-edit"></b>&nbsp;Edit</a>
                                                <a href="{{ url('branch') }}" class="btn btn-danger">Cancel</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
