<template>
    <vs-dropdown vs-trigger-click class="cursor-pointer  mb-4 mr-4">
        <div class="p-4 border border-solid d-theme-border-grey-light rounded-full d-theme-dark-bg cursor-pointer flex items-center justify-between font-medium">
            <span class="mr-2">{{source.from}}-{{source.to}} to {{source.total}}</span>
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
</template>

<script>
    export default {
        name: "VsxFilter",
        props:['source'],
        methods:{
            paginationSetPageSize (val) {
                // Reset Grid Filter
                dd(val,'paginationSetPageSize')
                this.$emit('updateQueryString',{per_page:val})
            }
        }
    }
</script>

<style scoped>

</style>
