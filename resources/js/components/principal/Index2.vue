<template>
    <div>
        <div>
            <div class="contenedor pt-5" >
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
                
                            <img class="w-100 card-img-top" v-bind:src="image1"  alt=""/>
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-8 ">
                                        <div class="container-fluid">
                                            <div class="card card-info">
                                            
                                                <form>
                                                    <div class="card-header">
                                                        <h3 class="card-title">
                                                            Nuevo reconocimiento
                                                        </h3>
                                                    </div>
                                                    <div id="reconocimiento_detail1" v-if="activePhase == 1">
                                                        <div class="card-body">
                                                            <div class="row d-flex justify-content-center">
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 col-form-label">Ingresa tu cedula</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 col-form-label">Nombre</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control"  readonly/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                             
                                                            </div>
                                                 
                                                        </div>
                                                        <div class="card-footer">
                                                            <div  class="row d-flex justify-content-center">
                                                                <button class="btn btn-info">
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
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 col-form-label">Area</label>
                                                                        <div class="col-md-9">
                                                                            <el-select v-model="area"  placeholder="Seleccione un area" clearable>
                                                                                <el-option v-for="item in listAreas" :key="item.value" :label="item.label" :value="item.value">
                                                                                </el-option>
                                                                            </el-select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 col-form-label">Nombre de colaborador</label>
                                                                        <div class="col-md-9">
                                                                            <input type="text" class="form-control" />
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
                                                            <label class="col-md-12 col-form-label text-center">Comportamientos</label>
                                                            <div class="row ">
                                                                
                                                                <div class="col-md-8">
                                                                    
                                                                    <!-- <input type="text" v-model="competencia"> -->
                                                                    <div v-if="competencia=='Comunicamos e Inpiramos'">
                                                                        <el-checkbox-group  v-model="comportamientos" >
                                                                            <el-checkbox v-for="index in listComportamientoComunicacion" :label="index.label" :value="index.value" :key="index.label">{{ index.label }}</el-checkbox>
                                                                        </el-checkbox-group>
                                                                    </div>
                                                                    <div v-if="competencia=='Ganamos en equipo'">
                                                                        <el-checkbox-group  v-model="comportamientos" >
                                                                            <el-checkbox v-for="index in listComportamientoEquipo" :label="index.label" :value="index.value" :key="index.label">{{ index.label }}</el-checkbox>
                                                                        </el-checkbox-group>
                                                                    </div>
                                                                    <div v-if="competencia=='Pasión por los resultados'">
                                                                        <el-checkbox-group  v-model="comportamientos" >
                                                                            <el-checkbox v-for="index in listComportamientoPasion" :label="index.label" :value="index.value" :key="index.label">{{ index.label }}</el-checkbox>
                                                                        </el-checkbox-group>
                                                                    </div>
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
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-md-3 col-form-label">Mensaje para el colaborador</label>
                                                                        <div class="col-md-9">
                                                                            <textarea class="form-control" rows="3"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                               
                                                            </div>
                                                 
                                                        </div>
                                                        <div class="card-footer">
                                                            <div  class="row d-flex justify-content-center">
                                                                <button class="btn btn-info" @click.prevent="prevStep(3)">
                                                                    Anterior
                                                                </button>
                                                                <button class="btn btn-default ml-5">
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
            image1:'./images/ejemplo.jpg',
            activePhase:1,
            area:"",
            competencia:"Comunicamos e Inpiramos",
            comportamientos :[],
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
                { value: "Encuentra el 'cómo sí' para que las cosas sucedan. (Hace que las cosas pasen)", label: "Encuentra el 'cómo sí' para que las cosas sucedan. (Hace que las cosas pasen)" },
                { value: "No se rinde ante los obstáculos, hace siempre el máximo esfuerzo para alcanzar las metas propias y los resultados de la compañía", label: "No se rinde ante los obstáculos, hace siempre el máximo esfuerzo para alcanzar las metas propias y los resultados de la compañía" },
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
            ]

        };
    },
    methods:{
        nextStep(step){
            this.activePhase = step; 
        },
        prevStep(step){
            this.activePhase = step; 
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

</style>
