<template>
    <vx-card class="mt-base mb-5" no-shadow card-border>
        <div class="vx-row">
            <div class="vx-col w-full">
                <div class="flex items-end px-3">
                    <feather-icon v-if="column.icon" svgClasses="w-6 h-6" :icon="column.icon" class="mr-2" />
                    <span class="font-medium text-lg leading-none">{{ column.text }}</span>
                </div>
                <vs-divider />
            </div>
        </div>
        <div class="block overflow-x-auto" v-if="column.headings">
            <table class="w-full">
                <tr>
                    <th class="font-semibold text-base text-left px-3 py-2" v-for="heading in column.headings" :key="heading">{{ heading }}</th>
                </tr>
                <tr v-if="column.options" v-for="(val, name) in column.options" :key="name">
                    <td class="px-3 py-2">{{ name }}</td>
                    <td v-for="(item, name) in val" class="px-3 py-2" :key="name+item">
                        <vs-checkbox v-model="val[name]" />
                    </td>
                </tr>
            </table>
        </div>

    </vx-card>
</template>
<script>
    import AbstractFieldComponent from "@/views/pages/components/AbstractFieldComponent";
    export default {
        name: 'FormRendererCheckbox_Group',
        extends:AbstractFieldComponent,

    }
</script>
