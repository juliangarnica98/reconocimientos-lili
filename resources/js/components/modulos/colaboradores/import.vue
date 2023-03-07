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
        <div class="content container-fluid d-flex justify-content-center">
           
            <div class="card col-sm-9 ">
                <div class="card-body ">
                    <div class="container-fluid">
                        <div class="card card-info">
                            <div class="card-header" style="background-color: #e75097;">
                                <h3 class="card-title">Importa un archivo excel</h3>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-group-row">
                                        <h3></h3>
                                    </div>
                                
                                    <div class="row">
                                        <div class="col-sm-8" >
                                            <input type="file" id="file" ref="file" v-on:change="handleFileUpload()" accept=".XLSX, .CSV" class="form-control">
                                        </div>
                                        <div class="col-md-4" >
                                            <div class="d-grid gap-2 mx-auto">
                                                <button @click.prevent="EventSubir" class="btn btn-primary">Subir</button>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <br>
                                    
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
                    console.log(response);
                    if (response.data.error) {
                        Vue.swal(response.data.error,'', 'error');
                    }else if(response.data.success){
                        
                        Vue.swal(response.data.success,'', 'success');
                        setTimeout(function(){
                            window.location.reload();
                        }, 3000);
                    }
                    
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

<style lang="scss" scoped>
.btn{
    width: 100%;
}
.btn-primary{
    background-color: #e75097;
    color: #fff;
}
.btn-primary:hover{
    background-color:#ce84a6 ;
    border-color: #ce84a6 ;
}
</style>
