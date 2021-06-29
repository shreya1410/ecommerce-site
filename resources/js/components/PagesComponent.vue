<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row" >

                    <div v-for="pages in pages" v-bind:key="pages.id"  class="col-sm-6">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4" >
                                <img :src="'/aboutUsImg/'+pages.image"   style="height: 500px"  >
                            </div>
                            <div class="col-md-8" style="margin-right: 100px">
                                <div class="card-body">
                                    <h5 class="card-title">{{pages.name }}</h5>
                                    <p class="card-text">{{pages.contentData}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>


<!--                    <div v-for="pages in pages" v-bind:key="pages.id"  class="col-sm-6">-->
<!--                        <div class="card-deck">-->
<!--                            <div class="card" style="width: 18rem;">-->
<!--                                <img :src="'/aboutUsImg/'+pages.image"   class="card-img-top" >-->
<!--                                <div class="card-body">-->
<!--                                    <h5 class="card-title"-->
<!--                                        style="text-align: center;font-weight: bold;color: #3d0894;">-->
<!--                                        {{pages.name }}</h5>-->
<!--                                    <p class="card-text">{{pages.contentData}}</p>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->




                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "PagesComponent",
    data(){
        return{
            pages :{},
            name :'',
            contentData :''

        }
    },
    mounted() {
        this.getPages();
    },
    methods:{
        getPages(){
            axios.get('/api/all_pages')
            .then(response => {
                // console.log(response.data);
                this.pages = response.data;
            })
        }
    }
}
</script>

<style scoped>

</style>
