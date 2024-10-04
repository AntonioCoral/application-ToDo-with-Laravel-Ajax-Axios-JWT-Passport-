import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';  // Usa el plugin para Vue 3
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        vue(),  // Plugin para Vue 3
        laravel({
            input: ['resources/js/app.js'],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            'vue': 'vue/dist/vue.esm-bundler.js',  // Agrega este alias para Vue
        },
    },
});
