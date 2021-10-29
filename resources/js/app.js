require('./bootstrap');

import Vue from 'vue';
import router from './router'
import store from './store'


import 'bootstrap/dist/css/bootstrap.css'

import VueTelInput from 'vue-tel-input';
import 'vue-tel-input/dist/vue-tel-input.css'
Vue.use(VueTelInput)

import ViewUI from 'view-design';
import 'view-design/dist/styles/iview.css';
Vue.use(ViewUI);

import common from './common';
Vue.mixin(common);

import animateCss from 'animate.css';
Vue.use(animateCss);

import 'vue-awesome/icons'
import Icon from 'vue-awesome/components/Icon'
Vue.component('v-icon', Icon)

Vue.component('mainapp', require('./components/mainapp.vue').default); 

const app = new Vue({
    el: '#app',
    router,
    store
    
})