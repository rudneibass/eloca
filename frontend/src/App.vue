<script setup lang="ts">
  import NavBar from './components/NavBar.vue'
  import SideBar from './components/SideBar.vue'
  import FooterMain from './components/FooterMain.vue'
  import { RouterView } from 'vue-router'
</script>

<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-2  bg-dark">
        <SideBar />
      </div>
      <div class="col-10">
        <NavBar />
          <main>
              <RouterView />
          </main>
        <FooterMain />
      </div>
    </div>
  </div>
 
</template>

<style scoped>
 .col-10{
    margin: 0;
    padding: 0;
    background-color: #F4F3EF;  
    min-height: 100vh;
    position: relative;
    }
  main {
    padding: 30px;
    padding-bottom: 150px;
    
    overflow: overlay; 
  }
</style>
