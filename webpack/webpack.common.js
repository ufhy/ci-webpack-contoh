const path = require('path');
const webpack = require('webpack');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const ManifestPlugin = require('webpack-manifest-plugin');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const glob = require('glob');

function splitString(stringToSplit, separator) {
  return stringToSplit.split(separator);
}

const appPath = path.join(__dirname, '../application');
const pathEntries = [
  path.resolve(appPath,'themes/**/assets/js/*.js*'),
  path.resolve(appPath,'modules/**/js/*.js*'),
];

const entryFiles = {};
pathEntries.forEach((path) => {
  const globpaths = glob.sync(path);
  const parentdir  = 'js';
  const ext  = 'js';
  globpaths.forEach((path) => {
    const key = splitString(path, `/${parentdir}/`).slice(-1)[0].replace(`.${ext}`, '');
    entryFiles[key] = path;
  });
});

module.exports = {
  entry: entryFiles,
  plugins: [
    new ManifestPlugin(),
    new CleanWebpackPlugin(['../public/dist'], {allowExternal: true}),
    new ExtractTextPlugin({
      filename: '[name]-[chunkhash].css',
      // disable: false,
      allChunks: true
    }),
    new webpack.LoaderOptionsPlugin({
      test: /\.(less|scss)/,
      options: {
        postcss: function (webpack) {
          return [
            require("postcss-import")({ addDependencyTo: webpack }),
            require("postcss-url")(),
            require("postcss-cssnext")({ browsers: 'last 2 version' }),
            // add your "plugins" here
            // ...
            // and if you want to compress,
            // just use css-loader option that already use cssnano under the hood
            require("postcss-browser-reporter")(),
            require("postcss-reporter")(),
          ]
        }
      }
    }),
  ],
  output: {
    filename: '[name].[hash].js',
    path: path.resolve(__dirname, '../public/dist')
  },
  module: {
    rules: [
      {
        test: /\.scss$/,
        loader: ExtractTextPlugin.extract({
          fallback: 'style-loader',
          use: [
            {
              loader: 'css-loader',
              options: {
                modules: false,
                importLoaders: 2,
                sourceMap: true,
                minimize: true
              }
            }, {
              loader: 'postcss-loader',
              options: {
                sourceMap: true
              }
            }, {
              loader: 'sass-loader',
              options: {
                outputStyle: 'expanded',
                sourceMap: true,
                sourceMapContents: true
              }
            }
          ]
        })
      }, {
        test: /\.woff2?(\?v=\d+\.\d+\.\d+)?$/,
        loader: 'url-loader',
        options: {
          limit: 10240,
          mimetype: 'application/font-woff'
        }
      }, {
        test: /\.woff?(\?v=\d+\.\d+\.\d+)?$/,
        loader: 'url-loader',
        options: {
          limit: 10240,
          mimetype: 'application/font-woff'
        }
      }, {
        test: /\.ttf(\?v=\d+\.\d+\.\d+)?$/,
        loader: 'url-loader',
        options: {
          limit: 10240,
          mimetype: 'application/octet-stream'
        }
      }, {
        test: /\.eot(\?v=\d+\.\d+\.\d+)?$/,
        loader: 'file-loader'
      }, {
        test: /\.svg(\?v=\d+\.\d+\.\d+)?$/,
        loader: 'url-loader',
        options: {
          limit: 10240,
          mimetype: 'image/svg+xml'
        }
      },
    ]
  },
  resolve: {
    modules: [
      'node_modules'
    ],
    extensions: ['.json', '.js', '.jsx']
  },
};