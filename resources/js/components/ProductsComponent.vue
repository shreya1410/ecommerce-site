<template>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">

                <div v-for="products_item in products" class="col-sm-6">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
<!--                        <div class="col-md-4" v-for="image in JSON.parse(products_item.image)">-->
<!--                            <img :src="'/uploads/'+image"   class="card-img-top" >-->
<!--                        </div>-->

                        <div class="col-md-4">
                            <img :src="'/uploads/'+JSON.parse(products_item.image)[0]"   class="card-img-top" >
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title" style="font-weight: bold">{{products_item.name}}</h5>
                                <router-link :to="'/productdetail/'+products_item.slug"  class="btn btn-primary">View Detail</router-link>
                            </div>
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
name: "ProductsComponent",
    data(){
        return{
            products :[],
            name :'',
            slug :'',
            image :''
        }
    },
    methods :{
    getProducts : async  function (){
        axios.get('/api/products/' + this.$route.params.id)
        .then(response =>{
            this.products= response.data;
          //  console.log(response.data);
        })
    }
    },
    created() {
    this.getProducts();
    }
}
</script>

<style scoped>

</style>
