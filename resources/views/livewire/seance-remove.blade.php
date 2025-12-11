<div class="popup__wrapper">
    <form action="{{ route('seance.remove', ['id' => $seance->id]) }}" method="get" accept-charset="utf-8">
        <p class="conf-step__paragraph">Вы действительно хотите снять с сеанса 
            <span>"{{ $seance->start }}"</span>
             зал <span>"{{ $seance->hall->name }}"</span>
             фильм <span>"{{ $seance->film->name }}"</span> ?</p>
        <div class="conf-step__buttons text-center">
            <input type="submit" value="Удалить" class="conf-step__button conf-step__button-accent">
            <a href="{{ route('admin.lists') }}"><button class="conf-step__button conf-step__button-regular" type="button">Отменить</button></a>
        </div>
    </form>
</div>