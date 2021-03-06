




@section("menu-modal-content")
    <div class="modal-content border-0 rounded-0 shadow-special">
        <h4 class="modal-header bg-vg-light text-white rounded-0 m-0">
            <span>المجالس</span>
        </h4>

        <div class="modal-body">
            <div class="list-group">
                <a href="{{route('eventsGallery')}}" class="list-group-item list-group-item-action">
                    <i class="fas fa-camera-retro"></i>
                    <span class="mx-2">الاستديو</span>
                </a>
                <a href="{{route('addMajles')}}" class="list-group-item list-group-item-action">
                    <i class="fas fa-plus"></i>
                    <span class="mx-2">اضافة مجلس</span>
                </a>
                <a href="{{route('majalesy')}}" class="list-group-item list-group-item-action">
                    <i class="fas fa-calendar-alt"></i>
                    <span class="mx-2">مجالسي</span>
                </a>
                <a href="{{route('majales')}}" class="list-group-item list-group-item-action">
                    <i class="fas fa-calendar-alt"></i>
                    <span class="mx-2">عرض جميع المناسبات</span>
                </a>
                <a href="{{route('eventsUpcoming')}}" class="list-group-item list-group-item-action">
                    <i class="fas fa-hourglass-start"></i>
                    <span class="mx-2">عرض المناسبات التي لم تبدء الى الان</span>
                </a>
                <a href="{{route('eventsEnded')}}" class="list-group-item list-group-item-action">
                    <i class="fas fa-hourglass-end"></i>
                    <span class="mx-2">عرض المناسبات الفائتة</span>
                </a>
                <a href="{{route('eventsStarted')}}" class="list-group-item list-group-item-action">
                    <i class="fas fa-hourglass-half"></i>
                    <span class="mx-2">عرض المناسبات التي بدأت </span>
                </a>

                <div class="list-group-item" data-toggle="collapse" data-target="#category-list">
                    <i class="fas fa-building"></i>
                    <span class="mx-2">عرض المناسبات حسب المحافظة</span>

                    <div class="collapse" id="category-list">
                        <div class="list-group list-group-flush mx-3">
                            @for($i=0; $i<count(App\Enums\Cities::CITIES[app()->getLocale()]); $i++)
                                <a href="{{route('eventsCity', App\Enums\Cities::CITIES[app()->getLocale()][$i])}}"
                                   class="list-group-item list-group-item-action">
                                    {{App\Enums\Cities::CITIES[app()->getLocale()][$i]}}
                                </a>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection