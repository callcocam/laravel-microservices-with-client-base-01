import Api from "./Api";
import Csrf from "./Csrf";
export default {
    async register(form) {
        await Csrf.getCookie();

        return Api.post("/admin/register", form);
    },
    async login(form) {
        await Csrf.getCookie();

        return Api.post("/admin/login", form);
    },
    async logout() {
        await Csrf.getCookie();

        return Api.post("/admin/logout");
    },
    auth() {
        return Api.get("/api/v1/user");
    },

};
