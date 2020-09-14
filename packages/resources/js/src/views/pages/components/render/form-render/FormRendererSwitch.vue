<template>
    <div>
        <template v-if="column.accept == form[column.equal]">
            <component :is="currentTabComponent(column.switchRenderFramework)" :column="column" :form="form"></component>
        </template>
    </div>
</template>
<script>
    import AbstractFieldComponent from "@/views/pages/components/AbstractFieldComponent";
    export default {
        name: 'FormRendererSwitch',
        extends:AbstractFieldComponent,
    }
</script>
