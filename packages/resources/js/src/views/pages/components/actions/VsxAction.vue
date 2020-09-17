<template>
    <vs-dropdown vs-trigger-click class="cursor-pointer mr-4 mb-4">
        <div class="p-4 shadow-drop rounded-lg d-theme-dark-bg cursor-pointer flex items-center justify-center text-lg font-medium w-32">
            <span class="mr-2">{{ $t('Actions')}}</span>
            <feather-icon icon="ChevronDownIcon" svgClasses="h-4 w-4" />
        </div>
        <vs-dropdown-menu>
            <vs-dropdown-item v-for="(action, index) in actions" :key="index" @click="execAction(action)">
            <span class="flex items-center">
            <feather-icon :icon="action.icon" svgClasses="h-4 w-4" class="mr-2" />
            <span>{{ action.text }}</span>
            </span>
            </vs-dropdown-item>
        </vs-dropdown-menu>
    </vs-dropdown>
</template>

<script>
    import Api from "@/apis/Api";
    export default {
        props:['actions','selected'],
        name: "VsxAction",
        methods:{
            execAction(action){
                if(this.selected.length){
                    if(action.route){
                        Api.post(action.route, this.selected).then(response=>{
                            this.$vs.notify(response.data)
                            this.$emit('updateQueryString', this.$route.query)
                        }).catch(err=>{
                            this.$vs.notify({
                                position: 'top-right',
                                color: 'danger',
                                title: 'Oppss!!',
                                text: err.response.message
                            })
                        })
                    }
                    else{ this.alert(action.message) }
                }
                else{ this.alert('Nenhum item foi selecionado :(') }
            },
            alert(message){
                this.$vs.notify({
                    position: 'top-right',
                    color: 'danger',
                    title: 'Oppss!!',
                    text: message
                })
            }
        }
    }
</script>

<style scoped>

</style>
