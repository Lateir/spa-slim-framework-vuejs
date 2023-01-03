<template>
  <div>
    <h1>Service List</h1>
    <div class="row">
      <ServiceDetails
        v-for="service in services"
        :title="service.title"
        :description="service.description"
        :key="service.id"
        :status="service.status"
        :count="service.count"
      />
    </div>
  </div>
</template>

<script>
import ServiceDetails from '../components/ServiceDetails.vue';

import axios from "axios"
export default {
  name: "Dashboard",
  components: {ServiceDetails},
  data() {
    return {
      services: []
    }
  },
  created: function () {
    axios
    .get('/api/services')
    .then(response => (this.services = response.data))
  }
}
</script>