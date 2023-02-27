<template>
    <div>
        <Navbarpage></Navbarpage>
        <!-- <div class="scroll"> -->
        <div>
            <div class="content">
                <transition name="slide-fade" mode="in-out">
                    <router-view></router-view>
                </transition>
            </div>
        </div>
        <!-- <div>
            <div class="contenedor" >
                <div class="container">
                    <div class="content-header pt-5">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0">Reconocimientos</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content container-fluid">
                        <div class="card">
                        
                            <router-link class="btn btn-info btn-sm" :to="'/registrar-reconocimiento'">
                                <i class="fas fa-plus-square"></i> Registrar un reconocimiento
                            </router-link>
                          
                        </div>
                    </div>
                   
                </div>
            </div>
        </div> -->
        <Footerpage></Footerpage>
        <!-- </div> -->
    </div>
</template>

<script>
import Navbarpage from "./principal/Navbar.vue";
import Footerpage from "./principal/Footer.vue";
import Contentpage from "./principal/index.vue";

export default {
    components: { Navbarpage, Footerpage, Contentpage },
};
</script>

<style lang="scss" scoped>
body {
    margin: 0;
    padding: 0;
}
.scroll {
    max-height: 60vh;
    overflow-y: auto;
}
*::-webkit-scrollbar {
    width: 6px;
    height: 6px;
}
*::-webkit-scrollbar-track {
    background: #e85199;
}
*::-webkit-scrollbar-thumb {
    background-color: #818181;
    border-radius: 20px;
    border: 3px solid transparent;
}
</style>
