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
        .img-prod {
            text-align: center;
            border: 1px solid #b7b9d3;
            filter: drop-shadow(0px 0px 6.86154px rgba(58, 20, 113, 0.35)) drop-shadow(0px 3.43077px 6.86154px rgba(32, 66, 134, 0.49));
            border-radius: 12px;
            background-color: #fff;
            width: 70%;
        }
        .imp-product {
            text-align: center;
            margin-top: 10%;
        }
        .info-product {
            padding: 5%;
        }
        table.table-info-product {
            display: flex;
            justify-content: space-around;
            margin-top: 6%;
        }
        table.table-info-product td {
            width: 100px;
            font-size: 17px;
            font-weight: 600;
            border: 1px solid #00000030;
            padding: 4px 2px;
            text-align: center;
        }
        .table-info-product tbody{
            filter: drop-shadow(0px 0px 6.86154px rgba(58, 20, 113, 0.35)) drop-shadow(0px 3.43077px 6.86154px rgba(32, 66, 134, 0.49));
            background-color: #fff;
        }
        .description-prod {
            margin-top: 15px;
            color: #00000096;
        }
        .col-md-6.btn-cols {
            display: flex;
            justify-content: space-around;
            width: 50%;
        }
        .orders {
            margin-top: 40px;
            margin-bottom: 20px;
            text-align: center;
        }
        .btn-cols-row {
            display: flex;
            justify-content: space-around;
        }
        .cols {
            font-size: 20px;
        }
        .btn-add-cart {
            background-color: #00000063;
            color: #fff;
            filter: drop-shadow(0px 0px 6.86154px rgba(58, 20, 113, 0.35)) drop-shadow(0px 3.43077px 6.86154px rgba(32, 66, 134, 0.49));
            margin-top: 20px;
            transition-duration: 0.3s;
        }
        .btn-add-cart:hover {
            background-color: #3A97F4;
            color: #fff;
        }
        .cols-min {
            width: 50%;
            text-align: center;
        }
        .btn-product-bottom {
            filter: drop-shadow(0px 18px 49px #CCD6F9);
            border-radius: 6px;
            border: 2px solid #3A97F4;
            width: 100%;
            background-color: #fff;
            transition-duration: 0.2s;
        }
        .btn-product-bottom:hover {
            background-color: #3A97F4;
            color: #fff;
        }

    </style>


@stop

@section('content')

    <section class="mobile-section">
        <div class="row header-menu">
            <div class="col-md-6 text-left">Меню</div>
            <div class="col-md-6 text-right">Стіл 1</div>
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
                            <div id="cols" class="cols">1</div>
                            <div id="colsplus" class="cols">+</div>
                        </div>
                    </div>
                    <div class="btn btn-add-cart">Додати в замовлення</div>
                </div>
                <p class="description-prod">{{$product->description}}</p>
            </div>
        </div>
     <div id="modal-manu-order">
         <div class="modal-body-bg">
             <div id ="body-modal-order" class="body-modal-order" style="height: 70px">
                 <div id="togle-menu-product" class="togle-menu-product">
                     <div class="togler-line"></div>
                 </div>
                 <h3>Моє замовлення</h3>
                     <div class="row">
                         <div class="colsm3">
                             <img class="order-menu-img" src="/files/menu/{{$product->user_id}}/{{$product->img}}">
                         </div>
                         <div class="colsm3">
                             Піцца
                         </div>
                         <div class="colsm3 cols-number-order">
                             <div>-</div>
                             <div>3</div>
                             <div>+</div>
                         </div>
                         <div class="colsm3">
                             200грн
                         </div>
                     </div>
                     <div class="product-status">Статус: <span class="status">готується</span></div>
                     <div class="row">
                         <div class="colsm3">
                             <img class="order-menu-img" src="/files/menu/{{$product->user_id}}/{{$product->img}}">
                         </div>
                         <div class="colsm3">
                             Піцца
                         </div>
                         <div class="colsm3 cols-number-order">
                             <div>-</div>
                             <div>3</div>
                             <div>+</div>
                         </div>
                         <div class="colsm3">
                             200грн
                         </div>
                     </div>
                     <div class="product-status">Статус: <span class="status">готується</span></div>


                    <div class="order-menu-modal">
                        <div class="row display-order" style="display: none">
                            <div class="cols-min">
                                <div class="btn btn-product-bottom menu_btn">
                                    Моє замовлення
                                </div>
                            </div>
                            <div class="cols-min">
                                <div class="btn btn-product-bottom order_btn">
                                    Оплатити
                                </div>
                            </div>
                        </div>

                    </div>
             </div>
         </div>
     </div>

    </section>
    <input type="hidden"
           name="_token"
           value="{!!csrf_token()!!}">

@endsection
@section('page-script')
    <script>
        $(document).on('click', '#colsplus', function (){
           var num = $('#cols').text();
           num = Number(num)+1;
            if(num != 0){
                $('#cols').text(num);
            }
        });
        $(document).on('click', '#colsminus', function (){
            var num = $('#cols').text();
            num = Number(num)-1;
            if(num != 0){
                $('#cols').text(num);
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




    </script>



@stop
