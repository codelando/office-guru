@extends('layouts.office-guru')

@section('content')
<section class="user-form">
    <div class="container">
        <h2>Perfil de usuario</h2>

        <div class="pad-left pad-right pad-half-top">
            <!--Empieza el form de registro -->
            <form class="form-register" method="POST" action="{{ route('user.profile') }}">
            <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}

                <div class="form-group">        
                    <label for="first_name">Nombre</label>
                    <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $user->first_name or old('first_name') }}" required autofocus>

                    @if ($errors->has('first_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                    @endif
                </div>


                <div class="form-group">        
                    <label for="last_name">Apellido</label>
                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $user->last_name or old('last_name') }}" required autofocus>

                    @if ($errors->has('last_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ $user->email or old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <input type="submit" class="btn btn-register" value="Guardar Cambios">

            </form>
        </div>
    </div>
</section>
@endsection
