<template>
    <div></div>
</template>

<script>
    export default {
        name: "Profile",
        created() {
            this.$vs.loading();
            this.$store.dispatch('storeUser/logout').then(()=>{
                this.$auth.logOut();
                this.$vs.loading.close();
                this.$router.push({name:'page-login'}).catch(() => {})
            })
        }
    }
</script>

<style scoped>

</style>
