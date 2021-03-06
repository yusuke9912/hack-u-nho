/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import VueRouter from 'vue-router';
import HeaderComponent from "./components/share/HeaderComponent";
import FooterComponent from "./components/share/FooterComponent";
import JobListComponent from "./components/job/JobListComponent";
import JobCreateComponent from "./components/job/JobCreateComponent";
import JobShowComponent from "./components/job/JobShowComponent";
import JobEditComponent from "./components/job/JobEditComponent";
import JobRequestComponent from "./components/job/JobRequestComponent";
import UserListComponent from "./components/user/UserListComponent";
import UserShowComponent from "./components/user/UserShowComponent";
import UserEditComponent from "./components/user/UserEditComponent";
import UserMessageComponent from "./components/user/UserMessageComponent";
import MyPageComponent from "./components/MyPageComponent";
import RegisterComponent from "./components/RegisterComponent";
import LoginComponent from "./components/LoginComponent";
import RoomListComponent from "./components/RoomListComponent";

require('./bootstrap');

window.Vue = require('vue');

// Vuex.Store 
import store from './store.js'

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('header-component', HeaderComponent);
Vue.component('footer-component', FooterComponent);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/login',
            name: 'login',
            component: LoginComponent,
        },
        {
            path: '/signup',
            name: 'signup',
            component: RegisterComponent,
        },
        {
            path: '/jobs',
            name: 'job.list',
            component: JobListComponent
        },
        {
            path: '/jobs/create',
            name: 'job.create',
            component: JobCreateComponent
        },
        {
            path: '/jobs/:jobId',
            name: 'job.show',
            component: JobShowComponent,
            props: true
        },
        {
            path: '/jobs/:jobId/edit',
            name: 'job.edit',
            component: JobEditComponent,
            props: true
        },
        {
            path: '/jobs/:userId/request',
            name: 'job.request',
            component: JobRequestComponent,
            props: true
        },
        {
            path: '/',
            name: 'user.list',
            component: UserListComponent,
        },
        {
            path: '/users/:userId',
            name: 'user.show',
            component: UserShowComponent,
            props: true
        },
        {
            path: '/users/edit',
            name: 'user.edit',
            component: UserEditComponent,
            props: true
        },
        {
            path: '/users/:userId/room',
            name: 'user.room',
            component: UserMessageComponent,
            props: true
        },
        {
            path: '/mypage',
            name: 'mypage',
            component: MyPageComponent,
        },
        {
            path: '/rooms',
            name: 'room.list',
            component: RoomListComponent,
        },
    ]
});

const app = new Vue({
    el: '#app',
    store: store,
    router,
    mounted(){
        window.Echo.private('message')
        .listen('MessageEvent', (e) => {
            console.log(e);
        });
    }
});
