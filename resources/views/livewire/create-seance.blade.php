<div class="popup__wrapper">
    <form action="/admin/seance/store" method="post" accept-charset="utf-8">
        @csrf
        <label class="conf-step__label conf-step__label-fullsize" for="hall">
        Выбрать зал из списка
            <select class="conf-step__input" name="hall" required>
                @foreach($halls as $hall)
                <option wire:key="{{ $hall->id }}">{{ $hall->name }}</option>
                @endforeach
            </select>
        </label>
        <label class="conf-step__label conf-step__label-fullsize" for="hall">
        Выбрать фильм из списка
            <select class="conf-step__input" name="film" required>
                @foreach($films as $film)
                <option wire:key="{{ $film->id }}">{{ $film->name }}</option>
                @endforeach
            </select>
        </label>
        <label class="conf-step__label conf-step__label-fullsize" for="name">
        Время начала
            <select class="conf-step__input" name="start_time" required>
                @foreach($timeline as $key => $value)
                    <option wire:key="{{ $key }}" type="time" wire:model="seance">{{ $value }}</option>
                @endforeach
            </select>
            <!--<input id="start" class="conf-step__input" type="time" value="08:00" name="start_time" wire:model="seance" required>-->
            </label>

        <div class="conf-step__buttons text-center">
        <input type="submit" value="Добавить" class="conf-step__button conf-step__button-accent" data-event="seance_add">
        <a href="{{ route('admin.lists') }}"><button class="conf-step__button conf-step__button-regular" type="button">Отменить</button></a>
        </div>        
    </form>
</div>
