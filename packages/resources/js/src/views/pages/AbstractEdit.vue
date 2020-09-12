<template>
    <vx-card no-shadow>
        <template  v-for="(column,index) in data">
            <template v-if="column.formRenderFramework">
                    <component :is="currentTabComponent(column.formRenderFramework)" :column="column" :form="form" :key="index"></component>
            </template>
        </template>
    </vx-card>
</template>

<script>
    import vSelect from 'vue-select'
    // Store Module
    import moduleUserManagement from '@/store/modules/user-management'
    import Api from "../../apis/Api";
    export default {
        name: "AbstractIndex",
        components: {
            vSelect
        },
        data () {
            return {
                form: new Form({}),
                data:null
            }
        },
        created() {

            if (!moduleUserManagement.isRegistered) {
                this.$store.registerModule('userManagement', moduleUserManagement)
                moduleUserManagement.isRegistered = true
            }
            this.refreshData()
        },
        methods: {
            currentTabComponent: function(Component) {
                return Component;
            },
            refreshData(){
                const { api  } = this.$route.meta;
                Api.get(api.replace('_id_', this.$route.params['id'])).then(response=>{
                    const { data  } = response.data;
                    let form=[];
                    Object.values(data).map(item=>{
                        if(item.type){
                            form[item.name] = item.value
                        }
                    })
                    this.form = new Form(form)
                    this.data = data
                    dd(data, 'refreshData')

                })
            }
        }
    }

</script>
