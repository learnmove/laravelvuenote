<template>
  <form @submit.prevent="login"> 
  
  <div class="form-group">
      <label for="">email</label>
      <input type="text" name=""  v-model="loginForm.email" id="" class="form-control">
</div>
  <div class="form-group">
      <label for="">密碼</label>
      <input type="password" name="" id="" v-model="loginForm.password" class="form-control">
</div>
<button class="btn">送出</button>
  </form>
</template>
<script>
    export default{
        data(){
            return{
                loginForm:{
                    email:'',
                    password:'',
                }
            }
        },
        methods:{
            login(){
                axios.post(`login`,this.loginForm)
                .then(({data})=>{
                    let token=data.token;
                    if(token){
                    localStorage.setItem('token',token);
                        
                    }
                    console.log(token);
                })
                .catch(({response})=>{console.log(response.data)});
                
            }
        }
    }
    
</script>