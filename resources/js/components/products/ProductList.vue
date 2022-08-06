<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-10 mb-2 text-end">
                <button class="btn btn-outline-success" @click="addProduct()">Add Product</button>
            </div>
        </div>
        <div class="col-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    Products
                </div>
                <div class="card-body">
                    <table class="table table-responsive table-bordered">
                        <thead>
                            <tr>
                                <!-- <td>Image</td> -->
                                <td>Name</td>
                                <td>Quantity</td>
                                <td>Type</td>
                                <td>Price</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody v-if="products.length > 0">
                            <tr  v-for="product in products" :key="product.id">
                                <!-- <td><img :src="productImage(product.image)" v-if="product.image"></td> -->
                                <td>{{ product.name }}</td>
                                <td>{{ product.quantity }}</td>
                                <td>{{ product.type }}</td>
                                <td>{{ product.price }}</td>
                                <td class="text-center d-flex justify-content-evenly">
                                   <button class="btn btn-outline-primary" @click="editProduct(product.id)">Edit</button>
                                   <button class="btn btn-outline-danger" @click="deleteProduct(product.id)">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                        <tbody v-else>
                             <td colspan="4" class="text-center">No Products</td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
<script>


export default{
    data(){
        return{
            products : []
        }
    },
    mounted(){
        this.getProducts()
    },
    methods:{
        addProduct(){
            this.$router.push('/product/create')
        },
        getProducts(){
            this.axios.get("/api/getProducts")
            .then(response=>{
                this.products = response.data.products
            })
            .catch(errors=>{
            })
        },
        editProduct(id){
            this.$router.push('/product/edit/'+id)
        },
        deleteProduct(id){
            Swal.fire({
                title:'Are you sure?',
                icon:"warning",
                showCancelButton:true,
                confimButtonText:'Yes, delete it!',
                timerProgressBar:true
            })
            .then(result=>{
                if(result.value){
                    this.axios.get(`/api/productDelete/${id}`)
                    .then(response=>{
                        Swal.fire(
                            'Deleted',
                            'Product successfully deleted',
                            'success'
                        )
                        this.getProducts()
                    })
                    .catch(error=>{
                        Swal.fire("Failed","Somethings wrong","Warning")
                     })
                }
            })
        }
    }
}
</script>