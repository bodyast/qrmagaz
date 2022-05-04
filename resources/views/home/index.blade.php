@extends('home.main.main')
@section('title')
    QrMagazine
@stop

@section('page-css')
    <style>
        .index-block-info {
            width: 700px;
            height: 250px;
            border: 1px solid #fff;
            background-color: #fff;
            filter: drop-shadow(0px 0px 6.86154px rgba(14, 32, 96, 0.25)) drop-shadow(0px 3.43077px 6.86154px rgba(14, 32, 96, 0.25));
            border-radius: 12px;
            display: flex;
            align-items: center;
            margin-bottom: 37px;
            transition-duration: 1s;
        }
        .index-block-info:hover {
            width: 750px;
            transition-duration: 1s;
        }
        .block-info-item{
            width: 100%;
            align-items: center;
        }
        .block-info-item p{
            font-weight: 500;
            font-size: 21px;
        }
        .index-info{
            margin-top: 30px;
        }
        .block-info-item img {
            width: 75%;
            margin-left: 15%;
        }
        .img-index-mob {
            width: 77%;
            margin-top: 30%;
        }
        .index_mob_block{
            position: relative;
        }
        .img_tab-index-1, .img_tab-index-3 {
            background-image: url(/images/img_5.png);
            position: absolute;
            width: 600px;
            height: 600px;
            background-size: 100%;
            bottom: -20%;
            z-index: -1;
            left: 16%;
        }
        .img_tab-index-2, .img_tab-index-4 {
            background-image: url(/images/img_5.png);
            position: absolute;
            width: 600px;
            height: 600px;
            background-size: 100%;
            top: -12%;
            z-index: -1;
            left: 16%;
        }

    </style>


@stop

@section('content')
    <section class="content body-page">
        <div class="title">
            <h1>New feature for your comfort</h1>
            <p class="subtitle">With Tiponline scandpay feature your guests will enjoy the simplicity of ordering and payments. </p>
        </div>


        <div class="row">
            <div class="col-md-7 index-info">
                <div class="index-block-info tab-hover-1">
                    <div class="row block-info-item">
                        <div class="col-md-5"></div>
                        <div class="col-md-7">
                            <p>Get registered or leave your email for contacting</p>
                        </div>
                    </div>
                </div>
                <div class="index-block-info tab-hover-2">
                    <div class="row block-info-item">
                        <div class="col-md-5">
                            <div>
                                <img src="/images/img_6.png">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <p>Scan QR code have access to tiponline interface, add your friend</p>
                        </div>
                    </div>
                </div>
                <div class="index-block-info tab-hover-3">
                    <div class="row block-info-item">
                        <div class="col-md-5">
                            <div>
                                <img src="/images/img_7.png">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <p>Choose, order, and make payment immediately</p>
                        </div>
                    </div>
                </div>
                <div class="index-block-info tab-hover-4">
                    <div class="row block-info-item">
                        <div class="col-md-5">
                            <div>
                                <img src="/images/img_8.png">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <p>Save your time, increase your staffs tips. Register now</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="index_mob_block tab-index-1">
                    <img class="img-index-mob" src="/images/img_9.png">
                    <div class="img_tab-index-1"></div>
                </div>
                <div class="index_mob_block tab-index-2 hidden">
                    <img class="img-index-mob" src="/images/img_10.png">
                    <div class="img_tab-index-2"></div>
                </div>
                <div class="index_mob_block tab-index-3 hidden">
                    <img class="img-index-mob" src="/images/img_11.png">
                    <div class="img_tab-index-3"></div>
                </div>
                <div class="index_mob_block tab-index-4 hidden">
                    <img class="img-index-mob" src="/images/img_12.png">
                    <div class="img_tab-index-4"></div>
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
        $('.tab-hover-1').hover(function (){
            $('.tab-index-2').addClass('hidden');
            $('.tab-index-3').addClass('hidden');
            $('.tab-index-4').addClass('hidden');
            $('.tab-index-1').removeClass('hidden');
        });
        $('.tab-hover-2').hover(function (){
            $('.tab-index-1').addClass('hidden');
            $('.tab-index-3').addClass('hidden');
            $('.tab-index-4').addClass('hidden');
            $('.tab-index-2').removeClass('hidden');
        });
        $('.tab-hover-3').hover(function (){
            $('.tab-index-2').addClass('hidden');
            $('.tab-index-1').addClass('hidden');
            $('.tab-index-4').addClass('hidden');
            $('.tab-index-3').removeClass('hidden');
        });
        $('.tab-hover-4').hover(function (){
            $('.tab-index-2').addClass('hidden');
            $('.tab-index-3').addClass('hidden');
            $('.tab-index-1').addClass('hidden');
            $('.tab-index-4').removeClass('hidden');
        });




    </script>

@stop
