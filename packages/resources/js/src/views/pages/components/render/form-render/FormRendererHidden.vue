<template>
    <vs-input
        :type="column.type"
        v-model="form[column.name]"
    ></vs-input>
</template>
<script>
    import AbstractFieldComponent from "@/views/pages/components/AbstractFieldComponent";
    export default {
        name: 'FormRendererHidden',
        extends:AbstractFieldComponent,
    }
</script>
