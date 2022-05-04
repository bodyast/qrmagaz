@extends('home.main.main')
@section('title')
    Sign up
@stop

@section('page-css')
    <style>
        .register-form {
            margin-top: 7%;
            margin-bottom: 200px;
        }

    </style>


@stop

@section('content')
<section class="content">
    <div class="register-form">
        <section class="vh-100">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-12 col-xl-11">
                        <div class="card text-black" style="border-radius: 25px;">
                            <div class="card-body p-md-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="name" class="col-md-4 col-form-label text-md-right">
                                                    {{ __('Name') }}
                                                </label>

                                                <div class="col-md-6">
                                                    <input
                                                        id="name"
                                                        type="text"
                                                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                        name="name"
                                                        value="{{ old('name') }}"
                                                        required
                                                        autofocus
                                                    >
                                                    @if ($errors->has('name'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="email" class="col-md-4 col-form-label text-md-right">
                                                    {{ __('E-Mail Address') }}
                                                </label>

                                                <div class="col-md-6">
                                                    <input
                                                        id="email"
                                                        type="email"
                                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                        name="email"
                                                        value="{{ old('email') }}"
                                                        required
                                                    >
                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Register') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                        <img src="/images/img_6.png" class="img-fluid" alt="Sample image">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>




@endsection


@section('page-script')

@stop
