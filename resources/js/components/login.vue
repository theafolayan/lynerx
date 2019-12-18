<!-- 
    **** To Do****
    * Validate Email 
    * Validate Password with Regex 
    * 
-->
<template> 
<div class="container">
 <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="card card-shadowed p-50 w-400 mb-0" style="max-width: 100%">
      <h5 class="text-uppercase text-center">Login To Your account</h5>
      
      <form>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Email" v-model="email" autocomplete="true">
        </div>

        <div class="form-group">
          <input type="password" class="form-control" placeholsder="*******" v-model="password" autocomplete="current-password">
        </div>

        <div class="form-group flexbox py-10">
          <label class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" v-model="remember" checked>
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description">Remember me</span>
          </label>
          <a class="text-muted hover-primary fs-13" href="">Forgot pa</a>ssword?
        </div>

        <div class="form-group">
          <button class="btn btn-bold btn-block btn-primary"  :disabled="!isValidLoginForm" @click="attemptLogin">Login</button>
        </div>
      </form>
      <p class="text-center text-muted fs-13 mt-20">Don't have an account? 
        <a href="page-register.html">Sign up</a>
      </p>
    </div>

   </div>
 </div>
</div>
</template>

<script>
    import axios from "axios";
    export default {
        
        data(){
            return{
                email: '',
                password: '',
                remember: true,
                loading: false
            }
        }, 
        methods:{
            emailIsValid(){
                // Validate Login
                return true;
            },
            attemptLogin(e){
              e.preventDefault();
              this.loading = true;
              
              // alert(' Submiitted!');
              // console.clear();
                axios.post('/login', {
                    email: this.email,
                    password: this.password,
                    remember: this.remember
                }).then(resp =>{
                    // console.log(resp.data)
                    location.reload();
                }).catch(error => {  
                  this.loading = false;
                  console.log(error)});
                
            }
        },
        computed:{
            isValidLoginForm(){
                return this.email && this.password && !this.loading;
                }
        },
        mounted() {
            console.log('Component mounted.');
        }
    }
</script>