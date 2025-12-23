<div>      
    <ul class="conf-step__selectors-box">
        @if(count($halls) === 0)
            <p class="conf-step__paragraph">Залы не добавлены!</p>
        @else
            @foreach($halls as $hall)
                <li wire:key="{{ $hall->id }}">
                    @if($hall->id === $hall_hit)
                        <input wire:click="hithall({{ $hall }})" type="radio" class="{{ $class_checked }}" name="chairs-hall" value="{{ $hall->name }}">
                        <span class="conf-step__selector">{{ $hall->name }}</span>
                    @else
                        <input wire:click="hithall({{ $hall }})" type="radio" class="{{ $class }}" name="chairs-hall" value="{{ $hall->name }}">
                        <span class="conf-step__selector">{{ $hall->name }}</span>
                    @endif
                </li>                
            @endforeach
        @endif
    </ul>    
</div>
