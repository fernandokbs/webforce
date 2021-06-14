<template>
  <li class="nav-item">
    <router-link :to="{ name: 'checkout' }" class="nav-link active">
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
  }
}
</script>

<style>

</style>