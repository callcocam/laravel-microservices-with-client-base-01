// en, de, fr, pt
import Api from "@/apis/Api";
let locale = "pt_BR";
let language = {
    [locale]: locale
};
if (window.locale) {
    locale = window.locale;
}

async function languages() {
    let { data } = await Api.get("/api/v1/languages");
    return data;
}
languages().then(languages => {
    Object.keys(languages).map(key => {
        language[key] = languages[key];
    });
});
const lang = {
    [locale]: language
};

export default lang;
