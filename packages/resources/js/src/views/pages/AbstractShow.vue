<template>
    <div>
        {{form}}
    </div>
</template>
<script>
    // Store Module
    import moduleUserManagement from '@/store/modules/user-management'
    import Api from "../../apis/Api";
    export default {
        name: "AbstractIndex",
        data () {
            return {
                form: null
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
            refreshData(){
                const { api  } = this.$route.meta;
                Api.get(api.replace('_id_', this.$route.params['id'])).then(response=>{

                    this.form = response.data
                    dd(response, 'refreshData')

                })
            }
        }
    }

</script>
