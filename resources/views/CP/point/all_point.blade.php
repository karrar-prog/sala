@extends("layout.secondary_layout")

@section("content")
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


    {{--<div >--}}

     {{--<a href="/123456789123456789/new_point"><i  class="rounded-circle m-4 fa fa-plus-circle fa-3x shadow"></i></a>--}}

    {{--</div>--}}

<div class="container col-7 mb-4" >

    @include("items.cities")


</div>

    <div >




           </div>
    @foreach($points as $point)
        <li class="list-group-item">
            <div class="container">
                <div class="row">

                    <div class="col-sm-1 ">
                        {{$point->id}}

                    </div>
                    <div class="col-sm-1 ">
                        {{$point->name}}

                    </div>
                    <div class="col-sm-1">

                        {{$point->description}}


                    </div>
                    <div class="col-sm-3">
                        تم الوصول بواسطة:  {{$point->userphone}}


                    </div>

                    <div class="col-sm">
                        @if($point->date == null)
                            لم يتم التوثيق بعد
                        @else
                            اخر وصول : {{$point->date}}
                           بواسطة ({{$point->userphone}})
                        @endif


                    </div>
                    <div class="col-sm3">
                        <a href="/123456789123456789/edit_point/{{$point->id}}" class="btn btn-shadow"><svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"/>
                                <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 00.5.5H4v.5a.5.5 0 00.5.5H5v.5a.5.5 0 00.5.5H6v-1.5a.5.5 0 00-.5-.5H5v-.5a.5.5 0 00-.5-.5H3z" clip-rule="evenodd"/>
                            </svg> تعديل </a>
                        <a href="/123456789123456789/ensure_delete/{{$point->id}}"  class="btn btn-primary">حذف<svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                        @if($point->date == null)
                            <a href="/validate/{{$point->id}}" class="btn btn-success">

                                <svg class="bi bi-check-all" width="1em" height="1em" viewBox="0 0 16 16"
                                     fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M12.354 3.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3.5-3.5a.5.5 0 11.708-.708L5 10.293l6.646-6.647a.5.5 0 01.708 0z"
                                          clip-rule="evenodd"/>
                                    <path d="M6.25 8.043l-.896-.897a.5.5 0 10-.708.708l.897.896.707-.707zm1 2.414l.896.897a.5.5 0 00.708 0l7-7a.5.5 0 00-.708-.708L8.5 10.293l-.543-.543-.707.707z"/>
                                </svg>
                                كشف </a>
                        @endif

                        <a href="/arrived_now/{{$point->id}}" class="btn btn-success">

                            <svg class="bi bi-check-all" width="1em" height="1em" viewBox="0 0 16 16"
                                 fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M12.354 3.646a.5.5 0 010 .708l-7 7a.5.5 0 01-.708 0l-3.5-3.5a.5.5 0 11.708-.708L5 10.293l6.646-6.647a.5.5 0 01.708 0z"
                                      clip-rule="evenodd"/>
                                <path d="M6.25 8.043l-.896-.897a.5.5 0 10-.708.708l.897.896.707-.707zm1 2.414l.896.897a.5.5 0 00.708 0l7-7a.5.5 0 00-.708-.708L8.5 10.293l-.543-.543-.707.707z"/>
                            </svg>
   تسليم سلة الان </a>
                    </div>
                </div>
            </div>
        </li>
    @endforeach


@endsection