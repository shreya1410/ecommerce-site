<template>

<!--<img v-bind:src="image"  />-->
    <div>
        <transition-group name="fade" tag="div">
            <div v-for="i in [currentIndex]" :key="i">
                <img :src="currentImg"  height="100" width="100"/>
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
    name: "HomeComponent",
    data() {
        return {
            images: [home,phone,fashion, toy],
                // "https://www.kindpng.com/imgv/iRxhiTJ_ecommerce-website-images-with-transparent-background-hd-png/",
                //       "https://unsplash.com/photos/zwsHjakE_iI.png",
                // "https://cdn.pixabay.com/photo/2016/02/17/23/03/usa-1206240_1280.jpg",
                // "https://cdn.pixabay.com/photo/2015/05/15/14/27/eiffel-tower-768501_1280.jpg",
                // "https://cdn.pixabay.com/photo/2016/12/04/19/30/berlin-cathedral-1882397_1280.jpg"

            timer: null,
            currentIndex: 0
        };
    },

    mounted: function() {
        this.startSlide();
    },

    methods: {
        startSlide: function() {
            this.timer = setInterval(this.next, 4000);
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
    // data:function (){
    //  return{
    //     image : shop
    //  }
    // }
}
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: all 0.9s ease;
    overflow: hidden;
    visibility: visible;
    position: absolute;
    width:100%;
    opacity: 1;
}

.fade-enter,
.fade-leave-to {
    visibility: hidden;
    width:100%;
    opacity: 0;
}

img {
    height:600px;
    width:100%
}

.prev, .next {
    cursor: pointer;
    position: absolute;
    top: 40%;
    width: auto;
    padding: 16px;
    color: white;
    font-weight: bold;
    font-size: 18px;
    transition: 0.7s ease;
    border-radius: 0 4px 4px 0;
    text-decoration: none;
    user-select: none;
}

.next {
    right: 0;
}

.prev {
    left: 0;
}

.prev:hover, .next:hover {
    background-color: rgba(0,0,0,0.9);
}
</style>
