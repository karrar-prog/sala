@extends('layout.secondary_layout')

@section("navbar-color")
    {{"bg-aqua-gradient"}}
@endsection

@section("navbar-brand")
    <span>اهلا بك بعائلة سلة خير</span>
@endsection
<style>
    .jjj {
    }
</style>

@section('content')

    @if(session('message'))

        <div class="alert alert-primary" role="alert">
            {{session('message')}}
        </div>
    @endif

    {{--<div class="alert alert-success" role="alert">سلة خير - خارطة و معلومات العوائل المتضرره والمستحقة الذين تم توثيقهم--}}
        {{--بواسطة (فرق الخير) من الشباب المتطوعين و المواكب الحسينية ---}}
        {{--<a href="/register">--}}
            {{--كن معنا--}}
        {{--</a>--}}
    {{--</div>--}}
    {{--<div class="alert alert-warning" role="alert">--}}
        {{--الكثير من العوائل بانتظار سلة غذائية او مساعدة , سوف تعرف جارك المستحق--}}
    {{--</div>--}}

    <div class="container py-4">
        <div style="width: 100%; height: calc(100% - 134px);">
            <div class="w-100 h-100" id="map-canvas"></div>
        </div>
    </div>

    <div class="container py-4">

        <li class="list-group-item"><img src="{{asset("maps-icon/2.png")}}" alt="-" border="0" style="max-width: 30px;">
            <a href="/list/2" >  {{$type2}}      تم الوصول اليهم مؤخرا    </a>
        <li class="list-group-item"><img src="{{asset("maps-icon/1.png")}}" alt="-" border="0" style="max-width: 30px;">
            <a href="/list/1" >{{$type1}}         ينتظر مساعدة    </a>
        </li>
        <li class="list-group-item"><img src="{{asset("maps-icon/3.png")}}" alt="-" border="0" style="max-width: 30px;">
            <a href="/list/3" > {{$type3}}   بأنتظار التوثيق   </a>
        </li>


    </div>

    {{--<div class="alert alert-success" role="alert">--}}
    {{--<img src="{{asset("maps-icon/2.png")}}" alt="-" border="0" style="max-width: 30px;">                   تم الوصول الية مؤخراً--}}
    {{--<img src="{{asset("maps-icon/1.png")}}" alt="-" border="0" style="max-width: 30px;">      ينتظر مساعدة--}}
    {{--<img src="{{asset("maps-icon/3.png")}}" alt="-" border="0" style="max-width: 30px;">          بأنتظار التوثيق--}}

    {{--</div>--}}








    <div class="card text-center">
        <div class="card-header">
            شمول عائلة في مشروع سلة خير
        </div>

        @if(isset($_COOKIE["USER_SESSION"]))
            <div class="card-body">
                <h5 class="card-title">اهلا بك</h5>
                <p class="card-text">{{$user_name}}</p>
                <a href="/new_family" class="btn btn-primary">وثق عائلة الان</a>
            </div>

            <div class="card-footer text-muted">
                الدال على الخير كفاعلة
            </div>
        @else
            <div class="card-body">
                <h5 class="card-title">يمكنك اضافة عائلتك او عائلة جارك </h5>
                <p class="card-text">سوف تصل اليك فرق الخير للتوثيق والمساعدة</p>
                <a href="/new_family" class="btn btn-primary">اضف الان</a>
            </div>

            <div class="card-footer text-muted">
                الدال على الخير كفاعلة
            </div>
        @endif


    </div>

    {{--<div class="card text-center">--}}
    {{--<div class="card-header">--}}

    {{--</div>--}}
    {{--<div class="card-body">--}}
    {{--<h5 class="card-title">اذا كنت من فرق الخير</h5>--}}
    {{--<p class="card-text"></p>--}}
    {{--<a href="/login" class="btn btn-primary">سجل دخولك</a>--}}
    {{--</div>--}}

    {{--</div>--}}



@endsection





@section('script')

    {{--AIzaSyBYPOqCep_Cx1apaQw8Yz6rsywzNGtwwjc--}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYPOqCep_Cx1apaQw8Yz6rsywzNGtwwjc">
    </script>
    <script>
        const latAndLong ={!! json_encode($latAndLong) !!};
        const content = function (i) {
            return '<div style="width: 200px; overflow: hidden">' +
                '<p style="font-size: 14px; margin-right: 15px;margin-top: 10px">' + latAndLong[i]['name'] + latAndLong[i]['t_number'] + '</p>' +
                '<p style="font-size: 9px;">' + latAndLong[i]['description'] + '</p>' +
                '</div>'
        };
        const date = function (date) {



            if (date === null ) {
                return '3.png';
            }else if(date === '1990-07-17' ){
                return '4.png';
            }

            else {

                var d1 = new Date();
                var d2 = new Date(date);
                var same = d1.getDate() === d2.getDate();
                if (same) {
                    return '2.png';
                } else {
                    return '1.png';
                }
            }

//
//
//            switch (date) {
//                case '1':
//                    return '1.png';
//                case '2':
//                    return '2.png';
//                case '3':
//                    return '3.png';
//                case '4':
//                    return '2.png';
//                case '5':
//                    return '3.png';
//                case '6':
//                    return '2.png';
//            }
        };

        console.log(latAndLong[1]['date']);
        console.log(latAndLong[1]['category']);

        function initialize() {
            let mapOptions = {
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                streetViewControl: false,
                zoomControlOptions: {
                    position: google.maps.ControlPosition.RIGHT_CENTER
                },
                center: new google.maps.LatLng(32.02594, 44.34625),
            };
            let map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
            let infowindow = new google.maps.InfoWindow();

            for (let i = 0; i < latAndLong.length; i++) {

                let latLng = new google.maps.LatLng(latAndLong[i]['latitude'], latAndLong[i]['longitude']);
                let marker = new google.maps.Marker({
                    position: latLng,
                    icon: {
                        url: "{{asset('maps-icon')}}/" + date(latAndLong[i]['date']),
                        scaledSize: new google.maps.Size(50, 50),
                    },
                    map: map,
                    setContent: content(i)
                });
                google.maps.event.addListener(marker, 'click', function () {
                    infowindow.close();
                    infowindow.setContent(this.setContent);
                    infowindow.open(map, this);
                })
            }
        }

        initialize();

    </script>
@endsection