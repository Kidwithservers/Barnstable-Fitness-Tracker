const autoprefixer = require(‘autoprefixer’);
module.exports = [{
entry: './SCSS/common.scss',
output: {
// This is necessary for webpack to compile,
// but we never use style-bundle.js.
filename: 'style-bundle.js',
},
module: {
rules: [{
test: /\.scss$/,
use: [
{
loader: 'file-loader',
options: {
name: 'bundle.css',
},
},
{ loader: 'extract-loader' },
{ loader: 'css-loader' },
{ loader: 'sass-loader' },
]
}]
},
}];
