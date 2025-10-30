import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/styles.css', 
                'resources/css/normalize.css',  
                'resources/css/styles.scss',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
