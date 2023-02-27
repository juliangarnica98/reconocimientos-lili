<template>
    <div>
        <div class="contenedor mt-5">
            <!-- <div class="container">

                <div class="row d-flex justify-content-center">
                    <img
                        :src="image1"
                        class="img-fluid mt-5 w-100"
                        alt="Responsive image"
                    />
                </div>
            </div> -->
            <div class="">
                <img
                    :src="image1"
                    class="img-fluid mt-5 w-100"
                    alt="Responsive image"
                />
            </div>
            <div class="">
                <img
                    :src="image2"
                    class="img-fluid mt-5 w-100"
                    alt="Responsive image"
                />
            </div>

            <div class="d-flex justify-content-center text-center pb-5 mb-5">
                <router-link :to="'/registrar-reconocimiento'">
                    <img
                        :src="btn_wow"
                        class="img-fluid mt-5 w-50"
                        alt="Responsive image"
                    />
                </router-link>
            </div>

            <!-- <div class="container">
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
                            <div class="card-header">
                                <div class="card-tools">
                                   
                                    <img
                                        class="w-100"
                                        v-bind:src="
                                            require('../../../../public/images/ejemplo.jpg')
                                        "
                                        alt=""
                                    />
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="container-fluid">
                                    <div class="card card-info">
                                        <form>
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    Registra un reconocimiento
                                                </h3>
                                            </div>
                                            <div id="reconocimiento_detail1" v-if="activePhase == 1">
                                              
                                                <div class="card-footer">
                                                    <div  class="row d-flex justify-content-center">
                                                        
                                                        <router-link
                                                        class="btn btn-danger btn-sm btn-with-25"
                                                        :to="'/registrar-reconocimiento'"
                                                    >
                                                        <i class="fas fa-trash"></i>
                                                        Desactivar
                                                    </router-link>
                                  
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div> -->
        </div>
        <!-- <div class="container">
                <div class="col-md-6">
                    <img src="img-fluid " :src="image1"  alt="">
                </div>
            </div> -->
    </div>
</template>

<script>
export default {
    data() {
        return {
            image1: "./images/Banner.jpg",
            image2: "./images/competencias.jpg",
            btn_wow: "./images/btn-wow.png",
            activePhase: 1,
            area: "",
            competencia: "Comunicamos e Inpiramos",
            listAreas: [
                { value: "Cedi", label: "Cedi" },
                { value: "Administrativo", label: "Administrativo" },
                { value: "Tienda", label: "Tienda" },
            ],
            listCompetencias: [
                {
                    value: "Comunicamos e Inpiramos",
                    label: "Comunicamos e Inpiramos",
                },
                { value: "Ganamos en equipo", label: "Ganamos en equipo" },
                {
                    value: "Pasión por los resultados",
                    label: "Pasión por los resultados",
                },
            ],
        };
    },
    methods: {
        nextStep(step) {
            this.activePhase = step;
        },
        prevStep(step) {
            this.activePhase = step;
        },
    },
};
</script>

<style lang="scss" scoped>
.contenedor {
    background-color: #fff;
}
</style>
