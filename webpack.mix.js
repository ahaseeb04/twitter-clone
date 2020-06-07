const mix = require('laravel-mix')
const tailwindcss = require('tailwindcss')

mix.js('resources/js/app.js', 'public/js')

mix.sass('resources/scss/app.scss', 'public/css')
   .options({
      processCssUrls: false,
      postCss: [
         tailwindcss('./tailwind.config.js')
      ]
   })

mix.sourceMaps()

mix.browserSync('localhost:8000')