<template>
    <div class="container">
       <div class="row ">
           <div v-if="loading">
               loading...
           </div>
            <div class="col-md-1 col-md-offset-11">
                   <router-link to="/form">
             <a href="" class="btn btn-primary">創造</a>
        </router-link>
             
            </div>
        </div>
        <div class="row">
           
                <div class="col-md-8 col-md-offset-2">

                <div  class="panel panel-default" v-for="notebook in notebooks">
                <form>
                    
                    <button @click="editing(notebook.id)" class="btn"><i class="fa fa-pencil"></i></button>
                    <button  @click="deleteNote(notebook)" class="btn btn-info"><i class="fa fa-times"></i></button>
                    
                    <div class="panel-heading">
<strong v-show="!show(notebook.id)"> {{notebook.name}}-by {{notebook.user.name}}</strong >                          
  <div class="form-group">
                       <input  class="form-control"  v-show="show(notebook.id)" type="text" name="" id="" v-model="notebook.name" >
                       </div>

   </div>
                    
                    <div class="panel-body">
                       <strong v-show="!show(notebook.id)"> {{notebook.body}}</strong >
                       <div class="form-group">
                       <input class="form-control" v-show="show(notebook.id)"  type="text" name="" id=""  v-model="notebook.body">
                           
                       </div>
                    </div>
                    <button class="btn" v-show="show(notebook.id)" @click="updateData(notebook)" type="submit">提交</button>
                    <button class="btn" v-show="show(notebook.id)" @click="editId=''">取消</button>
                    
                </form>
                    
                </div>
                

            </div>
            
        
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                loading:false,
                notebooks:[],
               editId:'',
               noteBookForm:{
                   name:'',
                   body:''
               },
               token:localStorage.getItem('token')
            }
        },
        mounted() {
            this.loading=true;
            axios.get(`notebook?token=${this.token}`).then((response)=>{
                this.notebooks=response.data;
                this.loading=false;
            });
        },
        methods:{
           
            editing(id){
                return this.editId=id;
            },
            show(id){
                if(id==this.editId){
                    return true;
                }
                return false;
            },
            updateData(notebook){
                this.noteBookForm=notebook;
                axios.put(`notebook/${notebook.id}?token=${this.token}`,this.noteBookForm)
                .then((response)=>{
                this.editId='';
                    return response.data;
                    })
                .catch((error)=>{return error.response});
            },
            deleteNote(notebook){
                axios
                .delete(`notebook/${notebook.id}?token=${this.token}`)
                .then((response)=>{
                    this.fetchNote();
                    return response.data
                    
                    })
                .catch((error)=>{return error.response});
            },
            fetchNote(){
                   axios.get('notebook').then((response)=>{
                this.notebooks=response.data;
            });
            }
           
        }
    }
</script>
