<template>
    <ul class="centerx" v-if="column.options">
        <li v-for="(option, key) in column.options">
            <vs-radio v-model="form[column.name]" :vs-value="key">{{ option }}</vs-radio>
        </li>
    </ul>
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
