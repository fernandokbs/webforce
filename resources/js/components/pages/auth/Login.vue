<template>
  <div class="row justify-content-center mt-5">
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          
          <div v-if="errors.length" class="alert alert-danger" role="alert">
            <ul>
              <li v-for="e in errors">{{ e }}</li>
            </ul>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input v-model="form.email" type="email" class="form-control" id="email" placeholder="name@example.com">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input v-model="form.password" type="password" class="form-control" id="password" placeholder="password">
          </div>

          <div class="mb-3">
            <div class="row justify-content-center">
              <div class="col-sm-5 d-grid gap-2">
                <button @click="login" class="btn btn-primary btn-block">Login</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import axios from '../../../request';

export default({
  data() {
    return {
      form: {
        email: 'admin@gmail.com',
        password: 'testroot',
      },
      errors: []
    }
  },

  methods: {
    login() {
      axios.post('/api/login', this.form)
        .then((response) => {
          localStorage.setItem('access_token', response.data.token);
          this.$router.push({ name: "home" });
        }).catch((e) => {
          if(e.response.status === 422)
            this.getErrors(e.response.data.errors);
        });
    },

    getErrors(errors) {
        this.errors = [];
        Object.values(errors).forEach(value => {
            this.errors.push(value[0]);
        });
    }
  }
})
</script>
