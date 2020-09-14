<template>
    <vs-input
        :name="column.name"
        icon-no-border
        :icon="column.icon || ''"
        :icon-pack="column.pack || 'feather'"
        :class="column.attributes.class"
        :danger="form.errors.has(column.name)"
        :danger-text="form.errors.get(column.name)"
        :label-placeholder="column.text"
        v-model="form[column.name]"
    ></vs-input>
</template>
<script>
    import AbstractFieldComponent from "@/views/pages/components/AbstractFieldComponent";
    export default {
        name: 'FormRendererText',
        extends:AbstractFieldComponent,
    }
</script>
