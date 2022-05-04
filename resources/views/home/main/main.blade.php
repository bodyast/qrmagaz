<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="utf-8"/>
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/assets/css/home.css">
    @yield('page-css')
    @yield('subpage-css')
</head>
<body>

@include('home.main.header')


@yield('content')





@include('home.main.footer')
@yield('page-script-left')
@yield('page-script')
@yield('subpage-scripts')
@yield('template-custom-script')
<script>
    $('.my_accaunt').hover(function (){
        $('.accaunt_login').removeClass('hidden');
    }, function(){
            $('.accaunt_login').addClass('hidden');
    });

    $(document).on('click', '#login', function (){
        $.ajax({
            url: '{{url("/account/login")}}',
            dataType: 'JSON',
            type: 'GET',
            data: {
                _token: jQuery('input[name=_token]').val(),
            },
            success: function (data) {
                console.log('success');
                reloadLogin(data);
            },
            error: function (data) {
                console.log("error")
            }
        });
    });


    function reloadLogin(data) {
        $('.body-page').addClass('anim-body-page');
        $('#logins').empty();
        $('#logins').append(data['html']).show();
    }
    $(document).on('click', '.close-form-login', function (){
        $('#logins').empty();
        $('.body-page').removeClass('anim-body-page');
    });
</script>
</body>

</html>
