<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="form-group">
                    <input class="form-control me-2" type="search"  v-model="search"  placeholder="Search category" aria-label="Search">
                </div>
                <div class="row">
                    <div v-for="category in filteredCategory" v-bind:key="category.id"  class="col-sm-6">
                        <div class="card-deck">
                            <div class="card" style="width: 18rem;">
                                <img :src="'/mainCategoryImg/'+category.main_category_image"   class="card-img-top" >
                                <div class="card-body">
                                    <h5 class="card-title" style="text-align: center;font-weight: bold;color: #3d0894;">{{category.main_category_name}}</h5>
                                    <p class="card-text">{{category.main_category_description}}</p>
                                    <router-link  :to="'/subcategory/'+category.id" class="btn btn-primary"  >{{category.main_category_name}}</router-link>
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
            categories :[],
            search :'',
            id :'',
            main_category_name :'',
            main_category_description :'',
            main_category_image :'',
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
        // getcategoryproducts(id){
        //         axios.get('/api/all_Category_Products/'+id)
        //     .then(response =>{
        //     //    console.log(response.data);
        //
        //     })
        // }
    },
    computed :{
        filteredCategory : function (){
            return this.categories.filter((category)=>{
                return category.main_category_name.match(this.search);
            })
        }
    }
}
</script>

<style scoped>

</style>
