<script>
    export default {
        props: {
            column: {
                type: [Object, Array, String],
                required: true
            },
            form: {
                type: [Object],
                default: null
            },
            index: {
                type: [Object, Array, String]
            }
        },
        methods: {
            currentTabComponent: function(Component) {
                return Component;
            },
            attribute(key, defaults=null){
               if (this.column.attributes){
                   if (this.column.attributes[key]){
                      return this.column.attributes[key];
                   }
               }
               return defaults;
            }
        }
    };
</script>
