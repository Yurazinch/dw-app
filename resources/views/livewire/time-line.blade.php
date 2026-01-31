<div>
    @if(count($halls) === 0)
        <p class="conf-step__paragraph">Залы не добавлены!</p>
    @else
        @foreach($halls as $hall)
            <div wire:key="{{ $hall->id }}" class="conf-step__seances-hall">
                <h3 class="conf-step__seances-title">{{ $hall->name }}</h3>
                <div class="conf-step__seances-timeline"> 
                    @foreach($seances as $seance)
                        @if($seance->hall_id === $hall->id)                               
                            <div wire:key="{{ $seance->id }}" wire:click="removeform({{ $seance->id }})" class="conf-step__seances-movie" style="width: {{ $seance->width }}px; background-color: rgb(133, 255, 137);">                                
                                <p class="conf-step__seances-movie-title" style="cursor: pointer">{{ $seance->film->name }}</p>
                                <p class="conf-step__seances-movie-start">{{ $seance->start }}</p>                                                                             
                            </div>
                        @endif
                    @endforeach
                   
                </div>
            </div>        
        @endforeach
    @endif    
</div>
