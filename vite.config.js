import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/assets/vendor/scss/core.scss",
                "resources/assets/vendor/scss/pages/page-auth.scss",
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/assets/vendor/fonts/iconify/iconify.js"
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
