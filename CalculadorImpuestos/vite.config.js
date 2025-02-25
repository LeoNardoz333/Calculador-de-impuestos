import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/Botones.css', 'resources/js/app.js', 'resources/css/Fuentes.css', 
                'resources/css/Recuadros.css'
            ],
            refresh: true,
        }),
    ],
});
