<template>
  
    <main role="main">

        <div class="row mb-0 ml-0">
            <div class="col-12 col-md-6">
              <h1 class="mb-0 ml-0"> 
                  <strong>Simulação de Financiamento</strong> 
              </h1>
            </div> 
        </div>

        <div class="row">
          <div class="col-1"> <hr class="bar w-75 d-none d-md-block"></div>
        </div>
          
    
        <div class="card border">
          <div class="card-body p-5">

            <h4><strong>Selecione o veículo que deseja simular o financiamento</strong> </h4><br>
            <div class="row">
              <div class="col-12 col-md-4">
                  <select v-model="car_selected" class="form-control h-100">
                      <option v-for="car_separate in cars" :value="car_separate">{{car_separate.model}}</option>
                  </select>
                </div>
                <div class="col-12 col-md-2 mt-md-2 mt-4">
                    <button  data-toggle="modal" data-target="#Confirmar" class="btn bg rounded-pill w-100 p-2 ">
                      <h5 class="m-0"><strong>Simular</strong></h5>
                      
                    </button>
                </div>
            </div>
            
          </div>
        </div>

        <div class="modal fade" id="Confirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h3>Simulação</h3>
                    
                    </div>
                    <div class="modal-body">

                    <span>Valor do veiculo</span>
                    <p>R$ {{car_selected.value}}</p>

                    <span>Valor de entrada</span>
                    <money class="form-control" v-model="init_value" v-bind="money"></money>
                    
                    <div v-if="init_value >= car_selected.value" class="alert alert-danger" role="alert">
                        O valor de entrada deve ser menor
                    </div>
                    <div v-if="init_value < 0" class="alert alert-danger" role="alert">
                        Valor de entrada deve ser maior que R$ 0
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger rounded-pill" data-dismiss="modal"><h5 class="m-0"><strong>Cancelar</strong></h5></button>
                        <button v-if="init_value < car_selected.value && init_value > 0" type="button" class="btn bg waves-effect rounded-pill" data-dismiss="modal" @click="car = car_selected, simulateValue(car_selected, init_value)"><h5 class="m-0"><strong>Simular</strong></h5></button>
                    </div>
                </div>
            </div>
        </div>
          

        <div class="row" v-if="car != null">
            <div class="col-12 col-md-3">
                
                <div class="card">
                    
                <div class="card-body img-edited" :style="'background-image: url('+car.img+'); background-repeat: no-repeat;  background-size: cover;  background-position: center;'">
                    <div class="h-75">
                    </div>
                    <div class="row">
                        <div class="col-4 bg-white border-edited">
                            <span class="vert"><img src="/img/place_24px.svg" alt=""><t class="color-black ml-2">  {{car.city}}</t></span> 
                        </div>
                        <div class="col-4"></div>
                        <div class="col-4"></div>
                        
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><strong>{{car.model}}</strong></h5>
                    <p class="card-text">{{car.description}}</p>
                    <div class="row pb-2">
                        <div class="col-4 col-md-4"><span class="vert"><img class="m-2" src="/img/date_range_24px.svg" alt=""> {{car.year}}</span></div>
                        <div class="col-4 col-md-4"><span class="vert"><img class="m-2" src="/img/Vector.svg" alt=""><t class="mr-1">{{car.mileage}}</t> Km</span></div>
                        <div class="col-4 col-md-4"><span class="vert"><img class="m-2" src="/img/ICON_CAMBIO.svg" alt="">{{car.exchange}}</span></div>
                    </div>
                    <h3 class=""><strong>R$ {{car.value}}</strong></h3>
                </div>
                </div>
                
            </div>

            <div class="col-12 col-md-9" >
                <div class="card border">

                <div class="card-body">
                    <div class="d-none d-md-block">
                        <h4><strong>Valores simulados para você</strong></h4>
                        <div class="row">
                            <div class="col-1"> <hr class="bar w-100 d-none d-md-block"></div>
                            
                        </div>
                    </div>
                    

                    <div class="row" v-if="values != []">
                        <div class="col-12 col-md-6">
                            <div class="card shadow-sm">
                                <div class="card-body ">
                                    <div class="row">
                                    <div class="d-flex flex-column bd-highlight mb-0">
                                        <div class="bd-highlight"><h5 class="m-0 p-0"><strong>6x</strong></h5></div>
                                        <div class="bd-highlight"><h3 class="m-0 p-0 color-app"><strong>R$ {{values.x6}}</strong></h3></div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column bd-highlight mb-0">
                                    <div class="bd-highlight"><h5 class="m-0 p-0"><strong>12x</strong></h5></div>
                                    <div class="bd-highlight"><h3 class="m-0 p-0 color-app"><strong>R$ {{values.x12}}</strong></h3></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column bd-highlight mb-0">
                                    <div class="bd-highlight"><h5 class="m-0 p-0"><strong>48x</strong></h5></div>
                                    <div class="bd-highlight"><h3 class="m-0 p-0 color-app"><strong>R$ {{values.x48}}</strong></h3></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <button class="btn bg rounded-pill w-100 p-2 bg-wpp ">
                            <h5 class="m-0 ">
                                <strong>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                    <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                                </svg> 
                                Falar com consultor
                                </strong>
                            </h5>
                            </button>
                        </div>
                        <div class="col-12 col-md-2 ml-0 pl-0 text-center ">
                            <h6 class="btn rounded-pill"><strong>{{car.store_phone}}</strong></h6>
                        </div>
                         
                         
                    </div>

                                
                                
                               
                                
                            
                </div>
                </div>
            </div>
        </div>
            
          
        

      </main>
   
</template>

<script>

import axios from 'axios'
import VueCurrencyInput from 'vue-currency-input'
import VueNumeric from 'vue-numeric'
import MoneyFormat from 'vue-money-format'
import {Money} from 'v-money'
Vue.use(Money)

Vue.use(MoneyFormat)

Vue.use(VueNumeric)
Vue.use(VueCurrencyInput);

    export default {
      
        
        data: function () {
          return {
              money: {
                decimal: '.',
                thousands: ',',
                prefix: 'R$ ',
                suffix: '',
                precision: 2,
                masked: false,
            },
            price: '',
            init_value: 100,
            cars: [],
            car: [],
            car_selected: [],
            simulate: 1,
            values: [],
            
            data: '',
          }
        },
        methods: {

            upTable(){
                let local = this;

                axios.get('/api/project/up-data')
                .then(function(){
                    local.getTable();
                });
            },

            getTable(){
                let local = this;

                axios.get('/api/project/get-data')
                .then(function(response){
                    console.log('1 ', local.cars);
                    if(response.data == 404){
                        console.log('caiu aq');
                        local.upTable();
                    }
                    local.cars = response.data;
                    local.car = response.data[0];
                });
            },

            simulateValue(car, init_value){
                let local = this;
                console.log(typeof(init_value));


                axios.post('/api/project/get-values',{
                    data: {
                        car: car,
                        init_value: init_value, 
                    }
                })
                .then(function(response){
                    
                    local.values = response.data;
                   
                });
            }


        },
        mounted() {
            let local = this;

            local.getTable();

            
        }
    }
</script>
<style>
    .bg-app{
        background-color: #EBEEF2;

    }
    .container{
    margin-top:80px;
    margin-bottom:80px;
    max-width: 1340px;
    }    
    .img-card-user{
    width:220px;
    border-radius:50%;
    }
    .img-mini-card{
        width:50px;
    }
    .centered {
        margin: 0 auto !important;
        float: none !important;
    }
    .bar{
    border: 2px solid ;
    border-radius: 7px;
    width: 5%;
    color: #7D28F7;
    
    }
    .bg{
    background-color: #7D28F7;
    color: white !important;
    }
    .img-edited{
    height: 180px;
    
    }
    .bg-wpp{
    background-color: #1ABB59;

    }
    .color-app{
    color: #7D28F7;
    }
    .vert {
        display: flex !important;
        justify-content: center !important;
        align-items: center !important; /** ISSO AQUI ALINHA VERTICALMENTE */
    }
    .border-edited{
        border-radius: 0px 20px 20px 0px;
    }
    </style>