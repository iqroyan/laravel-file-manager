@if(session()->has('notifications'))
    <script type="text/javascript">
        swal({
            title: "{{ session('notifications.title') }}",
            text: "{{ session('notifications.message') }}",
            type: "{{ session('notifications.level') }}",
            timer: 2000,
            showConfirmButton: false

        });
    </script>
@endif

@if(session()->has('notifications_delay'))
    <script type="text/javascript">
        swal({
            title: "{{ session('notifications_delay.title') }}",
            text: "{{ session('notifications_delay.message') }}",
            type: "{{ session('notifications_delay.level') }}",
            confirmButtonText: "Okay"
        });
    </script>
@endif
@if (isset($errors))
    @dump($errors)
    <script type="text/javascript">
        swal({
            title: "اوه مشکل ",
            text: "ss",
            type: "error",
            confirmButtonText: "خب !"
        });
    </script>
@endif