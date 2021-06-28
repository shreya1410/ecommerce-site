<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row" >
                    <div      class="col-sm-6">
                        <div class="card-deck">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Sub Category name  : {{subcategories.sub_category_name}}
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
    name: "SubCategoryComponent",
    data()
    {
        return{
          //  subcategory :[],
            subcategories :{
                sub_category_id:'',
                sub_category_name:'',
            },

        }
    },
    mounted() {

    },

    methods:{
        getSubcategory: async function () {

            await axios.get('/api/all_sub_categories/' + this.$route.params.id)
                .then(response => {
                    this.subcategories.sub_category_name = response.data.sub_category_name;
                    console.log(response.data);
                })
                .catch(error => {
                    console.log(error);
                })

        },

    },
    created() {
        this.getSubcategory();
    }

}
</script>

<style scoped>

</style>
