import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)

import Register from './pages/register.vue'

const routes = [
    {
        path:  '/register',
        component: Register,
        name: 'Register'
    },

    
]

export default new Router ({
    mode: 'history',
    routes,
})