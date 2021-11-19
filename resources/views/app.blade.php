<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>app</title>

  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
 
</head>
<body>
  <div id="app">
    <h1>Interface de testes com axios</h1>
    <p>
      <router-link to="/foo">Logar</router-link>
      <router-link to="/bar">Registrar</router-link>
      <router-link to="/dar">Dados</router-link>
      <router-link to="/logout">sair</router-link>
    </p>
    <router-view></router-view>
    
  </div>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script>
    const BASE_URL = "http://localhost:8000/api/v1";
    function api(){
      let token = localStorage.getItem('localhost_8000_token');
      return axios.create({
        baseURL: BASE_URL,
        timeout: 1000,
        headers: {'Authorization': 'Bearer '+token}
      });
    }

    
    const Dados = {
      template: `
        <div>
          <h1>Dados do usuário</h1>
          <pre>
            <code>
              @{{dados}}
            </code>
          </pre>
        </div>
      `,
      data: function(){
        return  {
          dados: {}
        }
      },
      mounted: function(){
        console.log('foi montado')
        if(!localStorage.getItem('localhost_8000_token')){
          this.$router.push({name: 'Login'});
          return;
        }
        
        api().get(`${BASE_URL}/usuario/auth/dados`)
        .then((retorno)=>{
          this.dados = retorno.data.dados;
        }).catch((retorno)=>{
          alert('Erro, nada foi retornado.');
        });
        
        
      }
    };
    const Foo = { 
      template: `
      <div>
        <form action="">
          <label>
            Email
            <input type="text" id="email" value="seila@gmail.com">
          </label><br>
          <label>
            Senha
            <input type="password" id="senha" value="algumasenha">
          </label><br>
          <button type="submit">Logar</button>
        </form>
      </div>`,
      methods: {
        logar: async function(data){
          axios.post(`${BASE_URL}/usuario/logar`, data)
            .then((retorno)=>{
              if(retorno.statusText === 'Accepted'){
                localStorage.setItem('localhost_8000_token',retorno.data.token);
                this.$router.push({name: 'Dados'});
              }else{
                alert('Aconteceu algum erro, recarregue a pagina.');
              }
            }).catch((retorno)=>{
              alert(`Falha: ${retorno.response.data.error}`)
            });
        }
      },
      mounted: function(){
        const form = document.querySelector('form');
        form.addEventListener('submit', async event => {
          event.preventDefault();
          const email = document.querySelector('#email').value;
          const senha = document.querySelector('#senha').value;
          await this.logar({
            email,
            senha
          });
        });
      } 
    }
    const Bar = {
      props: ['nome'], 
      template: `
      <div>
        bar @{{nome}}
        <form action="">
          <label>
            Nome
            <input type="text" id="nome" value="fulano">
          </label><br>
          <label>
            Sobrenome
            <input type="text" id="sobrenome" value="deltrano">
          </label><br>
          <label>
            Email
            <input type="text" id="email" value="seila@gmail.com">
          </label><br>
          <label>
            Senha
            <input type="password" id="senha" value="algumasenha">
          </label><br>
          <button type="submit">Registrar</button>
        </form>
      </div>`, 
      methods: {
        clicou: function(){
          console.log('clicou em mim.');
        },
        registrar: async function(data){ 
          axios
            .post(`${BASE_URL}/usuario/registrar`, data)
            .then((retorno)=>{
              if(retorno.statusText === 'Accepted'){
                this.$router.push({name: 'Dados'});
              }else{
                alert('Aconteceu algum erro, recarregue a pagina.');
              }
            }).catch((retorno)=>{
              alert(`Falha: ${retorno.response.data.error}`)
            });
          const retorno = response.data;
          console.log("dados do registro",retorno);
        }
      },
      mounted: function(){
        const form = document.querySelector('form');
        form.addEventListener('submit', async event => {
          event.preventDefault();
          const nome = document.querySelector('#nome').value;
          const sobrenome = document.querySelector('#sobrenome').value;
          const email = document.querySelector('#email').value;
          const senha = document.querySelector('#senha').value;
          await this.registrar({
            nome,
            sobrenome,
            email,
            senha
          });
        });
      }
    }
 
    const router = new VueRouter({
      routes: [
        { path: '/foo', name: 'Login', component: Foo},
        { path: '/bar', component: Bar},
        { path: '/dar', name: 'Dados' , component: Dados},
      ]
    })
    const app = new Vue({
      router,
      data: function(){
        return {
          hasLogin: localStorage.getItem('localhost_8000_token')?true:false,
        }
      },
    }).$mount('#app')
  </script>
</body>
</html>