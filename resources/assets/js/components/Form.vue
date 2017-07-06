<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <form >
              <div class="form-group">
                  <label for="">事件</label>
                  <input type="text" name="" id="" v-model="noteBookData.name" class="form-control">
              </div>
              <div class="form-group">
                  <label for="">內容</label>
                  <input type="text" name="" id="" v-model="noteBookData.body" class="form-control">
              </div>
              <button class="btn btn-primary" @click.prevent="addNotebook()">送出內容</button>
              </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                noteBookData:{
                    name:'',
                    body:''
                },
                loading:false,
                notebooks:[],
                errors:[],
                token:localStorage.getItem('token')

            }
        },
        mounted() {
            this.loading=true;
            axios.get('notebook').then((response)=>{
                this.notebooks=response.data;
            this.loading=false;
            });
        },
        methods:{
             addNotebook(){
                 axios.post(`notebook?token=${this.token}`,this.noteBookData)
                 .then((response)=>{
                     console.log(response.data)
                    this.$router.push('/');
                })
                 .catch((error)=>{this.errors=error.response.data;});
                 ;

            }
        }
        
    }
</script>
