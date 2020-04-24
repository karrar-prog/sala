@extends("layout.secondary_layout")

<style>
    .jjj {
    }
</style>

@section('content')


    @if(isset($_COOKIE["USER_SESSION"]))
        <div class="card text-center">
            <div class="card-header">
              
             <h5 class="card-title"><h5 class="card-title"></h5>

                 {{$his_name}}
                </h5>
             <h5 class="card-title"><h5 class="card-title"></h5>

                 {{$phone}}
                </h5>


            </div>


            <h5 class="card-title">

                <div class="card-body">

                    <a href="/register" style="width: 230px;" class="btn btn-shadow">
                        <svg class="bi bi-person-plus" width="2em" height="2em" viewBox="0 0 16 16"
                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M11 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM1.022 13h9.956a.274.274 0 00.014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 00.022.004zm9.974.056v-.002.002zM6 7a2 2 0 100-4 2 2 0 000 4zm3-2a3 3 0 11-6 0 3 3 0 016 0zm4.5 0a.5.5 0 01.5.5v2a.5.5 0 01-.5.5h-2a.5.5 0 010-1H13V5.5a.5.5 0 01.5-.5z"
                                  clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M13 7.5a.5.5 0 01.5-.5h2a.5.5 0 010 1H14v1.5a.5.5 0 01-1 0v-2z"
                                  clip-rule="evenodd"/>
                        </svg>
                        اضافة متطوع لفريقك
                    </a>
                </div>
                <div class="card-body">

                    <a href="my_team" style="width: 230px;" class="btn btn-shadow">
                        <svg class="bi bi-person-lines-fill" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 100-6 3 3 0 000 6zm7 1.5a.5.5 0 01.5-.5h2a.5.5 0 010 1h-2a.5.5 0 01-.5-.5zm-2-3a.5.5 0 01.5-.5h4a.5.5 0 010 1h-4a.5.5 0 01-.5-.5zm0-3a.5.5 0 01.5-.5h4a.5.5 0 010 1h-4a.5.5 0 01-.5-.5zm2 9a.5.5 0 01.5-.5h2a.5.5 0 010 1h-2a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
                        </svg>
                        قائمة المتطوعين
                    </a>
                </div>
                <div class="card-body">

                    <a href="my_family" style="width: 230px;" class="btn btn-shadow">
                        <svg class="bi bi-list-task" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M2 2.5a.5.5 0 00-.5.5v1a.5.5 0 00.5.5h1a.5.5 0 00.5-.5V3a.5.5 0 00-.5-.5H2zM3 3H2v1h1V3z"
                                  clip-rule="evenodd"/>
                            <path d="M5 3.5a.5.5 0 01.5-.5h9a.5.5 0 010 1h-9a.5.5 0 01-.5-.5zM5.5 7a.5.5 0 000 1h9a.5.5 0 000-1h-9zm0 4a.5.5 0 000 1h9a.5.5 0 000-1h-9z"/>
                            <path fill-rule="evenodd"
                                  d="M1.5 7a.5.5 0 01.5-.5h1a.5.5 0 01.5.5v1a.5.5 0 01-.5.5H2a.5.5 0 01-.5-.5V7zM2 7h1v1H2V7zm0 3.5a.5.5 0 00-.5.5v1a.5.5 0 00.5.5h1a.5.5 0 00.5-.5v-1a.5.5 0 00-.5-.5H2zm1 .5H2v1h1v-1z"
                                  clip-rule="evenodd"/>
                        </svg>
                        عائلاتي
                    </a>
                </div>
                <div class="card-body">

                    {{--<p class="card-text">{{$user_name}}</p>--}}
                    <a style="width: 230px;" href="/new_family" class="btn btn-shadow">
                        <svg class="bi bi-geo-alt" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M8 16s6-5.686 6-10A6 6 0 002 6c0 4.314 6 10 6 10zm0-7a3 3 0 100-6 3 3 0 000 6z"
                                  clip-rule="evenodd"/>
                        </svg>
                        اضافة عائلة جديدة</a>
                </div>

                @else
                    <div id="my_id" class="alert alert-success animated shake " role="alert">
                        مشروع سلة الخير هو مشروع خيري وغير ربحي ، يهدف لمساعدة العوائل المتضررة و المتعففة عن طريق تثبيت
                        اماكن معيشتهم ليتسنى للفرق المساعدة وميسوري الحال للتواصل معهم وتقديم يد العون لهم
                        <a href="/register">
                            انا صاحب حملة
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">هل انت من العوائل المتعففه , تعرف عائلة متعففة</h5>
                        <p class="card-text">سوف تصل اليك فرق الخير للتوثيق والمساعدة                            <a href="/new_family" class="btn btn-primary">
                                <svg class="bi bi-check-circle" width="1em" height="1em" viewBox="0 0 16 16"
                                     fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M15.354 2.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3-3a.5.5 0 11.708-.708L8 9.293l6.646-6.647a.5.5 0 01.708 0z"
                                          clip-rule="evenodd"/>
                                    <path fill-rule="evenodd"
                                          d="M8 2.5A5.5 5.5 0 1013.5 8a.5.5 0 011 0 6.5 6.5 0 11-3.25-5.63.5.5 0 11-.5.865A5.472 5.472 0 008 2.5z"
                                          clip-rule="evenodd"/>
                                </svg>
                                اضغط هنا</a>
                        </p>

                    </div>


                @endif
                @if(session('message'))

                    <div class="alert alert-primary  animated shake" role="alert">
                        <h4>{{session('message')}}</h4>
                    </div>
                @endif
                <div class="alert alert-warning" role="alert">
                    الكثير من العوائل بانتظار سلة غذائية او مساعدة , اعرف جارك المستحق
                </div>


                <div class="container py-4">

                    <li class="list-group-item"><img src="{{asset("maps-icon/2.png")}}" alt="-" border="0"
                                                     style="max-width: 30px;">
                        <a href="/list/2">  {{$type2}} تم الوصول اليهم مؤخرا </a>
                    <li class="list-group-item"><img src="{{asset("maps-icon/1.png")}}" alt="-" border="0"
                                                     style="max-width: 30px;">
                        <a href="/list/1">{{$type1}} ينتظر مساعدة </a>
                    </li>
                    <li class="list-group-item"><img src="{{asset("maps-icon/3.png")}}" alt="-" border="0"
                                                     style="max-width: 30px;">
                        <a href="/list/3"> {{$type3}} بأنتظار التوثيق </a>
                    </li>


                    <li class="list-group-item">


                        <div class="card text-center">

                            <a href="/map" class="btn btn-shadow">

                                <h5>
                                    <svg class="bi bi-map" width="1em" height="1em" viewBox="0 0 16 16"
                                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M15.817.613A.5.5 0 0116 1v13a.5.5 0 01-.402.49l-5 1a.502.502 0 01-.196 0L5.5 14.51l-4.902.98A.5.5 0 010 15V2a.5.5 0 01.402-.49l5-1a.5.5 0 01.196 0l4.902.98 4.902-.98a.5.5 0 01.415.103zM10 2.41l-4-.8v11.98l4 .8V2.41zm1 11.98l4-.8V1.61l-4 .8v11.98zm-6-.8V1.61l-4 .8v11.98l4-.8z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                    مشاهدة الخارطة
                                </h5>
                            </a>
                        </div>
                    </li>
                </div>
                <div class="container alert alert-success">

                    سلة اليوم
                    <div class="row">


                        <div class="col-12 d-flex justify-content-center ">
                            <form class="col-12 col-sm-6" method="post" action="/edit_basket">
                                @csrf

                                <div class="input-group">


                                    <textarea  style="height: 200px" name="basket"  class="form-control" >{{$basket}}</textarea>
                                </div>


                                <span style="width: 100%" class="input-group-text"> تكفي لكم يوم</span>

                                <input  style="width: 100%" type="number" class="form-control" id="input_basket_day" name="basket_day"
                                        value="{{$basket_day}}">

                                <button style="margin-top: 10px"   id="btn_location" type="submit" class="btn btn-primary"><i class="fa fa-save fa-2x">   </i>    حفظ     </button>

                            </form>


                        </div>
                    </div>

                </div>

                <div class="card text-center">


                    @if(isset($_COOKIE["USER_SESSION"]))


                        <div class="card text-center">
                            <div class="card-header">
                                نشاط الفريق لهذا اليوم
                            </div>


                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <p class="card-text">سجل نشاطات فريقك لهذا اليوم</p>
                                <a href="/my_activity" class="btn btn-primary">
                                    <svg class="bi bi-calendar" width="1em" height="1em" viewBox="0 0 16 16"
                                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M14 0H2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"
                                              clip-rule="evenodd"/>
                                        <path fill-rule="evenodd"
                                              d="M6.5 7a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                    مشاهدة النشاط</a>

                            </div>

                        </div>

                        <div class="card-footer text-muted">
                            فرق الخير المشتركة

                        </div>

                        @foreach($users as $user)
                            <div class="card text-center">
                                <div class="card-header">

                                </div>


                                <div class="card-body">

                                    <h5 class="card-title">{{$user->name}}</h5>



                                    {{--<a href="/my_activity" class="btn btn-primary">--}}
                                    {{--<svg class="bi bi-calendar" width="1em" height="1em" viewBox="0 0 16 16"--}}
                                    {{--fill="currentColor" xmlns="http://www.w3.org/2000/svg">--}}
                                    {{--<path fill-rule="evenodd"--}}
                                    {{--d="M14 0H2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"--}}
                                    {{--clip-rule="evenodd"/>--}}
                                    {{--<path fill-rule="evenodd"--}}
                                    {{--d="M6.5 7a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2z"--}}
                                    {{--clip-rule="evenodd"/>--}}
                                    {{--</svg>--}}
                                    {{--مشاهدة</a>--}}

                                </div>


                            </div>
                        @endforeach

                    @else










                        <div class="card-footer text-muted">
                           فرق الخير المشتركة
                        </div>
                        <a href="/register">
                            <svg class="bi bi-check-circle" width="1em" height="1em" viewBox="0 0 16 16"
                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M15.354 2.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3-3a.5.5 0 11.708-.708L8 9.293l6.646-6.647a.5.5 0 01.708 0z"
                                      clip-rule="evenodd"/>
                                <path fill-rule="evenodd"
                                      d="M8 2.5A5.5 5.5 0 1013.5 8a.5.5 0 011 0 6.5 6.5 0 11-3.25-5.63.5.5 0 11-.5.865A5.472 5.472 0 008 2.5z"
                                      clip-rule="evenodd"/>
                            </svg>
                            الانضمام
                        </a>
                        <p class="card-text"></p>

                    @foreach($users as $user)
                        <div class="card text-center">
                            <div class="card-header">

                            </div>


                                <div class="card-body">

                                    <h5 class="card-title">{{$user->name}}</h5>



                                    {{--<a href="/my_activity" class="btn btn-primary">--}}
                                        {{--<svg class="bi bi-calendar" width="1em" height="1em" viewBox="0 0 16 16"--}}
                                             {{--fill="currentColor" xmlns="http://www.w3.org/2000/svg">--}}
                                            {{--<path fill-rule="evenodd"--}}
                                                  {{--d="M14 0H2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"--}}
                                                  {{--clip-rule="evenodd"/>--}}
                                            {{--<path fill-rule="evenodd"--}}
                                                  {{--d="M6.5 7a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2z"--}}
                                                  {{--clip-rule="evenodd"/>--}}
                                        {{--</svg>--}}
                                        {{--مشاهدة</a>--}}

                                </div>


                        </div>
                        @endforeach

                    @endif


                </div>








            </h5>
        </div>
@endsection





@section('script')


    {{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYPOqCep_Cx1apaQw8Yz6rsywzNGtwwjc">--}}
    {{--</script>--}}
    {{--<script>--}}
    {{--const latAndLong ={!! json_encode($latAndLong) !!};--}}
    {{--const content = function (i) {--}}
    {{--return '<div style="width: 200px; overflow: hidden">' +--}}
    {{--'<p style="font-size: 14px; margin-right: 15px;margin-top: 10px">' + latAndLong[i]['name'] + latAndLong[i]['t_number'] + '</p>' +--}}
    {{--'<p style="font-size: 9px;">' + latAndLong[i]['id'] + '</p>' +--}}
    {{--'</div>'--}}
    {{--};--}}
    {{--const date = function (date) {--}}

    {{--if (date === null || date === '') {--}}
    {{--return '3.png';--}}
    {{--} else {--}}

    {{--var d1 = new Date();--}}
    {{--var d2 = new Date(date);--}}
    {{--var same = d1.getDate() === d2.getDate();--}}
    {{--if (same) {--}}
    {{--return '2.png';--}}
    {{--} else {--}}
    {{--return '1.png';--}}
    {{--}--}}
    {{--}--}}

    {{--//--}}
    {{--//--}}
    {{--//            switch (date) {--}}
    {{--//                case '1':--}}
    {{--//                    return '1.png';--}}
    {{--//                case '2':--}}
    {{--//                    return '2.png';--}}
    {{--//                case '3':--}}
    {{--//                    return '3.png';--}}
    {{--//                case '4':--}}
    {{--//                    return '2.png';--}}
    {{--//                case '5':--}}
    {{--//                    return '3.png';--}}
    {{--//                case '6':--}}
    {{--//                    return '2.png';--}}
    {{--//            }--}}
    {{--};--}}

    {{--console.log(latAndLong[1]['date']);--}}

    {{--function initialize() {--}}
    {{--let mapOptions = {--}}
    {{--zoom: 10,--}}
    {{--mapTypeId: google.maps.MapTypeId.ROADMAP,--}}
    {{--streetViewControl: false,--}}
    {{--zoomControlOptions: {--}}
    {{--position: google.maps.ControlPosition.RIGHT_CENTER--}}
    {{--},--}}
    {{--center: new google.maps.LatLng(32.02594, 44.34625),--}}
    {{--};--}}
    {{--let map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);--}}
    {{--let infowindow = new google.maps.InfoWindow();--}}

    {{--for (let i = 0; i < latAndLong.length; i++) {--}}

    {{--let latLng = new google.maps.LatLng(latAndLong[i]['latitude'], latAndLong[i]['longitude']);--}}
    {{--let marker = new google.maps.Marker({--}}
    {{--position: latLng,--}}
    {{--icon: {--}}
    {{--url: "{{asset('maps-icon')}}/" + date(latAndLong[i]['date']),--}}
    {{--scaledSize: new google.maps.Size(50, 50),--}}
    {{--},--}}
    {{--map: map,--}}
    {{--setContent: content(i)--}}
    {{--});--}}
    {{--google.maps.event.addListener(marker, 'click', function () {--}}
    {{--infowindow.close();--}}
    {{--infowindow.setContent(this.setContent);--}}
    {{--infowindow.open(map, this);--}}
    {{--})--}}
    {{--}--}}
    {{--}--}}

    {{--initialize();--}}

    {{--</script>--}}
@endsection