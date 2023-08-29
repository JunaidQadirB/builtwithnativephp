import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js",
    ],
    safelist: [
        'border',
        'border-green-200',
        'bg-green-50',
        'text-green-600',
        'dark:bg-green-900',
        'dark:text-green-300',

        'border-red-200',
        'bg-red-50',
        'text-red-600',
        'dark:bg-red-900',
        'dark:text-red-300',

        'border-yellow-200',
        'bg-yellow-50',
        'text-yellow-600',
        'dark:bg-yellow-900',
        'dark:text-yellow-300',

        'group/item',
        'flex',
        'flex-col',
        'rounded-lg',
        'relative',
        'p-3',
        'sm:my-0',
        'gap-6',
        'w-auto',
        'bg-white',
        'rounded-lg',
        'shadow',
        'hover:shadow-xl',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, typography, require('flowbite/plugin'), require('flowbite-typography'),],
};
