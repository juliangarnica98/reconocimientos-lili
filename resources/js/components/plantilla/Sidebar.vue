<template>
    <div>
        <aside class="main-sidebar elevation-0 bg-black">
            <!-- Brand Logo -->
            <a href="/dashboard" class="brand-link text-decoration-none">
                <!-- <img
                    :src="ruta + '/img/AdminLTElogo.png'"
                    alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3"
                    style="opacity: 0.8"
                /> -->
                <span class="brand-text font-weight-succes">WOW Reconocimientos</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img
                            :src="ruta + '/img/avatar.png'"
                            class="img-circle elevation-2"
                            alt="User Image"
                        />
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Administrador</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul
                        class="nav nav-pills nav-sidebar flex-column"
                        data-widget="treeview"
                        role="menu"
                        data-accordion="false"
                    >
                        <li class="nav-item">
                            <router-link :to="'/dashboard'" class="nav-link ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <!-- <i class="right fas fa-angle-left"></i> -->
                                </p>
                            </router-link>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>
                                    Administración
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Usuarios</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Roles</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Permisos</p>
                                    </a>
                                </li>
                            </ul>
                        </li> -->
                        <!-- <li class="nav-header">ADMINISTRACIÓN</li> -->

                        <!-- <li class="nav-item">
                            <router-link :to="'/usuarios'" class="nav-link">
                                <i class="nav-icon fas fa-columns"></i>
                                <p>Usuaios</p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="'/reportes'" class="nav-link">
                                <i class="nav-icon fas fa-columns"></i>
                                <p>Roles</p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="'/reportes'" class="nav-link">
                                <i class="nav-icon fas fa-columns"></i>
                                <p>Permisos</p>
                            </router-link>
                        </li> -->
                        <li class="nav-header">ACCIONES</li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <!-- <i class="nav-icon far fa-envelope"></i> -->
                                <i class=" nav-icon fas fa-users"></i>
                                <p>
                                    Colaboradores
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link
                                        :to="'/colaboradores'"
                                        class="nav-link"
                                    >
                                        <!-- <i class="nav-icon far fa-image"></i> -->
                                        <i class="nav-icon fas fa-user-check"></i>
                                        <p>Ver colaboradores</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link
                                        :to="'/importar-colaboradores'"
                                        class="nav-link"
                                    >
                                        <!-- <i class="nav-icon far fa-image"></i> -->
                                        <i class="nav-icon fas fa-file-import"></i>
                                        <p>Importar colaboradores</p>
                                    </router-link>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="nav-item">
                            <router-link
                                :to="'/reconocimientos'"
                                class="nav-link"
                            >
                                <!-- <i class="nav-icon fas fa-columns"></i> -->
                                <i class="nav-icon fas fa-trophy"></i>
                                <p>Reconocimientos</p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="'/reportes'" class="nav-link">
                                <!-- <i class="nav-icon fas fa-columns"></i> -->
                                <!-- <i class="nav-icon fa-light fa-folder-open"></i> -->
                                <i class="nav-icon far fa-folder-open"></i>
                                <p>Reportes</p>
                            </router-link>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
    </div>
</template>

<script>
export default {
    props: ["ruta"],
};
</script>

<style lang="scss" scoped>
.bg-black{
    background-color: black;
}
</style>
