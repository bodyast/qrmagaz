@extends('client.main.main')
@section('title')
    Menu
@stop

@section('page-css')
    <style>
        .mobile-section {
            background-image: url(/images/fone-bg-1.jpg);
            background-size: 100%;
            background-attachment: fixed;
        }
    </style>


@stop

@section('content')

    <section class="mobile-section">
        <div class="row header-menu">
            <div class="col-md-6 text-left">Меню</div>
            <div class="col-md-6 text-right">{{$table->name}}</div>
        </div>
        <div class="row category-mobile">
            @include('client.list_cat', ['lists'=> $category])
        </div>
    </section>

    <input type="hidden"
           name="_token"
           value="{!!csrf_token()!!}">

@endsection
@section('page-script')
    <script>
        $(document).on('click', '.category-mobile-id', function (){
            var atr = $(this).attr('data-index-id');
            $.ajax({
                url: '{{url("/menu/getproduct/{$key}")}}',
                dataType: 'JSON',
                type: 'GET',
                data: {
                    cat_id: atr,
                    _token: jQuery('input[name=_token]').val(),
                },
                success: function (data) {
                    console.log('success');
                    $('.list-cat').addClass('anim-cat');
                    setTimeout(function() {
                        reloadProduct(data['html']);
                    }, 1000);


                },
                error: function (data) {
                    console.log(data)
                    console.log("error")
                }
            });
        });
        function reloadProduct(data) {
            $('.category-mobile').empty();
            $('.category-mobile').append(data).show();
        }

    </script>



@stop
