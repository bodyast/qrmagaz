@extends('dashboard.main.main')
@section('title')
    Моє Меню
@stop

@section('page-css')
    <style>
        .product-cat .row {
            margin: 0px;
            border-bottom: 1px dotted #00000087;
            margin-bottom: 5px;
        }
        #menu_list {
            margin: 20px;
        }
        .cat-block {
            border: 2px solid #0d6efd4a;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #fff;
            filter: drop-shadow(0px 0px 6.86154px rgba(58, 20, 113, 0.35)) drop-shadow(0px 3.43077px 6.86154px rgba(32, 66, 134, 0.49));
            position: relative;
        }
        .product-cat p {
            margin-bottom: 0px;
        }
        .cat-block-option div {
            line-height: 0.3;
            font-size: 20px;
        }
        .cat-block-option {
            position: absolute;
            right: 1%;
            cursor: pointer;
            width: 10px;
            height: 25px;
            text-align: center;
        }
        .option-iner {
            position: absolute;
            right: 1%;
            top: 0px;
            border: 2px solid #0d6efd4a;
            padding: 5px;
            background-color: #fff;
            border-radius: 9px;
        }
        .option-iner div{
            cursor: pointer;
        }
        .head-cat {
            display: flex;
            align-items: center;
        }
        .add_prod {
            margin: 0px 20px;
            font-size: 14px;
            border: 1px solid #8e8e8ea1;
            color: #8e8e8e;
            padding: 4px;
            border-radius: 9px;
            background-color: #fff;
            cursor: pointer;
        }
        .add_prod:hover {
            color: #000;
            border-color: #000;
        }
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
        .modal_product {
            position: fixed;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
            background-color: #00000059;
        }
    </style>
@stop

@section('content')

    <section class="dashboard-section">
        <div class="btn-block-dashboard">
            <div id="block-new-input">
                <div id="gener-new-cat" class="btn btn-primary">Додати Категорію</div>
            </div>
        </div>
        <div id="menu_list">
            @include('dashboard.list_mymenu',['list'=>$list])
        </div>
        <div id="addmodal_prod"></div>
    </section>




@endsection


@section('page-script')
    <script>
        $(document).on('click', '#gener-new-cat', function (){
            var data = '<div class="input-group mb-3 div-form-new-qr" style=" width: 300px;"> <input name="category" type="text" class="form-control form-new-qr" placeholder="Категорія" aria-label="Category" aria-describedby="basic-addon2"><div class="input-group-append"><button id="news-cat" class="btn btn-outline-secondary btn-form-new-qr" type="button">Додати</button></div></div>';
            newqr(data);
        });

        function newqr(data) {
            $('#block-new-input').empty();
            $('#block-new-input').append(data).show();
        }

        $(document).on('click', '#news-cat', function (){
            $.ajax({
                url: '{{url("/dashboard/{ Auth::user()->id }/mymenu/newcategory")}}',
                dataType: 'JSON',
                type: 'GET',
                data: {
                    name: $('input[name=category]').val(),
                    _token: jQuery('input[name=_token]').val(),
                },
                success: function (data) {
                    console.log('success');
                    console.log(data);
                    newqrreload(data['html']);

                },
                error: function (data) {
                    console.log(data)
                    console.log("error")
                }
            });
        });
        $(document).on('click', '.delete-cat', function (){
            var atr = $(this).attr('data-index-id');
            $.ajax({
                url: '{{url("/dashboard/{ Auth::user()->id }/mymenu/delcategorymodal")}}',
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
        $(document).on('click', '.delete-cat-true', function (){
            var atr = $(this).attr('data-index-id');
            $.ajax({
                url: '{{url("/dashboard/{ Auth::user()->id }/mymenu/delcategory")}}',
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

        function newqrreload(data) {
            $('#menu_list').empty();
            $('#menu_list').append(data).show();
        }
        $(document).on('click','.cat-block-option', function (){
            var atr = $(this).attr('data-index-id');
            console.log(atr)
            $('.option-iner').addClass('hidden');
            $('#option-id-'+atr).removeClass('hidden');
        });

        $(document).mouseup(function (e) {
            var container = $(".option-iner");
            var containers = $(".cat-block-option");
            if (container.has(e.target).length === 0 && containers.has(e.target).length === 0){
                container.addClass('hidden');
            }
        });

        $(document).on('click', '.add_prod', function (){
            var atr = $(this).attr('data-index-id');
            $.ajax({
                url: '{{url("/dashboard/{ Auth::user()->id }/mymenu/addproduct")}}',
                dataType: 'JSON',
                type: 'GET',
                data: {
                    ids: atr,
                    _token: jQuery('input[name=_token]').val(),
                },
                success: function (data) {
                    console.log('success');
                    newqrreloadmodal(data['html']);

                },
                error: function (data) {
                    console.log(data)
                    console.log("error")
                }
            });
        });
        $(document).on('click', '.red-cat', function (){
            var atr = $(this).attr('data-index-id');
            $.ajax({
                url: '{{url("/dashboard/{ Auth::user()->id }/mymenu/addcatmodal")}}',
                dataType: 'JSON',
                type: 'GET',
                data: {
                    ids: atr,
                    _token: jQuery('input[name=_token]').val(),
                },
                success: function (data) {
                    console.log('success');
                    newqrreloadmodal(data['html']);

                },
                error: function (data) {
                    console.log(data)
                    console.log("error")
                }
            });
        });
        function newqrreloadmodal(data) {
            $('#addmodal_prod').empty();
            $('#addmodal_prod').append(data).show();
        }
        function newqrreloadmodalcategory(id, data) {
            $('#cat-list-'+id).empty();
            $('#cat-list-'+id).append(data).show();
        }

        $(document).on('click', '.mod-prod-add .close', function (){
            $('#addmodal_prod').empty();
        });

        $(document).ready(function (){
            const input = document.querySelector('input');
            const preview = document.querySelector('.preview');
            input.style.opacity = 0;
        })


        $(document).on('click', '.form-control-file', function (){
            FReader = new FileReader();

            // событие, когда файл загрузится
            FReader.onload = function(e) {
                document.querySelector("#result").src = e.target.result;
            };

            // выполнение функции при выборки файла
            document.getElementById("file").addEventListener("change", loadImageFile);


            // функция выборки файла
            function loadImageFile() {
                var fileall = document.getElementById("file").files;
                var file = document.getElementById("file").files[0];

                console.log(fileall);
                FReader.readAsDataURL(file);
            }
        });

        $(document).on('click', '.edit-prods', function (){
            var atr = $(this).attr('data-index-id');
            $.ajax({
                url: '{{url("/dashboard/{ Auth::user()->id }/mymenu/editprod")}}',
                dataType: 'JSON',
                type: 'GET',
                data: {
                    ids: atr,
                    _token: jQuery('input[name=_token]').val(),
                },
                success: function (data) {
                    console.log('success');
                    newqrreloadmodal(data['html']);

                },
                error: function (data) {
                    console.log("error")
                }
            });
        });

        $(document).on('click', '.del-prods', function (){
            var atr = $(this).attr('data-index-id');
            $.ajax({
                url: '{{url("/dashboard/{ Auth::user()->id }/mymenu/delprods")}}',
                dataType: 'JSON',
                type: 'GET',
                data: {
                    ids: atr,
                    _token: jQuery('input[name=_token]').val(),
                },
                success: function (data) {
                    console.log('success');
                    newqrreloadmodal(data['html']);

                },
                error: function (data) {
                    console.log("error")
                }
            });
        });

        $(document).on('click', '.del-prods', function (){
            var atr = $(this).attr('data-index-id');
            $.ajax({
                url: '{{url("/dashboard/{ Auth::user()->id }/mymenu/delprods")}}',
                dataType: 'JSON',
                type: 'GET',
                data: {
                    ids: atr,
                    _token: jQuery('input[name=_token]').val(),
                },
                success: function (data) {
                    console.log('success');
                    newqrreloadmodal(data['html']);

                },
                error: function (data) {
                    console.log("error")
                }
            });
        });
        $(document).on('click', '.del-product', function (){
            var atr = $(this).attr('data-index-id');
            $.ajax({
                url: '{{url("/dashboard/{ Auth::user()->id }/mymenu/delproduct")}}',
                dataType: 'JSON',
                type: 'GET',
                data: {
                    ids: atr,
                    _token: jQuery('input[name=_token]').val(),
                },
                success: function (data) {
                    console.log('success');
                    newqrreloadmodalcategory(data['cat_id'], data['html']);
                    $('#addmodal_prod').empty();

                },
                error: function (data) {
                    console.log("error")
                }
            });
        });




    </script>


@stop
