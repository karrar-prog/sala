@extends("layout.secondary_layout")



@section("content")
    <div class="container">


        <div class="row">



            <div class="col-12 d-flex justify-content-center">
                <form class="col-12 col-sm-6" method="post" action="/123456789123456789/insert_point">
                    @csrf

                    <div class="form-group">

                        @include("items.cities")

                    </div>


                    <div class="form-group alert alert-success ">

                        <input  oninvalid="this.setCustomValidity('يجب ادخال الاسم الثلاثي واللقب')"
                                oninput="setCustomValidity('')" type="text" class="form-control" id="input_name" name="name" required placeholder="الاسم الثلاثي واللقب">
                        <label for="text">*سوف يظهر فقط لفرق الخير واصحاب الحملات </label>

                    </div>


                    <div class="form-group alert alert-success">

                        <input type="number" class="form-control" id="input_t_number"  name="t_number" placeholder="رقم الهاتف">
                        <label for="text">*سوف يظهر فقط لفرق الخير واصحاب الحملات </label>

                    </div>
                    @if(session('message'))
                        <div class="col">
                        </div>
                        <div class="col">
                            <div   class="alert alert-danger w-200 animated shake" role="alert">
                                {{session('message')}}
                                 <div class="form-group  ">
                                     @if(isset($_COOKIE["USER_SESSION"]))
                                         <a href="/single/ {{session('id')}}">مشاهدة تفاصيل هذه العائلة</a>

                                     @endif

                                    <input  oninput="setCustomValidity('')" type="number" oninvalid="this.setCustomValidity('يجب ادخال رقم البطاقة')" class="form-control" id="input_f1" required name="f1" placeholder="ادخل رقم بطاقة التموينية">
                                </div>
                            </div>

                        </div>
                        <div class="col">
                        </div>

                    @else
                        <div class="form-group alert alert-success ">
                            <label for="input_t_number" >رقم البطاقة التومينية</label>
                            <input  oninput="setCustomValidity('')" type="number" oninvalid="this.setCustomValidity('يجب ادخال رقم البطاقة')" class="form-control" id="input_f1" required name="f1" placeholder="اجباري">
                        </div>
                    @endif


                    <div class="form-group ">
                        <label for="input_t_number"></label>
                        <input class="form-control" id="input_admin_name"  name="admin_name" placeholder="اسم المختار">
                    </div>

                    <div class="form-group ">

                        <input type="text" class="form-control" id="input_description"  name="description" placeholder="اسم الحي واقرب نقطة دالة ">
                    </div>


                    <div class="form-group ">
                        <div class="form-group">
                            @include("items.types")
                        </div>
                    </div>




                    <div class="form-group ">
                        <div class="form-group">
                            @include("items.father")
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="form-group">
                            @include("items.category")
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="form-group">
                            @include("items.childe")
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="form-group">
                            @include("items.single")
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="form-group">
                            @include("items.childe_without")
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="form-group">
                            @include("items.desise")
                        </div>
                    </div>
                    <div  class="form-group ">
                        <input  class="form-control" id="input_f4"  name="f4" placeholder="تفاصيل العلاج ان وجد">
                    </div>
                    <div class="form-group ">
                        <input  class="form-control" id="input_f2"  name="f2" placeholder="احتياج خاص">
                    </div>
                    <div class="form-group ">

                        <input  class="form-control" id="input_f3"  name="f3" placeholder="تفاصيل اخرى">
                    </div>


                    <div class="row">
                        <div id="message1" class="alert alert-primary" role="alert">
                            اذا واجهت مشكلة في تحديد موقعك -افتح رابط سلة الخير في متصفح كروم (chrome) أو سفاري (safari)

                            <a id ="btn_get_location"class="btn btn-outline-info w-100" onclick="getLocation()"><i class="fa fa-street-view fa-2x">   </i>    تحديد موقعي الحالي   </a>
                                 </div>

                            <button name="location" style="visibility: hidden"  id="btn_location" type="submit" class="btn btn-primary w-100 mt-5"><i class="fa fa-save fa-2x">   </i>    حفظ     </button>
                        <div style="visibility: hidden" id="message2" class="alert alert-success " role="alert">
                            في حالة الضغط على زر الحفظ انت تتعهد امام الله بصحة المعلومات المدخلة
                        </div>
                    </div>







                    <div class="row">
                        <div class="col">

                            <input style="visibility: hidden;width: 20px" type="text" class="form-control" id="input_latitude"  name="latitude"  required placeholder="يجب جلب البيانات">

                        </div>
                        <div class="col">


                            <input style="visibility: hidden;width: 20px" type="text" class="form-control" id="input_longitude"  name="longitude"  required placeholder="يجب جلب البيانات">

                        </div>
                    </div>



                </form>





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
                x.innerHTML = "لم يتم جلب الموقع الجغرافي";
            }
        }

        function showPosition(position) {

            $("#input_latitude").val(position.coords.latitude);
            $("#input_longitude").val(position.coords.longitude);
            $("#input_latitude").attr("readonly","readonly");
            $("#input_longitude").attr("readonly","readonly");

            document.getElementById('btn_get_location').style.visibility = 'hidden';
            document.getElementById('btn_location').style.visibility = 'visible';
            document.getElementById('message2').style.visibility = 'visible';
            document.getElementById('message1').textContent = 'تم جلب الموقع الجفرافي - يمكنك ضغط حفظ في حالة اكمال جميع الحقول';
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

@endsection