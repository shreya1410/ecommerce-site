<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row" >
                    <div v-for="pages in pages" v-bind:key="pages.id"  class="col-sm-6">
                        <div class="card-deck">
                            <div class="card" style="width: 18rem;">
                                <img :src="'/aboutUsImg/'+pages.image"   class="card-img-top" >
                                <div class="card-body">
                                    <h5 class="card-title"
                                        style="text-align: center;font-weight: bold;color: #3d0894;">
                                        {{pages.name }}</h5>
                                    <p class="card-text">{{pages.contentData}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
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
