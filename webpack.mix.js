let mix = require('laravel-mix');

mix.webpackConfig({
  module: {
    rules: [{
      test: /\.js?$/,
      use: [{
        loader: 'babel-loader',
        options: mix.config.babel()
      }]
    }]
  }
});

// let SVGSpritemapPlugin = require('svg-spritemap-webpack-plugin');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */

mix.js('src/js/script.js', 'dist/')
   .sass('src/sass/style.sass', 'dist/', {
      // outputStyle: 'compressed'
   }).options({
      processCssUrls: false,
   });

// mix.sass('src/sass/vip.sass', 'dist/').options({
//    processCssUrls: false
// });

// Full API
// mix.js(src, output);
// mix.react(src, output); <-- Identical to mix.js(), but registers React Babel compilation.
// mix.ts(src, output); <-- Requires tsconfig.json to exist in the same folder as webpack.mix.js
// mix.extract(vendorLibs);
// mix.sass(src, output);
// mix.standaloneSass('src', output); <-- Faster, but isolated from Webpack.
// mix.fastSass('src', output); <-- Alias for mix.standaloneSass().
// mix.less(src, output);
// mix.stylus(src, output);
// mix.postCss(src, output, [require('postcss-some-plugin')()]);
mix.browserSync({
  notify: false,
  proxy: 'localhost:8888',
  files: [
    '**/*.css',
    '**/*.js',
    '**/*.php',
    '**/*.twig'
  ]
});
// mix.combine(files, destination);
// mix.babel(files, destination); <-- Identical to mix.combine(), but also includes Babel compilation.
// mix.copy(from, to);
mix.copy('./src/js/jquery.min.js', './dist');
mix.copy('./src/js/extension/fullpage.parallax.min.js', './dist');
// mix.copyDirectory(fromDir, toDir);
// mix.minify(file);
mix.sourceMaps(); // Enable sourcemaps
// mix.version(); // Enable versioning.
mix.disableNotifications();
// mix.setPublicPath('path/to/public');
// mix.setResourceRoot('prefix/for/resource/locators');
// mix.autoload({}); <-- Will be passed to Webpack's ProvidePlugin.
// mix.webpackConfig({
//   plugins: [
//     new SVGSpritemapPlugin({
//      src: 'src/img/icons/*.svg',
//      filename : '/templates/partial/icons.twig',
//      prefix : 'icon-',
//      svgo : {removeTitle : true}
//     })
//   ]
// });
// mix.then(function () {}) <-- Will be triggered each time Webpack finishes building.
// mix.options({
//   extractVueStyles: false, // Extract .vue component styling to file, rather than inline.
//   globalVueStyles: file, // Variables file to be imported in every component.
//   processCssUrls: true, // Process/optimize relative stylesheet url()'s. Set to false, if you don't want them touched.
//   purifyCss: false, // Remove unused CSS selectors.
//   uglify: {}, // Uglify-specific options. https://webpack.github.io/docs/list-of-plugins.html#uglifyjsplugin
//   postCss: [] // Post-CSS options: https://github.com/postcss/postcss/blob/master/docs/plugins.md
// });