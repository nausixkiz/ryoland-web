const path = require('path');

module.exports = {
    resolve: {
        alias: {
            '@': path.resolve('resources/js'),
            jquery: path.resolve('node_modules/jquery/dist/jquery.js')
        },
    },
};
