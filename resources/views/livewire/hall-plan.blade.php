<div>  
  <div style="display: {{ $empty }};">
    <p class="conf-step__paragraph">Укажите количество рядов и максимальное количество кресел в ряду:</p>
    <div class="conf-step__legend">
      <label class="conf-step__label">Рядов, шт<input type="text" name="rows" class="conf-step__input conf-step__input-size" placeholder="10" ></label>
      <span class="multiplier">x</span>
      <label class="conf-step__label">Мест, шт<input type="text" name="chairs" class="conf-step__input conf-step__input-size" placeholder="8" ></label>
    </div>
    <p class="conf-step__paragraph">Теперь вы можете указать типы кресел на схеме зала:</p>
    <div class="conf-step__legend">
      <span class="conf-step__chair conf-step__chair_standart"></span> — обычные кресла
      <span class="conf-step__chair conf-step__chair_vip"></span> — VIP кресла
      <span class="conf-step__chair conf-step__chair_disabled"></span> — заблокированные (нет кресла)
      <p class="conf-step__hint">Чтобы изменить вид кресла, нажмите по нему левой кнопкой мыши</p>
    </div>  
    
    <div class="conf-step__hall">
      <div class="conf-step__hall-wrapper"></div>  
    </div>
    
    <fieldset class="conf-step__buttons text-center">
      <button class="conf-step__button conf-step__button-regular">Отмена</button>
      <input type="submit" id="chairs-plan" value="Сохранить" class="conf-step__button conf-step__button-accent">
    </fieldset>
  </div>

  <div style="display: {{ $plan }};">
    <div class="conf-step__hall">
      <div class="conf-step__hall-wrapper">            
        @foreach($rows as $row)
            <div class="conf-step__row" number="{{ $row }}">
                @foreach($places as $place)
                    @if($place->row === $row)
                      <span class="conf-step__chair conf-step__chair_{{ $place->type }}" number="{{ $place->place }}"></span> 
                    @endif                   
                @endforeach
            </div>                               
        @endforeach
      </div>  
    </div>
    
    <fieldset class="conf-step__buttons text-center">
      <input wire:click="halldeleted" type="submit" id="chairs-plan" value="Удалить" class="conf-step__button conf-step__button-accent">
    </fieldset>
  </div>    
</div>
