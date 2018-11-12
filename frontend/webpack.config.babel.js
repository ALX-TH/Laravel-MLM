import path from 'path';
import webpack from 'webpack';

module.exports = {

    entry: {
        dashboard: './src/admin_template/src/js/material-dashboard.js',
    },
    output: {
        path: path.resolve(__dirname, './release'),
        publicPath: '/release/',
        filename: '[name].js'
    },
    mode: 'development',
    module: {
        rules: [
            {
                test: /\.scss$/,
                use: ['css-loader', 'sass-loader']
            },{
                test: /\.(js|jsx)$/,
                exclude: /(node_modules|bower_components)/,
                loader: "babel-loader"
            }
        ]
    }

};

if (process.env.NODE_ENV === 'production') {
    module.exports.devtool = '#source-map';
    module.exports.plugins = (module.exports.plugins || []).concat([

        new webpack.DefinePlugin({
            'process.env': {
                NODE_ENV: '"production"'
            }
        }),
        new webpack.optimize.UglifyJsPlugin({
            sourceMap: true,
            compress: {
                warnings: false
            }
        }),
        new webpack.LoaderOptionsPlugin({
            minimize: true
        })
    ])
}
