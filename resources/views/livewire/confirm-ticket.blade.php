<div style="display: {{ $confirm }};">
    <section class="ticket">
      
      <header class="tichet__check">
        <h2 class="ticket__check-title">Вы выбрали билеты:</h2>
      </header>
      
      <div class="ticket__info-wrapper">
        <p class="ticket__info">На фильм: <span class="ticket__details ticket__title">{{ $selectFilm }}</span></p>
        <p class="ticket__info">Места: <span class="ticket__details ticket__chairs">{{ $chosenChairs }}</span></p>
        <p class="ticket__info">В зале: <span class="ticket__details ticket__hall">{{ $selectHall }}</span></p>
        <p class="ticket__info">Дата и начало сеанса: <span class="ticket__details ticket__start">{{ $selectDate }}, {{ $selectTime }}</span></p>
        <p class="ticket__info">Стоимость: <span class="ticket__details ticket__cost">{{ $sum }}</span> рублей</p>

        <button wire:click="toShow" class="acceptin-button" style="cursor: pointer;">Получить код бронирования</button>

        <p class="ticket__hint">После оплаты билет будет доступен в этом окне, а также придёт вам на почту. Покажите QR-код нашему контроллёру у входа в зал.</p>
        <p class="ticket__hint">Приятного просмотра!</p>
      </div>
    </section>
</div>
