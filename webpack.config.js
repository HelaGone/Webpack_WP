const path = require('path');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
var debug = process.env.NODE_ENV !== 'production';
const WorkboxPlugin = require('workbox-webpack-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');

module.exports = {
	devtool: debug ? 'inline-sourcemap' : null,
	mode: debug ? 'development' : 'prooduction',
	entry: {
		main: './src/index', 
		home: './src/components/templates/home/index',
		single: './src/components/templates/single/index',
		archive: './src/components/templates/archive/index',
		category: './src/components/templates/category/index',
		author: './src/components/templates/author/index',
		image: './src/components/templates/image/index',
		tag: './src/components/templates/tag/index'
	},
	output: {
		path: path.resolve(__dirname, 'dist'),
		filename: '[name].js'
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
			use: ExtractTextPlugin.extract({
				fallback: 'style-loader',
				use: [{
					loader: 'css-loader',
					options: {
						importLoaders: 1,
						sourceMap: true
					}
				}]
			})
		},
		{
			test: /\.(png|svg|jpg|gif)$/,
			use: ['file-loader']
		}]
	},
	plugins: [
		new CleanWebpackPlugin(['dist']),
		new ExtractTextPlugin({
			filename: (getPath)=>{
				return getPath('css/[name].css').replace('css/js', 'css');
			},
			allChunks: true
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