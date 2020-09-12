<template>
    <div class="flex flex-wrap items-center justify-end">
        <vs-button class="ml-auto mt-2">Save Changes</vs-button>
        <vs-button class="ml-4 mt-2" type="border" color="warning">Reset</vs-button>
    </div>
</template>
<script>
    import AbstractFieldComponent from "@/views/pages/components/AbstractFieldComponent";
    export default {
        name: 'FormRendererAction',
        extends:AbstractFieldComponent,
    }
</script>
