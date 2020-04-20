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


    {{--<div >--}}

    {{--<a href="/123456789123456789/new_point"><i  class="rounded-circle m-4 fa fa-plus-circle fa-3x shadow"></i></a>--}}

    {{--</div>--}}

    <div class="container col-7 mb-4">

        @include("items.cities")


    </div>

    <div>


    </div>
    @foreach($points as $point)
        <div class="card text-center btn btn-shadow">
            <div class="card-header">
                <h4>
                    العائلة رقم : {{$point->id}}

                </h4>
                @if(isset($_COOKIE["USER_SESSION"]))
                    @if($user_name == $point->username )

                        <a style="margin: 10px" href="/123456789123456789/edit_point/{{$point->id}}"
                           class="btn btn-shadow">
                            <svg class="bi bi-pencil" width="2em" height="2em" viewBox="0 0 16 16"
                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M11.293 1.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"
                                      clip-rule="evenodd"/>
                                <path fill-rule="evenodd"
                                      d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 00.5.5H4v.5a.5.5 0 00.5.5H5v.5a.5.5 0 00.5.5H6v-1.5a.5.5 0 00-.5-.5H5v-.5a.5.5 0 00-.5-.5H3z"
                                      clip-rule="evenodd"/>
                            </svg>
                            تعديل </a>
                        <a style="margin: 10px" href="/123456789123456789/ensure_delete/{{$point->id}}"
                           class="btn btn-secondary">
                            <svg class="bi bi-trash" width="2em" height="2em" viewBox="0 0 16 16"
                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z"/>
                                <path fill-rule="evenodd"
                                      d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"
                                      clip-rule="evenodd"/>
                            </svg>
                            حذف
                        </a>
                    @endif

                @endif

            </div>
        </div>
        <li class="list-group-item">
            <div class="container">
                <div class="row">


                    <div class="col-sm-1 ">
                        <h5 class="card-title">الاسم : {{$point->name}} </h5>

                    </div>
                    <div class="col-sm-1">

                         <h5 class="card-title">تفاصيل : {{$point->description}} </h5>


                    </div>
                    <div class="col-sm-3">
                        <h5 class="card-title">تم الوصول بواسطة: {{$point->userphone}} </h5>


                    </div>

                    <div class="col-sm">
                        @if($point->date == null)
                         <h5 class="card-title">لم يتم الكشف بعد </h5>
                        @else
                            <h5 class="card-title">  اخر وصول : {{$point->date}}</h5>
                            <h5 class="card-title">  بواسطة ({{$point->userphone}}) </h5>
                        @endif


                    </div>
   @if(isset($_COOKIE["USER_SESSION"]))
                            <h5 class="card-title">اسم المختار :{{$point->admin_name}}</h5>
                            <h5 class="card-title">رقم البطاقة التموينية :{{$point->f1}}</h5>

                            @if($point->type==1)
                                <h5 class="card-title">نوع العائلة : عامي</h5>

                            @else
                                <h5 class="card-title">نوع العائلة : سادة</h5>

                            @endif

                            <h5  class="card-title">الاحتياجات الخاصه :{{$point->f2}}</h5>
                            <h5  class="card-title">تفاصيل اخرى :{{$point->f3}}</h5>
                            <h5  class="card-title">ملاحظات اخرى :{{$point->f4}}</h5>

                       
                        @endif

                    <div class="col-sm3 align-content-center">
     <a href="tel:{{$point->t_number}}">
                                <svg class="bi bi-phone" width="1em" height="1em" viewBox="0 0 16 16"
                                     fill="currentColor"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M11 1H5a1 1 0 00-1 1v12a1 1 0 001 1h6a1 1 0 001-1V2a1 1 0 00-1-1zM5 0a2 2 0 00-2 2v12a2 2 0 002 2h6a2 2 0 002-2V2a2 2 0 00-2-2H5z"
                                          clip-rule="evenodd"/>
                                    <path fill-rule="evenodd" d="M8 14a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                                </svg> {{$point->t_number}} اتصال </a>
                            <a></a>


                        @if($point->date == null)
                            <a style="margin: 10px" href="/validate/{{$point->id}}" class="btn btn-primary">

                                <svg class="bi bi-eye" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 001.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0014.828 8a13.133 13.133 0 00-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 001.172 8z"
                                          clip-rule="evenodd"/>
                                    <path fill-rule="evenodd"
                                          d="M8 5.5a2.5 2.5 0 100 5 2.5 2.5 0 000-5zM4.5 8a3.5 3.5 0 117 0 3.5 3.5 0 01-7 0z"
                                          clip-rule="evenodd"/>
                                </svg>
                                كشف </a>
                        @endif

                        <a style="margin: 10px" href="/arrived_now/{{$point->id}}" class="btn btn-success">

                            <svg class="bi bi-check-all" width="2em" height="2em" viewBox="0 0 16 16"
                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M12.354 3.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3.5-3.5a.5.5 0 11.708-.708L5 10.293l6.646-6.647a.5.5 0 01.708 0z"
                                      clip-rule="evenodd"/>
                                <path d="M6.25 8.043l-.896-.897a.5.5 0 10-.708.708l.897.896.707-.707zm1 2.414l.896.897a.5.5 0 00.708 0l7-7a.5.5 0 00-.708-.708L8.5 10.293l-.543-.543-.707.707z"/>
                            </svg>
                            تسليم مساعدة </a>


                        {{--<div class='container d-flex justify-content-center mt-100'>--}}
                            {{--<button type="button" class="btn btn-primary mx-auto" data-toggle="modal"--}}
                                    {{--data-target="#exampleModal">--}}
                                {{--مشاركة الرابط--}}

                            {{--<svg class="bi bi-cursor" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"--}}
                                 {{--xmlns="http://www.w3.org/2000/svg">--}}
                                {{--<path fill-rule="evenodd"--}}
                                      {{--d="M14.082 2.182a.5.5 0 01.103.557L8.528 15.467a.5.5 0 01-.917-.007L5.57 10.694.803 8.652a.5.5 0 01-.006-.916l12.728-5.657a.5.5 0 01.556.103zM2.25 8.184l3.897 1.67a.5.5 0 01.262.263l1.67 3.897L12.743 3.52 2.25 8.184z"--}}
                                      {{--clip-rule="evenodd"/>--}}
                            {{--</svg> </button>--}}
                        {{--</div>--}}


                    </div>
                </div>
            </div>
        </li>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content col-12">
                    <div class="modal-header">
                        <h5 class="modal-title">شارك رابط المحتوى</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">

                        {{--<div class="smd"> <i class=" img-thumbnail fab fa-twitter fa-2x" style="color:#4c6ef5;background-color: aliceblue"></i>--}}
                        {{----}}
                        <div class="modal-footer"><label style="font-weight: 600"> نسخ الرابط <span
                                        class="message"></span></label><br/>
                            <input type="url" value="http://salat-al-khaer.turathalanbiaa.com/single/{{$point->id}}"
                                   id="myInput" aria-describedby="inputGroup-sizing-default" style="height: 40px;">
                            <button class="cpy" onclick="myFunction()"><i class="far fa-clone"></i></button>
                        </div>

                        {{--</div>--}}
                        {{--<div href="whatsapp://send?text=www.turathalanbiaa.com" data-action="share/whatsapp/share" target="_blank" onclick="window.open(this.href,'targetWindow','toolbar=no,location=0,status=no,menubar=no,scrollbars=yes,resizable=yes,width=600,height=250'); return false" class="smd"> <i class="img-thumbnail fab fa-facebook fa-2x" style="color: #3b5998;background-color: #eceff5;"></i>--}}
                        {{--<p>Facebook</p>--}}
                        {{--</div>--}}
                        {{--<div class="smd"> <i class="img-thumbnail fab fa-facebook-messenger fa-2x" style="color: #3b5998;background-color: #eceff5;"></i>--}}
                        {{--<p>Messenger</p>--}}
                        {{--</div>--}}

                        <div class="icon-container2 d-flex">
                            {{--<div class="smd"> <i class="img-thumbnail fab fa-whatsapp fa-2x" style="color: #25D366;background-color: #cef5dc;"></i>--}}
                            {{--<p>Whatsapp</p>--}}
                            {{--</div>--}}

                            {{--<div class="smd"> <i class="img-thumbnail fab fa-telegram fa-2x" style="color: #4c6ef5;background-color: aliceblue"></i>--}}
                            {{--<p>Telegram</p>--}}
                            {{--</div>--}}
                            {{--<div class="smd"> <i class="img-thumbnail fab fa-weixin fa-2x" style="color: #7bb32e;background-color: #daf1bc;"></i>--}}
                            {{--<p>WeChat</p>--}}
                            {{--</div>--}}
                        </div>
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