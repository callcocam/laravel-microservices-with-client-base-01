<template>
    <h4>{{ $route.meta}}</h4>
</template>
<script>
    import Api from "../../apis/Api";

    export default {
        name: "AbstractDestroy",
        mounted() {
            this.confirmDeleteRecord()
        },
        methods:{
          confirmDeleteRecord () {
                this.$vs.dialog({
                    type: 'confirm',
                    color: 'danger',
                    title: 'Confirm Delete',
                    text: `You are about to delete`,
                    accept: this.deleteRecord,
                    cancel: this.cancelAction,
                    acceptText: 'Delete'
                })
            },
            cancelAction(){
              this.$router.back();
            },
            deleteRecord () {
                /* Below two lines are just for demo purpose */
                const { api } = this.$route.meta
                Api.delete(api.replace('_id_', this.$route.params['id'])).then(response=>{
                    this.$router.back();
                    this.showDeleteSuccess(response.data)
                }).catch(err => {
                    console.error(err)
                    this.$router.back();
                    this.showDeleteError();
                })
                /* UnComment below lines for enabling true flow if deleting user */
                // this.$store.dispatch("userManagement/removeRecord", this.params.data.id)
                //   .then(()   => { this.showDeleteSuccess() })
                //   .catch(err => { console.error(err)       })
            },
            showDeleteSuccess (data) {
                this.$vs.notify(data)
            },
            showDeleteError () {
                this.$vs.notify({
                    time:8000,
                    color: 'danger',
                    title: 'User Deleted',
                    text: 'The selected user was successfully deleted'
                })
            }
        }
    }
</script>

<style scoped>

</style>
