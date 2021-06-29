<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="form-group">
                    <input class="form-control me-2" type="search"  v-model="search" placeholder="search" aria-label="search">
                </div>
                <div class="row">
                    <div  v-for="subcategory in filtersubcategory"  class="col-sm-6">
                        <div class="card-deck">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title"  style="text-align: center;font-weight: bold;color: #3d0894;"> {{subcategory.sub_category_name }}</h5>
                                    <p class="card-text">{{subcategory.sub_category_description }}</p>
                                    <router-link :to="'/products/'+subcategory.sub_category_id" class="btn btn-primary">{{subcategory.sub_category_name}}</router-link>
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
    name: "SubCategoryComponent",
    data()
    {
        return{
            subcategories :[],
            search:'',
            sub_category_id :'',
            sub_category_name :'',
            sub_category_description :''
        }
    },
    mounted() {

    },

    methods:{
        getSubcategory: async function () {

            await axios.get('/api/all_sub_categories/' + this.$route.params.id)
                .then(response => {
                    // this.subcategories.sub_category_name = response.data.sub_category_name;
                     this.subcategories = response.data;
                  //  console.log(response.data);
                })
                .catch(error => {
                    console.log(error);
                })

        },

    },
    created() {
        this.getSubcategory();
    },
    computed :{
        filtersubcategory :function (){
            return this.subcategories.filter((subcategory)=>{
                return subcategory.sub_category_name.match(this.search);
            })
        }
    }

}
</script>

<style scoped>

</style>
