import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/js/custom.js', // ✅ Add this line
                'resources/css/app.scss',
                'resources/css/app.css',
            ],
            refresh: true,
        }),
    ],
});