<div>
    <ul class="conf-step__selectors-box">
        @if(count($halls) === 0)
            <p class="conf-step__paragraph">Залы не добавлены!</p>
        @else
            @foreach($halls as $hall)
                <li wire:key="{{ $hall->id }}"><input type="radio" class="conf-step__radio" name="chairs-hall" value="{{ $hall->name }}">
                <span class="conf-step__selector">{{ $hall->name }}</span></li>
            @endforeach
        @endif
    </ul>
</div>
