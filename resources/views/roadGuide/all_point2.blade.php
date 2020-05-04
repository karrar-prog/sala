@extends("layout.secondary_layout")

@section("navbar-color")
    {{"bg-aqua-gradient"}}
@endsection

@section("navbar-brand")
    <span id="title">{{trans("words.road_guide_title_all_points")}}</span>
@endsection

@section("content")
    <div class="container py-4 ">
        <div class="row1 " id="all-points1">

            @if(isset($_COOKIE["USER_SESSION"]))
                <div class="card text-center btn btn-shadow" style="margin-top: 60px ; margin-bottom: 60px">

                    <table class="table table-striped">

                        <tbody>
                        <tr>
                            <td>
                                <form class="col-12 col-sm-6 " method="post" action="/family_search">
                                    @csrf

                                    <input style="width: 250px" type="text" class="form-control" id="input_name"
                                           name="t_search" required
                                           placeholder="ابحث عن  عائلة بواسطة رقم العائلة او الاسم او رقم هاتف او التفاصيل">


                                    <button style="width: 250px" type="submit" class="btn btn-primary "> بحث</button>


                                </form>
                            </td>

                            <td>

                                <form method="post" action="/family_search">
                                    @csrf
                                    <div style="width: 250px" class="col-sm-3">
                                        <input style="width: 250px" type="number" class="form-control" id="input_name" name="t_day" required
                                               placeholder="عدد الايام">

                                        <button style="width: 250px" type="submit" class="btn btn-shadow "> عوائل لم تصل لها مساعدة منذ
                                            <svg class="bi bi-search" width="1em" height="1em" viewBox="0 0 16 16"
                                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                      d="M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z"
                                                      clip-rule="evenodd"/>
                                                <path fill-rule="evenodd"
                                                      d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        </button>




                                    </div>

                                </form>

                            </td>
                            <td>
                                <form method="post" action="/nearby">
                                    @csrf

                                    {{--@include("items.cities")--}}
<row>
    <a style="width: 250px" class="btn btn-shadow" onclick="getLocation()"><i
                class="fa fa-search-location fa-2x"> </i> تحديد موقعي </a>


</row>
                                    <row>
                                        <button style="width: 170px" type="submit" class="btn btn-shadow"> الاقرب لموقعي
                                        </button>
                                    </row>

                                    <input style="width: 170px ; visibility: hidden" type="text" class="form-control"
                                           id="input_latitude"
                                           name="latitude" required placeholder="خطوط العرض">
                                    <input style="width: 170px ; visibility: hidden" type="text" class="form-control"
                                           id="input_longitude"
                                           name="longitude" required placeholder="خطوط الطول">


                                </form>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            @endif

        </div>

        <ul>
            @php $i=1; @endphp
            @foreach($allPoints as $point)


                <div class="card text-center btn btn-shadow">


                    @if(isset($_COOKIE["USER_SESSION"]))
                        <row>

                            @if($user_name == $point->username )

                                <a style="width: 100px" href="/123456789123456789/edit_point/{{$point->id}}"
                                   class="btn btn-shadow">
                                    <svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16"
                                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M11.293 1.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"
                                              clip-rule="evenodd"/>
                                        <path fill-rule="evenodd"
                                              d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 00.5.5H4v.5a.5.5 0 00.5.5H5v.5a.5.5 0 00.5.5H6v-1.5a.5.5 0 00-.5-.5H5v-.5a.5.5 0 00-.5-.5H3z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </a>
                                <a style="width: 100px" href="/123456789123456789/ensure_delete/{{$point->id}}"
                                   class="btn btn-shadow">
                                    <svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16"
                                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z"/>
                                        <path fill-rule="evenodd"
                                              d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"
                                              clip-rule="evenodd"/>
                                    </svg>

                                </a>
                            @endif
                            <a style="width: 110px" href="/show_help/{{$point->id}}" class=" btn btn-shadow"
                            >
                                <svg class="bi bi-check-all" width="1em" height="1em" viewBox="0 0 16 16"
                                     fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M12.354 3.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3.5-3.5a.5.5 0 11.708-.708L5 10.293l6.646-6.647a.5.5 0 01.708 0z"
                                          clip-rule="evenodd"/>
                                    <path d="M6.25 8.043l-.896-.897a.5.5 0 10-.708.708l.897.896.707-.707zm1 2.414l.896.897a.5.5 0 00.708 0l7-7a.5.5 0 00-.708-.708L8.5 10.293l-.543-.543-.707.707z"/>
                                </svg>
                            </a>
                            <a style="width: 110px" href="javascript:void(0);" class="location btn btn-shadow"
                               style="margin: 20px"
                               data-latitude="{{$point->latitude}}" data-longitude="{{$point->longitude}}">
                                <svg class="bi bi-map" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M15.817.613A.5.5 0 0116 1v13a.5.5 0 01-.402.49l-5 1a.502.502 0 01-.196 0L5.5 14.51l-4.902.98A.5.5 0 010 15V2a.5.5 0 01.402-.49l5-1a.5.5 0 01.196 0l4.902.98 4.902-.98a.5.5 0 01.415.103zM10 2.41l-4-.8v11.98l4 .8V2.41zm1 11.98l4-.8V1.61l-4 .8v11.98zm-6-.8V1.61l-4 .8v11.98l4-.8z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </a>
                            @if($point->date == null)
                                <a style="width: 110px" href="/validate/{{$point->id}}" class="btn btn-dark">

                                    <svg class="bi bi-eye" width="1em" height="1em" viewBox="0 0 16 16"
                                         fill="currentColor"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 001.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0014.828 8a13.133 13.133 0 00-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 001.172 8z"
                                              clip-rule="evenodd"/>
                                        <path fill-rule="evenodd"
                                              d="M8 5.5a2.5 2.5 0 100 5 2.5 2.5 0 000-5zM4.5 8a3.5 3.5 0 117 0 3.5 3.5 0 01-7 0z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                    تم الكشف </a>
                            @endif
                        </row>


                        @if(isset($_COOKIE["USER_SESSION"]))

                            <table class="table table-striped">

                                <tbody>
                                <tr>


                                    <td style="width: 60px">{{$point->id}}</td>
                                    <td style="width: 160px">
                                        <a href="/single/{{$point->id}}">
                                            <h5>   {{$point->name}}</h5>
                                        </a>

                                    </td>

                                    <td style="width: 90px">

                                        <a href="tel:{{$point->t_number}}">
                                            {{--<svg class="bi bi-phone" width="1em" height="1em" viewBox="0 0 16 16"--}}
                                            {{--fill="currentColor"--}}
                                            {{--xmlns="http://www.w3.org/2000/svg">--}}
                                            {{--<path fill-rule="evenodd"--}}
                                            {{--d="M11 1H5a1 1 0 00-1 1v12a1 1 0 001 1h6a1 1 0 001-1V2a1 1 0 00-1-1zM5 0a2 2 0 00-2 2v12a2 2 0 002 2h6a2 2 0 002-2V2a2 2 0 00-2-2H5z"--}}
                                            {{--clip-rule="evenodd"/>--}}
                                            {{--<path fill-rule="evenodd" d="M8 14a1 1 0 100-2 1 1 0 000 2z"--}}
                                            {{--clip-rule="evenodd"/>--}}
                                            {{--</svg>--}}
                                            <h4>{{$point->t_number}}</h4></a>

                                    </td>
                                    <td style="width: 90px">ألمختار:{{$point->admin_name}}</td>
                                    <td style="width: 90px">حي: {{$point->f3}}</td>
                                    <td style="max-width: 90px">

                                        عنوان:
                                        {{$point->description}} </td>

                                    <td style="width: 90px">تموينية:

                                        {{$point->f1}}</td>




                                    @if($point->date == "")
                                        <td style="width: 60px">اول تسليم</td>

                                    @else

                                        <td> تأريخ {{$point->date}}</td>

                                    @endif

                                    @endif



                                </tr>


                                </tbody>
                            </table>


                        @else
                            {{$point->id}}

                        @endif

                        @if($allPoints->count() == 1)
                            @if(isset($_COOKIE["USER_SESSION"]))
                                <table class="table table-striped">
                                    <thead>

                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">رقم الهاتف</th>
                                        <td>

                                            <a href="tel:{{$point->t_number}}">
                                                <svg class="bi bi-phone" width="1em" height="1em" viewBox="0 0 16 16"
                                                     fill="currentColor"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                          d="M11 1H5a1 1 0 00-1 1v12a1 1 0 001 1h6a1 1 0 001-1V2a1 1 0 00-1-1zM5 0a2 2 0 00-2 2v12a2 2 0 002 2h6a2 2 0 002-2V2a2 2 0 00-2-2H5z"
                                                          clip-rule="evenodd"/>
                                                    <path fill-rule="evenodd" d="M8 14a1 1 0 100-2 1 1 0 000 2z"
                                                          clip-rule="evenodd"/>
                                                </svg> {{$point->t_number}} اتصال </a>
                                            <a></a>
                                        </td>

                                    </tr>
                                    <tr>
                                        <th scope="row">رقم البطاقة التموينية</th>
                                        <td>{{$point->f1}}</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">اسم المختار</th>
                                        <td>{{$point->admin_name}}</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">اسم الحي واقرب نقطة دالة</th>
                                        <td>{{$point->description}} </td>

                                    </tr>

                                    </tbody>
                                </table>


                                <table class="table table-striped">
                                    <thead>

                                    </thead>
                                    <tbody>
                                    <tr>
                                        @if($point->type==1)

                                            <th scope="row">نوع العائلة</th>
                                            <td>عامي</td>

                                        @else

                                            <th scope="row">نوع العائلة</th>
                                            <td>سادة</td>

                                        @endif

                                    </tr>


                                    </tbody>
                                </table>
                                <table class="table table-striped">
                                    <thead>

                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">يوجد معيل</th>
                                        <td>{{$point->father}}</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">عدد افراد الاسره</th>
                                        <td>{{$point->childe}}</td>

                                    </tr>

                                    </tbody>
                                </table>
                                <table class="table table-striped">
                                    <thead>

                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">ارملة - مطلقة</th>
                                        <td>{{$point->single}}</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">عدد الايتام</th>
                                        <td>{{$point->childe_without}}</td>

                                    </tr>

                                    </tbody>
                                </table>

                                <table class="table table-striped">
                                    <thead>

                                    </thead>
                                    <tbody>

                                    <tr>
                                        <th scope="row">امراض مزمنة</th>
                                        <td>{{$point->desise}}</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">ملاحظات حول المرض والعلاج والعلاج</th>
                                        <td style="text-align: right">{{$point->f4}}</td>

                                    </tr>
                                    </tbody>
                                </table>

                                <table class="table table-striped">
                                    <thead>

                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">احتياج خاص</th>
                                        <td>{{$point->f2}}</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">الخصوصية</th>
                                        <td>{{$point->f3}}</td>

                                    </tr>

                                    </tbody>
                                </table>
                            @else
                                رقم العائلة
                                <td style="width: 90px">{{$point->id}}</td>

                                <h5 class="card-title"> لمزيد من التفاصيل تواصل مع صاحب الحملة</h5>
                            @endif


                        @endif




                        {{--<div class="card-footer text-muted">--}}
                        {{--اضغط وصلت في حالة تسليمهم سلة او مساعدة الان--}}

                        {{--</div>--}}

                </div>

                <div class="timeline-badge shadow">

                </div>




            @endforeach
        </ul>


    </div>


@section("extra-content")
    {{--Calculate Distance and Time Modal--}}
    <div class="modal fade" id="calculate-distance-modal" tabindex="-1" role="dialog"
         aria-labelledby="calculate-distance-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-special" role="document">
            <div class="modal-content bg-aqua-gradient shadow-special">
                <div class="modal-body">
                    <div class="text-center text-white border border-light p-5">
                        <p class="h4 mb-4">{{trans("words.road_guide_calculate_distance_modal_title")}}</p>
                        <p class="h6 mb-4">{{trans("words.road_guide_calculate_distance_modal_description")}}</p>
                        <div class="alert w-100 p-2 mb-2 alert-danger d-none" role="alert" id="alert-error-message">
                            <ul class="p-0 m-0" style="list-style: none;">
                                <li id="item-empty">{{trans("words.road_guide_calculate_distance_empty_error_message")}}</li>
                                <li id="item-unacceptable">{{trans("words.road_guide_calculate_distance_unacceptable_error_message")}}</li>
                            </ul>
                        </div>
                        <input type="number" name="source" class="form-control mb-4"
                               placeholder="{{trans("words.road_guide_calculate_distance_column_number")}}">
                        <input type="hidden" name="destination">
                        <button class="btn btn-outline-success text-white btn-block"
                                data-action="calculate-distance-modal">
                            <span>{{trans("words.road_guide_calculate_distance_btn_calculate")}}</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Show Location On Google Map Modal--}}
    <div class="modal fade bd-example-modal-lg" id="modal" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div id="map-canvas" style="height: 600px"></div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("script")


    <script>
        var x = document.getElementById("demo");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {

            $("#input_latitude").val(position.coords.latitude);
            $("#input_longitude").val(position.coords.longitude);
            $("#input_latitude").attr("readonly", "readonly");
            $("#input_longitude").attr("readonly", "readonly");
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    x.innerHTML = "لم تسمح بالوصول الى الموقع"
                    break;
                case error.POSITION_UNAVAILABLE:
                    x.innerHTML = "معلومات الموقع غير متوفرة"
                    break;
                case error.TIMEOUT:
                    x.innerHTML = "الاتصال بالشبكة ضعيف جدا"
                    break;
                case error.UNKNOWN_ERROR:
                    x.innerHTML = "خطأ غير معروف"
                    break;
            }
        }
    </script>

    {{--Show Location On Google Map--}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKYUdCrdRfLxHyfmp7DioNrGMOt7fI-E4"></script>
    <script>
        function initialize(x, y) {
            var center = new google.maps.LatLng(x, y);
            var mapOptions = {
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                center: center
            };

            map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

            var marker = new google.maps.Marker({
                map: map,
                position: center
            });
        }

        $('.collapse').collapse()
        $('.location').on('click', function () {
            $('#modal').modal({
                backdrop: 'static',
                keyboard: false
            });
            initialize($(this).attr('data-latitude'), $(this).attr('data-longitude'));
            console.log($(this).attr('data-latitude'), $(this).attr('data-longitude'));
        });
    </script>
@endsection