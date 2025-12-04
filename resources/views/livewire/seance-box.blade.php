<div>    
    @isset($seances[$key + 1]) 
    <p class="conf-step__seances-movie-title">{{ $seances[$key + 1]->film_id->name }}</p>
    @endisset
    <p class="conf-step__seances-movie-title">Свободен</p>
</div>