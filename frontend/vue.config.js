// vue.config.js
module.exports = {
    // options...
    devServer: {
        disableHostCheck: true,
        host: '0.0.0.0',
        headers: {
            'Access-Control-Allow-Origin': '*',
            'Access-Control-Allow-Headers': 'Origin, X-Requested-With, Content-Type, Accept, X-Auth-Token, Authorization',
            "Access-Control-Allow-Credentials": "true",
            "Access-Control-Allow-Methods": "PUT, GET, POST, DELETE, OPTION"

        },
        watchOptions: {
            poll: true
        },
        proxy: {
            "/api": {
                target: "http://localhost:8000",
                changeOrigin: true,
                logLevel: "debug"
            },
        }

    }
}

