const path = require('path')
const { CleanWebpackPlugin } = require('clean-webpack-plugin')
const glob = require('glob')

//create an array of entry points main then all the block JS files
let allJavascriptFiles = glob.sync('../blocks/**/*.js')
allJavascriptFiles.push(path.resolve(__dirname, 'js/main.js'))

module.exports = {
  mode: process.env.NODE_ENV,
  watch: process.env.NODE_ENV == 'development',
  entry: {
    main: allJavascriptFiles,
    admin: path.resolve(__dirname, 'js/admin.js')
  },
  output: {
    path: path.resolve(__dirname, '../public/js'),
    filename: '[name].js'
  },
  plugins: [
    new CleanWebpackPlugin(),
  ]
}