@extends("layout.secondary_layout")
@section("content")
    <div class="container">

        مالذي سوف تسلمة للعوائل لهذا اليوم
        <div class="row">


            <div class="col-12 d-flex justify-content-center">
                <form class="col-12 col-sm-6" method="post" action="/arrived_now">
                    @csrf

                    <div class="form-group ">

                        <input type="text" class="form-control" id="input_basket" name="basket"
                               value="{{$point_id}}">
                    </div>
                    <div class="form-group ">

                        <input type="text" class="form-control" id="input_basket" name="basket"
                               value="{{$user_basket}}">
                    </div>


                    <div class="form-group alert alert-success ">
                        <label for="input_t_number">تكفي لكم يوم ؟</label>
                        <input type="number" class="form-control" id="input_basket_day" name="basket_day"
                               value="{{$user_basket_day}}">
                    </div>

                    <button  style="visibility: hidden"  id="btn_location" type="submit" class="btn btn-primary w-100 mt-5"><i class="fa fa-save fa-2x">   </i>    حفظ     </button>

                </form>


            </div>
        </div>

    </div>
@endsection

@section("script")


@endsection