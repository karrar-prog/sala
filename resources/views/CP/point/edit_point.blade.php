@extends("layout.secondary_layout")


@section("content")
    <div class="container">

        <div class="row">
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
            @foreach($points as $point)
                    <div class="col-12 d-flex justify-content-center" style="margin-bottom: 100px">
                        <form class="col-12 col-sm-6" method="post" action="/123456789123456789/update_point/{{$point->id}}">
                            @csrf
                            <div class="form-group">
                                <label for="input_id">تسلسل العائلة</label>
                                <input type="text" class="form-control" id="input_id" name="id" required readonly value="{{$point->id}}">
                            </div>

                            <div class="form-group">
                                <label for="input_name">اسم العائلة</label>
                                <input type="text" class="form-control" id="input_name" name="name" value="{{$point->name}}">
                            </div>
                            <div class="form-group ">
                                <label for="input_t_number">رقم الهاتف</label>
                                <input  class="form-control" id="input_t_number" name="t_number" value="{{$point->t_number}}" >
                            </div>
                            <div class="form-group ">
                                <div class="form-group">
                                    @include("items.category")
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="input_description">تفاصيل</label>
                                <input type="text" class="form-control" id="input_description" name="description"
                                       value="{{$point->description}}">
                            </div>
                            <div class="row">
                                <div class="col">
                                </div>
                                <div class="col">
                                    <a class="btn btn-outline-info w-100"  onclick="getLocation()">حفظ موقعي الحالي </a>
                                    <p id="demo"></p>
                                </div>
                                <div class="col">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="text">معلومات خط العرض</label>
                                    <input type="text" class="form-control" id="input_latitude" name="latitude" required
                                           value="{{$point->latitude}}">
                                </div>
                                <div class="col">
                                    <label for="text">معلومات خط العرض</label>
                                    <input type="text" class="form-control" id="input_longitude" name="longitude" required
                                           value="{{$point->longitude}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary w-100 mt-5">   حفظ هذه التعديلات   </button>
                                </div>
                                <div class="col">
                                </div>
                            </div>
                        </form>

                    </div>
            @endforeach



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
            $("#input_longitude").val(position.coords.latitude);
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

@endsection