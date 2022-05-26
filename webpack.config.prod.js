const basicOptions = require('./webpack.config');

/**
 * @type {import('webpack').Configuration}
 */
let options = {
    ...basicOptions,
    mode : "production",
}

module.exports = options;