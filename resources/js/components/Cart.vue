<template>
  <li class="nav-item">
    <router-link :to="{ name: 'checkout' }" class="nav-link active">
        <i class="bi bi-cart"></i> {{ getItemsInCart }}
    </router-link>
  </li>
</template>

<script>
export default {
  methods: {
    
  },
  computed: {
    getItemsInCart() {
      return this.$store.getters['cart/getCart'].length;
    }
  }
}
</script>

<style>

</style>