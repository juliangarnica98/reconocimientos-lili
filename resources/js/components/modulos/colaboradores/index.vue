<template>
    <div>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">
                            Colaboradores activos
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="content container-fluid">
            <div class="card">
                <!-- <div class="card-header">
                    <div class="card-tools">
                        <router-link class="btn btn-info btn-sm" :to="'/usuarios/create'">
                            <i class="fas fa-plus-square"></i> Nuevo usuario
                        </router-link>
                    </div>
                </div> -->
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="card card-info">
                            <div class="card-header"  style="background-color: #e75097;">
                                <h3 class="card-title">Búsqueda</h3>
                            </div>
                            <div class="card-body">
                                <form role="form">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                
                                                <div class="col-md-12">
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        v-model="
                                                            fillBsqUsuario.sbusqueda
                                                        "
                                                        placeholder="Buscar colaborador..."
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-4">
                                            <div class="form-group row">
                                                <label
                                                    for="col-md-3 col-form-label"
                                                    >Correo</label
                                                >
                                                <div class="col-md-9">
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        v-model="
                                                            fillBsqUsuario.sCorreo
                                                        "
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label
                                                    for="col-md-3 col-form-label"
                                                    >Estado</label
                                                >
                                                <div class="col-md-9">
                                                    <el-select
                                                        v-model="
                                                            fillBsqUsuario.sEstado
                                                        "
                                                        placeholder="Seleccione un estado"
                                                        clearable
                                                    >
                                                        <el-option
                                                            v-for="item in listEstados"
                                                            :key="item.value"
                                                            :label="item.label"
                                                            :value="item.value"
                                                        >
                                                        </el-option>
                                                    </el-select>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </form>
                                <div class="row d-flex justify-content-center">
                                    <button
                                        class="btn btn-info"
                                        @click.prevent="getListCollaborators"
                                    >
                                        Buscar
                                    </button>
                                    <button class="btn btn-default ml-3"
                                        @click.prevent="limpiarBsq">Limpiar</button>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="card card-info">
                            <div class="card-body table-responsive">
                                <table
                                    class="table table-hover table-head-fixed text-nowrap"
                                >
                                    <thead>
                                        <tr class="d-flex">
                                            <th class="col text-center">
                                                Nombre
                                            </th>
                                            <th class="col text-center">
                                                Documento
                                            </th>
                                            <th class="col text-center">
                                                Area
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(item,index) in listColaboradores.data" :key="index" class="d-flex">
                                            <td v-text="item.name" class="col text-center"></td>
                                            <td v-text="item.cedula" class="col text-center"></td>                                            
                                            <td  class="col text-center">
                                            <div v-for="(area,index) in listAreas" :key="index" >
                                                <div v-if="area.id==item.area_id">
                                                    {{ area.name }}
                                                </div>
                                            </div>
                                            </td> 
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="card-footer clearfix">
                                    <pagination v-if="pagination.last_page > 1" 
                                        :pagination="pagination" 
                                        :offset="7" 
                                        @paginate="getCollaborators()">
                                    </pagination>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
// import pagination from 'laravel-vue-pagination'
// Vue.component('pagination', require('laravel-vue-pagination'));

export default {
    data() {
        return {
            
            fillBsqUsuario: {
                sbusqueda: "",

            },
            listColaboradores: [],
            listAreas: [],
            pagination: {
                current_page: 1,
                last_page :0
            },
        };
    },
    created(){

        this.getCollaborators();
    },
    // computed:{
    //     pageCount(){
    //         let a = this.listColaboradores.length,
    //             b = this.perPage;
    //         return Math.ceil(a/b);
    //     },
    //     listColaboradoresPag(){
    //         let inicio = this.pageNumber*this.perPage;
    //         let    fin    = inicio+this.perPage;
    //         return this.listColaboradores.slice(inicio,fin);
    //     },
    //     pagelist(){
    //         let a = this.listColaboradores.length,
    //             b = this.perPage,
    //             c = Math.ceil(a/b),
    //             count = 0,
    //             pagesArray = [];
    //         while (count < this.pageCount){
    //             pagesArray.push(count);
    //             count++;
    //         }
    //         return pagesArray;
    //     },
    // },
    methods: {
        limpiarBsq() {
            (this.fillBsqUsuario.sbusqueda = "")

        },
        limpiarRst() {
            this.listColaboradores = [];
        },
        getListCollaborators() {
            if(this.fillBsqUsuario.sbusqueda == ""){
                window.location.reload();
            }

            var url = 'administrador/colaboradores/getListColaboradores';
            axios
                .get(url, {
                    params: {
                        sbusqueda: this.fillBsqUsuario.sbusqueda,
                                        
                    }
                })
                .then((response) => {
                    this.listColaboradores=response.data.collaborators;
                    this.listAreas=response.data.areas;
                    this.pagination.last_page=1;
                });
        },
        getCollaborators() {
            var url = 'administrador/colaboradores/getColaboradores?page='+this.pagination.current_page;
            axios.get(url).then((response) => {
                    console.log(response.data.collaborators.last_page);
                    this.listColaboradores=response.data.collaborators;
                    this.listAreas=response.data.areas;
                    this.pagination.last_page=response.data.collaborators.last_page
                });
            
        },
    },
};
</script>

<style lang="scss" scoped>



.btn-info{
    background-color: #e75097;
    border-color: #e75097 ;
    color: #fff;
}
.btn-info:hover{
    background-color:#ce84a6 ;
    border-color: #ce84a6 ;
}
</style>
