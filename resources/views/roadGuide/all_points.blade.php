@extends("layout.primary_layout")

@section("navbar-color")
    {{"bg-aqua-gradient"}}
@endsection

@section("navbar-brand")
    <span id="title">{{trans("words.road_guide_title_all_points")}}</span>
@endsection
@section("content")
    <div class="container py-4">
        <div class="row1" id="all-points1">


            <div class="mb-4">
                @include("items.cities")
            </div>

            <ul>
                @php $i=1; @endphp
                @foreach($allPoints as $point)

                    <div class="card text-center " style="margin-right: -40px">
                        <div class="card-header">
                            <h5 class="card-title">{{$point->name}}</h5>

                            اخر وصول لهم كان في تأريخ
                            {{$point->date}}
                        </div>
                        <div class="card-body">
                           التفاصيل
                            <p class="card-text">  {{$point->description}}</p>

                            <a href="#" class="btn btn-shadow">
                                <svg class="bi bi-phone" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M11 1H5a1 1 0 00-1 1v12a1 1 0 001 1h6a1 1 0 001-1V2a1 1 0 00-1-1zM5 0a2 2 0 00-2 2v12a2 2 0 002 2h6a2 2 0 002-2V2a2 2 0 00-2-2H5z" clip-rule="evenodd"/>
                                    <path fill-rule="evenodd" d="M8 14a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                                </svg> {{$point->t_number}} اتصال </a>
                            <a ></a>
                            <div class="card-body">
                            <a href="#" class="btn btn-shadow"><svg class="bi bi-map" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M15.817.613A.5.5 0 0116 1v13a.5.5 0 01-.402.49l-5 1a.502.502 0 01-.196 0L5.5 14.51l-4.902.98A.5.5 0 010 15V2a.5.5 0 01.402-.49l5-1a.5.5 0 01.196 0l4.902.98 4.902-.98a.5.5 0 01.415.103zM10 2.41l-4-.8v11.98l4 .8V2.41zm1 11.98l4-.8V1.61l-4 .8v11.98zm-6-.8V1.61l-4 .8v11.98l4-.8z" clip-rule="evenodd"/>
                                </svg><h6>الموقع على الخارطة</h6>  </a>

                            </div>

                                @if(isset($_COOKIE["USER_SESSION"]))
                                    <div class="card-body">
                                        <h6 class="card-title">اضغط وصلت في حالة تسليمهم سلة او مساعدة الان</h6>
                                        <a href="/new_family" class="btn btn-success">
                                            <svg class="bi bi-check-all" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M12.354 3.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3.5-3.5a.5.5 0 11.708-.708L5 10.293l6.646-6.647a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                                                <path d="M6.25 8.043l-.896-.897a.5.5 0 10-.708.708l.897.896.707-.707zm1 2.414l.896.897a.5.5 0 00.708 0l7-7a.5.5 0 00-.708-.708L8.5 10.293l-.543-.543-.707.707z"/>
                                            </svg>  وصلت اليهم الان  </a>

                                    </div>
                                @endif


                        </div>

                        <div class="card-footer text-muted">

                        </div>

                    </div>

                    <div class="timeline-badge shadow">

                    </div>



                    </li>

                @endforeach
            </ul>


        </div>
    </div>
@endsection

