import {generateRoutes} from "@/utilities/plugins/vue-router-generator";
export function system(response){
    return [
        {
            // =============================================================================
            // MAIN LAYOUT ROUTES
            // =============================================================================
            path: '/admin',
            name: 'admin',
            component: () => import('@/layouts/main/Main.vue'),
            redirect:'/admin/dashboard',
            children: [
                // =============================================================================
                // Theme Routes
                // =============================================================================
               ...generateRoutes(response.navigations),
            ]
        }
    ]
}



