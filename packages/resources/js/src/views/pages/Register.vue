<!-- =========================================================================================
    File Name: Login.vue
    Description: Login Page
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
      Author: Pixinvent
    Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->


<template>
    <div class="h-screen flex w-full bg-img vx-row no-gutter items-center justify-center" id="page-login">
        <div class="vx-col sm:w-1/2 md:w-1/2 lg:w-3/4 xl:w-3/5 sm:m-0 m-4">
            <vx-card>
                <div slot="no-body" class="full-page-bg-color">

                    <div class="vx-row no-gutter justify-center items-center">

                        <div class="vx-col hidden lg:block lg:w-1/2">
                            <img src="@assets/images/pages/login.png" alt="login" class="mx-auto">
                        </div>

                        <div class="vx-col sm:w-full md:w-full lg:w-1/2 d-theme-dark-bg">
                            <div class="p-8 login-tabs-container">

                                <div class="vx-card__title mb-4">
                                    <h4 class="mb-4">Login</h4>
                                    <p>Welcome back, please login to your account.</p>
                                </div>

                                <div>
                                    <form  @submit.prevent="register" @keydown="form.onKeydown($event)">
                                        <vs-input
                                            name="name"
                                            icon-no-border
                                            icon="icon icon-user"
                                            icon-pack="feather"
                                            label-placeholder="Name"
                                            :danger="form.errors.has('name')"
                                            :danger-text="form.errors.get('name')"
                                            v-model="form.name"
                                            class="w-full"/>

                                        <vs-input
                                            name="email"
                                            icon-no-border
                                            icon="icon icon-mail"
                                            icon-pack="feather"
                                            label-placeholder="Email"
                                            :danger="form.errors.has('email')"
                                            :danger-text="form.errors.get('email')"
                                            v-model="form.email"
                                            class="w-full"/>

                                        <vs-input
                                            type="password"
                                            name="password"
                                            icon-no-border
                                            icon="icon icon-lock"
                                            icon-pack="feather"
                                            :danger="form.errors.has('password')"
                                            :danger-text="form.errors.get('password')"
                                            label-placeholder="Password"
                                            v-model="form.password"
                                            class="w-full mt-6" />

                                        <vs-input
                                            type="password"
                                            name="password_confirmation"
                                            icon-no-border
                                            icon="icon icon-lock"
                                            icon-pack="feather"
                                            :danger="form.errors.has('password_confirmation')"
                                            :danger-text="form.errors.get('password_confirmation')"
                                            label-placeholder="Password"
                                            v-model="form.password_confirmation"
                                            class="w-full mt-6" />
                                         <div class="flex flex-wrap justify-between my-5">

                                        </div>
                                        <vs-button @click="login" type="border">Login</vs-button>
                                        <vs-button button="submit" class="float-right">Register</vs-button>
                                    </form>
                                    <Social />
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </vx-card>
        </div>
    </div>
</template>
<script>
    import Social from "./components/Social";
    import Csrf from "../../apis/Csrf";
    import { Form } from "vform";
    export default{
        components: {Social},
        data () {
            return {
               form: new Form(
                   {
                       name: '',
                       email: '',
                       password: '',
                       password_confirmation: ''
                   }
               )
            }
        },
        methods: {
            register(){
                Csrf.getCookie()
                    .then(user => {
                        this.form
                            .post("/admin/register")
                            .then(() => {
                                let params = new URL(document.location).searchParams;
                                let redirect = params.get("redirect");
                                if(redirect){
                                    this.$router.push(redirect)
                                }
                                else{
                                    this.$router.push({name:'admin'})
                                }
                            })
                            .catch(err => {
                                this.isLoading = false;
                                console.log("login err", err);
                            });

                    })
                    .catch(() => {
                        this.isLoading = false;
                    });
            },
            login(){
                this.$router.push({name:'page-login'}).catch(() => {})
            }
        }
    }
</script>
