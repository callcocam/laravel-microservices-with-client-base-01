<template>
   <div>
       <vs-dropdown vs-trigger-click class="cursor-pointer">
           <div class="p-3 shadow-drop rounded-lg d-theme-dark-light-bg cursor-pointer flex items-end justify-center text-lg font-medium w-32">
               <span class="mr-2 leading-none">Actions</span>
               <feather-icon icon="ChevronDownIcon" svgClasses="h-4 w-4" />
           </div>
           <vs-dropdown-menu>
               <vs-dropdown-item v-for="(action, index) in actions" :key="index">
                <span class="flex items-center">
                  <feather-icon icon="TrashIcon" svgClasses="h-4 w-4" class="mr-2" />
                  <span>Delete</span>
                </span>
               </vs-dropdown-item>
           </vs-dropdown-menu>
       </vs-dropdown>
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
