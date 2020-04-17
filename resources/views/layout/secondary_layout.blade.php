<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="csrf-token" content="{{csrf_token()}}">

    <title>{{trans("words.app_name")}}</title>

    <!-- StyleSheet -->
    <link href="{{asset("css/app.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css/time-line.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css/style.css")}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <!-- Script -->
    <script src="{{asset("js/jquery-3.3.1.min.js")}}"></script>
    <script src="{{asset("js/app.js")}}"></script>

    @include("layout.body_direction")
</head>
<body>
    {{--Navbar Fixed Top--}}
    <nav class="navbar fixed-top navbar-dark bg-vg-dark">
        <div class="container px-0">
            <a href="javascript:void(0);" class="navbar-brand mr-0">
                {{trans("words.app_name")}}
            </a>

            <div class="d-flex flex-row justify-content-end w-25" style="margin: 0 -4px;">
                {{--<a class="btn btn-sm btn-dark shadow-sm mx-1 mx-sm-2" data-toggle="modal" data-target="#select-language-modal">--}}
                    {{--<i class="fa fa-globe fa-special text-white align-middle"></i>--}}
                {{--</a>--}}
                <a class="btn btn-sm btn-dark shadow-sm mx-1 mx-sm-2" href="/">
                    الرئيسية  <i class="fa fa-undo-alt text-white align-middle"></i>
                </a>
                @if(isset($_COOKIE["USER_SESSION"]))
                    <a class="btn btn-sm btn-dark shadow-sm mx-1 mx-sm-2" href="/logout">
                      تسجيل خروج  <i class="fa fa-sign-out-alt fa-special text-white align-middle"></i>
                    </a>
                @else
                    <a class="btn btn-success shadow-sm mx-1 mx-sm-2" href="/login">
                     تسجيل دخول   <i class="fa fa-sign-in-alt fa-special text-white align-middle"></i>
                    </a>
                @endif
            </div>
        </div>
    </nav>

    {{--Content--}}
    <div style="margin-top: 55px;">
        @yield("content")
    </div>

    {{--Menu Modal--}}
    @include("layout.menu")

    {{--Extra Content--}}
    @yield("extra-content")

    {{--Script--}}
    @yield("script")
</body>
</html>
