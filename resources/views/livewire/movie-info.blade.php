<div style="display: {{ $info }};">
    @if(count($films) === 0)
        <p class="conf-step__paragraph">Нет фильмов для просмотра!</p>
    @else
        @foreach($films as $film)
            <section class="movie">
                <div class="movie__info">
                    <div class="movie__poster">
                    <img class="movie__poster-image" alt="{{ $film->name }}" src="storage/{{ $film->poster }}">
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

                @if(count($halls) === 0)
                    <p class="conf-step__paragraph">Залы не добавлены!</p>
                @else
                    @foreach($halls as $hall)
                        <div class="movie-seances__hall">
                            <h3 class="movie-seances__hall-title">{{ $hall->name }}</h3>
                            <ul class="movie-seances__list">
                                @foreach($film->seances->where('hall_id', $hall->id) as $seance)
                                    <li class="movie-seances__time-block">
                                        <span wire:click="toBuying({{ $seance }})" class="movie-seances__time" style="cursor: pointer;">
                                            {{ $seance->start }}
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>                
                    @endforeach
                    @script
                    <script>
                        $wire.on('date-null', () => {
                            alert('Не выбрана дата!');
                        });
                        $wire.on('time-left', () => {
                            alert('На этот сеанс уже нельзя купить билет');
                        });
                    </script>
                    @endscript
                @endif
            </section>
        @endforeach
    @endif
</div>
