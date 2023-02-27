<template>
    <div>
        <template v-if="message.success">
            <el-alert
                title="¡Bien hecho!"
                type="success"
                description="more text description"
                effect="dark"
                show-icon>
            </el-alert>
        </template>
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
                        <router-link class="btn btn-info btn-sm" :to="'/usuarios'">
                            <i class="fas fa-plus-square"></i> Usuarios
                        </router-link>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Crear nuevo usuario</h3>
                            </div>
                            <div class="card-body">
                                <form >
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="col-md-3 col-form-label">Nombre</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" v-model="fillUsuario.sNombre"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label  for="col-md-3 col-form-label">Correo</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" v-model="fillUsuario.sCorreo"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label  for="col-md-3 col-form-label">Contraseña</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" v-model="fillUsuario.sContraseña"/>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <div class="row d-flex justify-content-center">
                                    <button  class="btn btn-info" @click.prevent="setCreateUser">
                                        Crear
                                    </button>
                                    <button class="btn btn-default ml-3" @click.prevent="limpiarBsq">
                                        Limpiar
                                    </button>
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
            fillUsuario: {
                sNombre: "",
                sCorreo: "",
                sContraseña: "",
            },
            message:{
                success:0,
                error:"",
            }
           
        };
    },
    computed:{
       
    },
    methods: {
        limpiarBsq() {
            (this.fillUsuario.sNombre = ""),
            (this.fillUsuario.sCorreo = ""),
            (this.fillUsuario.sContraseña = "");
        },
        setCreateUser(){
            axios.post('administrador/crearUsuarios',{
                
                sNombre: this.fillUsuario.sNombre, 
                sCorreo: this.fillUsuario.sCorreo,
                sContraseña : this.fillUsuario.sContraseña,
            }).then((response)=>{
                
                if (response.data.success) {
                    // ElNotification({
                    //     title: 'Success',
                    //     message: 'This is a success message',
                    //     type: 'success',
                    // });
                    this.message.success=1;
                    this.limpiarBsq();
                } else if(response.data.error) {
                    // ElNotification({
                    //     title: 'Error',
                    //     message: 'This is an error message',
                    //     type: 'error',
                    // })
                    
                }
                // console.log(response.data.error.length);
               
            })
            
        }

    },
};
</script>

<style lang="scss" scoped></style>
