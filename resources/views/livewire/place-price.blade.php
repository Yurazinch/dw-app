<div class="conf-step__wrapper">
    <p class="conf-step__paragraph">Выберите зал для конфигурации:</p>
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
    <p class="conf-step__paragraph" style="color: red;">{{ $message }}</p>
    <p class="conf-step__paragraph">Установите цены для типов кресел:</p>
    <div class="conf-step__legend">
        <label class="conf-step__label">Цена, рублей<input wire:model="price_standart" type="text" name="standart" class="conf-step__input conf-step__input-price" value="{{$price_standart}}"></label>
        за <span class="conf-step__chair conf-step__chair_standart"></span> обычные кресла
        <div style="color: red;">@error('price_standart') {{$message}} @enderror</div>
    </div>  
    <div class="conf-step__legend">
        <label class="conf-step__label">Цена, рублей<input wire:model="price_vip" type="text" name="vip" class="conf-step__input conf-step__input-price" value="{{$price_vip}}"></label>
        за <span class="conf-step__chair conf-step__chair_vip"></span> VIP кресла
        <div style="color: red;">@error('price_vip') {{$message}} @enderror</div>
    </div>  
    
    <fieldset class="conf-step__buttons text-center">
        <button wire:click="clear" class="conf-step__button conf-step__button-regular">Отмена</button>
        <button wire:click="save" class="conf-step__button conf-step__button-accent">Сохранить</button>
    </fieldset>
</div>
