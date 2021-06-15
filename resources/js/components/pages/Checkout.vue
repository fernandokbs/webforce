<template>
  <div class="container">
    <h2 class="text-center mt-5 mb-5">Checkout</h2>

    <div class="row justify-content-center">
      <div class="col-sm-5">
          <div class="card">
            <div class="card-body">
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input v-model="form.name" type="text" class="form-control" id="name" placeholder="Name">
              </div>

              <div class="mb-3">
                <label for="name" class="form-label">Address</label>
                <input v-model="form.address" type="text" class="form-control" id="name" placeholder="Name">
              </div>

              <div class="mb-3">
                <label for="contry" class="form-label">State</label>
                <input v-model="form.state" type="text" class="form-control" id="contry " placeholder="State">
              </div>

              <div class="mb-3">
                <label for="contry" class="form-label">Country</label>
                <input v-model="form.country" type="text" class="form-control" id="contry " placeholder="Country">
              </div>

              <div class="mb-3">
                <label for="contry" class="form-label">Credit Cart</label>
                <input v-model="form.credit_card" type="text" class="form-control" id="contry " placeholder="Credit Cart">
              </div>

              <div class="mb-3">
                <label for="contry" class="form-label">Credit Cart expiration</label>
                <input v-model="form.credit_card_expiration" type="text" class="form-control" id="contry " placeholder="Credit Cart">
              </div>

              <div class="mb-3">
                <label for="contry" class="form-label">CVV</label>
                <input v-model="form.card_cvv" type="text" class="form-control" id="contry " placeholder="cv">
              </div>

              <div class="mb-3">
                <div class="row justify-content-center">
                  <div class="col-sm-12 d-grid gap-2">
                    <button @click="createOrder" class="btn btn-primary">Save order</button>
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

import axios from '../../request';

export default {
  data() {
    return {
      form: {
        name: '',
        address: '',
        state: '',
        country: '',
        credit_card: '',
        credit_card_expiration: '',
        card_cvv:''
      }
    }
  },

  methods: {
    createOrder() {
      axios.post('orders', this.form)
        .then((response) => {
          console.log(response);
        }).catch((e) => {
          console.log(e);
        })
    }
  }
}
</script>

<style>

</style>