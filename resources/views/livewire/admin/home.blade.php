<section class="container">
    <div class="row max-w970 mx-auto mt-md-5 mt-3">
        <div class="col-12"><h1 class="text-primary h-3 text-center mb-4">الصفحة الرئيسية </h1></div>

{{--        @foreach($models as $index => $model)--}}
            <div class="col-md-4 col-6 mb-4">
                <div class="card shadow border-0 rounded-2 p-md-3 p-2 h-100">
                    <div class="row h-100 align-items-center g-md-2 g-1">
                        <div class="col-sm-5 text-center">
{{--                            @if ($index == "users")--}}
                                <img width="70" class="img-fluid" src="{{asset('dashboard/images/users.png')}}" alt="">
{{--                            @else--}}
                                <img width="70" class="img-fluid" src="{{asset('dashboard/images/list.png')}}" alt="">
{{--                            @endif--}}
                        </div>
                        <div class="col-sm-7 text-sm-start text-center">
                            <h5 class="fw-bold mb-0"> عدد {{--{{ __($index) }}--}} </h5>
                            <h2 class="fw-bolder fs-45p text-primary text-black pah mb-0">{{--{{$model}}--}}</h2>
                        </div>
                    </div>
                </div>
            </div>

        <div class="col-md-4 col-6 mb-4">
            <div class="card shadow border-0 rounded-2 p-md-3 p-2 h-100">
                <div class="row h-100 align-items-center g-md-2 g-1">
                    <div class="col-sm-5 text-center">
                        {{--                            @if ($index == "users")--}}
                        <img width="70" class="img-fluid" src="{{asset('dashboard/images/users.png')}}" alt="">
                        {{--                            @else--}}
                        <img width="70" class="img-fluid" src="{{asset('dashboard/images/list.png')}}" alt="">
                        {{--                            @endif--}}
                    </div>
                    <div class="col-sm-7 text-sm-start text-center">
                        <h5 class="fw-bold mb-0"> عدد {{--{{ __($index) }}--}} </h5>
                        <h2 class="fw-bolder fs-45p text-primary text-black pah mb-0">{{--{{$model}}--}}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-6 mb-4">
            <div class="card shadow border-0 rounded-2 p-md-3 p-2 h-100">
                <div class="row h-100 align-items-center g-md-2 g-1">
                    <div class="col-sm-5 text-center">
                        {{--                            @if ($index == "users")--}}
                        <img width="70" class="img-fluid" src="{{asset('dashboard/images/users.png')}}" alt="">
                        {{--                            @else--}}
                        <img width="70" class="img-fluid" src="{{asset('dashboard/images/list.png')}}" alt="">
                        {{--                            @endif--}}
                    </div>
                    <div class="col-sm-7 text-sm-start text-center">
                        <h5 class="fw-bold mb-0"> عدد {{--{{ __($index) }}--}} </h5>
                        <h2 class="fw-bolder fs-45p text-primary text-black pah mb-0">{{--{{$model}}--}}</h2>
                    </div>
                </div>
            </div>
        </div>

{{--        @endforeach--}}

    </div>
</section>
