<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ИдёмВКино</title>
  @vite(['resources/css/normalize-admin.css',
      'resources/css/styles-admin.css',
  ]);
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
</head>

<body>

  <div class="popup active">
    <div class="popup__container">
      <div class="popup__content">
        <div class="popup__header">
          <h2 class="popup__title">
            Добавление фильма
            <a class="popup__dismiss" href="{{ route('admin.lists') }}"><img src="/storage/images/close-admin.png" alt="Закрыть"></a>
          </h2>
        </div>
        <div class="popup__wrapper">
          <form action="{{ route('film.store') }}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
            @csrf
            <div class="popup__container">
              <div class="popup__poster"></div>
              <div class="popup__form">
                <label class="conf-step__label conf-step__label-fullsize" for="name">
                  Название фильма
                  <input class="conf-step__input" type="text" placeholder="Например, &laquo;Гражданин Кейн&raquo;" name="name" required>
                </label>
                <label class="conf-step__label conf-step__label-fullsize" for="name">
                  Продолжительность фильма (мин.)
                  <input class="conf-step__input" type="text"  name="duration" data-last-value="" required>
                </label>
                <label class="conf-step__label conf-step__label-fullsize" for="name">
                  Описание фильма
                  <textarea class="conf-step__input" type="text" name="description"  required></textarea>
                </label>
                <label class="conf-step__label conf-step__label-fullsize" for="name">
                  Страна
                  <input class="conf-step__input" type="text"  name="country" data-last-value="" required>
                </label>
                <label class="conf-step__label conf-step__label-fullsize" for="name">
                  Постер
                  <input class="conf-step__input" type="file"  name="poster" data-last-value="" required>
                </label>
              </div>
            </div>
            <div class="conf-step__buttons text-center">
              <input type="submit" value="Добавить фильм" class="conf-step__button conf-step__button-accent" data-event="film_add">
              <!--<input type="submit" value="Загрузить постер" class="conf-step__button conf-step__button-accent">-->
              <a href="{{ route('admin.lists') }}"><button class="conf-step__button conf-step__button-regular" type="button">Отменить</button></a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
