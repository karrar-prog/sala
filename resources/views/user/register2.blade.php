@extends("layout.primary_layout")

@section("content")
    <div class="container" style="margin-top: 60px;">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <form class="col-12 col-sm-6 bg-white text-center border shadow-sm p-5" action="/register" method="post">
                    <p class="h4 mb-4">الانضمام الى فرق الخير</p>
                    <p class="h4 mb-4">{{$username}}</p>

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
                    <input type="text" value="{{$username}}" name="name" class="form-control mb-4" placeholder="اسم الفريق">
                    <input type="text" name="username" class="form-control mb-4" placeholder="رقم الهاتف المتطوع">
                    <input type="password" name="password" class="form-control mb-4" placeholder="كلمة المرور">
                    <input type="password" name="password_confirmation" class="form-control mb-4" placeholder="اعد كتابة كلمة المرور">


                    <button class="btn btn-vg-light btn-block my-4" type="submit">انضم الان</button>
                </form>
            </div>
        </div>
    </div>
@endsection