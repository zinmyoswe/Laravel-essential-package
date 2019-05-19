<template>
    <div class="row">
        <div class="col-md-8">
            <div v-for="product in products" v-bind:key="product.id" class="card card-body">
                <h4>{{product.name}}</h4>
                 <p>{{product.description}}</p>
                 <div class="row">
                     Stock {{product.amount}}
                     Rp. {{product.price}}
                 </div>
                 <p class="text-right mt-2">
                     <button @click="editProduct(product)" class="btn btn-outline-warning">Edit</button>
                     <button @click="deleteProduct(product.id)" class="btn btn-outline-danger">Delete</button>
                 </p>
            </div>
        </div>
        <div class="col-md-4">
            <form>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" v-model="product.name">
                </div>
                   <div class="form-group">
                    <label>Description</label>
                    <input type="text" class="form-control" v-model="product.description">
                </div>
                   <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" v-model="product.price">
                </div>
                   <div class="form-group">
                    <label>Amount</label>
                    <input type="text" class="form-control" v-model="product.amount">
                </div>
                <button v-if="add" @click.prevent="addProduct()" class="btn btn-outline-primary">Add</button>
                <button v-if="edit" @click.prevent="updateProduct(product.id)" class="btn btn-outline-warning">Add</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                products: [],
                product: {
                    id:'',
                    name:'',
                    description:'',
                    price:'',
                    amount:'',
                },
                add: true,
                edit: false
            }
        },
        created(){
            this.viewProduct();
        },
        methods: {
            viewProduct(){
                fetch('api/products')
                .then(res => res.json())
                .then(res =>{
                    this.products = res.data
                })
                .catch(err => console.log(err));
            },
            addProduct(){
                fetch('api/products',{
                    method : 'post',
                    body: JSON.stringify(this.product),
                    headers: {
                        'content-type':'application/json'
                    }
                })
                .then(res => res.json())
                .then(data =>{
                    alert('Product added');
                    this.viewProduct();
                })
                .catch(err => console.log(err));
            },
            editProduct(pro){
                this.add = false;
                this.edit = true;
                this.product.id = pro.id
                this.product.name = pro.name
                this.product.description = pro.description
                this.product.price = pro.price
                this.product.amount = pro.amount
            },
            updateProduct(id){
                fetch('api/products',{
                    method: 'put',
                    body: JSON.stringify(this.product),
                    headers: {
                        'content-type':'application/json'
                    }
                })
                .then(res => res.json())
                .then(data =>{
                    alert('product updated');
                    this.add =true;
                    this.edit = false;
                    this.viewProduct();
                })
                .catch(err => console.log(err));
            },
            deleteProduct(id){
                fetch('api/products/${id}',{
                    method: 'delete'
                })
                .then(res => res.json())
                .then(data =>{
                    alert('Product deleted');
                    this.viewProduct();
                })
                .catch(err => console.log(err));
            }

        }

    }
</script>