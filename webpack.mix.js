const mix = require("laravel-mix");
mix.disableNotifications();

mix.js("resources/js/main.js", "./public/js/").sourceMaps();
mix.sass("./resources/scss/main.scss", "./public/css/", []).sourceMaps();
