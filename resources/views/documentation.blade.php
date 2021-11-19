<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>api-v1-doc</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="corpo">
		
	</div>
	<script src="js/documentation.js" type="text/javascript" charset="utf-8"></script>
	<script>
		let api = new Documentation('corpo','API LOJINHA V.LUMEN','http://localhost:8000');
	const Component =`
			<div class="panel">
			  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
			</div>`;
	api
	.createRequestGroup('users')
		.createRequestMethod('/v1/users', 'listar usuários')
		.get().andRender(Component)

		.createRequestMethod('/v1/user/{id}','exibir usuário')
		.get().andRender(Component)

		.createRequestMethod('/v1/user', 'criar usuário')
		.post().andRender(Component)

		.createRequestMethod('/v1/user/{id}/edite', 'editar usuário')
		.put().andRender(Component)

		.createRequestMethod('/v1/user/{v1}/delete', 'deletar usuário')
		.delete().andRender(Component)

	.createRequestGroup('posts')
		.createRequestMethod('/v1/posts', 'listar posts')
		.get().andRender(Component)

		.createRequestMethod('/v1/post/{id}', 'exibir post')
		.get().andRender(Component)

		.createRequestMethod('/v1/post', 'criar post')
		.post().andRender(Component)
		
		.createRequestMethod('/v1/post/{id}/edite', 'editar post')
		.put().andRender(Component)

		.createRequestMethod('/v1/post/{id}/delete', 'deletar post')
		.delete().andRender(Component)
		.build();
	


	api.enableAccordeonEvents();
	</script>


</body>	
</html>