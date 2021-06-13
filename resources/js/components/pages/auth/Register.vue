<template>
  <div class="row justify-content-center mt-5">
    <div class="col-sm-5">
      <div class="card">
        <div class="card-body">
          <div v-if="errors.length" class="alert alert-danger" role="alert">
            <ul>
              <li v-for="e in errors">{{ e }}</li>
            </ul>
          </div>

          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input v-model="form.name" type="text" class="form-control" id="name" placeholder="name">
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input v-model="form.email" type="email" class="form-control" id="email" placeholder="email">
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input v-model="form.password" type="password" class="form-control" id="password" placeholder="password">
          </div>

          <div class="mb-3">
            <label for="password_confirmation" class="form-label">Password confirmation</label>
            <input v-model="form.password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="password confirmation">
          </div>

          <div class="mb-3">
            <div class="row justify-content-center">
              <div class="col-sm-12 d-grid gap-2">
                <button @click="register" class="btn btn-primary btn-block">Login</button>
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
  data(){
    return {
      form: {
        name: '',
        email: '',
        password: '',
        password_confirmation: ''
      },
      errors: []
    }
  },

  methods: {
    register(){
      axios.post('/api/register', this.form)
        .then((response) => {
          this.$router.push({ path: 'login' });
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
