@extends('client.main.main')
@section('title')
    Product
@stop

@section('page-css')
    <style>
        .mobile-section {
            /*background-image: url(/images/fone-bg-1.jpg);*/
            background-size: 100%;
            background-attachment: fixed;
            height: 100vh;
        }


    </style>


@stop

@section('content')

    <section class="mobile-section">
        <div class="row header-menu">
            <div class="col-md-6 text-left">Меню</div>
            <div class="col-md-6 text-right">{{$table->name}}</div>
        </div>
        <div class="product-mobile">
            <div class="imp-product">
                <img src="/files/menu/{{$product->user_id}}/{{$product->img}}" class="img-prod">
            </div>
            <div class="info-product">
                <table class="table-info-product">
                    <tr>
                        <td>Вага</td>
                        <td>{{$product->mass}} грам</td>
                    </tr>
                    <tr>
                        <td>Ціна</td>
                        <td>{{$product->price}} грн</td>
                    </tr>
                </table>
                <div class="orders">
                    <div class="row btn-cols-row">
                        <div class="col-md-6 btn-cols">
                            <div id="colsminus" class="cols">-</div>
                            <div id="cols-quantity" class="cols">1</div>
                            <div id="colsplus" class="cols">+</div>
                        </div>
                    </div>
                    <div class="btn btn-add-cart">Додати в замовлення</div>
                </div>
                <p class="description-prod">{{$product->description}}</p>
            </div>
        </div>
        @include('client.modal_menu')

    </section>
    <input type="hidden"
           name="_token"
           value="{!!csrf_token()!!}">

@endsection
@section('page-script')
    <script>
        $(document).on('click', '#colsplus', function (){
           var num = $('#cols-quantity').text();
           num = Number(num)+1;
            if(num != 0){
                $('#cols-quantity').text(num);
            }
        });
        $(document).on('click', '#colsminus', function (){
            var num = $('#cols-quantity').text();
            num = Number(num)-1;
            if(num != 0){
                $('#cols-quantity').text(num);
            }
        });

        var myElement = document.getElementById('togle-menu-product');
        const windowOuterHeight = window.outerHeight;

        // create a simple instance
        // by default, it only adds horizontal recognizers
        var mc = new Hammer(myElement);

        // let the pan gesture support all directions.
        // this will block the vertical scrolling on a touch-device while on the element
        mc.get('pan').set({ direction: Hammer.DIRECTION_ALL });

        // listen to events...
        mc.on("panleft panright panup pandown tap press", function(ev) {
            // myElement.textContent = ev.type +" gesture detected.";
            if(ev.type == 'panup'){
                $('.body-modal-order').css({height: 500 })
                $('.modal-body-bg').css({
                    height: 500,
                    position: 'fixed',
                    height: '100vh',
                })
                $('.display-order').css({
                    display: 'flex'
                })
            }
            if(ev.type == 'pandown'){
                $('.body-modal-order').css({height: 70 })
                $('.modal-body-bg').css({
                    height: 'auto',
                    position: 'auto',
                    height: 'auto',
                })
                $('.display-order').css({
                    display: 'none'
                })
            }
        });

        $(document).on('click', '.btn-add-cart', function (){
            var quantity = $('#cols-quantity').text();
            quantity = Number(quantity);
            console.log(quantity)
            $.ajax({
                url: '{{url("/menu/product/{$product->user_id}/{$key}/{$product->id}/add")}}',
                dataType: 'JSON',
                type: 'GET',
                data: {
                    quantity: quantity,
                    _token: jQuery('input[name=_token]').val(),
                },
                success: function (data) {
                    reloadadd(data['html']);
                },
                error: function (data) {
                    console.log(data)
                    console.log("error")
                }
            });
        });
        function reloadadd(data){
            $('#new_menu_add').empty();
            $('#new_menu_add').append(data).show();
        }



    </script>



@stop
