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


            <div class="col-12 d-flex justify-content-center">
                <form class="col-12 col-sm-6" method="post" action="/123456789123456789/insert_point">
                    @csrf

                    <div class="form-group">

                        @include("items.cities")

                    </div>


                    <div class="form-group">
                        <label for="text">اسم العائلة</label>
                        <input type="text" class="form-control" id="input_name" name="name" required placeholder="الاسم الثلاثي واللقب">
                        <label for="text">*سوف يظهر فقط لفرق الخير واصحاب الحملات </label>
                    </div>
                    <div class="form-group">
                        <label for="text">اسم العائلة</label>
                        <input type="text" class="form-control" id="input_name" name="name" required placeholder="الاسم الثلاثي واللقب">
                        <label for="text">*سوف يظهر فقط لفرق الخير واصحاب الحملات </label>
                    </div>

                    <div class="form-group ">
                        <label for="input_t_number">رقم الهاتف</label>
                        <input class="form-control" id="input_t_number"  name="t_number" placeholder="هذا الحقل اختياري">
                     </div>

                    <div class="form-group ">
                        <label for="input_t_number">اسم المختار</label>
                        <input class="form-control" id="input_admin_name"  name="admin_name" placeholder="هذا الحقل اختياري">
                    </div>
                    <div class="form-group ">
                        <label for="input_t_number">رقم البطاقة التومينية</label>
                        <input class="form-control" id="input_f1"  name="f1" placeholder="هذا الحقل اختياري">
                    </div>


                    <div class="form-group ">
                        <div class="form-group">
                            @include("items.types")
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="input_category">المستوى المعيشي</label>
                        <select id="input_category" name="category" required class="form-control">

                            <option selected value="1">كاسب</option>
                            <option value="2">فقير</option>
                            <option value="3">دون مستوى الفقر</option>
                            <option value="4">لايوجد معيل</option>
                            <option value="5">معوق</option>
                            <option value="6">ارملة</option>


                        </select>
                    </div>



                    <div class="form-group ">
                        <label for="input_description">تفاصيل</label>
                        <input type="text" class="form-control" id="input_description"  name="description" placeholder="اقرب نقطة دالة ">
                    </div>

                    <div class="row">
                        <div id="message1" class="alert alert-primary" role="alert">
                            اذا واجهت مشكلة في تحديد موقعك -افتح رابط سلة الخير في متصفح كروم (chrome) أو سفاري (safari)

                            <a id ="btn_get_location"class="btn btn-outline-info w-100" onclick="getLocation()"><i class="fa fa-street-view fa-2x">   </i>    تحديد موقعي الحالي   </a>
                                 </div>
                        <button name="location" style="visibility: hidden"  id="btn_location" type="submit" class="btn btn-primary w-100 mt-5"><i class="fa fa-save fa-2x">   </i>    حفظ    </button>

                    </div>







                    <div class="row">
                        <div class="col">

                            <input style="visibility: hidden;width: 20px" type="text" class="form-control" id="input_latitude"  name="latitude"  required placeholder="يجب جلب البيانات">

                        </div>
                        <div class="col">


                            <input style="visibility: hidden;width: 20px" type="text" class="form-control" id="input_longitude"  name="longitude"  required placeholder="يجب جلب البيانات">

                        </div>
                    </div>



                    <div class="form-group ">
                        <label style="visibility: hidden;" style="visibility: hidden;" for="input_t_number">معلومات اخرى</label>
                        <input style="visibility: hidden;" class="form-control" id="input_f2"  name="f2" placeholder="هذا الحقل اختياري">
                    </div>
                    <div class="form-group ">
                        <label style="visibility: hidden;" style="visibility: hidden;" for="input_t_number">معلومات اخرى</label>
                        <input style="visibility: hidden;" class="form-control" id="input_f3"  name="f3" placeholder="هذا الحقل اختياري">
                    </div>
                    <div style="visibility: hidden;" class="form-group ">
                        <label style="visibility: hidden;" for="input_t_number">معلومات اخرى</label>
                        <input style="visibility: hidden;" class="form-control" id="input_f4"  name="f4" placeholder="هذا الحقل اختياري">
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