<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row" >
                    <div v-for="category in categories" v-bind:key="category.id"  class="col-sm-6">
                        <div class="card-deck">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Category name  :
                                        <router-link  :to="'/subcategory/'+category.id">  {{category.main_category_name}}</router-link>
                                    </h5>

                                    <h5 class="card-title">
                                        Category Description : {{category.main_category_description}}
                                    </h5>
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
    name: "CategoryComponent",
    data(){
        return{
            categories :{},
            id :'',
            name :'',
        }
    },
    mounted() {
        this.getCategories();
    },
    methods:{
        getCategories(){
            axios.get('/api/all_categories')
            .then(response =>{
               // console.log(response.data);
                this.categories = response.data;
            })
        },
        getcategoryproducts(id){
                axios.get('/api/all_Category_Products/'+id)
            .then(response =>{
                console.log(response.data);

            })
        }
    }
}
</script>

<style scoped>

</style>
