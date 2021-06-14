<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarTogglerDemo01">
          <div>
            <router-link :to="{ name: 'home' }" class="navbar-brand">WebForce</router-link>
          </div>
          <div>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <template v-if="!isAuthenticated">
                <li class="nav-item">
                  <router-link :to="{ name: 'login' }" class="nav-link active">Login</router-link>
                </li>
                <li class="nav-item">
                  <router-link :to="{ name: 'register' }" class="nav-link active">Register</router-link>
                </li>
              </template>

              <template v-if="isAdmin">
                  <li class="nav-item">
                    <router-link :to="{ name: 'register' }" class="nav-link active">Productos</router-link>
                  </li>
              </template>

              <cart></cart>

              <li v-if="isAuthenticated" class="nav-item">
                <a @click="logout" href="#" class="nav-link active">Logout</a>
              </li>
            </ul>
          </div>
        </div>
    </div>
  </nav>
</template>
<script>

import Cart from './Cart.vue';
import { mapGetters } from 'vuex'

export default ({
  components: {
    Cart
  },
  data() {
    return {
      
    }
  },

  methods: {
    logout() {
      localStorage.removeItem('access_token');
      this.$store.dispatch('auth/logout');
      this.$router.push({ name: "login" });
    }
  },

  computed: {
    ...mapGetters({
      isAuthenticated: 'auth/isAuthenticated',
      isAdmin: 'auth/isAdmin'
    })
  }
})
</script>
