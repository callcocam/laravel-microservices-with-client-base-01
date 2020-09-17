<template>
    <div>CellRendererMultiple_Checkbox</div>
</template>

<script>
    import AbstractFieldComponent from "@/views/pages/components/AbstractFieldComponent";
    export default {
        name: 'CellRendererMultiple_Checkbox',
        extends:AbstractFieldComponent,
        computed: {
            textColor () {
                return this.column.value ? 'text-primary' : 'text-grey'
            }
        }
    }
</script>
