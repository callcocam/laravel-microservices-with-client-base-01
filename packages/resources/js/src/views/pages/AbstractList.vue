<template>
    <div id="data-list-thumb-view" class="data-list-container">
        <div class="vx-card p-6">
            <div class="flex flex-wrap items-center">
                <!-- ITEMS PER PAGE -->
                <div class="flex-grow">

                    <!-- ADD NEW -->

                </div>
                <!-- ACTION - DROPDOWN -->
                <VsxAction  v-if="actions && selected" :actions="actions" />

            </div>
            <template v-if="data.length">
                <vs-table
                    :sst="options.sst"
                    @search="handleSearch"
                    @sort="handleSort"
                    v-model="selected"
                    :max-items="source.per_page"
                    :multiple="options.multiple"
                    :search="options.search"
                    :noDataText="options.noDataText"
                    :notSpacer="options.notSpacer"
                    :stripe="options.stripe"
                    :data="data">
                    <div slot="header" class="flex flex-wrap-reverse items-center flex-grow justify-between">
                        <div class="flex flex-wrap-reverse items-center">
                            <!-- ACTION - DROPDOWN -->
                            <vs-dropdown vs-trigger-click class="cursor-pointer mr-4 mb-4">
                            <div class="p-4 shadow-drop rounded-lg d-theme-dark-bg cursor-pointer flex items-center justify-center text-lg font-medium w-32">
                                <span class="mr-2">Actions</span>
                                <feather-icon icon="ChevronDownIcon" svgClasses="h-4 w-4" />
                                </div>
                                <vs-dropdown-menu>
                                    <vs-dropdown-item>
                                        <span class="flex items-center">
                                    <feather-icon icon="TrashIcon" svgClasses="h-4 w-4" class="mr-2" />
                                    <span>Delete</span>
                                    </span>
                                    </vs-dropdown-item>

                                    <vs-dropdown-item>
                                    <span class="flex items-center">
                                    <feather-icon icon="ArchiveIcon" svgClasses="h-4 w-4" class="mr-2" />
                                    <span>Archive</span>
                                    </span>
                                    </vs-dropdown-item>

                                    <vs-dropdown-item>
                                    <span class="flex items-center">
                                    <feather-icon icon="FileIcon" svgClasses="h-4 w-4" class="mr-2" />
                                    <span>Print</span>
                                    </span>
                                    </vs-dropdown-item>

                                    <vs-dropdown-item>
                                    <span class="flex items-center">
                                    <feather-icon icon="SaveIcon" svgClasses="h-4 w-4" class="mr-2" />
                                    <span>Another Action</span>
                                    </span>
                                    </vs-dropdown-item>
                                </vs-dropdown-menu>
                            </vs-dropdown>
                            <!-- ADD NEW -->
                            <div v-if="create" @click="addNew" class="p-3 mb-4 mr-4 rounded-lg cursor-pointer flex items-center justify-between text-lg font-medium text-base text-primary border border-solid border-primary">
                                <feather-icon icon="PlusIcon" svgClasses="h-4 w-4" />
                                <span class="ml-2 text-base text-primary">{{ $t('Add New') }}</span>
                            </div>
                        </div>
                        <!-- ITEMS PER PAGE -->
                        <VsxFilter :source="source" @updateQueryString="updateQueryString"/>
                    </div>
                    <template slot="thead">
                        <template v-if="columnDefs">
                            <template v-for="(header,index) in columnDefs">
                                <template v-if="header.hidden_list">
                                    <template v-if="header.sortable">
                                        <vs-th :sort-key="header.name" :key="index">
                                            {{ header.text }}
                                        </vs-th>
                                    </template>
                                    <template v-else>
                                        <vs-th :key="index">
                                            {{ header.text }}
                                        </vs-th>
                                    </template>
                                </template>
                            </template>
                        </template>
                    </template>
                    <template slot-scope="{data}">
                        <vs-tr :data="tr" :key="indextr" v-for="(tr, indextr) in data" >
                            <template  v-for="(header,index) in columnDefs">
                                <template v-if="header.hidden_list">
                                    <template v-if="header.cellRenderFramework">
                                        <vs-td :data="data[indextr][header.name]" :key="index">
                                            <component :is="currentTabComponent(header.cellRenderFramework)" :column="data[indextr][header.name]"></component>
                                        </vs-td>
                                    </template>
                                    <template v-else>
                                        <vs-td :data="data[indextr][header.name]" :key="index">
                                            {{ data[indextr][header.name].value }}
                                        </vs-td>
                                    </template>
                                </template>
                            </template>
                        </vs-tr>
                    </template>
                </vs-table>
            </template>
            <template v-if="source.total">
                <vsx-pagination @switched="updateQueryString" :source="source"/>
            </template>
        </div>
    </div>
</template>
<script>
    import VsxAction from '@/views/pages/components/actions/VsxAction'
    import VsxPagination from '@/views/pages/components/actions/VsxPagination'
    import VsxFilter from '@/views/pages/components/actions/VsxFilter'
    import AbstractIndex from "./AbstractIndex";
    export default {
        name: "AbstractList",
        extends:AbstractIndex,
        components: {
            VsxAction,
            VsxFilter,
            VsxPagination
        },
    }
</script>

<style lang="scss">
    #data-list-thumb-view {
        .vs-con-table {

            .product-name {
                max-width: 23rem;
            }

            .vs-table--header {
                display: flex;
                flex-wrap: wrap-reverse;
                margin-left: 1.5rem;
                margin-right: 1.5rem;
                > span {
                    display: flex;
                    flex-grow: 1;
                }

                .vs-table--search{
                    padding-top: 0;

                    .vs-table--search-input {
                        padding: 0.9rem 2.5rem;
                        font-size: 1rem;

                        &+i {
                            left: 1rem;
                        }

                        &:focus+i {
                            left: 1rem;
                        }
                    }
                }
            }

            .vs-table {
                border-collapse: separate;
                border-spacing: 0 1.3rem;
                padding: 0 1rem;


                tr{
                    box-shadow: 0 4px 20px 0 rgba(0,0,0,.05);
                    td{
                        padding: 10px;
                        &:first-child{
                            border-top-left-radius: .5rem;
                            border-bottom-left-radius: .5rem;
                        }
                        &:last-child{
                            border-top-right-radius: .5rem;
                            border-bottom-right-radius: .5rem;
                        }
                        &.img-container {
                            // width: 1rem;
                            // background: #fff;

                            span {
                                display: flex;
                                justify-content: flex-start;
                            }

                            .product-img {
                                height: 110px;
                            }
                        }
                    }
                    td.td-check{
                        padding: 20px !important;
                    }
                }
            }

            .vs-table--thead{
                th {
                    padding-top: 0;
                    padding-bottom: 0;

                    .vs-table-text{
                        text-transform: uppercase;
                        font-weight: 600;
                    }
                }
                th.td-check{
                    padding: 0 15px !important;
                }
                tr{
                    background: none;
                    box-shadow: none;
                }
            }

            .vs-table--pagination {
                justify-content: center;
            }
        }
    }
</style>
