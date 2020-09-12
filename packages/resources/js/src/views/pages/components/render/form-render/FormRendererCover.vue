<template>
    <div class="flex flex-wrap items-center mb-base">
        <vs-avatar :src="form[column.name]" size="70px" class="mr-4 mb-4" />
        <div v-if="attribute('route',null)">
            <input
                type="file"
                class="hidden"
                ref="update_avatar_input"
                @change="update_avatar"
                :accept="attribute('mime_types','image/*')"
            />
            <vs-button class="mr-4 sm:mb-0 mb-2" @click="$refs.update_avatar_input.click()">{{ $t('Upload')}}</vs-button>
            <vs-button
                type="border"
                color="danger"
                @click="confirmDeleteRecord()"
            >{{ $t('Remove') }}</vs-button>
            <p class="text-sm mt-2">{{ $t(column.attributes.help)  }}</p>
        </div>
    </div>
</template>
<script>

    import AbstractFieldComponent from "@/views/pages/components/AbstractFieldComponent";
    import { objectToFormData } from "object-to-formdata";
    import { Form } from "vform";
    export default {
        name: 'FormRendererCover',
        extends:AbstractFieldComponent,
        data() {
            return {
                upload:'',
                remove:'',
                download:'',
                uploadForm: new Form({
                    file: ""
                })
            };
        },
        created() {
            const { upload, remove, download } = this.attribute('route',null)
            this.upload = upload;
            this.remove = remove;
            this.download = download;
        },
        methods:{
            remove_file() {
                this.uploadForm.file = this.form[this.column.name];
                if(this.$route.params['id']){
                    this.uploadForm.id = this.$route.params['id'];
                    this.uploadForm.name = this.column.name;
                }
                this.uploadForm.submit("post", this.remove).then(({ data }) => {
                    this.form[this.column.name] = data.path;
                });
            },
            confirmDeleteRecord() {
                this.$vs.dialog(Object.assign({
                    accept: this.remove_file
                }, this.attribute('confirm_delete_record', {})));
            },
            update_avatar(e) {
                const file = e.target.files[0];
                this.uploadForm.file = file;
                if(this.$route.params['id']){
                    this.uploadForm.id = this.$route.params['id'];
                    this.uploadForm.name = this.column.name;
                }
                this.$vs.loading();
                this.uploadForm
                    .submit("post", this.upload, {
                        // Transform form data to FormData
                        transformRequest: [
                            function(data, headers) {
                                return objectToFormData(data);
                            }
                        ],
                        onUploadProgress: e => {
                            dd(e);
                        }
                    })
                    .then(({ data }) => {

                        this.form[this.column.name] = data.path;
                        this.$vs.loading.close();
                    })
                    .catch(err => {
                        dd(err)
                        this.$vs.loading.close();
                    });
            },
        }
    }
</script>
<style lang="scss">
    @import "@sass/vuexy/pages/profile.scss";
</style>
