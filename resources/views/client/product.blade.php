@extends('client.main.main')
@section('title')
    Product
@stop

@section('page-css')
    <style>
        .mobile-section {
            background-image: url(/images/fone-bg-1.jpg);
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
            <div class="col-md-6 text-right">Стіл 1</div>
        </div>
        <div class="row category-mobile">

        </div>
    </section>

    <input type="hidden"
           name="_token"
           value="{!!csrf_token()!!}">

@endsection
@section('page-script')
    <script>


    </script>



@stop
