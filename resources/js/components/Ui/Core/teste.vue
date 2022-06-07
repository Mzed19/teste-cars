<template>
<div>
    <money v-model="price" v-bind="money"></money>
    <button @click="teste" class="btn btn primary">
        aaa
    </button>

</div>
</template>
<script>
import MoneyFormat from 'vue-money-format'

Vue.use(MoneyFormat)

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
            price: 0,
          }
        },
        methods: {
            teste(){
                console.log(this.price);
                console.log(typeof(this.price));
            }
        },
        mounted() {

        }
        }
</script>
<style>

</style>