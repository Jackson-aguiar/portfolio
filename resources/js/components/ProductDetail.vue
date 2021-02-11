<template>
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em"></text></svg>
            </div>
            <div class="col">
                <div class="row lead d-flex justify-content-center">

                </div>
                <hr/>
                <div class="row">
                    <h3 class="font-weight-normal"> R$ {{}} </h3>
                </div>
                <hr/>
                <div class="row font-weight-light">
                    {{}}
                </div>
                <div class="row my-3 d-flex justify-content-center">
                    <form class="form-inline" action="" method="POST">
                        <input type="hidden" name="id" value="{{}}">
                            <button class="btn btn-sm btn-primary text-light btn-block">
                                <i class="fas fa-cart-plus mr-2"></i>Adicionar ao Carrinho
                            </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data () {
        return {
            product: []
        }
    },
    mounted () {
        this.loadProduct()
    },
    methods: {
        loadProduct () {
            axios.post('/api/shop/product-detail', {
                url: '-'
            })
            .then((response) => {
                this.product = response.data.data;
                console.log(this.product);
            })
            .catch(function(error){
                console.log(error);
            });
        }
    }
}
</script>
