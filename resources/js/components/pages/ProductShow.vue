<template>
  <div class="row justify-content-center mt-5">
    <div class="col-sm-5">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{ product.name }}</h5>
          <p class="card-text">{{ product.description }}</p>
          <p class="text-right">created at: {{ product.created_at }}</p>
          <button @click="addToCart" class="btn btn-success">Add to card</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import axios from '../../request';

export default{
    data(){
      return {
        product: {}
      }
    },

    created() {
      this.getProduct();
    },

    methods: {
      getProduct() {
        axios.get(`products/${this.$route.params.slug}`)
          .then((response) => {
            this.product = response.data;
          }).catch((e) => {
            console.log(e);
          });
      },
      addToCart() {
        this.$store.dispatch('cart/addToCart', 1);
      }
    }
}
</script>
