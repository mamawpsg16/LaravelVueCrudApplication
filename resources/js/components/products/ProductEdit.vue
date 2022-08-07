<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-2 mb-3 text-end">
                <a href="/" class="btn btn-outline-primary text-start">Back</a>
            </div>
        </div>
        <form  @submit.prevent="updateProduct" enctype="multipart/form-data">
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
                                        <label for="name">Name</label>
                                        <input type="text" v-model="form.name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Description (optional)</label>
                                        <textarea  class="form-control" v-model="form.description"></textarea>
                                    </div>
                                    <!-- <div class="form-group">
                                        <img  class="form-control mt-1" v-if="form.image != ''" :src="getImage()" alt="">
                                        <label for="name">Image</label>
                                        <input type="file" name="file" class="form-control" @change="uploadImage($event.target.files)">
                                    </div> -->
                                </div>
                                <div class="card-body col-4">
                                    <div class="form-group">
                                        <label for="name">Product Type</label>
                                        <input type="text" class="form-control" v-model="form.type">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Quantity</label>
                                        <input type="number" class="form-control" v-model="form.quantity">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Price</label>
                                        <input type="number" step="0.0001" class="form-control" v-model="form.price">
                                    </div>
                                </div>
                            </div>
                          
                            <div class="row">
                                <div class="col-12 mb-2 text-end">
                                    <button class="btn btn-primary"  type="submit"><fas icon="floppy-disk"></fas></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data(){
        return{
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
        updateProduct(){
            console.log('triggered')
            console.log(this.form)
            this.axios.post('/api/updateProduct',this.form)
            .then(response=>{
                console.log('success');
                this.form.name = ''
                this.form.description = ''
                // this.form.image = ''
                this.form.type = ''
                this.form.quantity = ''
                this.form.price = ''
                this.$router.push('/product/'+this.form.id)
                toast.fire({
                    icon:"success",
                    title:"Product updated successfully"
                })
            })
            .catch(error=>{
                console.log(error)
                console.log('error');
            })
        }
    }
}
</script>