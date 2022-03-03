const basicOptions = require('./webpack.config');

/**
 * @type {import('webpack').Configuration}
 */
let options = {
    ...basicOptions,
    mode : "development",
    devtool: "inline-source-map",
    devServer : {
        compress: false,
        port : 8082,
        liveReload : true,
        hot: true
    }
}

module.exports = options;