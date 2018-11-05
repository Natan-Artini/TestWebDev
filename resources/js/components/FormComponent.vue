<template>
<!-- Apresenta um formulário simples para cadastro ou edição dos contatos
    quando é para editar ele já carrega os dados do cadastro escolhido no form
-->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    
                        <div v-if="contato" class="card-header">Editar Contato {{contato.name}}</div>
                        <div v-if="!contato" class="card-header">Adicionar Contato</div>

                    <div class="card-body">
                        <form @submit.prevent="submitForm">
                            <input type="text" v-model="form.name" placeholder="Nome" required>
                            <input type="tel" v-model="form.telefone" placeholder="Telefone" required>
                            <input type="email" v-model="form.email" placeholder="E-mail" required>
                            <input type="text" v-model="form.cep" placeholder="CEP" required>
                            <button :disabled="this.loading">Enviar  <i v-if="this.loading" class="fa fa-spinner rotate"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    //Importe do sweetalert para gerar alerta de confirmação
    import swal from 'sweetalert2'

    // Define o escopo do form pelo nome definido em v-model
    // Criado tbm uma variavel loading que é usada para desativar o botão
    // de envio e tambem para colocara a animação de carregando
    export default {
        data() {
            return {
                form: {
                    id: '',
                    name: '',
                    telefone: '',
                    email: '',
                    cep: '',
                },
                loading: false,
            }
        },

        // Pega a informação do contato passado
        props:['contato'],


        // Se existe um contato o form vai receber esse contato
        // Como os campos do form e do contato são os mesmos
        // vai assumir por padrão e o form vai ficar preenchido
        mounted() {
            if(this.contato){
                this.form = this.contato;
            }
        },

        methods: {
            submitForm() {
                // Ao tivar loadin é desativado o botão e ativa a animação
                this.loading = true;

                // Verifica qual metodo foi acionado, o POST ou PUT, edit ou adicionar
                // Verifica se o retorno foi o esperado e usa o sweetalert2
                // para apresentar uma mensagem de confirmação
                if(this.contato){
                    axios.put('/contatos', this.form)
                    .then(response => {
                        // Apos concluido ativa o botão novamente e desativa a animação
                        this.loading = false;

                        // Verifica se o retorno foi 200 ou 201
                        // apresenta a mensagem e redireciona para lista de contatos
                        if(response.status == 200 || response.status == 201){
                            swal(
                                'Editado!',
                                'O contato foi editado com sucesso!',
                                'success'
                            ).then((result) => {
                                window.location.href="/contatos"
                            })

                        // Alguma mensagem diferente de 200 || 201 apresenta mensagem  
                        }else{
                            swal(
                                'Erro!',
                                'Erro ao editar!',
                                'warning'
                            )
                        }
                    })
                    // Exeção apresenta o erro que ocorreu e libera o botão
                    .catch(error => {
                        this.loading = false;
                        swal(
                            'Erro!',
                            error.message,
                            'warning'
                        )
                        console.log(err)
                    })
                }else{
                    axios.post('/contatos', this.form)
                    .then(response => {
                        // Apos concluido ativa o botão novamente e desativa a animação
                        this.loading = false;

                        // Verifica se o retorno foi 200 ou 201
                        // apresenta a mensagem redireciona para lista de contatos
                        if(response.status == 200 || response.status == 201){
                            swal(
                                'Cadastrado!',
                                'O contato foi cadastrado com sucesso!',
                                'success'
                            ).then((result) => {
                                window.location.href="/contatos"
                            })

                        // Alguma mensagem diferente de 200 || 201 apresenta mensagem    
                        }else{
                            swal(
                                'Erro!',
                                'Erro ao realizar o cadastro!',
                                'warning'
                            )
                        }
                    })
                    // Exeção apresenta o erro que ocorreu e libera o botão
                    .catch(error => {
                        this.loading = false;
                        swal(
                            'Erro!',
                            error.message,
                            'warning'
                        )
                        console.log(err)
                    })
                }      
            },
        }
    }
</script>

<style lang="scss">
 // Defino a animação rotate, duração de 1 segundo e duração infinita
 .rotate{
     animation: rotate 1s infinite;
 }

// Para criar animações, de rotação 0 a rotacao 360
// pode criar deslocamento, 
 @keyframes rotate{
     from {
         transform: rotate(0deg);
     }
     to {
         transform: rotate(360deg);
     }
 }
</style>
