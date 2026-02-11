<div>    
    <ul class="conf-step__selectors-box">
        @if(count($halls) === 0)
            <p class="conf-step__paragraph">Залы не добавлены!</p>
        @else
            @foreach($halls as $hall)
                <li wire:key="{{ $loop->iteration }}">
                    @if($hall->id === $hall_checked)
                        <input wire:click="activehall({{ $hall->id }})" type="radio" class="{{ $class_checked }}" name="chairs-hall" value="{{ $hall->name }}">
                        <span class="conf-step__selector">{{ $hall->name }}</span>
                    @else
                        <input wire:click="activehall({{ $hall->id }})" type="radio" class="{{ $class }}" name="chairs-hall" value="{{ $hall->name }}">
                        <span class="conf-step__selector">{{ $hall->name }}</span>
                    @endif
                </li>                
            @endforeach
        @endif
    </ul>    
</div>
