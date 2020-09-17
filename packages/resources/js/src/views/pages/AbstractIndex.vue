<script>
    import vSelect from 'vue-select'
    // Store Module
    import moduleUserManagement from '@/store/modules/user-management'
    // Cell Renderer
    import Api from "@/apis/Api";
    export default {
        name: "AbstractIndex",
        components: {
            vSelect
        },
        data(){
            return {
                options: {
                    stripe:true, //Boolean	Add a stripes effect. false
                    hoverFlat: false, //Boolean	Change effect hover and flat. false
                    maxHeight:false, //px Change the high maximum of the table, generating the scroll.	false
                    multiple:true, //Boolean Determines if multiple items can be selected.	false
                    notSpacer: false, //Boolean	Eliminates the space between each tr. false
                    search:true, //Boolean	Determine if the filtering functionality through an input is active. false
                    pagination: false, //Boolean Determine if the page is active so that only a certain number of items can be displayed. false
                    maxItems: 5,//Number Change the maximum number of items that can be displayed when the page is active. 5
                    state: false, //(vs-tr)	Boolean	Determine the state of the element with a color.
                    noDataText:'No data Available :(', //String	Change the text of the notification when there is no data in the table.
                    sst: true // (server-site table)
                },
                params: {
                    page:1,
                    search:'f'
                },
                source:{
                    current_page:1,
                    first_page_url:'',
                    from:0,
                    last_page:0,
                    last_page_url:'',
                    next_page_url:'',
                    path:'',
                    per_page:15,
                    prev_page_url:'',
                    to:0,
                    total:0,
                },
                data:[],
                selected:[],
                columnDefs:[],
                actions:[],
                api:null,
                auth:null,
                create:null,
                title:null,
            }
        },
        computed: {
            totalPages () {
                return 0
            },
            currentPage: {
                get () {
                    return 1
                },
                set (val) {

                }
            }
        },
        methods: {
            addNew () {
                this.$router.push(Object.assign(this.create, {query: this.$route.query})).catch(err => {
                    dd(err)
                })
            },
            resetColFilters () {
                // Reset Grid Filter

            },
            updateSearchQuery (val) {
                dd(val,'updateSearchQuery')
                this.params['search'] = val
                this.updateQueryString({search:val})
            },
            handleSearch(val) {
                dd(val,'handleSearch')
                this.params['search'] = val
                debounce(()=> {
                    this.updateQueryString({search:val})
                })
            },
            handleSort(key, active) {
                dd({key, active},'handleSort')
                if (!active) return;
                if (!key) return;
                this.params['direction'] = active
                this.params['column'] = key
                this.updateQueryString({
                    direction:active,
                    column:key
                })
            },
            updateQueryString(params){
                this.selected = [];
                if ('URLSearchParams' in window) {
                    var searchParams = new URLSearchParams(window.location.search)
                    Object.keys(params).map(key=>{
                        if(params[key]){
                            searchParams.set(key, params[key]);
                        }
                        else{
                            searchParams.delete(key)
                        }
                    })
                    var newRelativePathQuery = window.location.pathname + '?' + searchParams.toString();
                    history.pushState({foo:'foo'}, '', newRelativePathQuery);
                }
                this.refreshData(Object.assign({}, this.$route.query, params))
            },
            refreshData(params){
                this.$vs.loading();
                Api.get(this.api, {params}).then(response=>{
                    this.columnDefs = []
                    let {
                        data,
                        columns,
                        options,
                        source,
                        actions,
                        total} = response.data

                    this.data = data;
                    this.options = options;
                    this.source = source;
                    this.actions = actions;
                    this.total = total;
                    Object.values(columns).map(value=>{
                        this.columnDefs.push(value)
                    })
                    this.usersData= data

                    this.$vs.loading.close();
                }).catch(err => {
                    console.error(err)
                    this.$vs.loading.close();
                })

            },
            currentTabComponent: function(Component) {
                return Component;
            }
        },
        created() {
            const { api ,auth, create, title } = this.$route.meta;
            this.api = api;
            this.auth = auth;
            this.create = create;
            this.title = title;
            if (!moduleUserManagement.isRegistered) {
                this.$store.registerModule('userManagement', moduleUserManagement)
                moduleUserManagement.isRegistered = true
            }

            this.refreshData(this.$router.currentRoute.query)
        }
    }
</script>

<style scoped>

</style>
