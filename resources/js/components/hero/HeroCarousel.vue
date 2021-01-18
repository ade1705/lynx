<template>
    <div>
        <carousel :items="1" :nav="false">
            <img src="https://images.unsplash.com/photo-1555432783-9aed44ab60a9?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=634&h=700&q=80">
            <img src="https://images.unsplash.com/photo-1598387746216-506f6bd47aad?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&h=700&q=80">
            <img src="https://images.unsplash.com/photo-1532526351671-cf4bf243a6ad?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=637&h=700&q=80">
        </carousel>
    </div>
</template>

<script>
    import carousel from 'vue-owl-carousel2';
    export default {
        name: "HeroCarousel",
        components: { carousel },
    }
</script>

<style scoped>

</style>
