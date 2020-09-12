<template>
    <feather-icon icon="CircleIcon" :svgClasses="['fill-current h-4 w-4', textColor]" />
</template>

<script>
    import AbstractFieldComponent from "@/views/pages/components/AbstractFieldComponent";
    export default {
        name: 'CellRendererVerified',
        extends:AbstractFieldComponent,
        computed: {
            textColor () {
                return this.column.value ? 'text-primary' : 'text-grey'
            }
        }
    }
</script>
