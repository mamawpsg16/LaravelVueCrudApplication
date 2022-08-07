<template>
    <div class="container mt-5" v-if="edit == false">
        <div class="row">
            <div class="col-2 mb-3 text-end">
                <a href="/" class="btn btn-outline-primary text-start">Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ form.name }}</h4> 
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="card-body col-8">
                                <div class="form-group">
                                    <label for="name" class="fw-bold">Name</label>
                                    <p>{{ form.name }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="fw-bold">Description (optional)</label>
                                    <p>{{ form.description }}</p>
                                </div>
                            </div>
                            <div class="card-body col-4">
                                <div class="form-group">
                                    <label for="name" class="fw-bold">Product Type</label>
                                    <p>{{ form.type }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="fw-bold">Quantity</label>
                                    <p>{{ form.quantity }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="fw-bold">Price</label>
                                    <p>{{ form.price }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mb-2 text-end">
                                <button class="btn btn-warning" @click="editProduct(form.id)"><fas icon="pen-to-square" ></fas></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <product-edit v-else></product-edit>
</template>

<script>
import ProductEdit from './ProductEdit'
export default {
    data(){
        return{
            edit:false,
            form:{
                id:'',
                name:'',
                description:'',
                // image:'',
                type:'',
                quantity:'',
                price:'',
            }
        }
    },
    mounted(){
        this.getProductDetails()
    },
    computed:{

    },
    components:{
        'product-edit' : ProductEdit
    },
    methods:{
        getProductDetails(){
            console.log(this.$route.params.id)
            this.axios.get(`/api/getProductDetails/${this.$route.params.id}`)
            .then(response=>{
                this.form = response.data
                console.log(response)
            }).catch(error=>{
            })
        },
        editProduct(id){
            this.$router.push('/product/edit/'+id)
        },
    }
}
</script>