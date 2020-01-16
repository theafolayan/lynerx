<template>
  
        <div class = "alert alert-noty" :class="type" v-if="notification">
        <p class="text-center"> {{notification.message}}</p>
        
   </div>
</template>
<script>
// let notification = null;
export default {
    // let notification = null;
   created(){
    //    let notification = null;
        // alert( 'Mounted!');?\
        window.events.$on('notification', (payload) =>{
            // console.log('notification Recieved')
            this.notification = payload;
            setTimeout(()=>{
                this.notification = null
            }, 2500)
            
            // console.log(payload);
            // console.log(notification)
            // alert(notification.message)
          
        });
    },
    data(){
        // notification: null
        return {  
            notification: null
        }
    }, computed: {
        type(){
            return `alert-${this.notification.type}`
        }
    },
}
</script>

<style>
    .alert-noty{
        position: fixed;
        right: 20px;
        bottom: 40px;
        z-index: 1;

    }
</style>