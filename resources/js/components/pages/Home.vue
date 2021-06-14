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

      <ul class="d-flex justify-content-center">
          <li v-for="page in pagination.last_page" :key="page" class="py-2 px-2 ">
            <button @click="doPagination(page);" class="btn btn-primary">{{ page }}</button>
          </li>
      </ul>
  </div>
</template>

<script>

import axios from '../../request';

export default({
  data() {
    return { 
      products: [],
      pagination: {}
    }
  },

  created() {
    this.getProducts();
  },

  methods: {
    getProducts(paginate = 1) {
      axios.get(`products?page=${paginate}`)
        .then((response) => {
          this.products = response.data.data;
          this.makePagination({ ...response.data.meta, ...response.data.links })
        }).catch((e) => {
          console.log(e);
        });
    },

    showProduct(productSlug) {
      this.$router.push({ name: 'product.show', params: { slug: productSlug } });
    },

    makePagination(data) {
      this.pagination = data;
    },

    doPagination(page) {
        this.getProducts(page);
    },
  },
})
</script>

<style scoped>
  ul {
      list-style-type: none;
  }

  .active {
    background: red;
  }
</style>