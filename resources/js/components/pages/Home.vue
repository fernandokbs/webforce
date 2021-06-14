<template>
  <div>
    <h2 class="text-center mt-5 mb-5">Products</h2>

    <div class="row">
      <div v-for="product in products" :key="product.id" class="col-sm-4 mb-4 d-flex justify-content-center">
        <div class="card" style="width: 18rem;">
          <img :src="product.thumbnail" class="card-img-top" alt="preview">
          <div class="card-body d-flex flex-column">
              <h5 class="card-title">{{ product.name }}</h5>
              <p class="card-text">{{ product.description }}</p>
              <button @click="showProduct(product.slug)" class="btn btn-primary mt-auto">See full product</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import axios from '../../request';

export default({
  data() {
    return { 
      products: []
    }
  },

  created() {
    this.getProducts();
  },

  methods: {
    getProducts() {
      axios.get('products')
        .then((response) => {
          this.products = response.data.data;
        }).catch((e) => {
          console.log(e);
        });
    },

    showProduct(productSlug) {
      this.$router.push({ name: 'product.show', params: { slug: productSlug } });
    }
  },
})
</script>
