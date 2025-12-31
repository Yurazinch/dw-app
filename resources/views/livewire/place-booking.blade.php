<div>
    
    <div class="buying__info">
      <div class="buying__info-description">
        <h2 class="buying__info-title">{{ $seance->film->name }}</h2>
        <p class="buying__info-start">Дата сеанса: {{ $value }}</p>
        <p class="buying__info-start">Начало сеанса: {{ $seance->start }}</p>
        <p class="buying__info-hall">{{ $seance->hall->name }}</p>          
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
                    <span class="conf-step__chair conf-step__chair_{{ $place->type }}" number="{{ $place->place }}"></span> 
                  @endif                   
              @endforeach
          </div>                               
      @endforeach
      </div>
      <div class="buying-scheme__legend">
        <div class="col">
          <p class="buying-scheme__legend-price"><span class="buying-scheme__chair buying-scheme__chair_standart"></span> Свободно (<span class="buying-scheme__legend-value">250</span>руб)</p>
          <p class="buying-scheme__legend-price"><span class="buying-scheme__chair buying-scheme__chair_vip"></span> Свободно VIP (<span class="buying-scheme__legend-value">350</span>руб)</p>            
        </div>
        <div class="col">
          <p class="buying-scheme__legend-price"><span class="buying-scheme__chair buying-scheme__chair_taken"></span> Занято</p>
          <p class="buying-scheme__legend-price"><span class="buying-scheme__chair buying-scheme__chair_selected"></span> Выбрано</p>                    
        </div>
      </div>
    </div>
    <button wire:click="#" class="acceptin-button">Забронировать</button>
    
    @script
    <script>
        const rows = Array.from(document.querySelectorAll('.buying-scheme__row'));
        const takechair = Array.from(document.querySelectorAll('.buying-scheme__chair'));
        const chair = [];
        const selectedchair = [];
        takechair.forEach((el, i) => el.addEventListener('click', () => {	
            if(!el.classList.contains('buying-scheme__chair_disabled') || !el.classList.contains('buying-scheme__chair_taken')) {
                if(el.classList.contains('buying-scheme__chair_standart')) {
                    selectedchair[i] = 'buying-scheme__chair_standart';
                    el.classList.replace('buying-scheme__chair_standart', 'buying-scheme__chair_selected');			
                } else if (el.classList.contains('buying-scheme__chair_vip')) {
                    selectedchair[i] = 'buying-scheme__chair_vip';
                    el.classList.replace('buying-scheme__chair_vip', 'buying-scheme__chair_selected');			
                } else if (el.classList.contains('buying-scheme__chair_selected')) {
                    if(selectedchair[i] === 'buying-scheme__chair_standart') {
                        el.classList.replace('buying-scheme__chair_selected', 'buying-scheme__chair_standart');												
                    } else if (selectedchair[i] === 'buying-scheme__chair_vip') {
                        el.classList.replace('buying-scheme__chair_selected', 'buying-scheme__chair_vip');				
                    }
                    selectedchair.splice(i, 1);
                }
            }
            console.log(selectedchair);
        }));

        function takenChair() {	
            for(i=0; i<rows.length; i++) {
                for(j=0; j<rows[i].children.length; j++) {
                    if(rows[i].children[j].classList.contains('buying-scheme__chair_selected')) {
                        chair.push({
                            row: i+1,
                            chair: j+1,
                        });
                        rows[i].children[j].classList.replace('buying-scheme__chair_selected', 'buying-scheme__chair_taken');
                    } 
                }
            }
        }

        const button = document.querySelector('.acceptin-button');
        button.addEventListener('click', () => {
            takenChair();
            console.log(chair);
        });
    </script>
    @endscript
</div>
