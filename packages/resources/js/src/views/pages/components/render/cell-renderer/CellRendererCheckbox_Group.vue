<template>
    <div>CellRendererCheckbox_Group</div>
</template>

<script>
    import AbstractFieldComponent from "@/views/pages/components/AbstractFieldComponent";
    export default {
        name: 'CellRendererCheckbox_Group',
        extends:AbstractFieldComponent,
        computed: {
            textColor () {
                return this.column.value ? 'text-primary' : 'text-grey'
            }
        }
    }
</script>
