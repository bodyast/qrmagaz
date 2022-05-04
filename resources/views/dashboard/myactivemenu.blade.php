@extends('dashboard.main.main')
@section('title')
    Мої Замовлення
@stop

@section('page-css')
    <style>
        .content-active-menu .row {
            padding: 0px;
            margin: 0px;
        }
        .content-active-menu {
            margin: 1%;
        }
        .row-menu-active{
            display: flex;
            align-items: center;
        }
        .img-prod img {
            width: 100%;
        }
        .menu-lists {
            border: 2px solid #0d6efd4a;
            padding: 10px;
            margin-right: 10px;
            border-radius: 7px;
            background-color: #fff;
            filter: drop-shadow(0px 0px 6.86154px rgba(58, 20, 113, 0.35)) drop-shadow(0px 3.43077px 6.86154px rgba(32, 66, 134, 0.49));
        }

    </style>
@stop

@section('content')

    <section class="dashboard-section">
        <div class="content-active-menu">
            <div id="myactivemenu" class="row">
                @include('dashboard.listactivemenu')
            </div>
        </div>
    </section>




@endsection


@section('page-script')
    <script>

        $(document).ready(function (){
                    $.ajax({
                        url: '{{url("/dashboard/{ Auth::user()->id }/activmenu/getlist")}}',
                        dataType: 'JSON',
                        type: 'GET',
                        data: {
                            _token: jQuery('input[name=_token]').val(),
                        },
                        success: function (data) {
                            console.log('success');
                            $('#myactivemenu').empty();
                            $('#myactivemenu').append(data['html']).show();
                            setTimeout(function() {
                                newqrreload()
                            }, 5000);
                        },
                        error: function (data) {
                            console.log(data)
                            console.log("error")
                        }
                    });

        });

        function newqrreload(data) {
            $.ajax({
                url: '{{url("/dashboard/{ Auth::user()->id }/activmenu/getlist")}}',
                dataType: 'JSON',
                type: 'GET',
                data: {
                    _token: jQuery('input[name=_token]').val(),
                },
                success: function (data) {
                    console.log('success');
                    $('#myactivemenu').empty();
                    $('#myactivemenu').append(data['html']).show();
                    setTimeout(function() {
                        newqrreload()
                    }, 5000);
                },
                error: function (data) {
                    console.log(data)
                    console.log("error")
                }
            });
        }


    </script>
@stop
