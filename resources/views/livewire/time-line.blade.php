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
    @script
    <script>
        $wire.on('loaded', () => {
            Array.from(document.querySelectorAll('.conf-step__seances-timeline')).forEach(timeLine => {
                console.log(timeLine.children);
                Array.from(timeLine.children).forEach((child, i) => {
                    if(i < timeLine.children.length - 1) {
                        child.removeAttribute('wire:click');
                        child.style.cursor = 'default';
                    }
                });
            });
        });
    </script>
    @endscript      
</div>
