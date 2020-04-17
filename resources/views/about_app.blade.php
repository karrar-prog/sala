@extends("layout.secondary_layout")
@section("content")

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
    @if(isset($_COOKIE["USER_SESSION"]))
        <div class="card text-center">
            <div class="card-header">
                <h5 class="card-title">اهلا بكم</h5>

            </div>

            <div class="card-body">
                <h5 class="card-title">{{$user_name}}</h5>

                <p class="card-text"> المتطوع {{$phone}}</p>
            {{--<p class="card-text">{{$user_name}}</p>--}}
            <a href="/new_family" class="btn btn-primary">اضافة عائلة الان</a>
        </div>
        @else
        <div class="alert alert-success" role="alert">سلة خير - خارطة و معلومات العوائل المتضرره والمستحقة الذين تم توثيقهم
            بواسطة (فرق الخير) من الشباب المتطوعين و المواكب الحسينية -
            <a href="/register">
                كن معنا
            </a>
        </div>
        @endif

    <div class="alert alert-warning" role="alert">
        الكثير من العوائل بانتظار سلة غذائية او مساعدة , اعرف جارك المستحق
    </div>


    <div class="container py-4">

        {{--<div style="width: 100%; height: calc(100% - 134px);">--}}
        {{--<div class="w-100 h-100" id="map-canvas"></div>--}}
        {{--</div>--}}
        <li class="list-group-item"><img src="{{asset("maps-icon/2.png")}}" alt="-" border="0" style="max-width: 30px;">
            <a href="/list/1" >  400     تم الوصول اليهم مؤخراً</a>
        <li class="list-group-item"><img src="{{asset("maps-icon/1.png")}}" alt="-" border="0" style="max-width: 30px;">
            <a href="/list/2" > 20       ينتظر مساعدةً</a>
        </li>
        <li class="list-group-item"><img src="{{asset("maps-icon/3.png")}}" alt="-" border="0" style="max-width: 30px;">
            <a href="/list/3" >   50    بأنتظار التوثيقً</a>
        </li>
        <li class="list-group-item">
            <a href="/map" >

                <h5> <svg class="bi bi-map" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M15.817.613A.5.5 0 0116 1v13a.5.5 0 01-.402.49l-5 1a.502.502 0 01-.196 0L5.5 14.51l-4.902.98A.5.5 0 010 15V2a.5.5 0 01.402-.49l5-1a.5.5 0 01.196 0l4.902.98 4.902-.98a.5.5 0 01.415.103zM10 2.41l-4-.8v11.98l4 .8V2.41zm1 11.98l4-.8V1.61l-4 .8v11.98zm-6-.8V1.61l-4 .8v11.98l4-.8z" clip-rule="evenodd"/>
                    </svg>مشاهدة على الخارطة</h5>
            </a>
        </li>
    </div>

    <div class="card text-center">


        @if(isset($_COOKIE["USER_SESSION"]))


            <div class="card text-center">
                <div class="card-header">
                    نشاط الفريق لهذا اليوم
                </div>




                <div class="card-body">
                    <h5 class="card-title"> </h5>
                    <p class="card-text">سجل نشاطات فريقك لهذا اليوم</p>
                    <a href="/new_family" class="btn btn-primary">
                        <svg class="bi bi-calendar" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M14 0H2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M6.5 7a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                        </svg>
                        مشاهدة النشاط</a>

                </div>

            </div>

        @else
            <div class="card-body">
                <h5 class="card-title">يمكنك اضافة عائلتك او عائلة جارك </h5>
                <p class="card-text">سوف تصل اليك فرق الخير للتوثيق والمساعدة</p>
                <a href="/new_family" class="btn btn-primary">
                    <svg class="bi bi-check-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M15.354 2.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3-3a.5.5 0 11.708-.708L8 9.293l6.646-6.647a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M8 2.5A5.5 5.5 0 1013.5 8a.5.5 0 011 0 6.5 6.5 0 11-3.25-5.63.5.5 0 11-.5.865A5.472 5.472 0 008 2.5z" clip-rule="evenodd"/>
                    </svg>
                    اضف الان</a>

            </div>
            <div class="card-footer text-muted">
                الدال على الخير كفاعلة
            </div>
            <div class="card text-center">
                <div class="card-header">

                </div>




                <div class="card-body">
                    <h5 class="card-title"> </h5>
                    <p class="card-text">ارقام هواتف فرق الخير ونشاطاتهم لهذ اليوم</p>
                    <a href="/new_family" class="btn btn-primary">
                        <svg class="bi bi-calendar" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M14 0H2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M6.5 7a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                        </svg>
                        مشاهدة</a>

                </div>

            </div>

        @endif


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