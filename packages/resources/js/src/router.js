/*=========================================================================================
  File Name: router.js
  Description: Routes for vue-router. Lazy loading is enabled.
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
import Vue from 'vue'
import Router from 'vue-router'
import auth from "./routes/auth";
import {system} from "./routes/system";
Vue.use(Router)

const createRouter = (response) =>{
    console.log(auth)
    const routes = new Router({
        scrollBehavior: (to, from, savedPosition) => {
            if (savedPosition) {
                return savedPosition
            } else {
                return { x: 0, y: 0 }
            }
        },
        mode: 'history',
        base: '/',
        routes: [
            // =============================================================================
            // FULL PAGE LAYOUTS
            // =============================================================================

            ...system(response),
            // =============================================================================
            // FULL PAGE AUTHENTICATE
            // ====
            auth

        ]
    });
    return routes
}

export default createRouter
