@extends("layout.secondary_layout")

@section("content")




    <div class="card text-center">
        <div class="card-header">

        </div>
        <div class="card-body">
            <h5 class="card-title">سوف تقوم بحذف معلومات العائلة من الخارطة</h5>


        </div>
        <div class="card-footer text-muted">
            <a href="/123456789123456789/all_point" class="btn btn-success"><i class="fa fa-chevron-right  "> لا اريد الحذف</i> </a>

            <a href="/123456789123456789/delete_point/{{$id}}"  class="btn btn-warning"><i class="fa fa-trash-alt  "> متأكد من ذلك - احذف  </i></a>
        </div>
    </div>









@endsection
