import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.ts'],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '-bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
            '-bootstrap-icons': path.resolve(__dirname, 'node_modules/bootstrap-icons'),
        },
    },
});
