import Vue from './app.js';
import {router} from './app.js';

export default {
    user: {

        authenticated: false,
        profile: null,
        halaman: null,

    },
    check() {
        let token = localStorage.getItem('id_token')
        if (token !== null) {
            axios.get('api/user?token=' + token,).then(response =>
            {
                this.user.authenticated = true
                this.user.profile = response.data.data
            })
        }

    },

    checkAuth() {
      return localStorage.getItem('id_token') 
    }, 

    checkLevel(){
        return localStorage.getItem('level');
    },


    checkPos() {
      if(localStorage.getItem('level') == 1 && localStorage.getItem('id_token') != null){
        return true
      }
    },
    
    checkAdmin() {
      if(localStorage.getItem('level') == 2 && localStorage.getItem('id_token') != null){
        return true
      }
    },
    checkSuper() {
      if(localStorage.getItem('level') == 3 && localStorage.getItem('id_token') != null){
        return true
      }
    },
    register(context, name, email,hp,level, password) {
     axios.post(
        'api/register',
        {
            name: name,
            email: email,
            hp: hp,
            level: level,
            password: password
        }
        ).then(response => {
            context.success = true
        }, response => {
            context.response = response.data
            context.error = true
        })
    },
    signin(context, email, password) {
        axios.post(
            'api/signin',
            {
                email: email,
                password: password
            }
            ).then(response => {
                context.error = false
                localStorage.setItem('id_token', response.data.meta.token)
                localStorage.setItem('level',response.data.data.level)

                Vue.axios.defaults.headers.common['Authorization'] = 'HarunUmar' + localStorage.getItem('id_token');

                this.user.authenticated = true
                this.user.profile = response.data.data
                console.log(this.user.profile.level);
                if(this.user.profile.level == 1){
                    this.user.halaman = "pos"
                }
                else if (this.user.profile.level == 2){
                    this.user.halaman = "admin"
                }
                else if(this.user.profile.level == 3){
                    this.user.halaman = "super"
                }

                router.push({
                    name: this.user.halaman
                })
            }, response => {
                context.error = true
            })
        },
        signout() {
            localStorage.removeItem('id_token')
            this.user.authenticated = false
            this.user.profile = null
            router.push({
                name: 'signin'
            })
        }
    }
