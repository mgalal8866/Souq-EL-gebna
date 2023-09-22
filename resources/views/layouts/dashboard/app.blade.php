<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

@include('layouts.dashboard.head')
<meta name="csrf-token" content="{{ csrf_token() }}">

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    @include('layouts.dashboard.nav')
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    @include('layouts.dashboard.menu')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">

        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">

            <div class="content-body">

                @yield('content')
                @isset($slot)
                    {{ $slot }}
                @endisset
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <!-- BEGIN: Footer-->
    @include('layouts.dashboard.footer')
    <!-- END: Footer-->

    @include('layouts.dashboard.script')
    {{-- <script>
        //     var firebaseConfig = {
        //         apiKey: "AIzaSyBJY0LBM4gH9gYCnjqC7yy23Gjo2CFVch0",
        // authDomain: "elshroq-d4137.firebaseapp.com",
        // projectId: "elshroq-d4137",
        // storageBucket: "elshroq-d4137.appspot.com",
        // messagingSenderId: "309300782707",
        // appId: "1:309300782707:web:69e2c603d3a02754e82c06",
        // measurementId: "G-PEJM2XN1D5",
        //         databaseURL: 'https://project-id.firebaseio.com',
        //     };
        //     firebase.initializeApp(firebaseConfig);
        //     const messaging = firebase.messaging();


        //     messaging
        //         .requestPermission()
        //         .then(function() {
        //             return messaging.getToken()
        //         })
        //         .then(function(response) {
        //             $.ajaxSetup({
        //                 headers: {
        //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //                 }
        //             });
        //             $.ajax({
        //    /         url: '{{ route('store.token') }}',
        //                 type: 'POST',
        //                 data: {
        //                     token: response
        //                 },
        //                 dataType: 'JSON',
        //                 success: function(response) {
        //                     // alert('Token stored.');
        //                 },
        //                 error: function(error) {
        //                     alert(error.messaging);
        //                 },
        //             });
        //         }).catch(function(error) {
        //             alert(error);
        //         });

        //     messaging.onMessage(function(payload) {
        //         const title = payload.notification.title;
        //         const options = {
        //             body: payload.notification.body,
        //             icon: payload.notification.icon,
        //         };
        //         new Notification(title, options);
        //     });
    </script>--}}
</body>

</html>
