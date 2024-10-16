import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    base: process.env.VITE_URL || "/",
    server: {
        host: "localhost", // Set this to localhost for local development
        port: 5173, // Default Vite port
    },
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
});
