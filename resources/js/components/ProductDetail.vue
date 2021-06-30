<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div v-for="products in productDetail" class="col-sm-6">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4" v-for="image in JSON.parse(products.image)">
                                    <img :src="'/uploads/'+image"   class="card-img-top" >
                                </div>

                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title" style="font-weight: bold">{{products.name}}</h5>
                                        <p class="card-text" style="font-family: 'Times New Roman'">Description :{{products.description}}</p>
                                        <p class="card-text" style="font-weight: bolder">Rs . {{products.price}}</p>
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
name: "ProductDetail",
    data(){
    return {
        productDetail :[],
        description :'',
        price :''
    }
    },
    methods :{
    getproductdetail : async  function (){
        axios.get('/api/productdetail/' + this.$route.params.slug)
        .then(response =>{
            this.productDetail = response.data;
            console.log(response.data);
        })
    }
    },
    created() {
    this.getproductdetail();
    }
}
</script>

<style scoped>

</style>
