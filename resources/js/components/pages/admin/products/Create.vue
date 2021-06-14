<template>
  <div class="container">
    <h2 class="text-center mt-5">Add new product</h2>
    <div class="row justify-content-center">
      <div class="col-sm-5">
        <div class="card">
        <div class="card-body">

            <div v-if="errors.length" class="alert alert-danger" role="alert">
              <ul>
                <li v-for="e in errors">{{ e }}</li>
              </ul>
            </div>

            <div class="mb-3">
              <label for="productName" class="form-label">Name</label>
              <input v-model="form.name" type="text" class="form-control" id="productName" placeholder="Soap">
            </div>

            <div class="mb-3">
              <label for="productDescription" class="form-label">Description</label>
              <textarea v-model="form.description" class="form-control" name="productDescription" id="" cols="30" rows="10"></textarea>
            </div>

            <div class="mb-3">
              <label for="productPrice" class="form-label">Price</label>
              <input v-model="form.price" type="text" class="form-control" id="productPrice" placeholder="Price">
            </div>

            <div class="mb-3">
              <label for="productThumbnail" class="form-label">Thumbnail</label>
              <input @change="uploadImage($event)" type="file" class="form-control" id="productThumbnail" placeholder="Price">
            </div>

            <div class="mb-3">
              <div class="row justify-content-center">
                <div class="col-sm-12 d-grid gap-2">
                  <button @click="submit" class="btn btn-primary">Login</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import axios from '../../../../request';

export default {
  data() {
    return {
      form: {
        name: '',
        description: '',
        price: '',
        thumbnail: ''
      },
      errors: []
    }
  },
  methods: {
    submit() {
      let formData = new FormData()
      formData.append('name', this.form.name);
      formData.append('description', this.form.description);
      formData.append('price', this.form.price);
      formData.append('thumbnail', this.form.thumbnail);

      axios.post('products', formData, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      })
        .then((response) => {
          this.$router.push({ name: "home" });
        }).catch((e) => {
          if(e.response.status === 422)
            this.getErrors(e.response.data.errors);
        });
    },

  uploadImage(e) {
    this.form.thumbnail = e.currentTarget.files[0];
  },

    getErrors(errors) {
        this.errors = [];
        Object.values(errors).forEach(value => {
            this.errors.push(value[0]);
        });
    }
  }
}
</script>

<style>

</style>