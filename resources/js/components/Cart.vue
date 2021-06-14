<template>
  <li class="nav-item">
    <router-link @click="redirectToCheckout" :to="{ name: 'checkout' }" class="nav-link active">
        <i class="bi bi-cart"></i> {{ getItemsInCart.length }}
    </router-link>
  </li>
</template>

<script>

import { mapGetters } from 'vuex'

export default {
  computed: {
    ...mapGetters({
      getItemsInCart: 'cart/getCart'
    })
  },
  methods: {
    redirectToCheckout() {
      this.$router.push({ name: "checkout" });
    }
  }
}
</script>

<style>

</style>