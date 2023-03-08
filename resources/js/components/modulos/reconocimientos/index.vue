<template>
    <div>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">
                            Reconocimientos
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="content container-fluid">
            <div class="card">
             
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="card card-info">
                            <div class="card-header" style="background-color: #e75097;">
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
                                        @click.prevent="getListRecognitions"
                                    >
                                        Buscar
                                    </button>
                                    <button
                                        class="btn btn-default ml-3"
                                        @click.prevent="limpiarBsq"
                                    >
                                        Limpiar
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card card-info">
                            <!-- <div class="card-header">
                                <h3 class="card-title">Resultados</h3>
                            </div> -->
                            <div class="card-body table-responsive">
                                <table
                                    class="table table-hover table-head-fixed text-nowrap"
                                >
                                    <thead>
                                        <tr class="d-flex">
                                            <th class="col text-center">
                                                Nombre colaborador
                                            </th>
                                            <th class="col text-center">
                                                Reconocido
                                            </th>
                                            <th class="col text-center">
                                                Mensaje
                                            </th>
                                            <th class="col text-center">
                                                Competencia
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(item,index) in listReconocimientos.data" :key="index" class="d-flex">
                                            <td v-text="item.name_collaborator" class="col text-center"></td>
                                            <div v-for="(colaborador,index) in listColaboradores" :key="index">
                                                <div v-if="colaborador.id==item.collaborator_id">
                                                    <td  v-text="colaborador.name" class="col text-center"></td>
                                                </div>
                                            </div>
                                            <td v-text="item.message" class="col text-center"></td>
                                            <td v-text="item.skills" class="col text-center"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="card-footer clearfix">

                                    <pagination v-if="pagination.last_page > 1" 
                                        :pagination="pagination" 
                                        :offset="7" 
                                        @paginate="getRecognitions()">
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

export default {
    data() {
        return {
            
            fillBsqUsuario: {
                sbusqueda: "",

            },
            listReconocimientos: [],
            listColaboradores:[],
            pagination: {
                current_page: 1,
                last_page :0
            },
        };
    },
    created(){
        this.getRecognitions();
    },

    methods: {
        limpiarBsq() {
            (this.fillBsqUsuario.sbusqueda = "")

        },
        limpiarRst() {
            this.listReconocimientos = [];
        },
        getListRecognitions() {
            if(this.fillBsqUsuario.sbusqueda == ""){
                window.location.reload();
            }
            var url = "administrador/reconocimientos/getListReconocimientos";
            axios
                .get(url, {
                    params: {
                        sbusqueda: this.fillBsqUsuario.sbusqueda,             
                    }
                })
                .then((response) => {
                    // this.inicializarPag();
                    // console.log(response);
                    this.listReconocimientos=response.data.recognitions;
                    this.listColaboradores=response.data.collaborators;
                    this.pagination.last_page=1;
                }).catch((error)=>{
                    this.listReconocimientos="";
                    this.listColaboradores="";
                    Vue.swal('No se encuentra reconocido','', 'error');
                });
        },
        getRecognitions() {
            var url = "administrador/reconocimientos/getReconocimientos?page="+this.pagination.current_page;
            // var url = 'administrador/colaboradores/getColaboradores?page='+this.pagination.current_page;
            axios.get(url).then((response) => {

                    this.listReconocimientos=response.data.recognitions;
                    this.listColaboradores=response.data.collaborators;
                    this.pagination.last_page=response.data.recognitions.last_page
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
}</style>
