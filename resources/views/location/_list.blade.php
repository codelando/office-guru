<div class="row office-list">
    @forelse ($locations as $location)
    <a href="{{ route('location.detail', $location->id) }}">
        <div class="col-sm-12 col-md-6 col-lg-4">
            <article class="office">
                <img src="/img/locations/{{ $location->image }}" alt="{{ $location->title }}">
                <?php 
                    $fullStars = floor($location->rating_avg / 2);
                    $starsText = 'Se el primero en evaluarla'; 
                    if ($location->rating_qty > 0) {
                        $starsText = $location->rating_qty . ' evaluaciones';
                    }
                ?>
                <p class="office-name">
                    <strong>{{ $location->name }}</strong>
                    <span class="services">
                        <?php /*
                        @foreach ($location['services'] as $icon => $desc)
                        <i class="{{ $icon }}" title="{{ $desc }}"></i>
                        @endforeach
                        */ ?>
                    </span>
                </p>
                <p class="office-address">{{ $location->address }}</p>
                <ul class="stars" title="{{ $starsText }}">
                    @for ($j = $fullStars; $j >= 1 ; $j--)
                        <li><i class="fa fa-star"></i></li>
                    @endfor
                    @if (($location->rating_avg - $fullStars * 2) >= .5)
                    <li><i class="fa fa-star-half"></i></li>
                    @endif
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