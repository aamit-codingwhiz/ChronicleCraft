<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.js"
        integrity="sha512-Xo0Jh8MsOn72LGV8kU5LsclG7SUzJsWGhXbWcYs2MAmChkQzwiW/yTQwdJ8w6UA9C6EVG18GHb/TrYpYCjyAQw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.css"
        integrity="sha512-KXol4x3sVoO+8ZsWPFI/r5KBVB/ssCGB5tsv2nVOKwLg33wTFP3fmnXa47FdSVIshVTgsYk/1734xSk9aFIa4A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <script src="{{ asset('js/script.js') }}"></script> --}}

    <style>
        body {
            padding: 1%;
        }
    </style>
</head>

<body>
    <div class="ui container">
        <div class="ui borderless blue inverted pointing menu">
            <div class="ui container">
                <a class="header active item" href="\">Home</a>
                <a class="item" href="/blogs">Blog</a>
                <a class="item" href="#root">About Us</a>
            </div>
            <div class="right menu">
                @auth
                    <a class="item" href="\logout">logout</a>
                @else
                    <a class="item" href="\login">Login</a>
                    <a class="item" href="\registration">Register</a>
                @endauth
            </div>
        </div>

        @yield('content')
        <script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector("#myTextarea"))
                .catch(error => {
                    console.error(error);
                });
        </script>


    </div>
</body>

</html>
