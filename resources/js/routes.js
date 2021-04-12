import VueRouter from 'vue-router';
import NProgress from 'nprogress'
import 'nprogress/nprogress.css';

let routes = [
    {
        name: 'dashboard',
        path: '/dashboard',
        component: require('./views/dashboard').default
    },
    {
        name: 'users.index',
        path: '/users',
        component: require('./views/users/index').default
    },
    {
        name: 'roles.index',
        path: '/roles',
        component: require('./views/roles/index').default
    },
    {
        name: 'sessions.index',
        path: '/sessions',
        component: require('./views/sessions/index').default
    },
    {
        name: 'sessions.play',
        path: '/sessions/play/:id',
        component: () => import('./views/sessions/reader')
    },
    {
        name: 'cours.create',
        path: '/cours/create',
        component: () => import('./views/cours/cours-createform')
    },
    {
        name: 'cours.edit',
        path: '/cours/:id/edit',
        component: () => import(/*webpackChunkName: "cours.edit"*/ './views/cours/cours-edit')
    }
];

const router = new VueRouter({
    base: '/',
    mode: 'history',
    routes,
    linkActiveClass: 'active'
});

router.beforeResolve((to, from, next) => {
    if (to.name) {
        // Start loading display
        NProgress.start()
    }
    next()
});
router.afterEach(() => {
    // End loading display
    NProgress.done()
});

export default router;
