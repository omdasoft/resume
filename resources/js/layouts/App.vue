
<template>
  <div>
    <header-component></header-component>
    <div class="container sections-wrapper">
      <div class="row">
        <div class="primary col-lg-8 col-12">
          <router-view></router-view>
        </div>
        <!--sidebar-->
        <div class="secondary col-lg-4 col-12">
          <sidebar-component></sidebar-component>
        </div>
        <!--//sidebar-->
      </div>
    </div>
    <footer-component></footer-component>
  </div>
  
</template>