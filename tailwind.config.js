import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',

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
                'ca-primary': {
                    DEFAULT: '#3B82F6',
                    50: '#BFDBFE',
                    100: '#BFDBFE',
                    200: '#93C5FD',
                    300: '#60A5FA',
                    400: '#3B82F6',
                    500: '#2563EB',
                    600: '#1D4ED8',
                    700: '#1E40AF',
                    800: '#1E3A8A',
                    900: '#1E306E',
                    950: '#172554',
                },
                'ca-secondary': {
                    DEFAULT: '#10B981',
                    50: '#D1FAE5',
                    100: '#A7F3D0',
                    200: '#6EE7B7',
                    300: '#34D399',
                    400: '#10B981',
                    500: '#059669',
                    600: '#047857',
                    700: '#065F46',
                    800: '#064E3B',
                    900: '#063C30',
                    950: '#042F28',
                },
                'ca-accent': '#EF4444',
                'ca-light': '#F9FAFB',
                'ca-dark': '#1F2937',
                'ca-text-light': '#111827',
                'ca-text-dark': '#F3F4F6',
                'ca-card-light': '#FFFFFF',
                'ca-card-dark': '#374151',
                'ca-border-light': '#E5E7EB',
                'ca-border-dark': '#4B5563',
            },
        },
    },

    plugins: [forms],
};