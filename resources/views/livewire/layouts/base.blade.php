<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Spec. Define</title>

    {{-- Bootstrap Styles --}}
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> -->
    <link href="{{ asset('fonts/fontawesome-all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fonts/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css"/>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
    <style>

    .u-icon{
        opacity: 0.8;
        background-image: url('/images/arrows/u.gif');
        background-repeat: no-repeat;
        background-size: 100% 100%;
        height: 5vh;
        width: 5vh;
    }
    .r-icon{
        opacity: 0.8;
        background-image: url('/images/arrows/r.gif');
        background-repeat: no-repeat;
        background-size: 100% 100%;
        height: 5vh;
        width: 5vh;
    }
    .l-icon{
        opacity: 0.8;
        background-image: url('/images/arrows/l.gif');
        background-repeat: no-repeat;
        background-size: 100% 100%;
        height: 5vh;
        width: 5vh;
    }
    .d-icon{
        opacity: 0.8;
        background-image: url('/images/arrows/d.gif');
        background-repeat: no-repeat;
        background-size: 100% 100%;
        height: 5vh;
        width: 5vh;
    }
    </style>
    @livewireStyles
</head>
<body>
    
    {{ $slot }}


    {{-- Bootstrap Scripts --}}
 
    <script src="{{asset('js/modernizr-2.8.3.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>

   
    @stack('scripts')
    @livewireScripts
   
</body>
</html>