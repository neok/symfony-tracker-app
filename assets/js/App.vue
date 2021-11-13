<template>
  <div>
    <router-view>
      <home />
    </router-view>
  </div>
</template>

<script>
import Home from "./components/Home.vue";
export default {
  name: "App",
  components: {
    Home
  }
};
</script>

