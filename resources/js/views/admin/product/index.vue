<template>
  <div>
   <div class="row">
     
    <b-modal  size="lg" ref="my-modal-producto" hide-footer title="CREAR PRODUCTO">
        <div class="d-block text-center">
           
            <div>

              <b-card bg-variant="light">
                 <form class="forms-sample" @submit.prevent="create"  method="POST" enctype="multipart/form-data">
                  <b-form-group
                    label-cols-sm="2"
                    label="Descripción:"
                    label-align-sm="right"
                    label-for="nested-street"
                  >
                    <b-form-input v-model="Create.description"></b-form-input>
                  </b-form-group>

                  <b-form-group
                    label-cols-sm="2"
                    label="Codigo:"
                    label-align-sm="right"
                    label-for="nested-city"
                  >
                    <b-form-input v-model="Create.codigo"></b-form-input>
                  </b-form-group>

                  <b-form-group
                    label-cols-sm="2"
                    label="Stock:"
                    label-align-sm="right"
                    label-for="nested-state"
                  >
                    <b-form-input v-model="Create.stock"></b-form-input>
                  </b-form-group>

                  <b-form-group
                    label-cols-sm="2"
                    label="Precio compra:"
                    label-align-sm="right"
                    label-for="nested-country"
                  >
                    <b-form-input v-model="Create.price_compra"></b-form-input>
                  </b-form-group>
                  <b-form-group
                    label-cols-sm="2"
                    label="Precio venta:"
                    label-align-sm="right"
                    label-for="nested-country"
                  >
                    <b-form-input v-model="Create.price_venta"></b-form-input>
                  </b-form-group>

                  <b-form-group
                    label-cols-sm="2"
                    label="Fecha:"
                    label-align-sm="right"
                    label-for="nested-country"
                  >
                    <b-form-datepicker v-model="Create.date"  class="mb-2"></b-form-datepicker>
                  </b-form-group>

                    <b-form-group
                    label-cols-sm="2"
                    label="Categoria:"
                    label-align-sm="right"
                    label-for="nested-country"
                  >
                     <b-form-select v-model="Create.category_id" :options="options"></b-form-select>
                  </b-form-group>
                         <input type="file" class="form-control" @change="loadImage">
                  </b-form-group>
                    
              

                  <button style="margin-left: 15px;" type="submit" class="btn btn-primary mr-2">Guardar</button>
                </form> 
              </b-card>
            
            </div>
        </div>
    </b-modal>
     
    <b-modal ref="my-modal-producto-edit" hide-footer title="EDITAR CATEGORÍA">
        <div class="d-block text-center">
            <div>
                <b-card bg-variant="light">
                 <form class="forms-sample" @submit.prevent="update" method="POST" enctype="multipart/form-data">
                  <b-form-group
                    label-cols-sm="2"
                    label="Descripción:"
                    label-align-sm="right"
                    label-for="nested-street"
                  >
                    <b-form-input v-model="Create.description"></b-form-input>
                  </b-form-group>

                  <b-form-group
                    label-cols-sm="2"
                    label="Codigo:"
                    label-align-sm="right"
                    label-for="nested-city"
                  >
                    <b-form-input v-model="Create.codigo"></b-form-input>
                  </b-form-group>

                  <b-form-group
                    label-cols-sm="2"
                    label="Stock:"
                    label-align-sm="right"
                    label-for="nested-state"
                  >
                    <b-form-input v-model="Create.stock"></b-form-input>
                  </b-form-group>

                  <b-form-group
                    label-cols-sm="2"
                    label="Precio compra:"
                    label-align-sm="right"
                    label-for="nested-country"
                  >
                    <b-form-input v-model="Create.price_compra"></b-form-input>
                  </b-form-group>
                  <b-form-group
                    label-cols-sm="2"
                    label="Precio venta:"
                    label-align-sm="right"
                    label-for="nested-country"
                  >
                    <b-form-input v-model="Create.price_venta"></b-form-input>
                  </b-form-group>

                  <b-form-group
                    label-cols-sm="2"
                    label="Fecha:"
                    label-align-sm="right"
                    label-for="nested-country"
                  >
                    <b-form-datepicker v-model="Create.date"  class="mb-2"></b-form-datepicker>
                  </b-form-group>

                    <b-form-group
                    label-cols-sm="2"
                    label="Categoria:"
                    label-align-sm="right"
                    label-for="nested-country"
                  >
                     <b-form-select v-model="Create.category_id" :options="options"></b-form-select>
                  </b-form-group>
         
                  </b-form-group>
                         <input type="file" class="form-control" @change="loadImage"> 
                         <b-container fluid class="p-4 bg-dark">
                           <b-col>
                              <b-img thumbnail fluid :src="Create.image" alt="Image 1"></b-img>
                            </b-col>
                         </b-container><br><br>
                  </b-form-group>

                  <button style="margin-left: 15px;" type="submit" class="btn btn-primary mr-2">Guardar</button>
                </form> 
              </b-card>
            </div>
        </div>
    </b-modal>
         
        <div class="col-md-12">
              <div class="card">
                <div class="card-header d-block">
                   
                    <span>
                         <b-button v-b-modal.modal-lg variant="success" id="toggle-btn-create" @click="modalCreateproducto"><i class="ik ik-save"></i> Crear</b-button>  
                    </span>
                  
                  
                </div>
                <div class="card-body p-1 table-border-style">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Categoria</th>
                                    <th>Descripción</th>
                                    <th>Imagen</th>
                                    <th>Codigo</th>
                                    <th>stock</th>
                                    <th>Precio de compra</th>
                                    <th>Precio de venta</th>
                                    <th>Fecha de Ingreso</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="producto in producto" :key="producto.id">
                                    <td v-text="producto.name"></td>
                                    <td v-text="producto.description"></td>
                                    <th scope="row">
                                       <b-img thumbnail fluid :src=producto.img alt="Image 1" style="height: 50px;width: 100px;" ></b-img>
                                    </th>
                                    <td v-text="producto.codigo"></td>
                                    <td v-text="producto.stock"></td>
                                    <td v-text="producto.price_compra"></td>
                                    <td v-text="producto.price_venta"></td>
                                    <td v-text="producto.date"></td>
                                    <td>
                                        <b-button variant="info" id="toggle-btn-edit" @click="modaleditproducto(producto)"><i class="ik ik-edit-2"></i></b-button>  
                                        <button type="button" class="btn btn-danger" @click="deleteproducto(producto,producto.id)"><i class="ik ik-trash-2"></i></button>

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
                
                producto:[],
                Create:
                {
                    description:'',
                    codigo:'',
                    stock:'',
                    price_compra:'',
                    price_venta:'',
                    date:'',
                    category_id:'',
                    id:'',
                    image:'',
                },
                 fullPage: false,
                   
                   category_id: null,
                    options: [
                      { },
                    ]
              
                
            };
        },
        mounted () {
            this.listproducto();
            this.SelectCategory();
        },
        methods: {
                //subir imagen

                loadImage(e)
                {
                    let file=e.target.files[0];
                    this.Create.image=file;
                },

                //Subir imagen
                listproducto()
                {
                  axios.get('/product/list').then(response => {
                        
                        let loader = this.$loading.show({
                      container: this.fullPage ? null : this.$refs.formContainer,
                      canCancel: true,
                          onCancel: this.onCancel,
                      });
                      setTimeout(() => {
                         this.producto = response.data 
                         loader.hide()
                     },500)
                           
                     
                    });
                },
                create()
                {
                   
                   let formData = new FormData();
                   formData.append('description',this.Create.description);
                   formData.append('codigo',this.Create.codigo);
                   formData.append('stock',this.Create.stock);
                   formData.append('price_compra',this.Create.price_compra);
                   formData.append('price_venta',this.Create.price_venta);
                   formData.append('date',this.Create.date);
                   formData.append('category_id',this.Create.category_id);
                   formData.append('img',this.Create.image);
                   console.log(formData);
                  axios.post('/product/create', formData)
                    .then((res) =>{
                       this.listproducto();
                       
                        this.Create.description='';
                        this.Create.codigo='';
                        this.Create.stock='';
                        this.Create.price_compra='';
                        this.Create.price_venta='';
                        this.Create.date='';
                        this.Create.category_id='';
                    }).catch(error => {
                      
                    })

                },
                update()
                {   
                   
                   let formData = new FormData();
                   formData.append('description',this.Create.description);
                   formData.append('codigo',this.Create.codigo);
                   formData.append('stock',this.Create.stock);
                   formData.append('price_compra',this.Create.price_compra);
                   formData.append('price_venta',this.Create.price_venta);
                   formData.append('date',this.Create.date);
                   formData.append('category_id',this.Create.category_id);
                   formData.append('img',this.Create.image);
                   formData.append('id',this.Create.id);

                    axios.post('/product/update',formData)
                    .then((res) =>{
                       this.listproducto();
                       
                       
                    }).catch(error => {
                      
                    })
                      this.$root.$emit('bv::hide::modal', 'my-modal-producto-edit')
                },
                modalCreateproducto() {
                    
                    this.Create.name='';
                    this.Create.description='';
                    this.$refs['my-modal-producto'].toggle('#toggle-btn-create')
                },
                modaleditproducto(producto) {
                    
                    console.log(producto.category_id);
                    this.Create.description=producto.description;
                    this.Create.codigo=producto.codigo;
                    this.Create.stock=producto.stock;
                    this.Create.price_compra=producto.price_compra;
                    this.Create.price_venta=producto.price_venta;
                    this.Create.date=producto.date;
                    this.Create.category_id=producto.category_id;
                    this.Create.id=producto.id;
                    this.Create.image=producto.img;
                    
                    this.$refs['my-modal-producto-edit'].toggle('#toggle-btn-edit')

                },
                deleteproducto: function(producto,id) {
                    let me = this;
                    axios.get('/product/remove/'+producto.id).then(response => 
                        {   
                            
                            me.listproducto();
                                
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
