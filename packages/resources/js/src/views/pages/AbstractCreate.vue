<template>
    <vx-card no-shadow>
        <form @submit.prevent="submit" @keydown="form.onKeydown($event)">
            <template  v-for="(column,index) in data">
                <template v-if="column.formRenderFramework">
                    <template v-if="column.hidden_edit">
                        <component :is="currentTabComponent(column.formRenderFramework)" :column="column" :form="form" :key="index"></component>
                    </template>
                </template>
            </template>
            <!-- Save & Reset Button -->
            <div class="flex flex-wrap items-center justify-end">
                <vs-button button="submit" class="ml-auto mt-2" >{{ $t('Save Changes')}}</vs-button>
                <vs-button :to="parent" class="ml-4 mt-2" type="border" color="warning">{{ $t('Reset') }}</vs-button>
            </div>
        </form>
    </vx-card>
</template>
<script>
    import AbstractForm from "./AbstractForm";
    import Csrf from "@/apis/Csrf";
    import Api from "../../apis/Api";

    export default {
        name: "AbstractCreate",
        extends:AbstractForm,
        methods:{
            submit(){
                const { store, edit } = this.$route.meta;
                this.$vs.loading();
                Csrf.getCookie()
                    .then(user => {
                        this.form.post(store, this.form).then(response=>{
                            this.$vs.loading.close();
                            this.$router.push(Object.assign(edit, {params:{
                                    id:response.data.id
                                }}))
                        }).catch(err=>{
                            this.$vs.loading.close();
                        })
                    })
                    .catch(() => {
                        this.isLoading = false;
                    });
            },
            loadData(){
                const { api, parent  } = this.$route.meta;
                dd(this.$route.meta)
                this.parent = parent
                Api.get(api).then(response=>{
                    this.refreshData(response)
                })
            }
        }
    }

</script>
