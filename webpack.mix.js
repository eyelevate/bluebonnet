let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// Project Dependencies
mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');


// Now-ui-kit Theme
// mix.js('resources/assets/js/themes/now-ui-kit/now-ui-kit.js', 'public/js/themes/now-ui-kit')
//    .combine(['resources/assets/js/themes/now-ui-kit/plugins/*'], 'public/js/themes/now-ui-kit/combined.js')
//    .copyDirectory('resources/assets/img/themes/now-ui-kit', 'public/img/themes/now-ui-kit')
//    .copyDirectory('resources/assets/fonts/themes/now-ui-kit', 'public/fonts/themes/now-ui-kit')
//    .sass('resources/assets/sass/themes/now-ui-kit/now-ui-kit.scss','public/css/themes/now-ui-kit');

// Core UI Theme
mix.js('resources/assets/js/themes/coreui/coreui.js', 'public/js/themes/coreui')
   .combine([
   		'resources/assets/js/themes/coreui/views/pace.js',
   		'resources/assets/js/themes/coreui/views/chart.js',
   		'resources/assets/js/themes/coreui/views/widgets.js'], 
   		'public/js/themes/coreui/dashboard-plugins.js')
   .js('resources/assets/js/themes/coreui/views/main.js', 'public/js/themes/coreui')
   .copyDirectory('resources/assets/img/themes/coreui', 'public/img/themes/coreui')
   .copyDirectory('resources/assets/fonts/themes/coreui', 'public/fonts/themes/coreui')
   .sass('resources/assets/sass/themes/coreui/style.scss','public/css/themes/coreui');

// Theme 1 - True Gem
mix.sass('resources/assets/sass/themes/theme1/theme1.scss','public/css/themes/theme1')
   .js('resources/assets/js/themes/theme1/theme1.js','public/js/themes/theme1')
   .copyDirectory('resources/assets/img/themes/theme1', 'public/img/themes/theme1');

// Theme 2 - Anna Scheffield
mix.sass('resources/assets/sass/themes/theme2/theme2.scss','public/css/themes/theme2')
   .js('resources/assets/js/themes/theme2/theme2.js','public/js/themes/theme2')
   .copyDirectory('resources/assets/img/themes/theme1', 'public/img/themes/theme2');
// Ionicons
mix.sass('resources/assets/fonts/themes/ionicons/scss/ionicons.scss','public/css/themes/ionicons');


// Vue good tables
mix.copyDirectory('resources/assets/img/themes/vue-good-table','public/img/themes/vue-good-table');

// Page Specific Mix

// Admins
mix.js('resources/assets/js/views/admins/login.js','public/js/views/admins')
   .js('resources/assets/js/views/admins/general.js','public/js/views/admins')
   .js('resources/assets/js/views/admins/index.js','public/js/views/admins')
   .js('resources/assets/js/views/admins/charts.js','public/js/views/admins')
   .sass('resources/assets/sass/views/admins/general.scss','public/css/views/admins');

// Auth
mix.js('resources/assets/js/views/auth/login.js','public/js/views/auth')
   .js('resources/assets/js/views/auth/register.js','public/js/views/auth');

// Companies
mix.js('resources/assets/js/views/companies/create.js','public/js/views/companies');

// Home
mix.js('resources/assets/js/views/home/index.js','public/js/views/home')
   .js('resources/assets/js/views/home/shop.js','public/js/views/home');


// metal
mix.js('resources/assets/js/views/metals/create.js','public/js/views/metals');

