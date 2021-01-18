<template>
    <div>
        <div style="height: 30px">
            <p class="font-weight-bolder" v-if="isLoading">Loading...</p>
        </div>
        <input type="hidden" name="service_images" v-model="images" />
        <div class="d-flex py-2" v-bind:class="{ disabled: isLoading }">
            <div class="mr-2" style="width: 80px; height: 80px;"  v-for="(image, index) in images">
                <img v-bind:src="`/uploads/${image}`" class="img-fluid" width="80" />
            </div>
            <div @click="showFileModal()" role="button" style="width: 80px; height: 80px; border: #ccc dashed 4px" class="d-flex align-items-center justify-content-center bg-light">
                <input type="file" ref="file" style="display: none" v-on:change="uploadFile()">
                <i data-feather="plus" class="h4"></i>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ServiceImages",
        //On record to state that this is an insanely bad idea to get the userID this way.
        props: ['user_id', 'uploaded_images'],
        data(){
            return{
                images: [],
                isLoading: false
            }
        },
        mounted() {
            if (this.uploaded_images !== '') {
                this.images = this.uploaded_images.split(',');
            }
        },
        methods: {
            showFileModal: function () {
                this.$refs.file.click()
            },
            uploadFile: function () {
                this.isLoading = true;
                let formData = new FormData();
                formData.append('file', this.$refs.file.files[0]);
                axios.post( '/api/upload-image', formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(data => {
                    this.isLoading = false  ;
                    this.images.push(data.data.file_url);
                })
                .catch(error => {
                    console.log(error);
                });
            }
        }
    }
</script>

<style scoped>

</style>
