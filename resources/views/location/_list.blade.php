<div class="row office-list">
    @forelse ($locations as $location)
    <a href="{{ route('location.show', $location->id) }}">
        <div class="col-sm-12 col-md-6 col-lg-4">
            <article class="office">
                <div class="office-img">
                    <img src="/img/locations/{{ $location->image }}" alt="{{ $location->title }}">
                </div>
                <?php 
                    $fullStars = floor($location->rating_avg / 2);
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
                <!-- star star-o star-half-o -->
                <p class="office-address">{{ $location->address }}</p>
                <ul class="stars">
                    <?php
                        /** @todo esta lógica se puede mejorar */
                        $fullStars = floor($location->rating_avg / 2);
                        $emptyStars = 5 - ceil($location->rating_avg / 2);
                        $halfStars = 5 - $fullStars - $emptyStars;
                    ?>
                    @for ($j = $fullStars; $j >= 1 ; $j--)
                        <li><i class="fa fa-star"></i></li>
                    @endfor
                    @for ($j = $halfStars; $j >= 1 ; $j--)
                        <li><i class="fa fa-star-half-o"></i></li>
                    @endfor
                    @for ($j = $emptyStars; $j >= 1 ; $j--)
                        <li><i class="fa fa-star-o"></i></li>
                    @endfor

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