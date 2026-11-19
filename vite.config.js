import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
<<<<<<< HEAD
                'resources/css/estilo.css',
=======
                'resources/css/autenticacao.css',
                'resources/css/inicial.css',
>>>>>>> fd74f84dc4ac9ef79f2ea796978f60725c10569e
                'resources/css/responsivo.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
