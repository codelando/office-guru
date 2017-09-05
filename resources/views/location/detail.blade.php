@extends('layouts.office-guru')

@section('content')
<main>
    <section class="offices pad-top">
        <div class="container">
             @if ($location)
                <div class="col-12">
                    <article class="office">
                        <img src="/img/locations/{{ $location->image }}" alt="{{ $location->title }}">
                        <div>El mapa va allí →</div>
                        <p>
                            <strong>{{ $location->name }}</strong>
                            <span class="services">
                                <?php /*
                                @foreach ($location['services'] as $icon => $desc)
                                <i class="{{ $icon }}" title="{{ $desc }}"></i>
                                @endforeach
                                */ ?>
                            </span>
                        </p>
                        <p>{{ $location->address }}</p>
                        <p>{{ $location->description }}</p>
                        <ul class="stars">
                                <?php $fullStars = floor($location->rating_avg / 2) ?>
                                @for ($j = $fullStars; $j >= 1 ; $j--)
                                    <li><i class="fa fa-star"></i></li>
                                @endfor
                                @if (($location->rating_avg - $fullStars * 2) >= .5)
                                <li><i class="fa fa-star-half"></i></li>
                                @endif
                                <li>
                                    @if ($location->rating_qty > 0)
                                    {{ $location->rating_qty . ' evaluaciones' }}
                                    @else 
                                    {{ 'Se el primero en evaluarla' }} 
                                    @endif
                                </li>
                        </ul>
                    </article>
                </div>
            @else
                <div class="col-12">
                    <p>No se encontraron ubicaciones</p>
                </div>
            @endif
        </div>
    </section>  
</main>
@endsection