import Vue from 'vue'
import VueRouter from 'vue-router'
import DefaultLayout from "@/layouts/DefaultLayout";
import AuthLayout from "@/layouts/AuthLayout";
import Login from "@/views/Login";
import Registration from "@/views/Registration";
import Home from "@/views/Home";
import authService from "@/service/auth_service";
import About from "@/views/About";
import AddNotes from "@/views/AddNotes";

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'DefaultLayout',
    component: DefaultLayout,
    redirect: 'home',
    meta: {
      auth: true,
    },
    children: [
      {
        path: 'home',
        name: 'Home',
        component: Home
      },
      {
        path: 'add-notes',
        name: 'AddNotes',
        component: AddNotes
      }
    ]
  },
  {
    path: '/auth',
    name: 'Auth',
    component: AuthLayout,
    children: [
      {
        path: 'login',
        name: 'Login',
        component: Login
      },
      {
        path: 'register',
        name: 'Registration',
        component: Registration
      }
    ]
  },
  {
    path: 'login',
    redirect: '/auth/login'
  },
  {
    path: 'register',
    redirect: '/auth/register'
  },
  {
    path: 'add-notes',
    redirect: '/add-notes'
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
});

router.beforeEach((to, from, next) => {
  if(to.name === 'Home' && !authService.isLoggedIn()){
    next({name: 'Login'});
  }else if(authService.isLoggedIn() && to.name !== 'Home'){
    next({name: 'Home'});
  }else if(to.name === 'AddNotes'){
    next({name: 'AddNotes'});
  }
  else
    next();
})

export default router
