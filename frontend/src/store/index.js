import { createStore } from 'vuex'
import auth from './modules/auth'
import subscriber from "./subscriber";

export default createStore( {
    namespaced: true,
    state: {
        category: "test",

    },
    mutations: {},
    actions: {},
    getters: {},
    modules: {
        auth
    },
    plugins: [ subscriber ]
} )
