<template>
    <div>
        <Navbar :ruta="ruta"></Navbar>
        <Sidebar :ruta="ruta"></Sidebar>

        <div>
            <div class="content-wrapper">
                <transition name="slide-fade" mode="out-in ">
                    <router-view></router-view>
                </transition>
            </div>
        </div>

        <!-- <Content></Content> -->
        <Footer></Footer>
        <!-- Control Sidebar
        <aside class="control-sidebar control-sidebar-dark">
        </aside> -->
    </div>
</template>

<script>
import Navbar from "./plantilla/Navbar.vue";
import Sidebar from "./plantilla/Sidebar.vue";
import Footer from "./plantilla/Footer.vue";

export default {
    props: ["ruta"],
    components: { Navbar, Sidebar, Footer },
};
</script>

<style lang="scss" scoped></style>
