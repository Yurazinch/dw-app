<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ИдёмВКино</title>
  @vite(['resources/css/styles-admin.css',
   'resources/css/normalize-admin.css',
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
            Снятие с сеанса
            <a class="popup__dismiss" href="{{ route('admin.home') }}"><img src="/storage/images/close-admin.png" alt="Закрыть"></a>
          </h2>
        </div>
        <livewire:seance-remove />
      </div>
    </div>
  </div>

</body>
</html>
