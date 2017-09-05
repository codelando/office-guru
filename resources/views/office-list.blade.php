	<section class="offices pad-top">
		<div class="container">
			<h2>Oficinas destacadas</h2>
			
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
                </a>
                @empty
                <div class="col-12">
                    <p>No se encontraron ubicaciones</p>
                </div>
                @endforelse
            </div>
		</div>
	</section> 	