const path = require('path');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const {GenerateSW} = require('workbox-webpack-plugin');

const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");

const TerserPlugin = require('terser-webpack-plugin');

module.exports = {
	entry: {
		main: './src/index', 
		home: './src/components/templates/home/index.js',
		single: './src/components/templates/single/index.js',
		archive: './src/components/templates/archive/index.js',
		category: './src/components/templates/category/index.js',
		author: './src/components/templates/author/index.js',
		image: './src/components/templates/image/index.js',
		tag: './src/components/templates/tag/index.js',
		page: './src/components/templates/page/index.js',
		not_found: './src/components/templates/404/index.js',
	},
	output: {
		filename: '[name].js',
		path: path.resolve(__dirname, 'dist')
	}, 
	optimization:{
		splitChunks: {
			chunks: 'async',
			minSize: 20000,
			minRemainingSize: 0,
			minChunks: 1,
			maxAsyncRequests: 30,
			maxInitialRequests: 30,
			enforceSizeThreshold: 50000,
			automaticNameDelimiter: '~',
			cacheGroups: {
				defaultVendors: {
					test: /[\\/]node_modules[\\/]/,
					priority: -10,
					reuseExistingChunk: true
				},
				default: {
					minChunks: 2,
					priority: -20,
					reuseExistingChunk: true
				}
			}
		},
		minimizer:[
			new CssMinimizerPlugin(),
			new TerserPlugin({})
		]
	},
	module: {
		rules:[
			{
				test: /\.js$/,
				exclude: '/node_modules/',
				use: {
					loader: 'babel-loader',
					options: {
						presets: ['@babel/preset-env']
					}
				}
			},
			{
				test: /\.css$/,
				use: [MiniCssExtractPlugin.loader, "css-loader"]
			},
			{
				test: /\.(png|svg|jpg|jpeg|gif)$/,
				use: {
					loader: 'file-loader',
					options: {
						name: './assets/[hash].[ext]'
					}
				}
			},
			{
				test: /\.(woff|woff2|eot|ttf|otf)$/,
				use: {
					loader: 'file-loader',
					options:{
						name: './fonts/[name].[ext]'
					}
				}
			}
		]
	},
	plugins: [
		new CleanWebpackPlugin(['dist']),
		new MiniCssExtractPlugin({
			filename: '[name].css',
			chunkFilename: '[id].css'
		}),
		new GenerateSW({
			exclude: [/\.(?:png|jpg|jpeg|svg|gif)$/],
			swDest: '../../../../sw.js',
			runtimeCaching: [{
				urlPattern: /\.(?:png|jpg|jpeg|svg|gif)$/,
				handler: 'CacheFirst',
				options: {
					cacheName: 'cache-images',
					expiration: {
						maxEntries: 20
					},
				},
			}],
		}),
	]
};