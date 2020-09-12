<template>
    <div style="display: flex;">
        <vs-button
            v-for="(action, index) in column.components"
            :key="index"
            :icon-pack="action.attributes.pack"
            :icon="action.attributes.icon"
            :title="$t(action.attributes.text)"
            :color="action.attributes.color"
            :size="action.attributes.size"
            :class="action.attributes.class"
            :to="action.attributes.href"
        >
            <template v-if="action.attributes.label">
                {{ $t(action.attributes.label) }}
            </template>
        </vs-button>
    </div>
</template>
<script>
    import AbstractFieldComponent from "@/views/pages/components/AbstractFieldComponent";
    export default {
        name: 'CellRendererVerified',
        extends:AbstractFieldComponent,
    }
</script>
