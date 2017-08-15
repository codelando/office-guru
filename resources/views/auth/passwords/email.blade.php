@extends('layouts.office-guru')

@section('content')
<section class="user-form">
    <div class="container">
        <h2 class="pad-left pad-right">¿Olvidaste la contraseña?</h2>
        <div class="legal-text">
            <h4>Ingresá tu email y te enviaremos un enlace para reiniciarla.</h4>
        </div>

        @if (session('status'))
            <div class="row">               
                <div class="col-6 col-centered">
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                </div>
            </div>
        @endif

        <div class="pad-left pad-right pad-half-top">
            <!--Empieza el form de registro -->
            <form class="form-register" action="{{ route('password.email') }}" method="POST">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <input type="submit" class="btn btn-register" value="Recuperar mi contraseña">
                <div class="legal-text">
                    <p>¿Ya te acordaste la contraseña? <a href="{{ route('login') }}">Iniciá Sesión</a></p>
                </div>
            </form>
        </div>

    </div>
</section>
@endsection
