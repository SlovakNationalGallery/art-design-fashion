const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            colors: {
                yellow: '#ffeb3d',
            },
            fontFamily: {
                sans: ['Kolektiv Grotesk X', ...defaultTheme.fontFamily.sans],
                display: ['Say What You Feel Black Cond', ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                'base': ['1vw', { lineHeight: 1.2 }],
                'lg': ['1.5vw', { lineHeight: 1.2 }],
                '2xl': ['2.25vw', { lineHeight: 1.1 }],
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
