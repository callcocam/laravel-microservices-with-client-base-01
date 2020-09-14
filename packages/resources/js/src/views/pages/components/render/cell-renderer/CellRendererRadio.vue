<template>
    <vs-chip class="ag-grid-cell-chip" :color="chipColor(column.value)">
        <span>{{ column.options[column.value] }}</span>
    </vs-chip>
</template>

<script>
    import AbstractFieldComponent from "@/views/pages/components/AbstractFieldComponent";
    export default {
        name: 'CellRendererRadio',
        extends:AbstractFieldComponent,
        computed: {
            chipColor () {
                return (value) => {
                    if (value === 'published') return 'success'
                    else if (value === 'deleted') return 'danger'
                    else if (value === 'draft') return 'warning'
                    else return 'primary'
                }
            }
        }
    }
</script>

<style lang="scss" scpoped>
    .ag-grid-cell-chip {
        &.vs-chip-success {
            background: rgba(var(--vs-success),.15);
            color: rgba(var(--vs-success),1) !important;
            font-weight: 500;
        }
        &.vs-chip-warning {
            background: rgba(var(--vs-warning),.15);
            color: rgba(var(--vs-warning),1) !important;
            font-weight: 500;
        }
        &.vs-chip-danger {
            background: rgba(var(--vs-danger),.15);
            color: rgba(var(--vs-danger),1) !important;
            font-weight: 500;
        }
    }
</style>
