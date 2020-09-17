<template>
    <div class="vx-row mb-2">
        <div class="vx-col w-full">
            <label class="vs-radio--label">{{ $t(column.text) }} {{this.form[this.column.name]}}</label>
            <template v-if="column.options">
                <ul class="centerx mb-5 mt-4">
                    <li v-for="(option,index) in column.options">
                        <vs-checkbox v-model="selected" :vs-value="index">{{ option }}</vs-checkbox>
                    </li>
                </ul>
            </template>
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
        name: 'FormRendererMultipleCheckbox',
        extends:AbstractFieldComponent,
        data(){
            return {
                selected:[]
            }
        },
        created() {
            this.selected = this.form[this.column.name]
        },
        watch:{
            selected(val){
                this.form[this.column.name] = val
            }
        }
    }
</script>
