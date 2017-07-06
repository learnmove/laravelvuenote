<template>
  <form @submit.prevent="register"> 
  <div class="form-group">
      <label for="">姓名</label>
      <input type="text" name=""  v-model="registerForm.name" id="" class="form-control">
</div>
  <div class="form-group">
      <label for="">email</label>
      <input type="text" name=""  v-model="registerForm.email" id="" class="form-control">
</div>
  <div class="form-group">
      <label for="">密碼</label>
      <input type="password" name="" id="" v-model="registerForm.password" class="form-control">
</div>
<button class="btn">送出</button>
  </form>
</template>
<script>
    export default{
        data(){
            return{
                registerForm:{
                    email:'',
                    password:'',
                    name:''
                }
            }
        },
        methods:{
            register(){
                console.log(this.registerForm);
                axios.post(`register`,this.registerForm)
                .then(({data})=>{return data})
                .catch((error)=>{error.response});
                
            }
        }
    }
    
</script>