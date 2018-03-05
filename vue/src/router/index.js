import Vue from 'vue'
import Router from 'vue-router'
import LandingIndex from '@/components/pages/landing/Index'
import Login from '@/components/pages/landing/Login'
import Register from '@/components/pages/landing/Register'


// User
import Dashboard from '@/components/pages/user/Dashboard'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'LandingIndex',
      component: LandingIndex
    },
    {
      path: '/login',
      name: 'Login',
      component: Login
    },
    {
      path: '/register',
      name: 'Register',
      component: Register
    },
    {
      path: '/dashboard',
      name: 'Dashboard',
      component: Dashboard
    }
  ]
})
