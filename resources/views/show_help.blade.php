@extends("layout.secondary_layout")
@section("content")
    <div class="container">

        مالذي سوف لهذه العائلة لهذا اليوم
        <div class="row">


            <div class="col-12 d-flex justify-content-center">
                <form class="col-12 col-sm-6" method="post" action="/arrived_now">
                    @csrf
                    <div class="form-group alert alert-success ">
                        <div class="form-group ">

                            <input style="visibility: hidden;" type="text" class="form-control" id="input_basket" name="id"
                                   value="{{$point_id}}">
                        </div>
                        <div class="form-group ">

                        <textarea style="height: 200px" type="text" class="form-control" id="input_basket" name="basket"
                                  value="{{$basket}}"> {{$basket}}</textarea>



                            <label for="input_t_number">تكفي لكم يوم ؟</label>
                            <input type="number" class="form-control" id="input_basket_day" name="basket_day"
                                   value="{{$basket_day}}"></div>


                        <button   id="btn_location" type="submit" class="btn btn-primary w-100 mt-5"><i class="fa fa-send fa-2x">   </i>    تسليم الان     </button>
                    </div>

                </form>


            </div>


        </div>
        مساعدة اخرى - دواء - كهربائيات ....
        <div class="row">


            <div class="col-12 d-flex justify-content-center">
                <form class="col-12 col-sm-6" method="post" action="/arrived_now">
                    @csrf
                    <div class="form-group alert alert-success ">
                        <div class="form-group ">

                            <input style="visibility: hidden;" type="text" class="form-control" id="input_basket" name="id"
                                   value="{{$point_id}}">
                        </div>
                        <div class="form-group ">

                        <textarea type="text" class="form-control" id="input_basket" name="basket"> </textarea>



                            <label for="input_t_number">تكفي لكم يوم ؟</label>
                            <input type="number" class="form-control" id="input_basket_day" name="basket_day"
                                 ></div>


                        <button   id="btn_location" type="submit" class="btn btn-primary w-100 mt-5"><i class="fa fa-send fa-2x">   </i>    تسليم الان     </button>
                    </div>

                </form>


            </div>


        </div>

    </div>
@endsection

@section("script")


@endsection