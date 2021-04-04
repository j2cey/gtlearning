import VueRouter from 'vue-router';


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
    }
];

export default new VueRouter({
    base: '/',
    mode: 'history',
    routes,
    linkActiveClass: 'active'
});
