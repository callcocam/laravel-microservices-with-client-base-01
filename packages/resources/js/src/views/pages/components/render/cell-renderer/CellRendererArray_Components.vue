<template>
    <div style="display: flex;">
        <template v-for="(component, index) in column.components">
            <component :is="currentTabComponent(component.cellRenderFramework)" :column="component" :key="index"></component>
        </template>
    </div>
</template>
<script>
    import AbstractFieldComponent from "@/views/pages/components/AbstractFieldComponent";
    export default {
        name: 'CellRendererArray_Components',
        extends:AbstractFieldComponent,
    }
</script>
