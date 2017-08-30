@extends('layouts.office-guru')

@section('content')
<main>
    <section class="search">
        <div class="video-container">
            <video id="bgVideo" controls preload="true" autoplay loop muted>
                <source src="{{ asset('img/office-bg.mp4') }}" type="video/mp4" > 
            </video>
        </div>

        <div class="container-search">
            <div class="row">
                <div class="w-100 txt-center">
                    <div class="search-container">              
                        <h2>¡Encontrá tu próxima oficina!</h2>
                        <form name="office-search" action="offices.php" method="post">
                            <select name="office_type" id="office_type">
                                <option value="">Estoy buscado...</option>
                                <option value="">Palermo</option>
                                <option value="">San Telmo</option>
                                <option value="">La luna</option>
                            </select>
                            <input type="text" name="office_location" placeholder="cerca de...">
                        </form> 
                    </div>          
                </div>
            </div>
        </div>
    </section>
    <section class="offices pad-top">
        <div class="container">
            <h2>Oficinas encontradas</h2>
            
            <div class="row office-list">
                @forelse ($locations as $location)
                <a href="{{ route('location.detail', $location->id) }}">
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <article class="office">
                            <img src="/img/locations/{{ $location->image }}" alt="{{ $location->title }}">
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
                            <p>{{ $location->name }}</p>
                            <ul class="stars">
                                <?php $fullStars = floor($location->rating_avg / 2) ?>
                                @for ($j = $fullStars; $j >= 1 ; $j--)
                                    <li><i class="icon-star"></i></li>
                                @endfor
                                @if (($location->rating_avg - $fullStars * 2) >= .5)
                                <li><i class="icon-star-half"></i></li>
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
                </a>
                @empty
                <div class="col-12">
                    <p>No se encontraron ubicaciones</p>
                </div>
                @endforelse
            </div>
            {{ $locations->links() }}
        </div>
    </section>  
</main>
@endsection