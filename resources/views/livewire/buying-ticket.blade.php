<div style="display: {{ $buying }};">
    <section class="buying">
      <div class="buying__info">
        <div class="buying__info-description">
          <h2 class="buying__info-title">Фильм: {{ $filmName }}</h2>
          <p class="buying__info-start">Начало: {{ $seanceStart }}</p>
          <p class="buying__info-hall">Зал: {{ $hallName }}</p>       
        </div>
        <div class="buying__info-hint">
          <p>Тапните дважды,<br>чтобы увеличить</p>
        </div>
      </div>
      <div class="buying-scheme">
        <div class="buying-scheme__wrapper">
          @foreach($rows as $row)
            <div class="conf-step__row" number="{{ $row }}">                
              @foreach($places as $place)
                @if($place->row === $row)
                  @if(count($bookings) === 0)                                          
                    <span wire:key="{{ $place->id }}" wire:click="select({{ $place }})" style="cursor: pointer;" class="buying-scheme__chair buying-scheme__chair_{{ $place->type }}" number="{{ $place->place }}"></span>
                  @else
                    @if(in_array($place->id, $bookings))
                      <span wire:key="{{ $place->id }}" class="buying-scheme__chair buying-scheme__chair_taken" number="{{ $place->place }}"></span>
                    @else
                      <span wire:key="{{ $place->id }}" wire:click="select({{ $place }})" style="cursor: pointer;" class="buying-scheme__chair buying-scheme__chair_{{ $place->type }}" number="{{ $place->place }}"></span>
                    @endif
                  @endif                  
                @endif
              @endforeach
            </div>                               
          @endforeach          
        </div>
        <div class="buying-scheme__legend">
          <div class="col">
            <p class="buying-scheme__legend-price"><span class="buying-scheme__chair buying-scheme__chair_standart"></span> Свободно (<span class="buying-scheme__legend-value">{{ $priceStandart }}</span>руб)</p>
            <p class="buying-scheme__legend-price"><span class="buying-scheme__chair buying-scheme__chair_vip"></span> Свободно VIP (<span class="buying-scheme__legend-value">{{ $priceVip }}</span>руб)</p>            
          </div>
          <div class="col">
            <p class="buying-scheme__legend-price"><span class="buying-scheme__chair buying-scheme__chair_taken"></span> Занято</p>
            <p class="buying-scheme__legend-price"><span class="buying-scheme__chair buying-scheme__chair_selected"></span> Выбрано</p>
          </div>
        </div>
      </div>
      <button wire:click="take" class="acceptin-button" style="cursor: pointer;">Забронировать</button>
    </section>
</div>
