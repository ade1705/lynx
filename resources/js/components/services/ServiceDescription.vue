<template>
    <div>
        <vue-editor v-model="content"/>
        <input type="hidden" v-model="content"  name="service_description" />
    </div>
</template>

<script>

    import { VueEditor } from "vue2-editor";
    export default {
        name: "ServiceDescription",
        props: ['description'],
        mounted() {
            if (this.description !== '') {
                this.content = this.description;
            }
        },
        data(){
            return{
                content: '',
                loading: false
            }
        },
    }
</script>

<style scoped>

</style>
