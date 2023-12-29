const path = require('path')
const HtmlWebpackPlugin = require('html-webpack-plugin')

module.exports = (env, argv) => {

    const isProduction = argv.mode === 'production';
    return {
        entry: './resources/js/index.tsx',
        output: {
            path: path.resolve(__dirname, 'public/js'),
            filename: 'bundle.js',
        },
        devServer: {
            static: {
                directory: path.join(__dirname, 'public/js'),
            },
            compress: true,
            port: 3000,
            hot: true,
        },
        devtool: 'source-map',
        resolve: {
            extensions: ['.ts', '.tsx', '.js', '.jsx'],
        },
        module: {
            rules: [
                {
                    test: /\.(ts|tsx)$/,
                    use: 'ts-loader',
                    exclude: /node_modules/,
                },
                {
                    test: /\.(js|jsx)$/,
                    use: 'babel-loader',
                    exclude: /node_modules/,
                },
                {
                    test: /\.(css|scss)$/,
                    use: ['style-loader', 'css-loader', 'sass-loader'],
                },
                {
                    test: /\.(png|svg|jpg|jpeg|gif)$/i,
                    type: "asset/resource"
                },
                {
                    test: /\.svg$/,
                    use: ['@svgr/webpack'],
                },
            ],
        },
        mode: isProduction ? 'production' : 'development',
        plugins: [
            new HtmlWebpackPlugin({
                template: './resources/views/index.blade.php',
                filename: '../../resources/views/index.blade.php',
                inject: false,
            }),
        ],
    }
}
