<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ИдёмВКино</title>
  @vite([
    'resources/css/normalize-admin.css',
    'resources/css/styles-admin.css',
    'resources/css/styles-admin.scss'
  ])
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
</head>

<body>

<div class="popup active">
  <div class="popup__container">
    <div class="popup__content">
      <div class="popup__header">
        <h2 class="popup__title">
          Удаление фильма
          <a class="popup__dismiss" href="{{ route('admin.home') }}"><img src="/images/close-admin.png" alt="Закрыть"></a>
        </h2>
      </div>
      <div class="popup__wrapper">
        <form action="{{ route('film.remove', ['id' => $film->id])}}" method="get" accept-charset="utf-8">
          <p class="conf-step__paragraph">Вы действительно хотите удалить фильм <span>"{{ $film->name }}"</span>?</p>
          <div class="conf-step__buttons text-center">
            <input type="submit" value="Удалить" class="conf-step__button conf-step__button-accent">
            <a href="{{ route('admin.home') }}"><button class="conf-step__button conf-step__button-regular" type="button">Отменить</button></a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>
