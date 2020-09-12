import Api from "./Api";
import Cookie from "js-cookie";

export default {
    getCookie() {
        let token = Cookie.get("XSRF-TOKEN");

        console.log(token)
        //if (token) {
       //     return new Promise(resolve => {
       //         resolve(token);
       //     });
      //  }
        return Api.get("/sanctum/csrf-cookie");
    }
};
