<div>
    <ul class="conf-step__list">
        @if(count($halls) === 0)
            <p class="conf-step__paragraph">Залы не добавлены!</p>
        @else
            @foreach($halls as $hall)
                <li> {{ $hall->name }} <a href="{{ route('hall.toremove', ['name' => $hall->name]) }}">
                    <button class="conf-step__button conf-step__button-trash"></button></a>
                </li>
            @endforeach   
        @endif
    </ul>
</div>