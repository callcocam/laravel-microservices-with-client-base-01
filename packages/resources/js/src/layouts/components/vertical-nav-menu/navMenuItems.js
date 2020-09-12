/*=========================================================================================
  File Name: sidebarItems.js
  Description: Sidebar Items list. Add / Remove menu items from here.
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/


export default [
    {
        url: '/',
        name: 'Home',
        slug: 'home',
        icon: 'HomeIcon'
    },

    {
        url: null,
        name: 'Support',
        icon: 'SmileIcon',
        i18n: 'Support',
        submenu: [
            {
                url: 'https://pixinvent.com/demo/vuexy-vuejs-admin-dashboard-template/documentation/',
                name: 'Documentation',
                icon: 'BookOpenIcon',
                slug: 'external',
                i18n: 'Documentation',
                target: '_blank'
            },
            {
                url: 'https://pixinvent.ticksy.com/',
                name: 'Raise Support',
                icon: 'LifeBuoyIcon',
                slug: 'external',
                i18n: 'RaiseSupport',
                target: '_blank'
            },
            {
                url: 'https://feathericons.com/',
                name: 'Feather Icons',
                icon: 'LifeBuoyIcon',
                slug: 'external',
                i18n: 'FeatherIcons',
                target: '_blank'
            }
        ]
    }
]
