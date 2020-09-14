<template>
    <vs-button
        :icon-pack="column.attributes.pack"
        :icon="column.attributes.icon"
        :title="$t(column.attributes.text)"
        :color="column.attributes.color"
        :size="column.attributes.size"
        :class="column.attributes.class"
        :to="column.attributes.href"
    >
        <template v-if="column.label">
            {{ $t(column.label) }}
        </template>
    </vs-button>
</template>

<script>
    import AbstractFieldComponent from "@/views/pages/components/AbstractFieldComponent";
    export default {
        name: "ActionRenderEdit",
        extends:AbstractFieldComponent
    }
</script>

<style scoped>

</style>
