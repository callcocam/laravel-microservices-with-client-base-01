import axios from "axios";

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

axios.defaults.withCredentials = true;

window.axios = axios;


let domain = window.location.host

let Api = axios.create({
    baseURL: `//${domain}/`
});

export default Api;
