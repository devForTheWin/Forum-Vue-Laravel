import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import './api'
import CKEditor from '@ckeditor/ckeditor5-vue';
import { library } from '@fortawesome/fontawesome-svg-core'
import { faThumbsUp } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faThumbsUp);

store.dispatch('auth/attempt', localStorage.getItem('token')).then(()=> {
    createApp(App)
        .use(store)
        .use( CKEditor )
        .component('fa', FontAwesomeIcon)
        .use(router).mount('#app');
});


