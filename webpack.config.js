const webpack = require('webpack');
const path = require('path');
const fs = require('fs');
const glob = require('glob');

const ExtractTextPlugin = require('extract-text-webpack-plugin');
const extractCSS = new ExtractTextPlugin('styles/[name].bundle.css');

const SpriteLoaderPlugin = require('svg-sprite-loader/plugin');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const PurgecssPlugin = require('purgecss-webpack-plugin');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');

const themePath = path.resolve(
    __dirname,
    'wp-content/themes/planitchildtheme'
);
const publicPath = path.resolve(themePath, 'assets');

let svgIcons = glob.sync(`${publicPath}/img/icons/**/*.svg`);
if( !svgIcons ){
    svgIcons = new Array();
}

module.exports = (env) => {
    const isProduction = env && env.production ? true : false;

    return {
        entry: {
            main: [
                `${themePath}/source/scripts/main.js`,
                `${themePath}/source/styles/main.scss`,
            ],
            // 'wp-editor-styles': `${themePath}/source/styles/wp-editor-styles.scss`,
            //icons: svgIcons,
        },
        output: {
            path: publicPath,
            filename: 'scripts/[name].bundle.js',
        },
        module: {
            rules: [
                {
                    test: /\.js$/,
                    exclude: /(node_modules|bower_components)/,
                    use: {
                        loader: 'babel-loader',
                        options: {
                            presets: ['env'],
                        },
                    },
                },
                {
                    test: /\.scss$/,
                    exclude: /(node_modules|bower_components)/,
                    use: extractCSS.extract({
                        use: [
                            {
                                loader: 'css-loader',
                                options: {
                                    importLoaders: 2,
                                    sourceMap: !isProduction,
                                    minimize: isProduction,
                                },
                            },
                            {
                                loader: 'postcss-loader',
                                options: {
                                    sourceMap: !isProduction,
                                    plugins: [autoprefixer(), cssnano()],
                                },
                            },
                            {
                                loader: 'sass-loader',
                                options: {
                                    sourceMap: !isProduction,
                                    outputStyle: 'expanded',
                                },
                            },
                        ],
                    }),
                },
                {
                    test: /\.svg$/,
                    use: [
                        {
                            loader: 'svg-sprite-loader',
                            options: {
                                extract: true,
                                spriteFilename: 'markup/svg-icons.bundle.html',
                                symbolId: 'icon-[name]',
                            },
                        },
                        {
                            loader: 'svgo-loader',
                        },
                    ],
                },
            ],
        },
        plugins: [
            extractCSS,
            new SpriteLoaderPlugin({
                plainSprite: true,
            }),
            new UglifyJsPlugin({
                sourceMap: !isProduction,
                uglifyOptions: {
                    ie8: false,
                    compress: {
                        warnings: false,
                    },
                    output: {
                        comments: false,
                        beautify: !isProduction,
                    },
                },
            }),
            new webpack.SourceMapDevToolPlugin({
                filename: 'styles/styles.min.css.map',
                //append: `\n//# sourceMappingURL=${path}[url]`
            })
            // new PurgecssPlugin({
            //     paths: () => {
            //         return glob.sync(`${themePath}/**/*.{js,php,scss}`, {
            //             nodir: true,
            //         });
            //     },
            // }),
        ],
        resolve: {
            modules: [
                path.resolve(themePath, 'source/scripts'),
                'node_modules',
            ],
            alias: {
                '@': path.resolve(themePath, 'source/scripts'),
                '@public': path.resolve(publicPath),
            },
            symlinks: false,
        },
        externals: {
            jquery: 'jQuery',
        },
        watchOptions: {
            ignored: /node_modules/,
            // poll: 1000 // uncomment if watching isn't working - https://webpack.js.org/configuration/watch/#watchoptions-poll
        },
        devtool: !isProduction ? 'source-map' : false,
    };
};
