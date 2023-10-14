<template>
  <div class="card">
    <div class="card-header" style="border: none; background: #fff">
      <div
        class="container border-bottom d-flex flex-column jstify-content-center pt-3 pb-1"
      >
        <h3 class="text-muted mb-0">{{cardTitle}}</h3>
        <p class="text-muted" style="font-size: 1.1rem">{{shortDescription}}</p>
      </div>
    </div>
    <div class="card-body p-5 pt-4">
      <slot></slot>
    </div>
  </div>
</template>
<script lang="ts">
  export default {
    name: 'CustomCard',
    props: {
      cardTitle: {
        type: String,
        default: '',
      },
      shortDescription: {
        type: String,
        default: '',
      },
    },
  }
</script>
<style scoped>
.card{
  background-color: #fff;
    border: 0;
    border-radius: 12px;
    box-shadow: 0 6px 10px -4px rgba(0,0,0,.15);
    color: #252422;
    margin-bottom: 20px;
    padding-bottom: 2rem;
    position: relative;
}

.card-header-custom{
  height: 4rem;
  border: none;
  background-color: white;
}

</style>
