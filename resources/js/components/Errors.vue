<template>
  <div>
      <div v-if="errors.length" class="alert alert-danger" role="alert">
      <ul><li v-for="e in errors">{{ e }}</li></ul>
      </div>
  </div>
</template>

<script>
export default {
  props: ['parentErrors'],
  data() {
    return {
      errors: []
    }
  },

  created() {
    this.getErrors(this.parentErrors);
  },  

  methods: {
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