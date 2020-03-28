let type = process.env.ENV_TYPE

if (type == 'front') {
    require('./webpack.mix.front')
} else if (type == 'control') {
    require('./webpack.mix.control')
} else {
    console.error('Unknown env type - ' + type)
}