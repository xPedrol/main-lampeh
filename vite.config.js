import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                '/resources/css/app.scss',
                '/resources/js/app.js',
                '/resources/css/navbar.scss',
                '/resources/js/navbar.js',
                '/resources/css/home.scss',
                '/resources/css/grid.scss',
                '/resources/css/fonts.scss',
                '/resources/css/quem-somos.scss',
                '/resources/css/publicacoes.scss',
                '/resources/css/contato.scss'
            ],
            refresh: true,
        }),
    ],
});
