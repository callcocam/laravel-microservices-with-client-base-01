<script>
    import vSelect from 'vue-select'
    // Store Module
    import moduleUserManagement from '@/store/modules/user-management'
    import Api from "../../apis/Api";
    import { Form } from "vform";
    export default {
        name: "AbstractIndex",
        components: {
            vSelect
        },
        data () {
            return {
                form: null,
                data:null,
                parent:null,
            }
        },
        created() {
            if (!moduleUserManagement.isRegistered) {
                this.$store.registerModule('userManagement', moduleUserManagement)
                moduleUserManagement.isRegistered = true
            }
            this.loadData()
        },
        methods: {
            currentTabComponent: function(Component) {
                return Component;
            },
            refreshData(response){
                const { columns  } = response.data;
                let form=[];
                 Object.values(columns).map(item=>{
                    if(item.type){
                        if(item.components){
                            Object.values(item.components).map(component=>{
                                if(component.type){
                                    if(component.value){
                                        form[component.name] = component.value || ''
                                    }
                                }
                            })
                        }
                        else{
                            form[item.name] = item.value || ''
                        }
                    }
                })
                this.form = new Form(form)
                this.data = columns
            }
        }
    }

</script>
