const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');
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
        "./node_modules/tw-elements/dist/js/**/*.js",
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php'
    ],
    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography'), require("tw-elements/dist/plugin.cjs")],
    darkMode: "class",

    theme: {
        colors:{
            transparent: 'transparent',
            current: 'currentColor',
            //amber: colors.amber,
            black: colors.black,
            blue: colors.blue,
            cyan: colors.cyan,
            emerald: colors.emerald,
            fuchsia: colors.fuchsia,
            gray: colors.trueGray,
            blueGray: colors.blueGray,
            coolGray: colors.coolGray,
            //trueGray: colors.trueGray,
            warmGray: colors.warmGray,
            green: colors.green,
            indigo: colors.indigo,
            lime: colors.lime,
            orange: colors.orange,
            pink: colors.pink,
            purple: colors.purple,
            red: colors.red,
            rose: colors.rose,
            sky: colors.sky,//warn - As of Tailwind CSS v2.2, `lightBlue` has been renamed to `sky`.
            teal: colors.teal,
            violet: colors.violet,
            yellow: colors.amber,
            white: colors.white,
        },
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'blue-clear': '#36A9E1',
                'blue-marine': '#2F80ED',
                'orange-clear': '#FBB06A',
                'orange': '#FF820D',
                'Gray-Palette': '#CDCDCD',
                'Gray-clear': '#F3F4F6',
              },
        },
    }    
};
