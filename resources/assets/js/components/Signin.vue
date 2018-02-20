<template>
      
       <div class="container h-100">
        <div class="row justify-content-md-center h-100">
      <div class="login-page ">
      <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="brand">
                        <img :src="image">
                    </div>
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Login</h4>
                           <form autocomplete="off" v-on:submit="signin">
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" class="form-control" placeholder="your email address" v-model="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" placeholder="your password" v-model="password" required>
            </div>
            <div class="form-group no-margin"
          
                            <button type="submit" class="btn btn-primary btn-block">Sign in</button>

          
        </form>
                        </div>
                    </div>
                    <div class="footer">
                        Copyright &copy; PT Pelindo 4 Kota Bitung 2018
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    </div>
    </div>
</template>
<style src="../css/login.css"></style>
<script>


import auth from '../auth.js';
import VueRecaptcha from 'vue-recaptcha';


export default {

 
    data() {
            return {
                image: 'images/logo.png',
                email: null,
                password: null,
                error: false
            }
        },
        methods: {
            signin(event) {
                event.preventDefault()
                auth.signin(this, this.email, this.password)
            }
        }
}
</script>

        