/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

export default {
    all: (state) => {
       return state.data;
    },
    headers: (state) => {
        return state.data;
    },
    values: (state) => {
        console.log(state.data)
        return state.data;
    }
};
