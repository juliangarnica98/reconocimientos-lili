<template>
    <div>
        <div>
            <div class="contenedor pt-3" >
                    <div class="content-header pt-5">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h1 class="m-0 text-center"></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="">
                
                            
                            <div class="card-body pt-5 box">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-8 ">
                                        <div class="container-fluid">

                                            <h4 class="text-center"> 
                                                <strong> ¡Es momento de reconocer!</strong>
                                            </h4>
                                            <div class="card card-info">
                                            
                                                <form>
                                                    <!-- <div class="card-header">
                                                        <h3 class="card-title">
                                                            
                                                        </h3>
                                                    </div> -->
                                                    <div id="reconocimiento_detail1" v-if="activePhase == 1">
                                                        <div class="card-body">
                                                            <div class="row d-flex justify-content-center">
                                                                <div class="col-md-8 pt-2">
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 col-form-label">Ingresa tu cedula</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" v-model="cedula" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 col-form-label">Nombre</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" v-model="nombre_colaborador" readonly/>
                                                                        </div>
                                                                    </div>
                                                                    <!-- <input type="text" v-model="val_cedula"> -->
                                                                </div>
                                                                <div class="col-md-4 text-center">
                                                                    <img class="w-50 card-img-top" v-bind:src="image2"  alt=""/>
                                                                </div>
                                                             
                                                            </div>
                                                 
                                                        </div>
                                                        <div class="card-footer">
                                                            <div  class="row d-flex justify-content-center">
                                                                <button class="btn btn-info" @click.prevent="setColaborador">
                                                                    Buscar
                                                                </button>
                                                                <button class="btn btn-default ml-5" @click.prevent="nextStep(2)">
                                                                    Siguiente
                                                                </button>
                                          
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="reconocimiento_detail2" v-if="activePhase == 2">
                                                        <div class="card-body">
                                                            <div class="row d-flex justify-content-center" >
                                                                <div class="col-md-8 pt-2">
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 col-form-label">Area</label>
                                                                        <div class="col-md-9">
                                                                            <el-select v-model="area" @change="onChange($event)"  placeholder="Seleccione un area" clearable >
                                                                                <el-option v-for="item in listAreas" :key="item.value" :label="item.label" :value="item.value">
                                                                                </el-option>
                                                                            </el-select>
                                                                            <!-- <input type="text" v-model="area"> -->
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 col-form-label">Nombre de colaborador</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" v-model="colaborador" @input="change" :readonly="area==''"/>
                                                                            <div v-if="colaborador !=''">
                                                                                <ul v-if="mostrar" class="autocomplete-ul">
                                                                                    <li @click="click(index)" v-for="(item,index) in resultado" :key=index>{{ item }}</li>
                                                                                </ul>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row"> 
                                                                        <label class="col-md-3 col-form-label">Competecia</label>
                                                                        <div class="col-md-9">
                                                                            <el-radio-group v-model="competencia">
                                                                                <el-radio v-for="item in listCompetencias" :key="item.value" :label="item.label" :value="item.value"></el-radio>
                                                                            </el-radio-group>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 text-center">
                                                                    <img class="w-50 card-img-top" v-bind:src="image3"  alt=""/>
                                                                </div>
                                                                <!-- <input type="text" v-model="mostrar"> -->
                                                               
                                                            </div>
                                                 
                                                        </div>
                                                        <div class="card-footer">
                                                            <div  class="row d-flex justify-content-center">
                                                                <button class="btn btn-info" @click.prevent="prevStep(1)">
                                                                    Anterior
                                                                </button>
                                                                <button class="btn btn-default ml-5" @click.prevent="nextStep(3)">
                                                                    Siguiente
                                                                </button>
                                          
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="reconocimiento_detail3" v-if="activePhase == 3">
                                                        <div class="card-body">
                                                            <label class="col-md-12 col-form-label text-center">Comportamientos organizacionales </label>
                                                            <div class="row ">
                                                                
                                                                <div class="col-md-8 pt-2">
                                                                    
                                                                    <!-- <input type="text" v-model="competencia"> -->
                                                                    <div v-if="competencia=='Comunicamos e Inpiramos'">
                                                                        <label for="col-md-12 col-form-label text-center" v-text="competencia"></label>
                                                                        <div class="form-check" v-for="(item,index) in listComportamientoComunicacion" :key="index">
                                                                            
                                                                            <input class="form-check-input" type="checkbox" :value="item.value" v-model="ListComportamientos">
                                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                            {{ item.label }}
                                                                                </label>
                                                                        </div >
                                                                    </div>


                                                                    <div v-if="competencia=='Ganamos en equipo'">
                                                                        <label for="col-md-12 col-form-label text-center" v-text="competencia"></label>
                                                                        <!-- <el-checkbox-group  v-model="ListComportamientos" class="form-check">
                                                                            <el-checkbox class="form-check-input" v-for="index in listComportamientoEquipo" :label="index.label" :value="index.value" :key="index.label">{{ index.label }}</el-checkbox>
                                                                        </el-checkbox-group> -->

                                                                        <div class="form-check" v-for="(item,index) in listComportamientoEquipo" :key="index">
                                                                            
                                                                            <input class="form-check-input" type="checkbox" :value="item.value" v-model="ListComportamientos">
                                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                            {{ item.label }}
                                                                                </label>
                                                                        </div >
                                                                    </div>
                                                                    <div v-if="competencia=='Pasión por los resultados'">
                                                                        <label for="col-md-12 col-form-label text-center" v-text="competencia"></label>
                                                                        <!-- <el-checkbox-group  v-model="ListComportamientos" class="form-check">
                                                                            <el-checkbox class="form-check-input"  v-for="index in listComportamientoPasion" :label="index.label" :value="index.value" :key="index.label">{{ index.label }}</el-checkbox>
                                                                        </el-checkbox-group> -->
                                                                        <div class="form-check" v-for="(item,index) in listComportamientoPasion" :key="index">
                                                                            
                                                                            <input class="form-check-input" type="checkbox" :value="item.value" v-model="ListComportamientos">
                                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                            {{ item.label }}
                                                                                </label>
                                                                        </div >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 text-center">
                                                                    <img class="w-50 card-img-top" v-bind:src="image4"  alt=""/>
                                                                </div>
                                                                
                                                            </div>
                                                 
                                                        </div>
                                                        <div class="card-footer">
                                                            <div  class="row d-flex justify-content-center">
                                                                <button class="btn btn-info" @click.prevent="prevStep(2)">
                                                                    Anterior
                                                                </button>
                                                                <button class="btn btn-default ml-5" @click.prevent="nextStep(4)">
                                                                    Siguiente
                                                                </button>
                                          
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="reconocimiento_detail4" v-if="activePhase == 4">
                                                        <div class="card-body">
                                                            <div class="row d-flex justify-content-center">
                                                                <div class="col-md-8 pt-2">
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 col-form-label">Mensaje para tu compañero</label>
                                                                        <div class="col-md-9">
                                                                            <textarea v-model="mensaje" class="form-control" rows="3"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 text-center">
                                                                    <img class="w-50 card-img-top" v-bind:src="image5"  alt=""/>
                                                                </div>
                                                               
                                                            </div>
                                                 
                                                        </div>
                                                        <div class="card-footer">
                                                            <div  class="row d-flex justify-content-center">
                                                                <button class="btn btn-info" @click.prevent="prevStep(3)">
                                                                    Anterior
                                                                </button>
                                                                <button class="btn btn-default ml-5"  @click.prevent="setReconocimineto">
                                                                    Enviar
                                                                </button>
                                          
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </form>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="w-100 card-img-top" id="viewer" style="width: 100vw; height: 100vh;"/></div> -->
                            <div class="container pb-3">
                                <img :src="image1" class="w-100 img-fluid" alt="">
                            </div>

                            
                        </div>
                    </div>
                  
                
            </div>
        </div>
    </div>
    

</template>

<script>


export default {
    
    data() {
        return {
            //variables imagenes
            image1:'./images/photo.jpeg',
            image2:'./images/reconimiento1.png',
            image3:'./images/reconocimineto1.png',
            image4:'./images/reconocimineto2.png',
            image5:'./images/reconocimineto3.png',

            //variables de validacion
            activePhase:1,
            mostrar:false,
            btn_sig:true,
            val_cedula:"",

            //variables de formulario
            area:"",
            nombre_colaborador:"",
            colaborador:"",
            competencia:"Comunicamos e Inpiramos",
            cedula:"",
            mensaje:"",
            
            //listas
            listAreas: [
                { value: "Cedi", label: "Cedi" },
                { value: "Administrativo", label: "Administrativo" },
                { value: "Tienda", label: "Tienda" },
            ],
            listCompetencias: [
                { value: "Comunicamos e Inpiramos", label: "Comunicamos e Inpiramos" },
                { value: "Ganamos en equipo", label: "Ganamos en equipo" },
                { value: "Pasión por los resultados", label: "Pasión por los resultados" },
            ],
            listComportamientoPasion:[
                { value: "Encuentra el 'cómo sí' para que las cosas sucedan. (Hace que las cosas pasen)", label: "Encuentra el 'cómo sí' para que las cosas sucedan. (Hace que las cosas pasen)." },
                { value: "No se rinde ante los obstáculos, hace siempre el máximo esfuerzo para alcanzar las metas propias y los resultados de la compañía", label: "No se rinde ante los obstáculos, hace siempre el máximo esfuerzo para alcanzar las metas propias y los resultados de la compañía." },
                { value: "Expone de manera clara los objetivos planteados a sus compañeros.", label: "Expone de manera clara los objetivos planteados a sus compañeros." },
                { value: "Diseña y utiliza indicadores cualitativos y cuantitativos para medir y comprobar los resultados de su área.", label: "Diseña y utiliza indicadores cualitativos y cuantitativos para medir y comprobar los resultados de su área." },
                { value: "Entiende la compañía, se adueña de los problemas de su área y busca soluciones de forma proactiva.", label: "Entiende la compañía, se adueña de los problemas de su área y busca soluciones de forma proactiva." },    
            ],
            listComportamientoComunicacion:[
                { value: "Se expresa con precisión, cordialidad, veracidad, seguridad y firmeza.", label: "Se expresa con precisión, cordialidad, veracidad, seguridad y firmeza." },
                { value: "Escucha evitando distractores, hace preguntas para verificar si comprende lo que el otro está diciendo.", label: "Escucha evitando distractores, hace preguntas para verificar si comprende lo que el otro está diciendo." },
                { value: "Es abierto; acepta ideas y puntos de vista diferentes al suyo.", label: "Es abierto; acepta ideas y puntos de vista diferentes al suyo." },
                { value: "Su lenguaje no verbal es coherente con su discurso.", label: "Su lenguaje no verbal es coherente con su discurso." },
                { value: "Se asegura que el mensaje brindado sea claro y se comprenda con éxito.", label: "Se asegura que el mensaje brindado sea claro y se comprenda con éxito." },
            ],
            listComportamientoEquipo:[
                { value: "Colabora en la gestión de los resultados, no solo en su área si no de las demás áreas de la compañía.", label: "Colabora en la gestión de los resultados, no solo en su área si no de las demás áreas de la compañía." },
                { value: "Sabe brindar y pedir ayuda.", label: "Sabe brindar y pedir ayuda." },
                { value: "Tiene empatía y mantiene un buen ambiente laboral.", label: "Tiene empatía y mantiene un buen ambiente laboral." },
                { value: "Comparte prácticas y procesos para resultados de compañía.", label: "Comparte prácticas y procesos para resultados de compañía." },
                { value: "Fomenta discusiones productivas.", label: "Fomenta discusiones productivas." },
            ],
            ListComportamientos :[],
            items:[],
           
        };
    },
    methods:{
        nextStep(step){
            if (step==2 && this.nombre_colaborador!=""  ) {
                
                if (this.val_cedula==this.cedula) {
                    this.activePhase = step; 
                } else {
                    Vue.swal('Error en la cedula','', 'error');
                }
                
            } else if(step==3 && this.area!="" && this.colaborador!=""){
                var x = this.items.indexOf(this.colaborador);
                if (x != -1) {
                    this.activePhase = step; 
                } else {
                    Vue.swal('Error en el nombre del colaborador','', 'error');
                }     
            }  else if(step==4 && this.ListComportamientos.length !=0){
                this.activePhase = step; 
            }  else {
                console.log(this.ListComportamientos.length);
                Vue.swal('Hay campos vacios','', 'error');
            }
           
            
        },
        prevStep(step){
            this.activePhase = step; 
        },
        setReconocimineto() {
            if (this.colaborador != this.nombre_colaborador) {
                if(this.mensaje!=""){
                var url = "reconocimiento/setReconocimineto";
                axios.post(url, {
                    
                        nombre_colaborador: this.nombre_colaborador,
                        area: this.area,
                        competencia: this.competencia,
                        mensaje:this.mensaje,
                        ListComportamientos:this.ListComportamientos,
                        colaborador:this.colaborador,
                       
                    })
                    .then((response) => {
                        Vue.swal(response.data,'', 'success');
                        setTimeout(function(){
                        window.location.reload();
                        }, 4000);
                    });
                }else{
                    Vue.swal('El mensaje es obligatorio','', 'error');
                }
            }else{
                Vue.swal('No se puede autoreconocer','', 'error');
            }

            
           
        },
        setColaborador(){
            var url = "reconocimiento/setColaborador";
                axios.get(url, {
                        params: {
                            cedula: this.cedula,
                        },
                    })
                    .then((response) => {
                        this.nombre_colaborador=response.data
                        this.val_cedula=this.cedula
                    })
                    .catch(error => {
                        this.nombre_colaborador=""
                        Vue.swal('No se ha encontrado el colaborador','', 'error');
                        // this.btn_sig=false;
                    });
        },
        change(){
            if(!this.mostrar){
                this.mostrar=true;
            }
        },
        click(index){
            this.$emit('seleccionado',this.resultado[index]);
            this.colaborador =this.resultado[index];
            this.mostrar=false;
        },
        onChange() {
            var url = "reconocimiento/getColaboradores";
            axios.get(url, {
                        params: {
                            area: this.area,
                        },
                    })
                    .then((response) => {
                        // console.log(this.items);
                        // console.log(response.data);
                        this.items = response.data;
                        this.colaborador="";
                    });
        }
    },
    watch:{
        // cedula:{
        //     handler(newValue, oldValue) { 
        //         console.log(newValue);
        //         console.log(oldValue);
        //         console.log(newValue, oldValue);
        //         if (newValue == oldValue ) {
        //             this.passCed= true;
        //         }
                
        //     },
      
        // }
        
    },
    computed:{
        resultado(){
            return this.items.filter(
                elem =>{
                    return elem.toLowerCase().includes(this.colaborador.toLowerCase());
                }
            )
        }
    }
};
</script>

<style lang="scss">
    .contenedor{
        background-color: #e7f0f7;
    }
    .btn{
        width: 25%;
    }
    .autocomplete-ul{  
        border-radius: 5px;
        z-index: 100;
        border: 1px solid #c4c4c4;
    }
    .autocomplete-ul li{
        cursor: pointer;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        list-style-type: none ;
        transition: all 0.1s;
        border-radius: 5px;
    }
    .autocomplete-ul li:hover{
        transform:scale(1.1);
       // background-color:#eb9fcb ;
    }
   
</style>
