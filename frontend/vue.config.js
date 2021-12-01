// module.exports = {
//   devServer: {
//     proxy: 'http://localhost:8000'
//   }
// }

// vue.config.js
module.exports = {
    // options...
    devServer: {
        disableHostCheck: true,
        host: '0.0.0.0',
        headers: {
            'Access-Control-Allow-Origin': '*',
            'Access-Control-Allow-Headers': 'Origin, X-Requested-With, Content-Type, Accept'
        },
        watchOptions: {
            poll: true
        },
        proxy: 'http://localhost:8080',

    }
}

