# Загрузка CSS из каталога /resources с помощью Vite (Laravel 9,10)

Используя Laravel 9 или 10, вы можете использовать Vite, инструмент командной строки для создания CSS и JS ресурсов из файлов в папке /resources. Полученный файл(ы) будет автоматически сохранён в папку /public.

Чтобы создать CSS с помощью Vite, выполните следующие шаги:

Создайте или используйте существующую папку в каталоге /resources и сохраните в ней свой CSS-файл. Например, вы можете сохранить его как /resources/css/styles.css

Создайте или отредактируйте файл vite.config.js в корневой папке Laravel и добавьте следующий код:

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/styles.css'],
            refresh: true,
        }),
    ],
});
Выполните следующую команду npm для создания минифицированного файла CSS, который будет храниться в папке /public:

npm run build
Если вы столкнулись с ошибкой типа 'vite' is not recognized as an internal or external command, вы можете исправить это, выполнив команду: npm install.

Добавьте следующую директиву @vite в ваш шаблон blade для подключения CSS:

@vite(['resources/css/styles.css'])
Теперь перезагрузите страницу, и стилизация CSS будет применена корректно.