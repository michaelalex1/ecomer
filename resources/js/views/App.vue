<template>
    <div>
        
        <div class="app-sidebar colored">
                    <div class="sidebar-header">
                        <a class="header-brand" href="index.html">
                           
                            <span class="text">VSON</span>
                        </a>
                        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
                        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                    </div>
                     <div class="sidebar-content">
                        <div class="nav-container">
                            <nav id="main-menu-navigation" class="navigation-main">
                                
                                <div class="nav-lavel"><i class="ik ik-truck"></i>   PANEL</div>
                                <div class="nav-item has-sub">
                                    <a href="#"><i class="ik ik-align-justify"></i><span>Producto</span></a>
                                    <div class="submenu-content">
                                        <router-link :to="{ name: 'ListCategory' }" class="menu-item">
                                             Listado
                                         </router-link>
                                        <router-link :to="{ name: 'ListProduct' }" class="menu-item">
                                            Listado producto
                                        </router-link>  
                                         
                                    </div>
                                </div>
                                <div class="nav-item has-sub">
                                    <a href="#"><i class="ik ik-user-check"></i><span>Usuario</span></a>
                                    <div class="submenu-content">
                                        <router-link :to="{ name: 'ListCategory' }" class="menu-item">
                                             Listado
                                         </router-link>
                                        <router-link :to="{ name: 'ListProduct' }" class="menu-item">
                                            Listado producto
                                        </router-link>  
                                         
                                    </div>
                                </div>
                                
                               
                                
                            </nav>
                        </div>
                    </div>
                   

                </div>
                <div class="main-content">
                    
                    <div class="container-fluid">
                       
                        <div class="row">
                            <div class="col-md-12">
                               
                               
                                <router-view></router-view>

                            </div>
                        </div>
                    </div>
                </div>
              

                <footer class="footer">
                    <div class="w-100 clearfix">
                        <span class="text-center text-sm-left d-md-inline-block">Copyright © 2020</span>
                      
                    </div>
                </footer>

    </div>
</template>
<script>
    export default {}
</script>

<style>

   nav li:hover,
   nav li:active{
      background-color: indianred;
      cursor: pointer;
    }

</style>
