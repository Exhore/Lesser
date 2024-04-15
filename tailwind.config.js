import defaultTheme from 'tailwindcss/defaultTheme';


/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './node_modules/preline/dist/*.js',
        './node_modules/preline/plugin.js',
        './node_modules/preline/preline.js',
        './node_modules/preline/dist/preline.js'
    ],

    /* darkmode */
    darkMode: 'class',

    theme: {
        container: {
            center: true,
        },
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans]
            },
        },
    },

    plugins: [require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
    require('@tailwindcss/aspect-ratio'),
    require('preline/plugin'),
    require('tailwindcss-animate')]
};
