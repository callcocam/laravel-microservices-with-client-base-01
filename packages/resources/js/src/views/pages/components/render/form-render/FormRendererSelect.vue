<template>
    <div class="vx-row mb-2">
        <div class="vx-col w-full">
            <label class="vs-input--label">{{ $t(column.text) }}</label>
            <v-select
                :name="column.name"
                icon-no-border
                :icon="column.icon || ''"
                :icon-pack="column.pack || 'feather'"
                :class="column.attributes.class"
                :danger="form.errors.has(column.name)"
                :danger-text="form.errors.get(column.name)"
                v-model="form[column.name]"
                :options="column.options"
                class="mb-4 md:mb-0"
                :placeholder="$t(column.attributes.text)"
                dir="ltr" />
            <span
                class="text-danger text-sm"
                v-show="form.errors.has(column.name)"
            >{{ form.errors.get(column.name) }}</span>
        </div>
    </div>

</template>
<script>
    import vSelect from 'vue-select'
    import AbstractFieldComponent from "@/views/pages/components/AbstractFieldComponent";
    export default {
        name: 'FormRendererSelect',
        extends:AbstractFieldComponent,
        components: {
            'v-select': vSelect,
        }
    }
</script>
