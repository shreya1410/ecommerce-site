<template>
    <div>
        <transition-group name="fade" tag="div">
            <div v-for="i in [currentIndex]" :key="i">
                <img :src="currentImg" />
            </div>
        </transition-group>
        <a class="prev" @click="prev" href="#">&#10094; Previous</a>
        <a class="next" @click="next" href="#">&#10095; Next</a>
    </div>
</template>

<script>
import home from "../../asset/home.jpg";
import phone from "../../asset/phone.jpg";
import toy from "../../asset/toy.jpg";
import fashion from "../../asset/fashion.jpg";
export default {
name: "SliderHomeComponent",
    data() {
        return {
            images: [home,phone,fashion, toy],
            // [
            //     "/images/home/home-slide1.png",
            //     "/images/home/home-slide2.png",
            //     "/images/home/home-slide3.png",
            //     "/images/home/home-slide4.png",
            //     "/images/home/home-slide5.png",
            // ],
            timer: null,
            currentIndex: 0
        };
    },

    mounted: function() {
        this.startSlide();
    },

    methods: {
        startSlide: function() {
            this.timer = setInterval(this.next, 5000);
        },

        next: function() {
            this.currentIndex += 1;
        },
        prev: function() {
            this.currentIndex -= 1;
        }
    },

    computed: {
        currentImg: function() {
            return this.images[Math.abs(this.currentIndex) % this.images.length];
        }
    }
}
</script>

<style scoped>

</style>
