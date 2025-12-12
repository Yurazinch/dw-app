<div>
    @if(count($halls) === 0)
        <p class="conf-step__paragraph">Залы не добавлены!</p>
    @else
        @foreach($halls as $hall)
            <div wire:key="{{ $hall->id }}" class="conf-step__seances-hall">
                <h3 class="conf-step__seances-title">{{ $hall->name }}</h3>
                <div class="conf-step__seances-timeline">
                    @foreach($timeline as $key => $value)                                       
                        <div wire:key="{{ $key }}" class="conf-step__seances-movie" wire:click="addform({{ $hall->id }}, '{{ $value }}')" style="width: 85px; background-color: rgb(133, 255, 137); left: {{ 90*$key }}px; cursor: pointer">
                            <p class="conf-step__seances-movie-start">{{ $value }}</p>
                            @foreach($seances as $seance)
                                @if($hall->id === $seance->hall_id && $seance->start === $value)  
                                    <p class="conf-step__seances-movie-title" wire:click="removeform({{ $seance->id }})" style="cursor: pointer">{{ $seance->film->name }}</p>                                                                     
                                @endif
                            @endforeach                                                     
                        </div>                        
                    @endforeach
                </div>
            </div>        
        @endforeach
    @endif    
</div>
