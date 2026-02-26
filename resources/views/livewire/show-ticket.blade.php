<div style="display: {{ $show }};">
    <section class="ticket">
      
      <header class="tichet__check">
        <h2 class="ticket__check-title">Электронный билет</h2>
      </header>
      
      <div class="ticket__info-wrapper">
        <p class="ticket__info">На фильм: <span class="ticket__details ticket__title">{{ $film }}</span></p>
        <p class="ticket__info">Места: <span class="ticket__details ticket__chairs">{{ $places }}</span></p>
        <p class="ticket__info">В зале: <span class="ticket__details ticket__hall">{{ $hall }}</span></p>
        <p class="ticket__info">Дата и начало сеанса: <span class="ticket__details ticket__start">{{ $date }}, {{ $start }}</span></p>

        <img class="ticket__info-qr" src="{{ asset($qrCodePath) }}" alt="QR-код билета">

        <p class="ticket__hint">Покажите QR-код нашему контроллеру для подтверждения бронирования.</p>
        <p class="ticket__hint">Приятного просмотра!</p>
      </div>
    </section>
</div>
