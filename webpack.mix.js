const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
const purgecss = require('@fullhuman/postcss-purgecss')({
    content: [
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './resources/js/**/*.js',
    ],
    defaultExtractor: content => content.match(/[\w-/:]+(?<!:)/g) || []
});

mix.postCss('resources/css/main.css', 'public/css', [
    require('postcss-import'),
    tailwindcss('./tailwind.config.js'),
    ...process.env.NODE_ENV === 'production' ? [purgecss] : []
]);