<template>
    <div class="container">
      
              

                    
        <div  class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            
            <div class="col mb-5" v-for="product in products" v-bind:key="product.id">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" v-bind:src="product.picture" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{ product.name }}</h5>
                            <!-- Product price-->
                            $ {{ product.unit_price }}
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
                    
        
</template>

<script>
    export default {
        mounted() {
            this.loadAllProducts()
        },data: function(){
            return {
                products: []
            }
        },
        methods:{
                loadAllProducts: function(){
                    //1st solution : Axios
                    //axios.get('api/products)
                    //.then(response =>{
                        //this.products = response.data
                    //})
                    //.catch(error => console.log(error))
                    //2nd solution : Fetch
                    fetch('/api/products').then(response => {response.json().then(data =>{
                        data.forEach(element =>{
                            this.products.push(element);
                        });
                        
                    })
                    }).catch(error => console.log(error));
                }
        }
       
    }
</script>
