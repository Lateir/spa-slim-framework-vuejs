<template>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-header">
        <p class card-text>{{ status }}</p>
      </div>
      <div class="card-body">
        <h5 class="card-title">{{ title }}</h5>
        <p class="card-text">{{ description }}</p>
      </div>
      <div class="card-footer">
        <p class="card-text">{{ count }}</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ServiceDetails",
  props: ["title", "description", "status", "count"]
}
</script>
