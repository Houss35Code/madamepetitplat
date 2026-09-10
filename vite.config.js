import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    base: '/madamepetitplat/build/',
    plugins: [
        laravel({
            input: ['resources/sass/main.scss', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
