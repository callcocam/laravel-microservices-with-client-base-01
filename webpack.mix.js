const mix = require("laravel-mix");
let tailwindcss = require('tailwindcss');
require('dotenv').config();

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 | desc arquivo copiado
 */
//mix.setPublicPath('public_html/');
mix.webpackConfig({
    resolve: {
        alias: {
            "@": path.resolve(__dirname, "packages/resources/js/src"),
            "@assets": path.resolve(__dirname, "packages/resources/assets"),
            "@store": path.resolve(__dirname, "packages/resources/js/src/store"),
            "@plugins": path.resolve(
                __dirname,
                "packages/resources/js/src/utilities/plugins"
            ),
            "@views": path.resolve(__dirname, "packages/resources/js/src/views"),
            "@components": path.resolve(
                __dirname,
                "packages/resourcesjs/components"
            ),
            "@sass": path.resolve(__dirname, "packages/resources/sass")
        }
    },
    output: {
        chunkFilename: "_cdn/assets-admin/chunks/[name].[chunkhash].js"
    }
});

//mix.js("resources/auth/js/app.js", "public/_cdn/auth/js").sass();

mix.js("packages/resources/js/app.js", "public/_cdn/assets-admin/js/app.js")
    .sass("packages/resources/sass/app.scss","public/_cdn/assets-admin/css/app.css").options({
    postCss:[require('autoprefixer'), require('postcss-rtl')]
}).postCss('packages/resources/assets/css/main.css', 'public/_cdn/assets-admin/css', [
        tailwindcss('tailwind.js'), require('postcss-rtl')()
    ])
    .copy('node_modules/vuesax/dist/vuesax.css', 'public/_cdn/assets-admin/css/vuesax.css') // Vuesax framework css
    .copy('packages/resources/assets/css/iconfont.css', 'public/_cdn/assets-admin/css/iconfont.css') // Feather Icon Font css
    .copyDirectory('packages/resources/assets/fonts', 'public/_cdn/assets-admin/fonts') // Feather Icon fonts
    .copyDirectory('node_modules/material-icons/iconfont', 'public/_cdn/assets-admin/css/material-icons') // Material Icon fonts
    .copyDirectory('node_modules/material-icons/iconfont/material-icons.css', 'public/_cdn/assets-admin/css/material-icons/material-icons.css') // Material Icon fonts css
    .copy('node_modules/prismjs/themes/prism-tomorrow.css', 'public/_cdn/assets-admin/css/prism-tomorrow.css') // Prism Tomorrow theme css
    .copyDirectory('packages/resources/assets/images', 'public/_cdn/assets-admin/images'); // Copy all images from resources to public folder

mix.js("resources/js/app.js", "public/_cdn/js/app.js")
    .sass("resources/sass/app.scss","public/_cdn/css/app.css");

if (mix.inProduction()) {
    mix.version();
}
