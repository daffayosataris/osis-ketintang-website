import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Custom Color Maroon untuk Klien
                maroon: {
                    50: '#fdf2f2',
                    100: '#fbe4e4',
                    200: '#f8caca',
                    300: '#f2a1a1',
                    400: '#e76c6c',
                    500: '#d94141',
                    600: '#c52727',
                    700: '#a51d1d',
                    800: '#881b1b',
                    900: '#711d1d',
                    950: '#3e0b0b',
                },
            }
        },
    },

    plugins: [forms],
};