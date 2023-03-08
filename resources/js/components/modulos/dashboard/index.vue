<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
            </div>
            <div class="row mb-2">
                <div class="content container-fluid col-sm-6">
                    <div class="card box">
                     
                        <div class="card-body">
                            <div class="container-fluid">
                                <div id="chart">
                                    <apexchart type="line" height="350" :options="chartOptions" :series="series"></apexchart>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content container-fluid col-sm-6">
                    <div class="card box">

                        
                       
                        <div class="card-body">
                            <div class="card-header text-center d-flex justify-content-center">
                                <h6 class="card-title text-center"><strong>Reconocidos por Area</strong> </h6>
                            </div>
                            <!-- <div class="container-fluid">
                                <div id="chart">
                                    <apexchart type="line" height="350" :options="chartOptions" :series="series"></apexchart>
                              </div>
                            </div> -->
                            
                            
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold  text-uppercase mb-1">
                                                Comercial</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" >
                                                
                                                <h4 v-if="reconocido_comercial !=''">{{ reconocido_comercial }}</h4>
                                                <h4 v-else>No hay reconocido</h4>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            
                                            <i class="fas fa-store fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold  text-uppercase mb-1">
                                                Administrativo</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" >
                                                <h4 v-if="reconocido_admin !=''">{{ reconocido_admin }}</h4>
                                                <h4 v-else>No hay reconocido</h4>
                                            </div>
                                         
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-cash-register fa-2x text-gray-300"></i>
                                         <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold  text-uppercase mb-1">
                                                Cedi</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            
                                                <h4 v-if="reconocido_cedi !=''">{{ reconocido_cedi }}</h4>
                                                <h4 v-else>No hay reconocido</h4>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-hard-hat fa-2x text-gray-300"></i>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="content container-fluid col-sm-4">
                    <div class="card box">
                     
                        <div class="card-body">
                            <div class="container-fluid">
                                <div id="chart">
                                    <apexchart type="donut" height="350" :options="ParAdOptions" :series="ParAd"></apexchart>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content container-fluid col-sm-4">
                    <div class="card box">
                     
                        <div class="card-body">
                            <div class="container-fluid">
                                <div id="chart">
                                    <apexchart type="donut" height="350" :options="ParCoOptions" :series="ParCo"></apexchart>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content container-fluid col-sm-4">
                    <div class="card box">
                     
                        <div class="card-body">
                            <div class="container-fluid">
                                <div id="chart">
                                    <apexchart type="donut" height="350" :options="ParCeOptions" :series="ParCe"></apexchart>
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
    data: function() {
      return {
        reconocido_comercial:"",
        reconocido_admin:"",
        reconocido_cedi:"",

        series: [
      ],
        chartOptions: {
        },
        
        ParAd: [], 
        ParAdOptions: {
            chart: {
                type: 'donut',
                zoom: {
                enabled: false
              }
            },
            title: {
              text: 'Participación Administrativos',
              align: 'center'
            },
            labels: ['Si', 'No'],
            responsive: [{
              breakpoint: 480,
              options: {
                chart: {
                  width: 200
                },
                legend: {
                  position: 'bottom'
                }
              }
            }]
        },
        ParCo: [], 
        ParCoOptions: {
            chart: {
                type: 'donut',
                zoom: {
                enabled: false
              }
            },
            title: {
              text: 'Participación Comerciales',
              align: 'center'
            },
            labels: ['Si', 'No'],
            responsive: [{
              breakpoint: 480,
              options: {
                chart: {
                  width: 200
                },
                legend: {
                  position: 'bottom'
                }
              }
            }]
        },
        ParCe: [], 
        ParCeOptions: {
            chart: {
                type: 'donut',
                zoom: {
                enabled: false
              }
            },
            title: {
              text: 'Participación Cedi',
              align: 'center'
            },
            labels: ['Si', 'No'],
            responsive: [{
              breakpoint: 480,
              options: {
                chart: {
                  width: 200
                },
                legend: {
                  position: 'bottom'
                }
              }
            }]
        },
          
      }
    },
    created(){
            var url = "/colaboradores/getReconocidos";
            axios.get(url).then((response) => {
              this.reconocido_admin=response.data.nom_max_admin;
              this.reconocido_cedi=response.data.nom_max_cedi;
              this.reconocido_comercial=response.data.nom_max_comercial;

                });
            var url2 = "/reconocimiento/getParticipacion";
            axios.get(url2).then((response) => {
              var admin_si=response.data.si_admin;
              var admin_no=100-response.data.si_admin;
              this.ParAd = [admin_si,admin_no];

              var cedi_si=response.data.si_cedi;
              var cedi_no=100-response.data.si_cedi;
              this.ParCe = [cedi_si,cedi_no];
              
              var comercial_si=response.data.si_comercial;
              var comercial_no=100-response.data.si_comercial;
              this.ParCo =[comercial_si,comercial_no];

                });

            var url3 = "/colaboradores/getReconocimientosMes";
            axios.get(url3).then((response) => {
             
              // this.series.data=response.data.values;
              // this.chartOptions.xaxis.categories=response.data.meses;
              this.series =[
              {
                    name: "Reconocimiento",
                    data: response.data.values
              }
              ],
              this.chartOptions= {
              chart: {
                height: 350,
                type: 'line',
                zoom: {
                  enabled: false
                }
              },
              dataLabels: {
                enabled: false
              },
              stroke: {
                curve: 'straight'
              },
              title: {
                text: 'Total reconocimientos por mes',
                align: 'center'
              },
              grid: {
                row: {
                  colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                  opacity: 0.5
                },
              },
              xaxis: {
                categories:response.data.meses ,
              }
        }

                });
    },
};
</script>

<style lang="scss" scoped>
.box{
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
}
</style>
