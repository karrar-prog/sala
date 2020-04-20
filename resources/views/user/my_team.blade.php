@extends("layout.flat_layout")

@section("content")


    @if(session('message'))
        <div class="col">
        </div>
        <div class="col">
            <div class="alert alert-success w-100" role="alert">
                {{session('message')}}
            </div>

        </div>
        <div class="col">
        </div>
    @endif



    <div class="container col-7 mb-4">

        <div class="alert alert-dark w-100" role="alert">
            {{$name}}
        </div>


    </div>

    <div>


    </div>
    @foreach($users as $user)
        <div class="card text-center btn btn-shadow" style="margin: 20px">


                <div class="container">
                    <div class="row">


                        <div class="alert alert-success w-100" role="alert">
                            {{$user->his_name}}
                        </div>

                        <div class="alert alert-success w-100" role="alert">

                            {{$user->username}}
                        </div>
                        @if($user->username == $username )
                            <form class="col-12 col-sm-6 bg-white text-center border shadow-sm p-5"
                                  action="/change_name" method="post">

                                تعديل االاسم
                                @if(count($errors))
                                    <div class="alert alert-danger text-right">
                                        <ul class="pr-3 mb-0">
                                            @foreach($errors->all() as $error)
                                                <li class="my-1">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if(session("ErrorRegisterMessage"))
                                    <div class="alert alert-danger text-center">{{session("ErrorRegisterMessage")}}</div>
                                @endif

                                {{ csrf_field() }}
                                <div class="col-sm3 align-content-center">
                                </div>

                                <input type="text" value="{{$user->his_name}}" name="his_name" class="form-control mb-4"
                                       placeholder="ادخل اسم المتطوع واضغط حفظ">


                                <button class="btn btn-vg-light btn-block my-4" type="submit">حفظ الاسم</button>
                                <input type="text" value="{{$user->id}}" style="visibility: hidden" name="id"
                                       class="form-control mb-4" placeholder="ادخل اسم المتطوع واضغط حفظ">


                            </form>

                        @endif


                        <div class="col-sm3 align-content-center">


                            {{--<a style="margin: 10px" href="/user_activity/{{$user->id}}" class="btn btn-primary">--}}

                                {{--<svg class="bi bi-eye" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor"--}}
                                     {{--xmlns="http://www.w3.org/2000/svg">--}}
                                    {{--<path fill-rule="evenodd"--}}
                                          {{--d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 001.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0014.828 8a13.133 13.133 0 00-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 001.172 8z"--}}
                                          {{--clip-rule="evenodd"/>--}}
                                    {{--<path fill-rule="evenodd"--}}
                                          {{--d="M8 5.5a2.5 2.5 0 100 5 2.5 2.5 0 000-5zM4.5 8a3.5 3.5 0 117 0 3.5 3.5 0 01-7 0z"--}}
                                          {{--clip-rule="evenodd"/>--}}
                                {{--</svg>--}}

                                {{--مشاهدة النشاط--}}
                            {{--</a>--}}


                        </div>
                    </div>
                </div>

        </div>

    @endforeach


    <style>
        body {
            background-color: #f5f5f5
        }

        .mt-100 {
            margin-top: 100px
        }

        .modal {
            background-image: linear-gradient(rgb(35, 79, 71) 0%, rgb(36, 121, 106) 100.2%)
        }

        .modal-title {
            font-weight: 900
        }

        .modal-content {
            border-radius: 13px
        }

        .modal-body {
            color: #3b3b3b
        }

        .img-thumbnail {
            border-radius: 33px;
            width: 61px;
            height: 61px
        }

        .fab:before {
            position: relative;
            top: 13px
        }

        .smd {
            width: 200px;
            font-size: small;
            text-align: center
        }

        .modal-footer {
            display: block
        }

        .ur {
            border: none;
            background-color: #e6e2e2;
            border-bottom-left-radius: 4px;
            border-top-left-radius: 4px
        }

        .cpy {
            border: none;
            background-color: #e6e2e2;
            border-bottom-right-radius: 4px;
            border-top-right-radius: 4px;
            cursor: pointer
        }

        button.focus,
        button:focus {
            outline: 0;
            box-shadow: none !important
        }

        .ur.focus,
        .ur:focus {
            outline: 0;
            box-shadow: none !important
        }

        .message {
            font-size: 11px;
            color: #ee5535
        }
    </style>
    <script>
        function myFunction() {

            $(".message").text("تم نسخ الرابط");
        }
    </script>

@endsection