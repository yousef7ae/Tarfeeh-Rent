<style>
    ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .notification-drop {
        font-family: 'Ubuntu', sans-serif;
        color: #444;
    }

    .notification-drop .item {
        padding: 10px;
        font-size: 18px;
        position: relative;
        border-bottom: 1px solid #ddd;
    }

    .notification-drop .item:hover {
        cursor: pointer;
    }

    .notification-drop .item i {
        margin-left: 10px;
    }

    .notification-drop .item ul {
        display: none;
        position: absolute;
        top: 100%;
        background: #fff;
        left: -280px;
        right: 0;
        z-index: 1;
        border-top: 1px solid #ddd;
    }

    .notification-drop .item ul hr {
        margin: 4px 0 4px 0;
    }

    .notification-drop .item ul li a {
        text-decoration: none;
    }

    .notification-drop .item ul li {
        font-size: 16px;
        padding: 4px 0 8px 25px;
        align-items: center;
    }

    .notification-drop .item ul li:hover {
        background: #ddd;
        color: rgba(0, 0, 0, 0.8);
    }

    @media screen and (min-width: 500px) {
        .notification-drop {
            display: flex;
            justify-content: flex-end;
        }

        .notification-drop .item {
            border: none;
        }
    }

    .notification-bell {
        font-size: 20px;
        color: white;
    }

    .btn__badge {
        background: #FF5D5D;
        color: white;
        font-size: 12px;
        position: absolute;
        top: 0;
        right: 0;
        padding: 3px 10px;
        border-radius: 50%;
    }

    .pulse-button {
        box-shadow: 0 0 0 0 rgba(255, 0, 0, 0.5);
        -webkit-animation: pulse 1.5s infinite;
    }

    .pulse-button:hover {
        -webkit-animation: none;
    }

    @-webkit-keyframes pulse {
        0% {
            -moz-transform: scale(0.9);
            -ms-transform: scale(0.9);
            -webkit-transform: scale(0.9);
            transform: scale(0.9);
        }
        70% {
            -moz-transform: scale(1);
            -ms-transform: scale(1);
            -webkit-transform: scale(1);
            transform: scale(1);
            box-shadow: 0 0 0 50px rgba(255, 0, 0, 0);
        }
        100% {
            -moz-transform: scale(0.9);
            -ms-transform: scale(0.9);
            -webkit-transform: scale(0.9);
            transform: scale(0.9);
            box-shadow: 0 0 0 0 rgba(255, 0, 0, 0);
        }
    }

    .notification-text {
        font-size: 14px;
        font-weight: bold;
        color: black;
    }

    .notification-text span {
        float: right;
    }
</style>

<header class="shadow-sm text-white fixed-top">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between py-2">
            <a class="navbar-brand me-0 d-md-inline-block d-none position-relative" target="_blank"
               href="#"><img width="50" height="50" class="img-fluid"
                                                   src="{{asset('dashboard/images/12.png')}}" alt="">
            </a>
            <p>اهلا بك في تطبيق الحجوزات</p>
            <div class="d-flex justify-content-center align-self-center">
                <div class="ps-2" style="float: left;">

                    {{--
                        <p class="mb-0 fs-12p"><i class="fa fa-bell" style="font-size:24px"></i>
                        </p>
                     --}}

                    <audio controls class='notify' style='display:none'>>
                        <source src="{{ asset('ZURQ2FE-notification.mp3')}}" type="audio/mpeg">
                    </audio>
                    <ul class="notification-drop">
                        <li class="item dropdown-notifications">
                            <i class="fa fa-bell-o notification-bell" aria-hidden="true"></i>
                            <span id = "countNotification" class="btn__badge pulse-button data-count notif-count"
                                  data-count="0">{{-- {{ Auth::user()->unreadNotifications->count()}}--}} </span>
                            <ul id="newNotification">
{{--                                @foreach(Auth::user()->unreadNotifications->take(5) as $notify)--}}
                                    <li class="d-flex pr-3">
                                        <img class="ml-2" width="40" height="40"
                                             src="{{ asset('dashboard/images/bell.png') }}"
                                             alt="">
                                        <div>
                                            <p class="mess-content-subtitle">{{-- {{ $notify->data['message'] }}--}}</p>
                                            <span class="mess-content-subtitle">{{--{{ $notify->data['title'] }}--}}</span>
                                        </div>
                                    </li>
                                    <hr>
{{--                                @endforeach--}}
                                {{-- notification.markread --}}
                                <li class="d-flex justify-content-center"><a href="{{--{{ route('admin.notifications') }}--}}"
                                                                             style="color: #0d6efd; font-size: inherit;">عرض
                                        جميع الاشعارات</a>
                                </li>

                            </ul>
                        </li>
                        <li class="dropdown d-inline-block">
                            <button class="text-white px-2 hover border-0 d-inline-block btn dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                <i class='bx bx-globe'></i>
                                <span style="text-transform: uppercase;">{{ app()->getLocale() }}</span>
                            </button>
                            <ul class="dropdown-menu">
                                @foreach(config('app.locales') as $key => $locale)
                                    <li><a class="dropdown-item text-danger" href="?language={{$key}}">{{ $locale }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>

                {{-- <div class="ps-2" style=" float: left;
                                margin-left: 40px;">
                                    <p class="mb-0 fs-12p">   <i class="fa fa-comments" style="font-size:24px"></i>
                                    </p>
                                </div> --}}

                <img class="rounded-circle border border-white shadow" width="30" height="30"
                     src="{{asset('dashboard/images/1.png')}}" alt="">
                <div class="ps-2">
                    <p class="mb-0 fs-12p">{{--{{ Str::limit(auth()->user()->name, 15) }}--}}yousef</p>
                    <div class="dropdown">
                        <a href="#" class="btn py-1 px-0 border-0 dropdown-toggle text-white fs-12p" type="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
{{--                            {{ __(auth()->user()->roles->pluck('name')->implode(',')) }}--}}
                        </a>
                        <ul class="dropdown-menu ">
                            {{--                                <li><a class="dropdown-item" href="#">Action</a></li>--}}
                            <li>
{{--                                <a class="dropdown-item fs-12p "--}}
{{--                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();"--}}
{{--                                   href="{{route('admin.logout')}}"><i--}}
{{--                                        class="fa-solid fa-sign-in  pe-1"></i>{{__("Logout")}}--}}
{{--                                </a>--}}

                                <a class="dropdown-item" href="{{ route('admin.logout') }}">
                                    <i class="fas text-warning fa-layer-group pe-2"></i>{{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="#" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!--  mobile-->
        <div class="d-md-none d-flex justify-content-between">
            <a class="navbar-brand me-0 d-md-none d-block" href="#"><img width="50"
                                                                                               class="img-fluid"
                                                                                               src="{{ asset('dashboard/images/loge.svg')}}"
                                                                                               alt=""></a>
            <button class="navbar-toggler position-relative border-0 collapsed mt-3" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                                <span class="our-btn">
                                    <span class="the-bar"></span>
                                    <span class="the-bar"></span>
                                    <span class="the-bar"></span>
                                </span>
                <span class="btn overlaymnu d-lg-none d-block">
                                    <span class="our-btn"></span>
                            </span>
            </button>
        </div>
    </div>
</header>
