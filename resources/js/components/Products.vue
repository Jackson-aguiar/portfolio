<template>
<div class="row row-cols-1 row-cols-md-3">
    <div class="col mb-4" v-for="product in products" :key="product.id">
        <div class="card h-100" >
        <svg
            class="bd-placeholder-img card-img-top"
            width="100%"
            height="180"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="xMidYMid slice"
            focusable="false"
            role="img"
            aria-label="Placeholder: Image cap"
        >
            <title>Placeholder</title>
            <rect width="100%" height="100%" fill="#868e96"></rect>
            <text x="50%" y="50%" fill="#dee2e6" dy=".3em"></text>
        </svg>
        <div class="card-body">
            <h5 class="card-title lead text-center">{{product.name}}</h5>
            <p class="card-text font-weight-light">{{product.description}}</p>
        </div>
        <div class="card-footer">
            <div class="row">
            <p class="card-text text-success font-weight-light ml-3">
                R$ {{product.price}}
            </p>
            </div>
            <div class="container mt-3">
            <div class="container">
                <div class="row justify-content-center">
                <a
                    v-on:click="productDetail(product.url)"
                    class="btn btn-sm btn-primary text-light m-2 col-9"
                >
                    <i class="fal fa-info-circle mr-2"></i>Ver Detalhes
                </a>
                </div>
                <div class="row justify-content-center">
                <form
                    class="form-inline"
                    action="{route('cart_products.store')}"
                    method="POST"
                >
                    <input type="hidden" name="id" :id="product.id" />
                    <button
                    class="btn btn-sm btn-primary text-light btn-block col-12"
                    >
                    <i class="fas fa-cart-plus mr-2"></i>Adicionar ao Carrinho
                    </button>
                </form>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
</template>
<script>
    export default{
        data () {
            return {
                products: []
            }
        },
        mounted () {
            this.loadProducts();
        },
        methods: {
            loadProducts () {
                axios.get('/api/shop/products-list')
                .then((response) => {
                    this.products = response.data.data;
                })
                .catch(function(error){
                    console.log(error);
                })
            },
            productDetail (props) {
                axios.get('/api/shop/product-detail/' + props)
                .then((response) => {
                    console.log('resposta ' + response.data.price);
                })
                .catch(function(error){
                    console.log('error' + error);
                });
            }
        }
    }
</script>
