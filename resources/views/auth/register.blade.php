@extends('layouts.office-guru')

@section('content')
<section class="user-form">
    <div class="container">
        <h2>Registrate ahora y empezá a trabajar desde donde quieras</h2>
        <div class="legal-text">
            <h4>¿Ya tenés cuenta? <a href="{{ route('login') }}">Iniciá Sesión</a></h4>
        </div>

        <div class="pad-left pad-right pad-half-top">
            <!--Empieza el form de registro -->
            <form class="form-register" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="form-group">        
                    <label for="first_name">Nombre</label>
                    <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

                    @if ($errors->has('first_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                    @endif
                </div>


                <div class="form-group">        
                    <label for="last_name">Apellido</label>
                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

                    @if ($errors->has('last_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="pass_confirm">Confirmar Contraseña</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>

                <input type="submit" class="btn btn-register" value="Registrarme">

                <div class="legal-text">
                    <!-- <label for="terms" class="terms">
                        <input type="checkbox" id="newsletter" name="newsletter"> Me gustaría recibir cupones, promociones, encuestas y actualizaciones por correo electrónico sobre OfficeGuru y sus socios.
                    </label> -->
                    <p>Al hacer clic en Registrarme, acepto los <a href="#" target="_blank">términos y condiciones del servicio.</a></p>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
