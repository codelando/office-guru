@extends('layouts.office-guru')

@section('content')
<main>
    <section class="offices pad-top">
        <div class="container">
             @if ($location)
                <div class="col-12">
                    <article class="office">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <img src="/img/locations/{{ $location->image }}" alt="{{ $location->title }}">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div id="map"></div>
                            <style type="text/css">
                                #map { width: 100%; height: 300px; }
                            </style>
                            <script>
                                function initMap() {
                                    var uluru = {lat: {{ $location->latitude }}, lng: {{ $location->longitude }}};
                                    var map = new google.maps.Map(document.getElementById('map'), {
                                        zoom: 15,
                                        center: uluru
                                    });
                                    var marker = new google.maps.Marker({
                                        position: uluru,
                                        map: map
                                    });
                                }
                            </script>
                            <script async defer
                            src="https://maps.googleapis.com/maps/api/js?key={{ $googleAppKey }}&callback=initMap">
                            </script>
                        </div>
                        <div class="col-12">
                            
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
                        </div>
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