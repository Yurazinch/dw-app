<div wire:init="loaded">
    @if(count($halls) === 0)
        <p class="conf-step__paragraph">Залы не добавлены!</p>
    @else
        @foreach($halls as $hall)
            <div wire:key="{{ $hall->id }}" class="conf-step__seances-hall">
                <h3 wire:click="createform({{ $hall->id }})" class="conf-step__seances-title" style="cursor: pointer;">{{ $hall->name }}</h3>
                <div class="conf-step__seances-timeline"> 
                    @foreach($seances as $seance)
                        @if($seance->hall_id === $hall->id)                               
                            <div wire:key="{{ $seance->id }}" wire:click="removeform({{ $seance->id }})" class="conf-step__seances-movie" style="width: {{ $seance->width }}px; background-color: rgb(133, 255, 137); left: {{ $seance->left }}px; cursor: pointer;">                                
                                <p class="conf-step__seances-movie-title">{{ $seance->film->name }}</p>
                                <p class="conf-step__seances-movie-start">{{ $seance->start }}</p>                                                                             
                            </div>
                        @endif                        
                    @endforeach                   
                </div>
            </div>       
        @endforeach        
    @endif     
    @if(session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif
    @if(session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif
</div>
