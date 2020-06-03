<template>
  <div>
   <div class="row">
    <b-modal ref="my-modal-category" hide-footer title="CREAR CATEGORÍAi">
          <div class="d-block text-center">
            <b-card bg-variant="light">
            <form class="forms-sample" @submit.prevent="create" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-md-12">
                        <b-form-group label-cols-sm="2" label="Categoria:" label-align-sm="right" label-for="nested-country">
                        <b-form-select v-model="Create.category_id" :options="options"></b-form-select>
                        </b-form-group>
                    </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nombre</label>
                                <input type="text" class="form-control" v-model="Create.name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Descripción</label>
                                <input type="text" class="form-control" v-model="Create.description">
                            </div>
                        </div>
                        <button style="margin-left: 15px;" type="submit" class="btn btn-primary mr-2">Guardar</button>
                    </div>
            </form>
             </b-card>
        </div>
  
          
    </b-modal>
    </div>
    <b-modal ref="my-modal-category-edit" hide-footer title="EDITAR CATEGORÍA">
        <div class="d-block text-center">
            <form class="forms-sample" @submit.prevent="create" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <b-form-group label-cols-sm="2" label="Categoria:" label-align-sm="right" label-for="nested-country">
                            <b-form-select v-model="Create.parent_id" :options="options"></b-form-select>
                            </b-form-group>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nombre</label>
                                <input type="text" class="form-control" v-model="Create.name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Descripción</label>
                                <input type="text" class="form-control" v-model="Create.description">
                            </div>
                        </div>
                        <button style="margin-left: 15px;" type="submit" class="btn btn-primary mr-2">Guardar</button>
                    </div>
            </form>
        </div>
    </b-modal>
         
        <div class="col-md-12">
              <div class="card">
                <div class="card-header d-block">
                   
                    <span>
                         <b-button variant="success" id="toggle-btn-create" @click="modalCreateCategory"><i class="ik ik-save"></i> Crear</b-button>  
                    </span>
                  
                  
                </div>
                <div class="card-body p-1 table-border-style">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="category in category" :key="category.id">
                                    <td v-text="category.name"></td>
                                    <td v-text="category.description"></td>
                                    <td>
                                        <b-button variant="info" id="toggle-btn-edit" @click="modaleditCategory(category)"><i class="ik ik-edit-2"></i></b-button>  
                                        <button type="button" class="btn btn-danger" @click="deleteCategory(category,category.id)"><i class="ik ik-trash-2"></i></button>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      
    </div>
  </div>
</template>
<script>

     export default {
   
        data () {
            return {
                
                category:[],
                Create:
                {
                    name:'',
                    description:'',
                    state:'',
                    id:'',
                    parent_id:''
                },
                 fullPage: false,
                 category_id: null,
                    options: [
                      { },
                    ]
                
            };
        },
        mounted () {
            this.listCategory();
            this.SelectCategory();
        },
        methods: {

                listCategory()
                {
                  axios.get('/category/list').then(response => {
                        
                        let loader = this.$loading.show({
		                  container: this.fullPage ? null : this.$refs.formContainer,
		                  canCancel: true,
                          onCancel: this.onCancel,
			                });
			                setTimeout(() => {
			                   this.category = response.data 
			                   loader.hide()
               			 },500)
                           
                     
                    });
                },
                create()
                {

                  axios.post('/category/creare', this.Create)
                    .then((res) =>{
                       this.listCategory();
                       this.Create.name='';
                       this.Create.description='';
                       
                    }).catch(error => {
                      
                    })

                },
                update()
                {
                    axios.post('/category/update', this.Create)
                    .then((res) =>{
                       this.listCategory();
                       
                       
                    }).catch(error => {
                      
                    })
                      this.$root.$emit('bv::hide::modal', 'my-modal-category-edit')
                },
                modalCreateCategory() {
                    
                    this.Create.name='';
                    this.Create.description='';
                    this.$refs['my-modal-category'].toggle('#toggle-btn-create')
                },
                modaleditCategory(category) {
                    
                    this.Create.name=category.name;
                    this.Create.description=category.description;
                    this.Create.id=category.id;
                    this.Create.parent_id=category.parent_id;
                    console.log(this.parent_id);
                    this.$refs['my-modal-category-edit'].toggle('#toggle-btn-edit')

                },
                deleteCategory: function(category,id) {
                    let me = this;
                    axios.get('/category/remove/'+category.id).then(response => 
                        {   
                            
                            me.listCategory();
                                
                        });
                },
                  SelectCategory:function()
                {
                  this.options=[];
                  axios.get('/category/list_category').then(response => {
                        
                     const versions = response.data;
                            
                            versions.forEach((version) => {
                              this.options.push(version);
                            });   
                           
                           
                    });
                },



        }
    }
</script>

<style type="text/css">
    .modal-backdrop
    {
        opacity:0.5 !important;
    }
</style>
