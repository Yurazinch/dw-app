<div>
    <ul class="conf-step__list">
        @if(!$halls)
            <p class="conf-step__paragraph">Залы не добавлены!</p>
        @endif
        @foreach($halls as $hall)
            <li> {{ $hall->name }} <a href="{{ route('removehall', ['name' => $hall->name]) }}">
                <button class="conf-step__button conf-step__button-trash"></button></a>
            </li>
        @endforeach        
    </ul>
</div>