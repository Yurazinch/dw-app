<div>
    @foreach($films as $film)
        <section class="movie">
            <div class="movie__info">
                <div class="movie__poster">
                <img class="movie__poster-image" alt="{{ $film->name }}" src="/storage/{{ $film->poster }}">
                </div>
                <div class="movie__description">
                <h2 class="movie__title">{{ $film->name }}</h2>
                <p class="movie__synopsis">{{ $film->description }}</p>
                <p class="movie__data">
                    <span class="movie__data-duration">{{ $film->duration }} минут</span>
                    <span class="movie__data-origin">{{ $film->country }}</span>
                </p>
                </div>
            </div>  
        
            @foreach($halls as $hall)
                <div class="movie-seances__hall">
                    <h3 class="movie-seances__hall-title">{{ $hall->name }}</h3>
                    <ul class="movie-seances__list">
                        @foreach($film->seances->where('hall_id', $hall->id) as $seance)
                            <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">{{ $seance->start }}</a></li>
                        @endforeach
                    </ul>
                </div>                
            @endforeach
        </section>
    @endforeach
</div>
