<div class="popup__wrapper">    
    <form action="{{ route('seance.store') }}" method="post" accept-charset="utf-8">
        @csrf        
        <label class="conf-step__label conf-step__label-fullsize">
        Выбранный зал
            <input class="conf-step__input" type="text" value="" name="hall" wire:model="name" required readonly/>            
        </label>
        <label class="conf-step__label conf-step__label-fullsize">
        Выбрать фильм (кликните чтобы открыть список)
            <select class="conf-step__input" name="film" placeholder="Список фильмов здесь" required>                
                @foreach($films as $film)
                    <option wire:key="{{ $film->id }}">{{ $film->name }}</option>
                @endforeach
            </select>
        </label>
        <label class="conf-step__label conf-step__label-fullsize">
        Время начала            
            <input class="conf-step__input" type="time" value="08:00" name="start_time" wire:model="nextStart" required min="08:00" max="22:00" step="600"/>
        </label>

        <div class="conf-step__buttons text-center">
        <button type="submit" class="conf-step__button conf-step__button-accent" data-event="seance_add">Добавить</button>
        <a href="{{ route('admin.home') }}"><button class="conf-step__button conf-step__button-regular" type="button">Отменить</button></a>
        </div>        
    </form>
</div>
