import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './app/Livewire/**/*.php',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                mono: ['JetBrains Mono', ...defaultTheme.fontFamily.mono],
            },
            colors: {
                brand: {
                    50:  '#eef9ff',
                    100: '#d9efff',
                    200: '#bce4ff',
                    300: '#8ed3ff',
                    400: '#59b8ff',
                    500: '#2e96ff',
                    600: '#1576f5',
                    700: '#125fe1',
                    800: '#164eb6',
                    900: '#18458f',
                    950: '#122c5a',
                },
                ink: {
                    50:  '#f6f7f9',
                    100: '#eceef2',
                    200: '#d4d8e0',
                    300: '#aeb6c4',
                    400: '#828ea3',
                    500: '#637087',
                    600: '#4d586d',
                    700: '#404858',
                    800: '#373d4b',
                    900: '#0b1020',
                    950: '#070a14',
                },
            },
            backgroundImage: {
                'grid-light': "linear-gradient(to right, rgba(0,0,0,0.04) 1px, transparent 1px), linear-gradient(to bottom, rgba(0,0,0,0.04) 1px, transparent 1px)",
                'grid-dark':  "linear-gradient(to right, rgba(255,255,255,0.05) 1px, transparent 1px), linear-gradient(to bottom, rgba(255,255,255,0.05) 1px, transparent 1px)",
            },
            keyframes: {
                'fade-in-up': {
                    '0%': { opacity: '0', transform: 'translateY(12px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                'float': {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-8px)' },
                },
            },
            animation: {
                'fade-in-up': 'fade-in-up 0.6s ease-out both',
                'float': 'float 6s ease-in-out infinite',
            },
        },
    },
    plugins: [forms, typography],
};
