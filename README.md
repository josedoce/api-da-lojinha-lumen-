<h1 align="center">Api-loginha usando Lumen PHP Framework</h1>

​													![Badge](https://img.shields.io/static/v1?label=lumen&message=framework&color=blue&style=for-the-badge&logo=LUMEN)![Badge](https://img.shields.io/static/v1?label=laravel&message=framework&color=blue&style=for-the-badge&logo=LARAVEL)

------
## Do que se trata ? 

<p align="justify">
    Se trata de uma versão da <a href="https://github.com/josedoce/api-da-lojinha-nodejs">api-da-lojinha-nodejs</a> construida utilizando o lumen-laravel, nesta aplicação aplicarei meus conhecimentos sobre laravel e nodejs no lumen. :) Deixarei umas tarefinhas caso alguem queira colaborar.
</p>

## O que exatamente esta api faz ?

<p align="justify">Eu poderia escrever um resumo, mas basicamente ela faz o basico no momento... Logo logo alimentarei uma lista com todos os serviços/funções da api e seus respectivos usufruidores do mesmo</p>

------

### Conteúdos por topico
   * [Principais tarefas da api](#Principais-tarefas-que-a-api-é-capaz-de-fazer)

------

## Principais tarefas que a api é capaz de fazer

### :bust_in_silhouette:Visitante pode: 

- [ ] Criar usuario

### :bust_in_silhouette: Usuario pode: 												 
- [ ] Logar
- [ ] Autenticar-se
- [ ] Lembrar-se
- [ ] Pedir autorização-se
- [ ] Editar usuario
- [ ] Deletar usuario
- [ ] Finalizar sessão
- [ ] Se tornar cliente  
- [ ] Se tornar vendedor 

### :bust_in_silhouette: Cliente pode: 	

- [ ] Comprar
- [ ] Cancelar compra
- [ ] Adicionar/Remover/Editar carrinho
- [ ] Adicionar/Remover favorito
- [ ] comentar/avaliar 

### :bust_in_silhouette: Vendedor pode: 	

- [ ] Vender
- [ ] Acessar dados do cliente
- [ ] Adicionar/Remover/Editar Produto
- [ ] Adicionar/Remover lista negra
- [ ] comentar/avaliar 

------
### Tarefas cumpridas:
- [x] Configurações seguras de headers
- [x] Organização de codigo

------
## Status do projeto:runner:

> Status do Projeto: Em desenvolvimento :warning:

-------

## Deploy da aplicação:cloud:

> <a href="http://localhost:8000">Testar aplicação</a>

### Screenshots


------
## Estrutura de pastas do projeto:
```sh

/
	/app    
	/bootstrap
	/database
	/public
	/resources
	/routes
	/storage
	/tests
	/vendor
	.editor
	.env
	.env.exemple
	.gitignore
	.styleci.yml
	artisan
	composer.json
	composer.lock
	phpunit.xml
	README.md
	server_start.sh
```
------

## Como rodar o aplicativo :play_or_pause_button:

> `$ git clone https://github.com/josedoce/api-da-lojinha-lumen-`
> `$ cd api-da-lojinha-lumen-`
> `$ ./server_start.sh` ou `$ php -S localhost:8000 -t public`

------

## Linguagens e libs utilizadas :books:

- [Lumen](https://lumen.laravel.com/docs/8.x): versão 8
- [helmet](https://helmetjs.github.io/see-also/): versão 7.1.0
- [bcrypt](https://packagist.org/packages/polarising/bcrypt): versão 1
- [uuid](https://uuid.ramsey.dev/en/latest/rfc4122/version4.html): versao 4

------

## Me ajude a te ajudar::man_factory_worker:

### Resolvendo problemas e buscando soluções

Veja alguns problemas que surgiram no desenvolvimento deste projeto e como os resolvi em [issues](https://github.com/josedoce/api-da-lojinha-lumen-/issues )


