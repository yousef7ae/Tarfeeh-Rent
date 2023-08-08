<div class="sidbar h-100 ">
    <!-- start  menu mobail btm -->
    <button class="navbar-toggler position-relative border-0 collapsed mt-3 d-md-none d-block" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
                            <span class="btn overlaymnu d-lg-none d-block">
                                    <span class="our-btn"></span>
                            </span>
    </button>

    <!-- end  menu mobail btm -->
    <nav class="navbar navbar-expand-lg navbar-light pb-0">
        <div class="navbar-collapse" id="navbarSupportedContent">

            <div class="text-center">
                <a class="navbar-brand d-lg-none d-block logo-mo my-4 " href="#"><img
                        class="img-fluid" width="100" src="{{asset('dashboard/images/loge.svg')}}" alt=""></a>
            </div>
            <ul class="navbar-nav flex-column position-relative z-index40 w-100">
                <li class="nav-item mx-0 mb-2 {{request()->is('admin') ? 'active' : ''}}">
                    <a class="nav-link font-weight-bold text-white d-flex align-items-center"
                       href="{{route('admin.home')}}" wire:navigate.hover><i
                            class="fa-sharp fa-solid fa-house fs-5 pe-2"></i> {{__('Home')}} </a>
                </li>

                <li class="nav-item mx-0 mb-2 {{request()->is('admin/users') ? 'active' : ''}}">
                    <a class="nav-link font-weight-bold text-white d-flex align-items-center"
                       href="{{route('admin.users')}}" wire:navigate.hover><i
                            class="fa-solid w-35p fa-user-group fs-5 pe-2"></i>{{__('users')}} </a>
                </li>
{{--                --}}{{----}}
{{--                                @if(auth()->user()->can('roles show') )--}}
{{--                                    <li class="nav-item mx-0 mb-2 {{request()->is('admin/roles') ? 'active' : ''}}">--}}
{{--                                        <a class="nav-link font-weight-bold text-white d-flex align-items-center"--}}
{{--                                           href="{{ route('admin.roles') }}"><i--}}
{{--                                                class="fa-solid w-35p fa-lock fs-5 pe-2"></i>{{__('Roles')}} </a>--}}
{{--                                    </li>--}}
{{--                                @endif --}}

                    <li class="nav-item mx-0 mb-2 {{request()->is('admin/service-categories') ? 'active' : ''}}">
                        <a class="nav-link font-weight-bold text-white d-flex align-items-center"
                           href="{{route('admin.service_categories')}}" wire:navigate.hover><i
                                class="fa-solid w-35p fa-bars fs-5 pe-2"></i>{{__('Services Categories')}} </a>
                    </li>


                    <li class="nav-item mx-0 mb-2 {{request()->is('admin/services') ? 'active' : ''}}">
                        <a class="nav-link font-weight-bold text-white d-flex align-items-center"
                           href="{{route('admin.services')}}" wire:navigate.hover><i
                                class="fa-solid w-35p fa-server fs-5 pe-2"></i>{{__('Services')}} </a>
                    </li>


                    <li class="nav-item mx-0 mb-2 {{request()->is('admin/products') ? 'active' : ''}}">
                        <a class="nav-link font-weight-bold text-white d-flex align-items-center"
                           href="{{route('admin.products')}}" wire:navigate.hover"><i
                                class="fa-solid w-35p fa-clipboard fs-5 pe-2"></i>{{__('Products')}} </a>
                    </li>

                    <li class="nav-item mx-0 mb-2 {{request()->is('admin/ads') ? 'active' : ''}}">
                        <a class="nav-link font-weight-bold text-white d-flex align-items-center"
                           href="#"><i
                                class="fa-solid w-35p fa-paper-plane fs-5 pe-2"></i>{{__('Ads')}} </a>
                    </li>

                    <li class="nav-item mx-0 mb-2 {{request()->is('admin/countries') ? 'active' : ''}}">
                        <a class="nav-link font-weight-bold text-white d-flex align-items-center"
                           href="#"><i
                                class="fa-solid w-35p fa-globe fs-5 pe-2"></i>{{__('Countries')}} </a>
                    </li>

                    <li class="nav-item mx-0 mb-2 {{request()->is('admin/cities') ? 'active' : ''}}">
                        <a class="nav-link font-weight-bold text-white d-flex align-items-center"
                           href="#"><i
                                class="fa-solid w-35p fa-globe fs-5 pe-2"></i>{{__('Cities')}} </a>
                    </li>

                    <li class="nav-item mx-0 mb-2 {{request()->is('admin/reservations') ? 'active' : ''}}">
                        <a class="nav-link font-weight-bold text-white d-flex align-items-center"
                           href="#"><i
                                class="fa-solid w-35p fa-calendar-days fs-5 pe-2"></i>{{__('Reservations')}} </a>
                    </li>

                    <li class="nav-item mx-0 mb-2 {{request()->is('admin/contacts') ? 'active' : ''}}">
                        <a class="nav-link font-weight-bold text-white d-flex align-items-center"
                           href="#"><i
                                class="fa-solid w-35p fa-envelope fs-5 pe-2"></i>{{__('Contacts')}} </a>
                    </li>

                    <li class="nav-item mx-0 mb-2 {{request()->is('admin/pages') ? 'active' : ''}}">
                        <a class="nav-link font-weight-bold text-white d-flex align-items-center"
                           href="#"><i
                                class="fa-solid w-35p fa-envelope fs-5 pe-2"></i>{{__('Pages')}} </a>
                    </li>

                    <li class="nav-item mx-0 mb-2 {{request()->is('admin/settings') ? 'active' : ''}}">
                        <a class="nav-link font-weight-bold text-white d-flex align-items-center"
                           href="#"><i
                                class="fa-solid w-35p fa-gear fs-5 pe-2"></i>{{__('Settings')}} </a>
                    </li>


            </ul>
        </div>
    </nav>
</div>
