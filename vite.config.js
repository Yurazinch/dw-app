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
                'resources/css/styles-admin.css', 
                'resources/css/normalize-admin.css',  
                'resources/css/styles-admin.scss',
                'resources/js/datenavs.js',
                'resources/js/accordeon.js',
                'resources/js/placestatus.js',
                'resources/js/takechair.js'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
