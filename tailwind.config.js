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
                display: ['"Bebas Neue"', 'sans-serif'],
                body: ['"DM Sans"', 'sans-serif'],
            },
            colors: {
                ink: '#0a0a0a',
                paper: '#f5f5f0',
                steel: '#1c1c1c',
                iron: '#2a2a2a',
                mist: '#e8e8e0',
                ash: '#6b6b6b',
            },
            animation: {
                'fade-up': 'fadeUp 0.5s ease forwards',
            },
            keyframes: {
                fadeUp: {
                    '0%': { opacity: '0', transform: 'translateY(20px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
            },
        },
    },

    plugins: [forms],
};
