<template>
    <div>
        <vs-avatar size="small" :src="column.value"/>
    </div>
</template>

<script>
    import AbstractFieldComponent from "@/views/pages/components/AbstractFieldComponent";
    export default {
        name: 'CellRendererCover',
        extends:AbstractFieldComponent
    }
</script>

<style lang="scss" scpoped>

</style>
