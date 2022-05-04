@extends('dashboard.main.main')
@section('title')
    MyQrCode
@stop

@section('page-css')
    <style>
        .qr-block img {
            width: 200px;
        }
        .rows-qrs {
            margin: 0px;
            padding: 15px;
        }
        .qr-block {
            text-align: center;
        }
        .btn-qr-block {
             margin-top: 20px;
         }
        .btn-qr-block a {
            text-decoration: none;
        }
        .qr-block p {
            font-size: 16px;
            font-weight: 700;
        }
    </style>

@stop

@section('content')

    <section class="dashboard-section">
            <a class="open-full" href="#" onClick="fullscreen3(document.documentElement);return false;">
                     Відкрити на весь екран
            </a>

            <div class="btn-block-dashboard">
                <div id="block-new-input">
                    <div id="gener-new-qr" class="btn btn-primary">Створити стіл</div>
                </div>
            </div>
            <div class="row rows-qrs">
                @include('dashboard.qrlist',['list'=>$list])
            </div>







    </section>




@endsection


@section('page-script')
    <script>
        function fullscreen3(element) {
            if(element.requestFullScreen) {
                element.requestFullScreen();
            } else if(element.mozRequestFullScreen) {
                element.mozRequestFullScreen();
            } else if(element.webkitRequestFullScreen) {
                element.webkitRequestFullScreen();
            }
        }

        $(document).on('click', '#gener-new-qr', function (){
            var data = '<div class="input-group mb-3 div-form-new-qr" style=" width: 300px;"> <input name="name" type="text" class="form-control form-new-qr" placeholder="Name" aria-label="Name" aria-describedby="basic-addon2"><div class="input-group-append"><button id="news-qr-generate" class="btn btn-outline-secondary btn-form-new-qr" type="button">Додати</button></div></div>';
            newqr(data);
        });

        function newqr(data) {
            $('#block-new-input').empty();
            $('#block-new-input').append(data).show();
        }

        $(document).on('click', '#news-qr-generate', function (){
            $.ajax({
                url: '{{url("/dashboard/{ Auth::user()->id }/myqrcode/newqrcode")}}',
                dataType: 'JSON',
                type: 'GET',
                data: {
                    name: $('input[name=name]').val(),
                    _token: jQuery('input[name=_token]').val(),
                },
                success: function (data) {
                    console.log('success');
                    newqrreload(data['html']);

                },
                error: function (data) {
                    console.log(data)
                    console.log("error")
                }
            });
        });
        function newqrreload(data) {
            $('.rows-qrs').empty();
            $('.rows-qrs').append(data).show();
        }
        $(document).on('click', '#delete-qr', function (){
            var atr = $(this).attr('data-index-id');
            console.log(atr)
            $.ajax({
                url: '{{url("/dashboard/{ Auth::user()->id }/myqrcode/delete")}}',
                dataType: 'JSON',
                type: 'GET',
                data: {
                    ids: atr,
                    _token: jQuery('input[name=_token]').val(),
                },
                success: function (data) {
                    console.log('success');
                    newqrreload(data['html']);

                },
                error: function (data) {
                    console.log(data)
                    console.log("error")
                }
            });
        });




    </script>

@stop
