<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ИдёмВКино</title>
  @vite([
    'resources/css/normalize.css',
    'resources/css/styles.css',
    'resourses/css/styles.scss'
  ]);
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
</head>

<body>
  <header class="page-header">
    <h1 class="page-header__title">Идём<span>в</span>кино</h1>
  </header>
  
  <livewire:date-line />
    
  <main>
    <livewire:movie-info />

    <livewire:buying-ticket />

    <livewire:confirm-ticket />

    <livewire:show-ticket />
  </main>
  @vite('resources/js/datenavs.js')
</body>
</html>