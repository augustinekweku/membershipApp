import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)

import About from './pages/about.vue'
import ProfileAbout from './pages/profile-about.vue'
import Register from './pages/register.vue'
import Profile from './pages/profile.vue'

const routes = [
    {
        path:  '/profile-about',
        component: ProfileAbout,
        name: 'ProfileAbout'
    },
    {
        path:  '/about',
        component: About,
        name: 'About'
    },
    {
        path:  '/profile',
        component: Profile,
        name: 'Profile'
    },
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