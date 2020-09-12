import axios from "axios";

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

axios.defaults.withCredentials = true;

let domain = window.location.host

let Api = axios.create({
    baseURL: `//${domain}/`
});

export default Api;
