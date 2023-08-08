@if (session('success'))
    <script>
        Swal.fire({
            title: 'success!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'Cool',
            timer: 1500
        })
    </script>
@endif

@if (session()->has('danger'))
    <script>
        Swal.fire({
            title: 'success!',
            text: '{{ session("success") }}',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
    </script>
@endif

@if (session()->has('info'))
    <script>
        Swal.fire({
            title: 'success!',
            text: '{{ session("success") }}',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
    </script>
@endif

@if ($errors->any())
    <script>
        Swal.fire({
            title: 'error!',
            html: '@foreach($errors->all() as $error){{ $error }} <br> @endforeach',
            icon: 'error',
            confirmButtonText: 'Cool'
        })
    </script>

@endif

<script>
    window.livewire.on('success', (message) => {
        $(".modal").modal("hide");

        Swal.fire({
            title: message,
            icon: 'success',
            confirmButtonText: 'Ok',
            timer: 1500
        })
    });

</script>
