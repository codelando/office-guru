@extends('layouts.office-guru')

@section('content')
<section class="user-form">
    <div class="container">
        <h2 class="pad-left pad-right">Iniciar Sesión</h2>
        <div class="legal-text">
            <h4>¿Todavía no formás parte? <a href="{{ route('register') }}">Creá tu cuenta</a></h4>
        </div>

        <!--Empieza el form de registro -->
        <div class="pad-left pad-right pad-half-top">
            <form class="form-login" action="{{ route('login') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
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
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                    </label>
                </div>

                <input type="submit" class="btn btn-register" value="Iniciar Sesión">

            </form>
            <div class="legal-text">
                <p><a href="{{ route('password.request') }}">¿Olvidaste la contraseña?</a></p>
            </div>
        </div>
    </div>
</section>
@endsection
