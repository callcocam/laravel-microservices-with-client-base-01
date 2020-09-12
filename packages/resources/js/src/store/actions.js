/*=========================================================================================
  File Name: actions.js
  Description: Vuex Store - actions
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

const actions = {

    // /////////////////////////////////////////////
    // COMPONENTS
    // /////////////////////////////////////////////

    // Vertical NavMenu
    updateVerticalNavMenuItem ({ commit }, items) {

        let menus  = items.menus;
        /*[
            ...menus,
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
        ]*/
        commit('UPDATE_VERTICAL_NAV_MENU_ITEM', menus)
    },
    // Vertical NavMenu
    updateVerticalNavMenuWidth ({ commit }, width) {
        commit('UPDATE_VERTICAL_NAV_MENU_WIDTH', width)
    },

    // VxAutoSuggest
    updateStarredPage ({ commit }, payload) {
        commit('UPDATE_STARRED_PAGE', payload)
    },

    // The Navbar
    arrangeStarredPagesLimited ({ commit }, list) {
        commit('ARRANGE_STARRED_PAGES_LIMITED', list)
    },
    arrangeStarredPagesMore ({ commit }, list) {
        commit('ARRANGE_STARRED_PAGES_MORE', list)
    },

    // /////////////////////////////////////////////
    // UI
    // /////////////////////////////////////////////

    toggleContentOverlay ({ commit }) {
        commit('TOGGLE_CONTENT_OVERLAY')
    },
    updateTheme ({ commit }, val) {
        commit('UPDATE_THEME', val)
    },

}

export default actions
