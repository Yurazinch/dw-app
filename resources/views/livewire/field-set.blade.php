<div>
    <button id="clearSeances" wire:click="$dispatchTo('time-line', 'reload')" class="conf-step__button conf-step__button-regular">Отмена</button>
    <input id="saveSeances" type="submit" value="Сохранить" class="conf-step__button conf-step__button-accent">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
</div>
