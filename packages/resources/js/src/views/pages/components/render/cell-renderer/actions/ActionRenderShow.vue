<template>
    <vx-tooltip :text="$t(column.text)">
        <vs-button
            :icon-pack="column.pack"
            :icon="column.icon"
            :title="$t(column.text)"
            :color="column.color"
            :size="column.size"
            :class="column.class"
            :to="column.href"
        >
            <template v-if="column.label">
                {{ $t(column.label) }}
            </template>
        </vs-button>
    </vx-tooltip>
</template>

<script>
    import AbstractFieldComponent from "@/views/pages/components/AbstractFieldComponent";
    export default {
        name: "ActionRenderShow",
        extends:AbstractFieldComponent
    }
</script>

<style scoped>

</style>
