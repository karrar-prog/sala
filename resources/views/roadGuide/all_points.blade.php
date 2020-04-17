@extends("layout.secondary_layout")

@section("navbar-color")
    {{"bg-aqua-gradient"}}
@endsection

@section("navbar-brand")
    <span id="title">{{trans("words.road_guide_title_all_points")}}</span>
@endsection

@section("content")
    <div class="container py-4">
        <div class="row1" id="all-points1">


            <div class="mb-4" style="margin-top: 60px;max-width: 150px">
                @include("items.cities")
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col">
                        <a style="width: 150px" class="btn btn-shadow" onclick="getLocation()"><i class="fa fa-search-location fa-2x">   </i>    موقعي الحالي   </a>
                        <input style="width: 150px" type="text" class="form-control" id="input_latitude"  name="latitude"  required placeholder="خطوط العرض">
                        <input style="width: 150px" type="text" class="form-control" id="input_longitude"  name="longitude"  required placeholder="خطوط الطول">
                        <p id="demo"></p>
                    </div>



                </div>
            </div>

        </div>





            <ul>
                @php $i=1; @endphp
                @foreach($allPoints as $point)

                    <div class="card text-center btn btn-shadow" style="margin-right: -40px">
                        <div class="card-header">
                            <h5 class="card-title">{{$point->name}}</h5>

                            اخر وصول لهم كان في تأريخ
                            {{$point->date}}
                        </div>
                        <div class="card-body ">
                <p class="card-text">  {{$point->description}}</p>

                            <a  href="tel:{{$point->t_number}}" >
                                <svg class="bi bi-phone" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M11 1H5a1 1 0 00-1 1v12a1 1 0 001 1h6a1 1 0 001-1V2a1 1 0 00-1-1zM5 0a2 2 0 00-2 2v12a2 2 0 002 2h6a2 2 0 002-2V2a2 2 0 00-2-2H5z" clip-rule="evenodd"/>
                                    <path fill-rule="evenodd" d="M8 14a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                                </svg> {{$point->t_number}} اتصال </a>
                            <a ></a>

                            <div class="card-body">
                            <a  href="javascript:void(0);" class="location btn btn-shadow"  data-latitude="{{$point->latitude}}" data-longitude="{{$point->longitude}}"><svg class="bi bi-map" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M15.817.613A.5.5 0 0116 1v13a.5.5 0 01-.402.49l-5 1a.502.502 0 01-.196 0L5.5 14.51l-4.902.98A.5.5 0 010 15V2a.5.5 0 01.402-.49l5-1a.5.5 0 01.196 0l4.902.98 4.902-.98a.5.5 0 01.415.103zM10 2.41l-4-.8v11.98l4 .8V2.41zm1 11.98l4-.8V1.61l-4 .8v11.98zm-6-.8V1.61l-4 .8v11.98l4-.8z" clip-rule="evenodd"/>
                                </svg><h6>الموقع على الخارطة</h6>  </a>

                            </div>

                                @if(isset($_COOKIE["USER_SESSION"]))
                                    <div class="card-body">
                                        <a href="/new_family" class="btn btn-success">
                                            <svg class="bi bi-check-all" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M12.354 3.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3.5-3.5a.5.5 0 11.708-.708L5 10.293l6.646-6.647a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                                                <path d="M6.25 8.043l-.896-.897a.5.5 0 10-.708.708l.897.896.707-.707zm1 2.414l.896.897a.5.5 0 00.708 0l7-7a.5.5 0 00-.708-.708L8.5 10.293l-.543-.543-.707.707z"/>
                                            </svg>  وصلت اليهم الان  </a>

                                    </div>
                                @endif


                        </div>

                        {{--<div class="card-footer text-muted">--}}
                          {{--اضغط وصلت في حالة تسليمهم سلة او مساعدة الان--}}

                        {{--</div>--}}

                    </div>

                    <div class="timeline-badge shadow">

                    </div>



                    </li>

                @endforeach
            </ul>


        </div>
    </div>

@section("extra-content")
    {{--Calculate Distance and Time Modal--}}
    <div class="modal fade" id="calculate-distance-modal" tabindex="-1" role="dialog" aria-labelledby="calculate-distance-modal" aria-hidden="true">
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
                        <input type="number" name="source" class="form-control mb-4" placeholder="{{trans("words.road_guide_calculate_distance_column_number")}}">
                        <input type="hidden" name="destination">
                        <button class="btn btn-outline-success text-white btn-block" data-action="calculate-distance-modal">
                            <span>{{trans("words.road_guide_calculate_distance_btn_calculate")}}</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Show Location On Google Map Modal--}}
    <div class="modal fade bd-example-modal-lg" id="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
            $("#input_latitude").attr("readonly","readonly");
            $("#input_longitude").attr("readonly","readonly");
        }

        function showError(error) {
            switch(error.code) {
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
        function initialize(x ,y) {
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

        $('.location').on('click', function () {
            $('#modal').modal({
                backdrop: 'static',
                keyboard: false
            });
            initialize($(this).attr('data-latitude'),$(this).attr('data-longitude'));
            console.log($(this).attr('data-latitude'),$(this).attr('data-longitude'));
        });
    </script>
@endsection