<template>
    <div>
        <template v-if="column.components">
            <template  v-for="(component,index) in column.components">
                <component :is="currentTabComponent(component.formRenderFramework)" :column="component" :form="form" :key="index"></component>
            </template>
        </template>
    </div>
</template>
<script>
    import AbstractFieldComponent from "@/views/pages/components/AbstractFieldComponent";
    export default {
        name: 'FormRendererArray_Components',
        extends:AbstractFieldComponent,
    }
</script>
