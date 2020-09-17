<template>
    <div>{{ column.value }}</div>
</template>

<script>
    import AbstractFieldComponent from "@/views/pages/components/AbstractFieldComponent";
    export default {
        name: 'CellRendererSelect',
        extends:AbstractFieldComponent,
    }
</script>
