<!DOCTYPE html>
<html lang= "{{ app()->getLocale() }}" dir="{{ app()->getLocale() == "ar" ? 'rtl' : 'ltr' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <!-- font awesome CSS -->
        <!-- Favicons -->
        <link href="{{ asset('dashboard/images/loge2.svg') }}" rel="icon">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('dashboard/images/loge2.svg') }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
              integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Vendor CSS Files -->

        <title>{{ env('APP_NAME') }}</title>

        <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
        <script src="https://js.pusher.com/7.2/pusher.min.js"></script>

{{--        <script>--}}
{{--            // Enable pusher logging - don't include this in production--}}
{{--            Pusher.logToConsole = true;--}}

{{--            var pusher = new Pusher('95d01786e0e55580b108', {--}}
{{--                cluster: 'ap2'--}}
{{--            });--}}
{{--            var channel = pusher.subscribe('new-product');--}}
{{--            channel.bind('my-event', function(data) {--}}
{{--                const user_id = "{{ auth()->id() }}"--}}
{{--                if (data.user_id == user_id) {--}}
{{--                    $('#newNotification').prepend(` <li class="d-flex pr-3">--}}
{{--                                        <img class="ml-2" width="40" height="40"--}}
{{--                                             src="{{ asset('dashboard/images/bell.png') }}"--}}
{{--                                             alt="">--}}
{{--                                        <div>--}}
{{--                                            <p class="mess-content-subtitle"> ${data.message}</p>--}}
{{--                                            <span class="mess-content-subtitle">${data.title}</span>--}}
{{--                                        </div>--}}
{{--                                    </li>`);--}}
{{--                    let count = Number($('#countNotification').text());--}}
{{--                    count++;--}}
{{--                    $('#countNotification').text(count);--}}
{{--                }--}}
{{--            });--}}
{{--        </script>--}}

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"
              integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w=="
              crossorigin="anonymous" referrerpolicy="no-referrer">

        <!--  Bootstrap 5.2 css or font awesome 6 -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
              integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
              crossorigin="anonymous" referrerpolicy="no-referrer">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.rtl.min.css"
              integrity="sha384-7mQhpDl5nRA5nY9lr8F1st2NbIly/8WqhjTp+0oFxEA/QUuvlbF6M1KXezGBh3Nb" crossorigin="anonymous">

        <!-- custom style css  -->
        <link rel="stylesheet" href="{{ asset('dashboard/css/main.css') }}">

        <!-- select2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- include fancybox -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @yield('css_code')

    </head>
    <body class="{{app()->getLocale() == "ar" ? 'rtl' : 'ltr'}} bg-light">

            <!-- Page Heading -->
            @if(auth()->check())
                @include('layouts.Admin.header')
                <div class="h-73p"></div>
            @endif

            @if(auth()->check())
                <div class="row g-0">
                    <div class="col-md-2">
                        @livewire('admin.layouts.sidebar')
                    </div>
                    <div class="col-md-10">
                        <!-- Page Content -->
                        <main>
                            @yield('content')
                            {{ isset($slot) ? $slot : null }}
                        </main>
                    </div>
                </div>

            @else
                @yield('content')

                {{ isset($slot) ? $slot : null }}

            @endif


            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
                    integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
                    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

            <!--  Bootstrap Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
                    integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
                    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

            <!-- select2 -->
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

            <script src="{{ asset('dashboard/js/main.js') }}"></script>


            <!-- include fancybox -->
            <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{--            <script src="https://cdn.jsdelivr.net/npm/livewire@2.0.7/dist/livewire.js"></script>--}}

            @yield('js_code')


            <script>
                window.addEventListener('success', message => {
                    $(".modal").modal("hide");
                    Swal.fire({
                        title: '{{__('Success')}}!',
                        // text: message,
                        icon: 'success',
                        confirmButtonText: '{{__("Ok")}}',
                        timer: 1500
                    })
                })

                $('.modal').on('hide.bs.modal', function() {

                    Livewire.dispatch('refreshModal')
                })
                    // $.ajax({
                    //     url: "/users", // عنوان الطلب إلى الخادم (يجب تعديله وفقًا للعنوان الصحيح)
                    //     type: "GET", // أو "GET" اعتمادًا على طريقة الطلب المطلوبة
                    //     data: {}, // بيانات إضافية للخادم إذا لزم الأمر (اختياري)
                    //     success: function (response) {
                    //         // إذا كانت عملية الطلب ناجحة، يمكننا تحديث الصفحة هنا
                    //         location.reload(); // سيؤدي إلى إعادة تحميل الصفحة بشكل صامت
                    //     },
                    //     error: function (xhr, status, error) {
                    //         // إذا حدث خطأ أثناء عملية الطلب، يمكنك التعامل معه هنا
                    //         console.error(error);
                    //     }
                    // })


            </script>
    </body>
</html>
