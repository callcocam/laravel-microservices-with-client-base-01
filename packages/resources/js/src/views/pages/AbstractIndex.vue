<template>
    <div id="page-user-list">
        <div class="vx-card p-6">
            <div class="flex flex-wrap items-center">
                <!-- ITEMS PER PAGE -->
                <div class="flex-grow">
                    <vs-dropdown vs-trigger-click class="cursor-pointer">
                        <div class="p-4 border border-solid d-theme-border-grey-light rounded-full d-theme-dark-bg cursor-pointer flex items-center justify-between font-medium">
                            <span class="mr-2">{{from}}-{{to}} to {{total}}</span>
                            <feather-icon icon="ChevronDownIcon" svgClasses="h-4 w-4" />
                        </div>
                        <!-- <vs-button class="btn-drop" type="line" color="primary" icon-pack="feather" icon="icon-chevron-down"></vs-button> -->
                        <vs-dropdown-menu>

                            <vs-dropdown-item @click="paginationSetPageSize(10)">
                                <span>10</span>
                            </vs-dropdown-item>
                            <vs-dropdown-item @click="paginationSetPageSize(20)">
                                <span>20</span>
                            </vs-dropdown-item>
                            <vs-dropdown-item @click="paginationSetPageSize(25)">
                                <span>25</span>
                            </vs-dropdown-item>
                            <vs-dropdown-item @click="paginationSetPageSize(30)">
                                <span>30</span>
                            </vs-dropdown-item>
                        </vs-dropdown-menu>
                    </vs-dropdown>
                </div>
                 <!-- ACTION - DROPDOWN -->
                <vs-dropdown vs-trigger-click class="cursor-pointer" v-if="actions && selected">
                    <div class="p-3 shadow-drop rounded-lg d-theme-dark-light-bg cursor-pointer flex items-end justify-center text-lg font-medium w-32">
                        <span class="mr-2 leading-none">Actions</span>
                        <feather-icon icon="ChevronDownIcon" svgClasses="h-4 w-4" />
                    </div>
                    <vs-dropdown-menu>
                        <TableAction :actions="actions" />
                    </vs-dropdown-menu>
                </vs-dropdown>
            </div>

            <template v-if="data.length">
                <vs-table
                    :sst="options.sst"
                    @search="handleSearch"
                    @sort="handleSort"
                    v-model="selected"
                    :max-items="per_page"
                    :multiple="options.multiple"
                    :search="options.search"
                    :noDataText="options.noDataText"
                    :notSpacer="options.notSpacer"
                    :stripe="options.stripe"
                    :data="data">
                    <template slot="header">
                        <h3>
                            {{ title }}
                        </h3>
                    </template>
                    <template slot="thead">
                        <template v-if="columnDefs">
                            <template v-for="(header,index) in columnDefs">
                                <template v-if="header.sortable">
                                    <vs-th :sort-key="header.name">
                                        {{ header.text }}
                                    </vs-th>
                                </template>
                                <template v-else>
                                    <vs-th>
                                        {{ header.text }}
                                    </vs-th>
                                </template>

                            </template>
                        </template>
                    </template>
                    <template slot-scope="{data}">
                        <vs-tr :data="tr" :key="indextr" v-for="(tr, indextr) in data" >
                            <template  v-for="(header,index) in columnDefs">
                                <template v-if="header.cellRenderFramework">
                                    <vs-td :data="data[indextr][header.name]">
                                    <component :is="currentTabComponent(header.cellRenderFramework)" :column="data[indextr][header.name]"></component>
                                    </vs-td>
                                </template>
                                <template v-else>
                                    <vs-td :data="data[indextr][header.name]">
                                        {{ data[indextr][header.name].value }}
                                    </vs-td>
                                </template>
                            </template>
                        </vs-tr>
                    </template>
                </vs-table>
            </template>
            <template v-if="total">
                <vsx-pagination @switched="handlePage" :source="{
                        current_page,
                        first_page_url,
                        from,
                        last_page,
                        last_page_url,
                        next_page_url,
                        path,
                        per_page,
                        prev_page_url,
                        to,
                        total}"/>
            </template>
        </div>
    </div>
</template>
<script>
    import vSelect from 'vue-select'
    // Store Module
    import moduleUserManagement from '@/store/modules/user-management'
    // Cell Renderer
    import TableAction from '@/views/pages/components/actions/TableAction'
    import VsxPagination from '@/views/pages/components/actions/VsxPagination'
    import Api from "../../apis/Api";
    export default {
        name: "AbstractIndex",
        components: {
            vSelect,
            TableAction,
            VsxPagination
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
                searchQuery:'',
                current_page:1,
                data:[],
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
                selected:[],
                columnDefs:[],
                actions:null,
                api:null,
                auth:null,
                create:null,
                title:null,
            }
        },
       /* watch:{
            current_page(val){
                dd(val,'current_page')
                this.handleChangePage(val)
            }
        },*/
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
            resetColFilters () {
                // Reset Grid Filter

            },
            paginationSetPageSize (val) {
                // Reset Grid Filter
                dd(val,'paginationSetPageSize')
                this.params['per_page'] = val
                this.updateQueryString({per_page:val})
            },
            updateSearchQuery (val) {
                dd(val,'updateSearchQuery')
                this.params['search'] = val
                this.updateQueryString({search:val})
            },
            handleSearch(val) {
                dd(val,'handleSearch')
                this.params['search'] = val
                this.updateQueryString({search:val})
            },
            handlePage(val) {
                dd(val,'handlePage')
                this.params['page'] = val
                this.updateQueryString({page:val})
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
                        current_page,
                        data,
                        first_page_url,
                        from,
                        last_page,
                        last_page_url,
                        next_page_url,
                        path,
                        per_page,
                        prev_page_url,
                        to,
                        columns,
                        options,
                        total} = response.data

                    this.current_page = current_page;
                    this.first_page_url = first_page_url;
                    this.from = from;
                    this.last_page = last_page;
                    this.last_page_url = last_page_url;
                    this.next_page_url = next_page_url;
                    this.path = path;
                    this.per_page = per_page;
                    this.prev_page_url = prev_page_url;
                    this.data = data;
                    this.to = to;
                    this.options = options;
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
