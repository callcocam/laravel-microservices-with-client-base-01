export default {
    path: '/admin',
    component: () => import('@/layouts/full-page/FullPage.vue'),
    children: [
        // =============================================================================
        // PAGES
        // =============================================================================
        {
            path: 'login',
            name: 'page-login',
            component: () => import('@/views/pages/Login.vue')
        },
        {
            path: 'register',
            name: 'page-register',
            component: () => import('@/views/pages/Register.vue')
        },
        {
            path: 'reset/password',
            name: 'page-reset-password',
            component: () => import('@/views/pages/Reset.vue')
        },
        {
            path: 'error-404',
            name: 'page-error-404',
            component: () => import('@/views/pages/Error404.vue')
        }
    ]
}
