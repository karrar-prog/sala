@extends("layout.secondary_layout")

@section("content")




    <div class="card text-center">
        <div class="card-header">

        </div>
        <div class="card-body">
            <h5 class="card-title">هل  انت متأكد من حظر هذه العائلة ؟</h5>


        </div>
        <div class="card-footer text-muted">
            <a href="/list/1" class="btn btn-success"><i class="fa fa-chevron-right  "> الرجوع الى الرئيسية </i> </a>

            <a href="/123456789123456789/delete_point/{{$id}}"  class="btn btn-warning"><i class="fa fa-trash-alt  "> متأكد - هذه العائلة غير مستحقة  </i></a>
        </div>
    </div>









@endsection
