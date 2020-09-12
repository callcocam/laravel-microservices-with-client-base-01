<template>
   <div>
       <vs-dropdown-item v-for="(action, index) in actions" :key="index">
                <span class="flex items-center">
                  <feather-icon icon="TrashIcon" svgClasses="h-4 w-4" class="mr-2" />
                  <span>Delete</span>
                </span>
       </vs-dropdown-item>
   </div>
</template>

<script>
    export default {
        props:['actions'],
        name: "TableAction"
    }
</script>

<style scoped>

</style>
