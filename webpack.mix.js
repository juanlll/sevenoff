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

mix.scripts([
	'resources/assets/js/jquery.js',
	'resources/assets/js/materialize.min.js',
	'resources/assets/js/axios.js',
	'resources/assets/js/vue.js',
	'resources/assets/js/toastr.js',
	'resources/assets/js/moment.js',
	'resources/assets/js/app.js',
	],'public/js/app.js');
mix.styles([
	'resources/assets/css/animate.css',
	'resources/assets/css/toastr.css',
	],'public/css/app.css');

mix.js([
	'resources/assets/js/views/ViewProfile.js',
	],'public/js/viewprofile.js');

mix.js([
	'resources/assets/js/views/ViewConfiguration.js',
	],'public/js/viewconfiguration.js');

mix.js([
	'resources/assets/js/views/ViewStart.js',
	],'public/js/viewstart.js');

mix.js([
	'resources/assets/js/views/ViewConfigProfile.js',
	],'public/js/viewconfigprofile.js');

mix.js([
	'resources/assets/js/views/ViewConfigUser.js',
	],'public/js/viewconfiguser.js');

mix.js([
	'resources/assets/js/views/ViewConfigPlan.js',
	],'public/js/viewconfigplan.js');

mix.js([
	'resources/assets/js/views/ViewOffer.js',
	],'public/js/viewoffer.js');

mix.js([
	'resources/assets/js/views/ViewOffers.js',
	],'public/js/viewoffers.js');

mix.js([
	'resources/assets/js/views/ViewConfigInfoPersonal.js',
	],'public/js/viewconfiginfopersonal.js');