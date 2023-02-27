<template>
    <div>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Usuarios</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="content container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <router-link class="btn btn-info btn-sm" :to="'/usuarios/create'">
                            <i class="fas fa-plus-square"></i> Nuevo usuario
                        </router-link>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Búsqueda</h3>
                            </div>
                            <div class="card-body">
                                <form role="form">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label
                                                    for="col-md-3 col-form-label"
                                                    >Nombre</label
                                                >
                                                <div class="col-md-9">
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        v-model="
                                                            fillBsqUsuario.sNombre
                                                        "
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
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
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <div class="row d-flex justify-content-center">
                                    <button
                                        class="btn btn-info"
                                        @click.prevent="getListUsuarios"
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
                            <div class="card-header">
                                <h3 class="card-title">Resultados</h3>
                            </div>
                            <div class="card-body table-responsive">
                                <table
                                    class="table table-hover table-head-fixed text-nowrap"
                                >
                                    <thead>
                                        <tr>
                                            <th class="col text-center">
                                                Nombre
                                            </th>
                                            <th class="col text-center">
                                                Correo
                                            </th>
                                            <th class="col text-center">
                                                Estado
                                            </th>
                                            <th class="col text-center">
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(item,index) in listUsuaiosPag" :key="index">
                                            <td v-text="item.name" class="col text-center"></td>
                                            <td v-text="item.email" class="col text-center"></td>
                                            <td class="col text-center">
                                                <template v-if="item.state=='A'">
                                                    <span class="badge badge-success" v-text="item.state"></span>
                                                </template>
                                                <template v-if="item.state=='I'">
                                                    <span class="badge badge-success" v-text="item.state"></span>
                                                </template>
                                            </td>
                                            <td class="col">
                                                <router-link
                                                    class="btn btn-primary btn-sm btn-with-25"
                                                    :to="'/'"
                                                >
                                                    <i
                                                        class="fas fa-folder"
                                                    ></i>
                                                    Ver
                                                </router-link>
                                                <router-link
                                                    class="btn btn-info btn-sm btn-with-25"
                                                    :to="'/'"
                                                >
                                                    <i
                                                        class="fas fa-pencil-alt"
                                                    ></i>
                                                    Editar
                                                </router-link>
                                                <router-link
                                                    class="btn btn-success btn-sm btn-with-25"
                                                    :to="'/'"
                                                >
                                                    <i class="fas fa-key"></i>
                                                    Permiso
                                                </router-link>
                                                <router-link
                                                    class="btn btn-danger btn-sm btn-with-25"
                                                    :to="'/'"
                                                >
                                                    <i class="fas fa-trash"></i>
                                                    Desactivar
                                                </router-link>
                                                <router-link
                                                    class="btn btn-success btn-sm btn-with-25"
                                                    :to="'/'"
                                                >
                                                    <i class="fas fa-check"></i>
                                                    Activar
                                                </router-link>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="card-footer clearfix">
                                    <ul
                                        class="pagination pagination-sm m-0 float-right"
                                    >
                                        <li class="page-item" v-if="pageNumber>0">
                                            <a href="" class="page-link" @click.prevent="prevPage">Ant</a>
                                        </li>
                                        <li class="page-item " v-for="(page,index) in pagelist" :key="index"
                                        :class="[page==pageNumber ? 'active':'']">
                                            <a href="" class="page-link" @click.prevent="selectPage(page)">{{ page+1 }}</a>
                                        </li>
                                        <li class="page-item" v-if="pageNumber < pageCount-1">
                                            <a href="" class="page-link" @click.prevent="nextPage">Sig</a>
                                        </li>
                                    </ul>
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
                sNombre: "",
                sCorreo: "",
                sEstado: "",
            },
            listUsuarios: [],
            listEstados: [
                { value: "A", label: "Activo" },
                { value: "I", label: "Inactivo" },
            ],
            pageNumber:0,
            perPage:5
        };
    },
    computed:{
        pageCount(){
            let a = this.listUsuarios.length,
                b = this.perPage;
            return Math.ceil(a/b);
        },
        listUsuaiosPag(){
            let inicio = this.pageNumber*this.perPage;
            let    fin    = inicio+this.perPage;
            return this.listUsuarios.slice(inicio,fin);
        },
        pagelist(){
            let a = this.listUsuarios.length,
                b = this.perPage,
                c = Math.ceil(a/b),
                count = 0,
                pagesArray = [];
            while (count < this.pageCount){
                pagesArray.push(count);
                count++;
            }
            return pagesArray;
        }
    },
    methods: {
        limpiarBsq() {
            (this.fillBsqUsuario.sNombre = ""),
            (this.fillBsqUsuario.sCorreo = ""),
            (this.fillBsqUsuario.sEstado = "");
        },
        limpiarRst() {
            this.listUsuarios = [];
        },
        getListUsuarios() {
            var url = "administrador/usuarios/getListUsuarios";
            axios
                .get(url, {
                    params: {
                        sNombre: this.fillBsqUsuario.sNombre,
                        sCorreo: this.fillBsqUsuario.sCorreo,
                        sEstado: this.fillBsqUsuario.sEstado,
                    },
                })
                .then((response) => {
                    this.inicializarPag();
                    this.listUsuarios=response.data;
                });
        },
        nextPage(){
            this.pageNumber++;
        },
        prevPage(){
            this.pageNumber--;
        },
        selectPage(page){
            this.pageNumber=page;
        },
        inicializarPag(){
            this.pageNumber = 0;
        }
    },
};
</script>

<style lang="scss" scoped></style>
