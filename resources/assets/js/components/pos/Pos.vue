<template>
	

  <div class="container">


    <div v-for="user in users">
      
 <div class="row">

        <div class="col-md-4 offset-md-4 ">
          <div class="card text-center">
            <img class="card-img-top" :src="image">

            <div class="card-body">
              <h2 class="card-title">{{user.name}}</h2>


            </div>
            <div class="card">
              <div class="card-header">
               <h4>{{user.rfid}}</h4>
             </div>
             <ul class="list-group list-group-flush">
              <li class="list-group-item">Jabatan : {{user.jabatan}} </li>
              <li class="list-group-item">Jenis Kelamin : {{users.jenis_kelamin}}</li>
            </ul>
          </div>
          <div class="card-footer text-muted">
           <button type="button" class="btn btn-success">Record</button>
         </div>
       </div>


     </div>

   </div>



    </div>

     

</div>

</template>
<script>
import swit from 'sweetalert2'; 


export default {

  data() {

    return {
      users: [],
      image: 'images/bg.jpg',
      params: ''
    }

   
  },

  mounted() {
     
      // listen when search

      this.$bus.$on('cari', search => {
         let params = {
          search: search
        }
        this.getUser('api/search?query='+search+'&token=' + localStorage.getItem('id_token'));
      }); 
     

         
       

      
    },

    methods:{
      getUser(url){
        axios.get(url).then(response => {
          this.users = response.data;
          if(this.users.length > 0 ){
            swit('Data Found',response.data[0].rfid,'success')
          }
          else{
              swit('Data Not Found','','error');
          }

        })
      }
    }


}
</script>
