<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-2 mb-3 text-end">
                <a href="/" class="btn btn-outline-primary text-start">Back</a>
            </div>
        </div>
        <form  @submit.prevent="saveProduct" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Product</h4> 
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
                                        <input type="file"  class="form-control" @change="uploadImage">
                                        <input name="img_url" id="img_url" type="file" @input="form.img_url = $event.target.files[0]" />
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
import { file } from '@babel/types'

export default {
    data(){
        return{
            form:{
                name:'',
                description:'',
                // image:'',
                type:'',
                quantity:'',
                price:0.00,
                // image:''
            }
        }
    },
    mounted(){

    },
    computed:{

    },
    methods:{
        // onChange(e){
        //     this.file = e.target.files[0]
        // },
        // getImage() {
        //     let image
        //     if(this.form.image){
        //         if(this.form.image.indexOf('base64') != -1){
        //             image = "/product-images/no-image"+this.form.image
        //         }else{
        //             image ='/product-images/no-image.png'
        //         }
        //     }
        //     console.log(image)
        //     return image
        // },
        // uploadImage (e)  {
        //     let file = e.target.files[0]
        //     this.form.image = file
        //     // let reader = new FileReader()
        //     // let limit = 1024 * 1024 * 2
        //     // if(file['size'] > limit){
        //     //     return false
        //     // }
        //     // reader.onloadend = (file) =>{
        //     //     console.log(reader.result)
        //     // }
            
        //     // reader.readAsDataURL(file)
        // },
        saveProduct(){
            console.log('triggered')
            // const config = {
            //     headers:{
            //         'content-type': 'multipart/form-data'
            //     }
            // }
            // const formData = new FormData()
            // formData.append('name',this.form.name)
            // formData.append('file',this.form.image)
            // formData.append('description',this.form.description)
            // // formData.append('image',this.form.image)
            // formData.append('type',this.form.type)
            // formData.append('quantity',this.form.quantity)
            // formData.append('price',this.form.price)
            this.axios.post("/api/addProduct",this.form)
            .then(response=>{
                console.log('success');
                this.form.name = ''
                this.form.description = ''
                // this.form.image = ''
                this.form.type = ''
                this.form.quantity = ''
                this.form.price = ''

                this.$router.push('/')
                toast.fire({
                    icon:"success",
                    title:"Product added successfully"
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