<div class="popup__wrapper">
    <form action="{{ route('seance.store') }}" method="post" accept-charset="utf-8">
        @csrf
        <label class="conf-step__label conf-step__label-fullsize">
        Выбранный зал
            <input class="conf-step__input" type="text" value="" name="hall" wire:model="name" required readonly/>            
        </label>
        <label class="conf-step__label conf-step__label-fullsize">
        Выбрать фильм
            <select class="conf-step__input" name="film" placeholder="Список фильмов здесь" required>
                <option>Список фильмов здесь</option>
                @foreach($films as $film)
                    <option wire:key="{{ $film->id }}">{{ $film->name }}</option>
                @endforeach
            </select>
        </label>
        <label class="conf-step__label conf-step__label-fullsize">
        Время начала            
            <input class="conf-step__input" type="time" value="" name="start_time" wire:model="value" required readonly/>
        </label>

        <div class="conf-step__buttons text-center">
        <input type="submit" value="Добавить" class="conf-step__button conf-step__button-accent" data-event="seance_add">
        <a href="{{ route('admin.home') }}"><button class="conf-step__button conf-step__button-regular" type="button">Отменить</button></a>
        </div>        
    </form>
</div>
