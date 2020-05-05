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

                                {{--<form method="post" action="{{ route('family_search') }}" action="/family_search">--}}
                                <form method="post" action="{{ route('search') }}" >
                                    @csrf
                                    <div style="width: 250px" class="col-sm-3">
                                        <input style="width: 250px" type="number" class="form-control" id="input_name" name="t_day" required
                                               placeholder="لم نصل لهم منذ (اكتب عدد الايام) ايام">
                                        <div style="width: 250px ;margin-top: 10px" class="form-group">
                                            @include("items.alhay")
                                        </div>
                                        <button style="width: 250px" type="submit" class="btn btn-shadow "> ابحث الان
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
    </div>
    @endsection