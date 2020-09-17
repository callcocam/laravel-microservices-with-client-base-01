import EventEmitter from 'events'
// 'loggedIn' is used in other parts of application. So, Don't forget to change there also
class AuthService extends EventEmitter {
    loggedUser = null;
    loggedIn = false;
    logOut() {
        this.loggedIn = false;
    }
    signIn(storage) {
        this.loggedUser = storage;
        this.loggedIn = true;
    }
    userData(){

        return  this.loggedUser || localStorage.getItem('userInfo');
    }
    isAuthenticated() {
        return this.loggedIn;
    }
}

export default new AuthService();
