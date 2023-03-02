<template>
    <div>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">
                            Colaboradores
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
                            <div class="card-header">
                                <h3 class="card-title">Importa un archivo excel</h3>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-group-row">
                                        <h3></h3>
                                    </div>
                                
                                    <div class="form-group-row">
                                        <div class="col-sm-10">
                                            <input type="file" id="file" ref="file" v-on:change="handleFileUpload()" accept=".XLSX, .CSV" class="form-control">
                                        </div>
                                    </div>
                                
                                    <br>
                                
                                    <button @click.prevent="EventSubir" class="btn btn-primary">Subir</button>
                                </form>
                               
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            file: ''
        }
    },
    methods: {
        // showAlert(data) {
        // // Use sweetalert2
        //     this.$swal(data);
        // },
        EventSubir(){
            let formData = new FormData();
            formData.append('file', this.file);
            axios.post( '/import-excel-collaboradores',
                    
                    formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then((response) => {
                   
                    Vue.swal(response.data,'', 'success');
                })
                .catch(function(){
                    // showAlert("Error al subir archivo");
                    Vue.swal("Error al subir archivo");
                });
        },
        handleFileUpload(){
            this.file = this.$refs.file.files[0];
        },
        

    }
};
</script>

<style lang="scss" scoped></style>
