<template>
    <div class="service-slider">
        <div>
            <agile class="main" ref="main" :options="options1" :as-nav-for="asNavFor1">
                <div class="slide" v-for="(slide, index) in slides" :key="index" :class="`slide--${index}`"><img :src="slide" /></div>
            </agile>
        </div>

        <div>
            <agile class="thumbnails" ref="thumbnails" :options="options2" :as-nav-for="asNavFor2">
                <div class="slide slide--thumbniail" v-for="(slide, index) in slides" :key="index" :class="`slide--${index}`" @click="$refs.thumbnails.goTo(index)"><img :src="slide" /></div>
            </agile>
        </div>

    </div>
</template>

<script>
    import { VueAgile } from 'vue-agile'
    export default {
        components: {
            agile: VueAgile
        },
        props: ['uploaded_images'],
        name: "ServiceSlider",
        mounted () {
            if (this.uploaded_images !== '') {
                this.slides = this.uploaded_images.split(',');
            }
            this.asNavFor1.push(this.$refs.thumbnails)
            this.asNavFor2.push(this.$refs.main)
        },
        data () {
            return {
                asNavFor1: [],
                asNavFor2: [],
                options1: {
                    dots: false,
                    fade: true,
                    navButtons: false
                },
                options2: {
                    autoplay: true,
                    autoplaySpeed: 5000,
                    centerMode: true,
                    dots: false,
                    navButtons: false,
                    slidesToShow: 3,
                    responsive: [
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 5
                            }
                        },
                        {
                            breakpoint: 1000,
                            settings: {
                                navButtons: true
                            }
                        }
                    ]
                },
                slides: [
                    'https://images.unsplash.com/photo-1453831362806-3d5577f014a4?ixlib=rb-1.2.1&q=85&fm=jpg&crop=entropy&cs=srgb&w=1600&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ',
                    'https://images.unsplash.com/photo-1496412705862-e0088f16f791?ixlib=rb-1.2.1&q=85&fm=jpg&crop=entropy&cs=srgb&w=1600&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ',
                    'https://images.unsplash.com/photo-1506354666786-959d6d497f1a?ixlib=rb-1.2.1&q=85&fm=jpg&crop=entropy&cs=srgb&w=1600&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ',
                    'https://images.unsplash.com/photo-1455619452474-d2be8b1e70cd?ixlib=rb-1.2.1&q=85&fm=jpg&crop=entropy&cs=srgb&w=1600&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ',
                    'https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-1.2.1&q=85&fm=jpg&crop=entropy&cs=srgb&w=1600&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ',
                    'https://images.unsplash.com/photo-1472926373053-51b220987527?ixlib=rb-1.2.1&q=85&fm=jpg&crop=entropy&cs=srgb&w=1600&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ',
                    'https://images.unsplash.com/photo-1497534547324-0ebb3f052e88?ixlib=rb-1.2.1&q=85&fm=jpg&crop=entropy&cs=srgb&w=1600&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ'
                ]
            }
        }
    }
</script>

<style scoped>
    .service-slider .main {
        margin-bottom: 30px;
    }

    .service-slider .thumbnails {
        margin: 0 -5px;
        width: calc(100% + 10px);
    }

    .service-slider .agile__actions {
        position: static;
    }

    .service-slider .agile__nav-button {
        background: transparent;
        border: none;
        color: #ccc;
        cursor: pointer;
        font-size: 24px;
        transition-duration: .3s;
    }

    .service-slider .agile__nav-button:hover {
        color: #888;
    }

    .service-slider .agile__dot {
        margin: 0 10px;
    }

    .service-slider .agile__dot button {
        background-color: #eee;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        display: block;
        height: 10px;
        font-size: 0;
        line-height: 0;
        margin: 0;
        padding: 0;
        transition-duration: .3s;
        width: 10px;
    }

    .service-slider .agile__dot--current button, .service-slider .agile__dot:hover button {
        background-color: #888;
    }

    .service-slider .thumbnails .agile__nav-button {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
    }

    .service-slider .thumbnails .agile__nav-button--prev {
        left: -45px;
    }

    .service-slider .thumbnails .agile__nav-button--next {
        right: -45px;
    }

    .service-slider .slide {
        align-items: center;
        box-sizing: border-box;
        color: #fff;
        display: flex;
        height: 450px;
        justify-content: center;
    }

    .service-slider .slide--thumbniail {
        cursor: pointer;
        height: 100px;
        padding: 0 5px;
        transition: opacity .3s;
    }

    .service-slider .slide--thumbniail:hover {
        opacity: .75;
    }

    .service-slider .slide img {
        height: 100%;
        object-fit: cover;
        object-position: center;
        width: 100%;
    }
</style>
