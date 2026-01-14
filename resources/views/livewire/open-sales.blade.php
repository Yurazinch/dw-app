<div>
    <section class="conf-step">
      <header class="conf-step__header conf-step__header_opened">
        <h2 class="conf-step__title">Открыть продажи</h2>
      </header>
      <div class="conf-step__wrapper text-center">
        <p class="conf-step__paragraph">Всё готово, теперь можно:</p>
        <button wire:click="toggle('sales')" class="conf-step__button conf-step__button-accent">{{ $sales ? 'Закрыть' : 'Открыть' }} продажи</button>        
      </div>
    </section>
    @script
    <script>
      $wire.on('opened', () => {          
          alert('Продажи открыты');
      });
      $wire.on('closed', () => {          
          alert('Продажи закрыты');
      });
    </script>
    @endscript
</div>
