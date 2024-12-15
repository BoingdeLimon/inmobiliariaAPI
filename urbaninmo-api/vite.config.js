import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    // server: {
    //     host: '0.0.0.0', 
    //     https: true,      
    //     hmr: {
    //         host: 'https://84a4-2806-266-481-98c7-5f9-aa93-a207-f75f.ngrok-free.app/', 
    //     },
    // },
});
