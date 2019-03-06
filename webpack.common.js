const path = require('path');
const CleanWebpackPlugin = require('clean-webpack-plugin');
// const ExtractTextPlugin = require('extract-text-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const WorkboxPlugin = require('workbox-webpack-plugin');

module.exports = {
	entry: {
		main: './src/index', 
		home: './src/components/templates/home/index.js',
		single: './src/components/templates/single/index.js',
		archive: './src/components/templates/archive/index.js',
		category: './src/components/templates/category/index.js',
		author: './src/components/templates/author/index.js',
		image: './src/components/templates/image/index.js',
		tag: './src/components/templates/tag/index.js'
	},
	output: {
		filename: '[name].js',
		path: path.resolve(__dirname, 'dist')
	}, 
	optimization:{
		splitChunks: {
			chunks: "all"
		}
	},
	module: {
		rules:[{
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
			use:[
				{
					loader: MiniCssExtractPlugin.loader
				},
				'css-loader'
			]
		},
		{
			test: /\.(png|svg|jpg|jpeg|gif)$/,
			use: {
				loader: 'file-loader',
				options: {
					name: './assets/[hash].[ext]'
				}
			}
		}]
	},
	plugins: [
		new CleanWebpackPlugin(['dist']),
		new MiniCssExtractPlugin({
			filename: '[name].css',
			chunkFilename: '[id].css'
		}),
		new WorkboxPlugin.GenerateSW({
			exclude: [/\.(?:png|jpg|jpeg|svg|gif)$/],
			runtimeCaching: [{
				urlPattern: /\.(?:png|jpg|jpeg|svg|gif)$/,
				handler: 'cacheFirst',
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