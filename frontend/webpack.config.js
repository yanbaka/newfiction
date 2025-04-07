const path = require('path');
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const RemoveEmptyScriptsPlugin = require('webpack-remove-empty-scripts');

const webpack = require('webpack');
const TerserPlugin = require("terser-webpack-plugin");

const CopyPlugin = require('copy-webpack-plugin');
const ImageminPlugin = require('imagemin-webpack-plugin').default;
const ImageminMozjpeg = require('imagemin-mozjpeg');

const Dotenv = require('dotenv-webpack');

const themeDir = '../themes/newfiction/';
const assetsDir = `${themeDir}/`;

module.exports = {
  mode: "development",
  devtool: "source-map",
  module: {
    rules: [
        {
          test: /\.ts$/,
          use: 'ts-loader',
        },
        {
            test: /\.(css|sass|scss)/,
            use: [
                {
                    loader: MiniCssExtractPlugin.loader
                },
                {
                    loader: 'css-loader',
                    options: {
                      sourceMap: true,
                      importLoaders: 2,
                      // 0 => no loaders (default);
                      // 1 => postcss-loader;
                      // 2 => postcss-loader, sass-loader
                      url: true,
                    },
                },
                {
                  loader: "postcss-loader",
                  options: {
                    postcssOptions: {
                      plugins: [
                        ["autoprefixer", { grid: true }],
                        "tailwindcss",
                      ],
                    },
                  },
                },
                {
                    loader: 'sass-loader',
                    options: {
                      implementation: require('sass'),
                      sourceMap: true,
                    },
                }
            ]
        },
        {
          test: /\.(gif|png|jpg|jpeg|svg)$/,
          type: 'asset/resource',
          generator: {
            filename: (pathData) => {
              const relativePath = pathData.filename.split('src/images/')[1]; // 'src/images/'を除去
              return `../images/${relativePath}`;
            },
          },
        }
    ]
  },
  optimization: {
    minimizer: [
      new CssMinimizerPlugin(),
      new TerserPlugin({
        // LICENSE.txt出力しない
        extractComments: false,
      }),
    ],
  },
  entry: {
    'tailwind.css': [ path.resolve(__dirname, 'src/css/tailwind.css') ],
    // cssは拡張子つける
    'projects': [ path.resolve(__dirname, 'src/js/projects.js') ],
    'projects.css': [ path.resolve(__dirname, 'src/css/projects.scss')],
    'single-projects.css': [ path.resolve(__dirname, 'src/css/single-projects.scss')  ],
    'single-projects': [ path.resolve(__dirname, 'src/js/single-projects.js') ],
  },
  output: {
    filename: '[name].js',
    path: path.resolve(`${assetsDir}/js`),
    publicPath: '../js/',
    clean: true,
  },
  resolve: {
    extensions: [
      '.ts', '.js',
    ],
  },
  plugins: [
    new BrowserSyncPlugin({
      host: "localhost",
      files: [`${themeDir}/**/*.php`],
      port: 3000,
      // dockerとホストをつないでいるポートをproxyで指定
      proxy: {
        target: "http://localhost:8888/",
      },
    }),
    new MiniCssExtractPlugin({
      // 出力先はjsからの相対パスを指定
      filename: `../css/[name]`,
    }),
    // cssをentryしたときに生成される不要なjsを削除
    new RemoveEmptyScriptsPlugin(),
    new webpack.ProvidePlugin({
      $: 'jquery',
      jQuery: "jquery"
    }),
    new ImageminPlugin({
      test: /\.(jpe?g|png|gif|svg)$/i,
      plugins: [
        ImageminMozjpeg({
          quality: 85,
          progressive: true,
        }),
      ],
      pngquant: {
        quality: '70-85',
      },
      gifsicle: {
        interlaced: false,
        optimizationLevel: 10,
        colors: 256,
      },
      svgo: {}
    }),
    new Dotenv(),
  ],
};