const mix = require('laravel-mix');

mix.webpackConfig({
    stats: {
        children: true
    }
});

// JavaScript
mix.js('assets/js/scripts/*.js', 'assets/js/wcl-scripts.js');
// mix.js('assets/js/scripts/admin/*.js', 'assets/js/wcl-admin-scripts.js');

// SCSS
mix.options({
    processCssUrls: false,
    postCss: [
        require('autoprefixer'),
        require('postcss-sort-media-queries')
    ],
})

mix.sass('assets/scss/wcl-style.scss', 'assets/css')
    .sourceMaps();

mix.sass('assets/scss/wcl-admin-style.scss', 'assets/css')
    .sourceMaps();


// ACF Blocks

mix.sass('template-parts/acf-blocks/hero/style.scss', 'template-parts/acf-blocks/hero')
    .sourceMaps();

mix.sass('template-parts/acf-blocks/solutions/style.scss', 'template-parts/acf-blocks/solutions')
    .sourceMaps();
    
mix.sass('template-parts/acf-blocks/action/style.scss', 'template-parts/acf-blocks/action')
    .sourceMaps();

mix.sass('template-parts/acf-blocks/choose/style.scss', 'template-parts/acf-blocks/choose')
    .sourceMaps();