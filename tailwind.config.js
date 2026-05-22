import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    /* Safe line para linux */
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.{js,jsx,ts,tsx}",
        "./resources/css/**/*.css",
        "./app/**/*.php",
        "./config/**/*.php",
        "./routes/**/*.php",
        "./Temporales/**/*.{php,blade.php,js}",
    ],

    safelist: [
        // Clases usadas por condicionales de Blade/Alpine o estados generados en runtime.
        'hidden',
        'block',
        'inline-block',
        'flex',
        'grid',
        'invisible',
        'rotate-180',
        'animate-pulse',
        'cursor-not-allowed',
        'bg-opacity-50',
        'border-0',
        'bg-blue-300',
        'bg-blue-500',
        'bg-red-500',
        'bg-red-600',
        'text-black',
        'text-blue-500',
        'text-red-500',
        'text-white',
        'border-green-700',
        'peer-checked:bg-green-400',
        'peer-checked:border-green-700',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, typography],
};
