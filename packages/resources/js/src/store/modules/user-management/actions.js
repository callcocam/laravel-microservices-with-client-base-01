/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
import Api from "../../../apis/Api";

export  default {

   // Carrega os dados do usuario logado
   all({ commit }, options) {
      const { params, api } = options
      Api.get(api, params)
    },
    // Carrega os dados do usuario logado
    params({ commit }, options) {
       commit("UPDATE_PARAMS", options)
    }
};
