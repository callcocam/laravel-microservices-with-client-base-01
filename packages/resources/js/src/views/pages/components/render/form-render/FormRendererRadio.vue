<template>
    <div class="vx-row mb-2">
        <div class="vx-col w-full">
            <label class="vs-input--label">{{ $t(column.text) }}</label>
            <ul class="centerx mt-4 mb-4" v-if="column.options">
                <li v-for="(option, key) in column.options">
                    <vs-radio v-model="form[column.name]" :vs-value="key">{{ option }}</vs-radio>
                </li>
            </ul>
            <span
                class="text-danger text-sm"
                v-show="form.errors.has(column.name)"
            >{{ form.errors.get(column.name) }}</span>
        </div>
    </div>
</template>
<script>
    import AbstractFieldComponent from "@/views/pages/components/AbstractFieldComponent";
    export default {
        name: 'FormRendererRadio',
        extends:AbstractFieldComponent,
        data(){
            return {
                selected:null
            }
        }
    }
</script>
