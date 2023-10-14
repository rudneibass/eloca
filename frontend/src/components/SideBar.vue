<script lang="ts" setup>

</script>

<template>
  <div style="min-height: 100vh">
    
    <nav class="navbar navbar-expand-lg navbar-dark light-border-bottom ">
      <a class="navbar-brand d-flex align-items-center">
        <img  src="../assets/vue.svg" width="25"/> 
        &nbsp;&nbsp;
        <b>Admin</b>
      </a>
    </nav>

    <nav>
    <ul id="sidebar-menu" class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start">
      <li>
        <RouterLink to="/" class="nav-link align-middle px-0"> 
          <i class="fs-4 bi-house"></i>
          <span class="ms-1 d-none d-sm-inline">Cenário</span>
        </RouterLink>
      </li>

      <li>
        <RouterLink to="/company" class="nav-link align-middle px-0"> 
          <i class="fs-4 bi-grid"></i>
          <span class="ms-1 d-none d-sm-inline">Empresas</span>
        </RouterLink>
      </li>

      <li>
        <RouterLink to="/client" class="nav-link align-middle px-0"> 
          <i class="fs-4 bi-people"></i>
          <span class="ms-1 d-none d-sm-inline">Clientes</span>
        </RouterLink>
      </li>
      
    </ul>
  </nav>
  </div>
</template>

<style scoped>
 .light-border-bottom {
  border-bottom: 1px solid #a0a0a0b6;
  margin-bottom: 15px;
 }
 li{ 
    position: relative;
    width: 100%;
  }

 .nav-link::before {
    border-bottom: 17px solid transparent;
    border-right: 17px solid #ddd;
    border-top: 17px solid transparent;
    content: "";
    display: inline-block;
    opacity: 1;
    position: absolute;
    right: -16px;
    top: 7px;
    transition: opacity .15s ease-in;
}

#sidebar-menu li a i::before{
  color: #e2e0e0;
}

#sidebar-menu li a span{
  text-decoration: none;
  color: #f1f1f1;
  transition: all .3s ease;
}

#sidebar-menu li a i{
  margin-right: 1vw;
  transition: all .3s ease;
}


#sidebar-menu li a:hover span, 
#sidebar-menu li a:hover i::before{
  color: #cfcfcf;
}
</style>
