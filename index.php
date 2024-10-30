<!doctype html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap/dist/css/bootstrap.min.css"/>
        <link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap-vue@latest/dist/css/bootstrap-vue.min.css"/>
        <title>PHP_POO_VueJS | CRUD</title>
        <style>
            [v-cloak]{
                display: none;
            }
        </style>
    </head>
    <body>
        <div class="container" id="app" v-cloak>
            <div class="row">
                <div class="col-md-12 mt-5">
                    <h1 class="text-center">PHP_POO_VueJS_CRUD</h1>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <b-button id="show-btn" @click="showModal">Cadastrar</b-button>

                        <b-modal ref="my-modal" hide-footer title="Adicionar novo Registro">
                            <div>
                                <form action="" @submit.prevent="onSubmit">
                                    <div class="form-group">
                                        <label for="">Nome</label>
                                        <input type="text" v-model="nome" class="form-control">
                                    </div>
                                    <div class="form-group">
                                    <label for="">E-mail</label>
                                    <input type="email" v-model="email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-sm btn-outline-info">Adicionar</button>
                                    </div>
                                </form>
                            </div>
                            <b-button class="mt-3" variant="outline-danger" block @click="hideModal">Close Me</b-button>
                        </b-modal>
                    </div>
                </div>
            </div>
        </div>

    </body>

        <!-- VueJS -->
         <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
         <script src="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.min.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
         <script>
            var app = new Vue({
                el:'#app',
                data:{
                    nome: '',
                    email: ''
                },

                methods: {
                showModal() {
                    this.$refs['my-modal'].show()
                },
                hideModal() {
                    this.$refs['my-modal'].hide()
                },

                onSubmit(){
                    if (this.nome !== '' && this.email !== '') {
                        var fd = new FormData()

                        fd.append('nome', this.nome)
                        fd.append('email', this.email)

                        axios({
                            url: 'insert.php',
                            method: 'post',
                            data: fd
                        })
                        .then(res => {
                            // console.log(res)
                            if (res.data.res == 'success') {
                                alert('Usuário cadastrado com sucesso!')
                                this.nome = ''
                                this.email = ''

                                app.hideModal()
                            }else{
                                alert('Houve um erro ao cadastrar o usuário.')
                            }
                        }).catch(err => {
                            console.log(err)
                        })
                    }else{
                        alert('Vazio')
                    }
                },
                getPegaUsers(){
                    axios({
                        url: 'pegaUsers.php',
                        method: 'get'
                    })
                    .then(res => {
                        console.log(res)
                    })
                    .catch(err => {
                        console.log(err)
                    })
                }
            },

            // constinua aqui
        })
         </script>
</html>