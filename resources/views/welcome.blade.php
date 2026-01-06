<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Продажа билетов закрыта</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/styles.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
        @vite([
            'resources/css/normalize.css',
            'resources/css/styles.css',
            'resourses/css/styles.scss'
        ]);
    </head>  
    <body>
        <main>
            <section class="ticket">      
            <header class="tichet__check">
                <h2 class="ticket__check-title">Продажа билетов ременно закрыта</h2>
            </header>
            
            <div class="ticket__info-wrapper">        

                <img class="ticket__info-qr" src="/images/zakryto.jpg">

                <p class="ticket__hint">Вас ожидает что-то очень увлекательное.</p>
                <p class="ticket__hint">Загляните к нам через часик!</p>
            </div>
            </section>
        </main>   
    </body> 
</html> 
    