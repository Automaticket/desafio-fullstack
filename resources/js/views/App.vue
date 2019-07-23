<template>
<div>
<!-- Site wrapper -->
<div class="wrapper" v-if="!$route.meta.plainLayout">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Atk</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Automaticket</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span>Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <p>
                  Alexander Pierce - Web Developer
                  <small>Automaticket</small>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sair</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <aside class="main-sidebar">
    <section class="sidebar">

      <ul class="sidebar-menu" data-widget="tree">

        <li><a href="#">Dashboard</a></li>
        <li><a href="#">Usuários</a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>


  <div class="content-wrapper">

    <router-view></router-view>

  </div>


  <footer class="main-footer">
    <strong>Desafio fullstack - Automaticket</strong>
  </footer>
</div>

<div v-if="$route.meta.plainLayout">
  <router-view></router-view>
</div>
</div>
<!-- ./wrapper -->
</template>
