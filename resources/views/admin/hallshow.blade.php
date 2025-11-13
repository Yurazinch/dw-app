@if(!isset($halls))
    <p class="conf-step__paragraph">Залы не добавлены!</p>
@else
    @foreach($halls as $hall)
        <li> {{ $hall->name }} <a href="{{ route('hall.remove', ['name' => $hall->name]) }}">
        <button class="conf-step__button conf-step__button-trash"></button></a>
        </li>
    @endforeach   
@endif     
