const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./src/**/*.{html,js}",
        "./node_modules/tw-elements/dist/js/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'blue-clear': '#36A9E1',
                'blue-marine': '#2F80ED',
                'orange-clear': '#FBB06A',
                'orange': '#FF820D',
              },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography'), require("tw-elements/dist/plugin.cjs")],
    darkMode: "class"
};
