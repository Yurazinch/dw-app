<div class="conf-step__movies">
    @if(count($films) === 0)
            <p class="conf-step__paragraph">Фильмов для просмотра нет. Добавьте!</p>
        @else
        @foreach($films as $film)
            <div wire:key="{{ $film->id }}" class="conf-step__movie" draggable="true">
                <a href="{{ route('film.toremove', ['name' => $film->name]) }}"><button class="conf-step__button conf-step__button-trash"></button></a>
                <img class="conf-step__movie-poster" alt="{{ $film->name }}" src="/{{ $film->poster }}">
                <h3 class="conf-step__movie-title">{{ $film->name }}</h3>
                <p class="conf-step__movie-duration">{{ $film->duration }} минут</p>
            </div>   
        @endforeach
    @endif
</div>