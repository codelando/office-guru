@extends('layouts.office-guru')

@section('content')
<section class="user-form">
    <div class="container">
        <h2>Nueva ubicación</h2>
        <form method="POST" action="{{ route('location.store') }}" class="form-register">
            {{ csrf_field() }}

            <!--
            $table->string('address');
            $table->float('latitude', 10, 6);
            $table->float('longitude', 10, 6);
            $table->string('image');
            $table->string('website');
            -->

            <div class="form-group">
                <label for="name">Nombre</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ $location->name or old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea id="description" type="text" class="form-control" name="description" required>{{ $location->description or old('description') }}</textarea>

                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="address">Dirección</label>
                <input id="address" type="text" class="form-control" name="address" value="{{ $location->address or old('address') }}" required>

                @if ($errors->has('address'))
                    <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                @endif
            </div> 

            <input type="submit" class="btn btn-register" value="Guardar Cambios">

        </form>
    </div>

</section>  

@endsection