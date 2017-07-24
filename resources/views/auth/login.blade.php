@extends('layouts.app_login')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-12">
     <div class="panel panel-dark">
         <div class="panel-heading">ARA (Accounts Receivable Application)</div>
         <div class="panel-body" style="background-color:#f5f5ef;">

             <div class="col-md-8">
                <hr>
                <div class="row">
                    <div>
                        <p>
                            This Receivables System is designed specifically for the Real Estate Industry. The system's main objective is to monitor the customers' unpaid installment balances.
                        </p> </div> <!--1st part -->
                    <div>
                        <p>
                            The Receivables System is broken up into four parts. The first part provides routines to define real estate projects. Each project is broken down further as blocks and lots, wherein selling prices for each lot may be defined.
                        </p></div> <!--2nd part -->
                    <div>
                        <p>
                            An account represents the sale of a property on credit. The second part of the system provides routines to capture information on the company's customers and record the sale of the properties. Properties sold on credit are payable on installment. The system can generate the amortization schedule (wherein the interest is automatically calculated).
                        </p></div> <!--3rd part -->
                    <div>
                        <p>
                            It is the general practice of companies in the Real Estate Industry to require its customers to provide post-dated checks to cover the installments due. The system will also provide tools to record said post-dated checks. Another tool will generate the list of maturing checks for a specified period and allow the user to assign an official receipt to record the payment or record the post-dated check as a returned check. These belong to the third part of the system, which processes the payments made.
                        </p></div> <!--4th part -->
                    <div>
                        <p>
                            Finally, the system will maintain subsidiary ledgers for each and every account. These ledgers are maintained real-time, i.e., transactions are posted real-time. The schedules for Oustanding Balances and Aging of Accounts will reflect real-time balances.
                        </p></div> <!--5th part -->
                </div>
                <hr>

        </div>
        <div class="col-md-4">
                <div class="panel panel-dark">
                <div class="panel-heading">Login</div>
                <div class="panel-body">

                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="input-group">
                                    <div class="input-group-addon" style="background-color: #333333;border:1px solid #333333;"><span style="color:white;" class="glyphicon glyphicon-user"></span></div>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ old('username') }}" required autofocus>
                                </div>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="input-group">
                                    <div class="input-group-addon" style="background-color: #333333;border:1px solid #333333;"><span style="color:white;" class="glyphicon glyphicon-lock"></span></div>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="PASSWORD">
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-1">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me?
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <button type="submit" class="btn btn-dark" style="width: 77%;">
                                    Login
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                        <div class="col-md-6 col-md-offset-1">
                            <a href="{{ url('/') }}">
                                Forget password?
                            </a>
                        </div>
                        </div>
                    </form>
                </div></div>
        </div>
         </div>    
     </div>
            
            
        </div>
    </div>
</div>
@endsection
