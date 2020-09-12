/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
import User from "@/apis/User";

export  default {

   // Carrega os dados do usuario logado
   async me({ commit }) {

      const { data } = await User.auth()

      commit('UPDATE_USER_INFO', data)

       return data;
    },
   // Sair do sistema
   async logout() {
       await User.logout()
       localStorage.removeItem('userInfo')
    },
    // /////////////////////////////////////////////
    // User/Account
    // /////////////////////////////////////////////
    updateUserInfo ({ commit }, payload) {
        commit('UPDATE_USER_INFO', payload)
    }
};
