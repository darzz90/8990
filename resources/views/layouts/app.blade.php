<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Account Receivable</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/yeti_bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.css') }}" rel="stylesheet">
<style>
    .navbar-brand {
  padding: 0px;
}
.navbar-brand>img {
  height: 100%;
  padding: 10px;
  width: auto;
}
    .dropdown-submenu {
    position: relative;
}

.dropdown-submenu .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -1px;
}
</style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo-final.png')}}" class="pull-left">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                @if (Auth::guest())
                    @else
                    @foreach ($menus as $menu)
                    <ul class="nav navbar-nav">
                     <li class="dropdown">
                         <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{$menu->menu_name}}<span class="caret"></span></a>
                         <ul class="dropdown-menu">
                                @foreach ($subs as $sub)
                                    @if ($sub->menu_name==$menu->menu_name)
                                        @if ($sub->isNewmn == 1)
                                            <li class="dropdown-submenu">
                                                <a class="dropdown-toggle" data-toggle="dropdown" 
                                                href="{{$sub->submenu_url}}">{{$sub->submenu_name}}</a>
                                                <ul class="dropdown-menu">
                                                    @foreach($subs as $sub1)
                                                        @if($sub1->submenu_parent == $sub->submenu_id && $sub1->isNewmn_sub == 1)
                                                            <li class="dropdown-submenu">
                                                            <a class="dropdown-toggle" data-toggle="dropdown" href="{{$sub1->submenu_url}}">
                                                            {{$sub1->submenu_name}}</a>
                                                            <ul class="dropdown-menu">
                                                                @foreach($subs as $sub2)
                                                                    @if($sub2->submenu_parent == $sub1->submenu_id)
                                                                        <li><a href="{{$sub2->submenu_url}}">{{$sub2->submenu_name}}</a></li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                            </li>
                                                        @elseif($sub1->submenu_parent == $sub->submenu_id)
                                                            <li><a href="{{$sub1->submenu_url}}">{{$sub1->submenu_name}}</a></li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @elseif ($sub->submenu_parent == 0)
                                        <li><a href="{{$sub->submenu_url}}">{{$sub->submenu_name}}</a></li>
                                        @endif
                                    @endif
                                @endforeach
                        </ul>
                     </li>
                    </ul>
                    @endforeach
                @endif
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                        @else

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <span style="color:white;" class="glyphicon glyphicon-user"></span>&nbsp;
                                    Hello&nbsp;
                                    {{ ucwords(Auth::user()->fname) }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('change_password') }}"><span style="color:white;" class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Change Password</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('account') }}"><span style="color:white;" class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;My Account</a>
                                    </li>
                                    <li>
                                        <a href="#"><span style="color:white;" class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;My Branch</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <span style="color:white;" class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>  

    <footer class="container-fluid bg-4 text-center">
    <p>Account Receivable v2016.08.06</p> 
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/dataTables.js') }}"></script>
    <script>
$(document).ready(function(){
            $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
                event.preventDefault();
                event.stopPropagation();
                $(this).parent().siblings().removeClass('open');
                $(this).parent().toggleClass('open');
            });
        });
    </script>
    <script src="{{ asset('js/branch.js') }}"></script>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
</body>
</html>