<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.js"
        integrity="sha512-Xo0Jh8MsOn72LGV8kU5LsclG7SUzJsWGhXbWcYs2MAmChkQzwiW/yTQwdJ8w6UA9C6EVG18GHb/TrYpYCjyAQw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.css"
        integrity="sha512-KXol4x3sVoO+8ZsWPFI/r5KBVB/ssCGB5tsv2nVOKwLg33wTFP3fmnXa47FdSVIshVTgsYk/1734xSk9aFIa4A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .page-login {
            padding: 5%;
        }
    </style>
</head>

<body>
    <div class="page-login">
        <div class="ui centered grid container">
            <div class="nine wide column">
                <div class="ui fluid card">
                    <div class="content">
                        <form class="ui form" action="/register" method="POST">
                            @csrf
                            @method('post')

                            <div class="field">
                                <label>Username</label>
                                <input name="name" type="text" placeholder="username">
                            </div>
                            <div class="field">
                                <label>email</label>
                                <input name="email" type="email" placeholder="name">
                            </div>
                            <div class="field">
                                <label>Password</label>
                                <input name="password" type="password" placeholder="password">
                            </div>
                            <button class="ui positive labeled icon button" type="submit">
                                <i class="unlock alternate icon"></i>
                                Register
                            </button>
                        </form>
                    </div>
                </div>


                @if ($errors->any())
                    <div class="ui icon warning message">
                        <i class="lock icon"></i>
                        <div class="content">
                            <div class="header">
                                Registration failed!
                            </div>
                            <p>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>

</html>
