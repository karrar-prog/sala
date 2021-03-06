@extends("CP.layout.layout")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form class="col bg-white text-center border shadow-sm p-sm-5 p-3" action="/control-panel/center/add-lost" method="post" enctype="multipart/form-data">
                    <p class="h4 mb-4">اضافة تائه او مفقود</p>

                    @if(count($errors))
                        <div class="alert alert-danger text-right">
                            <ul class="pr-3">
                                @foreach($errors->all() as $error)
                                    <li class="my-1">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session("AddLostMessage"))
                        <div class="alert alert-danger text-center">{{session("AddLostMessage")}}</div>
                    @endif

                    {{ csrf_field() }}
                    <div class="input-group mb-4">
                        <div class="input-group-append">
                            <label class="input-group-text" for="category">الصنف</label>
                        </div>

                        <select class="custom-select rounded-0" name="category" id="category">
                            <option class="py-1 px-2" value="{{\App\Enums\LostCategory::PERSON}}">{{\App\Enums\LostCategory::getCategory(\App\Enums\LostCategory::PERSON)}}</option>
                            <option class="py-1 px-2" value="{{\App\Enums\LostCategory::Money}}">{{\App\Enums\LostCategory::getCategory(\App\Enums\LostCategory::Money)}}</option>
                            <option class="py-1 px-2" value="{{\App\Enums\LostCategory::GOLD_PIECES}}">{{\App\Enums\LostCategory::getCategory(\App\Enums\LostCategory::GOLD_PIECES)}}</option>
                            <option class="py-1 px-2" value="{{\App\Enums\LostCategory::BAGS}}">{{\App\Enums\LostCategory::getCategory(\App\Enums\LostCategory::BAGS)}}</option>
                            <option class="py-1 px-2" value="{{\App\Enums\LostCategory::MOBILE}}">{{\App\Enums\LostCategory::getCategory(\App\Enums\LostCategory::MOBILE)}}</option>
                            <option class="py-1 px-2" value="{{\App\Enums\LostCategory::OTHER}}">{{\App\Enums\LostCategory::getCategory(\App\Enums\LostCategory::OTHER)}}</option>
                        </select>
                    </div>

                    <div class="input-group mb-5">
                        <div class="custom-file rounded-0">
                            <input type="file" class="custom-file-input" name="file" id="file">
                            <label class="custom-file-label" for="file">تحميل  صورة </label>
                        </div>
                    </div>

                    <textarea class="w-100 border rounded border-secondary p-2 mb-4" rows="7" name="des_ar" placeholder="الوصف في اللغة العربية"></textarea>
                    <textarea class="w-100 border rounded border-secondary p-2 mb-4" rows="7" name="des_fa" placeholder="الوصف في اللغة الفارسية"></textarea>
                    <textarea class="w-100 border rounded border-secondary p-2 mb-4" rows="7" name="des_en" placeholder="الوصف في اللغة الانكليزية"></textarea>

                    <button class="btn btn-info px-4" type="submit">حفظ</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script>

    </script>
@endsection