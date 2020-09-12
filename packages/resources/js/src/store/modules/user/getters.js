/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

export default {
    userInfo: () => {
        if (localStorage.getItem('userInfo'))
            return JSON.parse(localStorage.getItem('userInfo'))

        return null
    }
};
