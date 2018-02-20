require('./bootstrap');
import Vue from 'vue';

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

import App from './components/App.vue';
import routes from './router.js';
export default Vue;


Vue.axios.defaults.headers.common['X-CSRF-TOKEN'] = document.getElementsByName('csrf-token')[0].getAttribute('content');
Vue.axios.defaults.headers.common['Authorization'] = 'HarunUmar' + localStorage.getItem('id_token');


export var router = new VueRouter({ 
    routes: routes
});

Object.defineProperty(Vue.prototype,'$bus',{
	get(){
		return this.$root.bus;
	}
});

window.bus = new Vue({});

new Vue({
    el: '#app',
    bus: bus,
    router: router,
    data: {
    	bus: bus
    },
    render: app => app(App)
});
