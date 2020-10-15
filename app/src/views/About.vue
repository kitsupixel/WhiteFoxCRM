<template>
  <div class="about">
    <h1>This is an about page</h1>
    <div v-if="isLoading">
      Fechting data...
    </div>
    <div v-else>{{ body }}</div>
  </div>
</template>

<script>
// @ is an alias to /src

export default {
  name: 'Aboute',
  data() {
    return {
      isLoading: true,
      body: ""
    };
  },
  methods: {
    getHello() {
      const inst = this;
      this.$http.get("/api/hello").then((response) => {
        inst.body = response.data;
        inst.isLoading = false;
        console.log(response.data);
      })
    }
  },
  mounted() {
    this.getHello()
  }

}
</script>
