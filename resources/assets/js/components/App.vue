<template>
<div>          

    <nav class="navbar border fixed-top navbar-expand-lg navbar-light bg-light " v-if="auth.user.authenticated">
   <a class="navbar-brand" href="#">
    <img :src="image" width="60" height="30" class="d-inline-block align-top" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <span class="sr-only"><router-link :to="{ name: 'home' }">Home</router-link></span>
      </li>

    
       <li class="nav-item"  v-if="!auth.user.authenticated">
      
        <router-link :to="{ name: 'signin' }" class="nav-link">Sign in</router-link>
      </li>

      <li class="nav-item" v-if="!auth.user.authenticated">
      
        <router-link :to="{ name: 'register' }" class="nav-link">Register</router-link>
      </li>

      <li class="nav-item dropdown" v-if="auth.user.authenticated">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
          Hi, {{ auth.user.profile.name }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
           

          <a class="dropdown-item" href="javascript:void(0)" v-on:click="signout">Sign out</a>
        </div>
      </li>
    
    </ul>

    <form  @submit.prevent="search" method="post" class="form-inline my-2 my-lg-10" v-if="auth.checkPos()">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" autofocus v-model="state.query">
      <button  class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
         

    </form>
  </div>

 
</nav>
               
        
            <div class="spasi">
               <router-view></router-view>
                 <pos v-if="auth.checkPos()"></pos>
            </div>
                 
        </div>
 
</template>

<style>
  .spasi {
     margin-top: 100px;
  }

</style>
<script>
import auth from '../auth.js';
import swit from 'sweetalert2'; 
import pos from './pos/Pos.vue';

export default {    

        data() {
            return {
                image: 'images/logo.png',
                auth: auth,     
                results: [],
                state: {
                    query: ''
                }
             
            }
        },

        components: {
          pos: pos
        },
      
      
        methods: {
            signout() {
                auth.signout()
            },
            search(){
                if (!this.state.query) {
                  swit('inset your card','error','error');
                }
                else {
                    this.$bus.$emit('cari',this.state.query);
                }
            
            
            }

           
        },
        mounted: function () {
            this.$nextTick(function () {
                auth.check()
            })
        }
    
}
</script>

