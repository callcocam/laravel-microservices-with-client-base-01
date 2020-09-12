/*=========================================================================================
  File Name: main.js
  Description: main vue(js) file
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/


import Vue from 'vue'
import App from './App.vue'

// Vuesax Component Framework
import Vuesax from 'vuesax'
Vue.use(Vuesax)

import AuthPlugin from "@/utilities/plugins/auth";
Vue.use(AuthPlugin);

// Theme Configurations
import '../themeConfig.js'


// Globally Registered Components
import './globalComponents.js'


// Vuejs - Vue wrapper for hammerjs
import { VueHammer } from 'vue2-hammer'
Vue.use(VueHammer)


// PrismJS
import 'prismjs'
import 'prismjs/themes/prism-tomorrow.css'

Vue.config.productionTip = false

// i18n
import i18n from "@/utilities/plugins/i18n/i18n";
import Api from "./apis/Api";

// Vue Router
import createRouter from './router'

// Vuex Store
import store from './store/store'

Api.get("/api/v1/load-config").then(response=>{

    let router = createRouter(response.data)
    store.dispatch("updateVerticalNavMenuItem",response.data)
    new Vue({
        router,
        store,
        i18n,
        render: h => h(App)
    }).$mount('#app')
})
