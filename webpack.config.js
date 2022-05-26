const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const path = require('path');

/**
 * @type {import('webpack').Configuration}
 */
const options = {
    entry : {
        history : './public/App/Assets/js/history.js',
        //about : './frontend/pages/about/index.js',
        test : './public/App/Assets/test/js/test.js',
        //contact: './public/App/Assets/js/calendar.js',
        //hobbies : './frontend/pages/hobbies/index.js',
        //photos : './frontend/pages/photos/index.js',
        //table : './frontend/pages/table/index.js',
        //test : './frontend/pages/test/index.js',
        //stats : './frontend/pages/stats/index.js'
    },
    output : {
        path : path.resolve(__dirname, "public/assets"),
        filename : "js/[name].js"
    },
    module : {
        rules : [
            {
                test : /(\.s[ac]ss$)/i,
                use: [
                    MiniCssExtractPlugin.loader,
                    "css-loader",
                    "sass-loader",
                ],
            },
            {
                test: /\.css$/,
                use: ['style-loader', 'css-loader']
            },
        ]
    },
    plugins : [
        new MiniCssExtractPlugin({
            filename: "css/[name].css"
        })
    ]
}

module.exports = options;
