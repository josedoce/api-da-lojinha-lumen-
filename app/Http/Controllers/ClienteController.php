<?php

namespace App\Http\Controllers;

// use App\Services\UsuarioService;
use Firebase\JWT\JWT;
use Bcrypt\Bcrypt;
use Firebase\JWT\ExpiredException;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;
use App\Models\Cliente;

class ClienteController extends Controller
{
    // private $usuario;
    
    // public function __construct(UsuarioService $usuario)
    // {
    //     $this->usuario = $usuario;
    // }

    public function listar(Request $request){
      $usuarioExiste = Cliente::where('email',$request->dados['token_decode']->sub)->first();

        return response()->json([
            'dados'=>$usuarioExiste
        ], 200);
    }

    public function exibir(Request $request){
        $bcrypt = new Bcrypt(); 
        $usuarioExiste = Cliente::where('email',$request->email)->first();
        if($usuarioExiste){
            if(!$bcrypt->verify($request->senha,$usuarioExiste->senha)){
                return response()->json([
                'error'=>'Senha errada.',
                'hasError'=> true
                ],400);
            }  
        }else{
            return response()->json([
                'error'=>'Email errado ou não existe em nossa base de dados.',
                'hasError'=> true
            ],400);
        }

        
        if($usuarioExiste and $usuarioExiste->token!=='null'){
            return response()->json([
                'sucesso'=>'Usuário logado com o token do db',
                'token'=>$usuarioExiste->token,
                'hasError'=> false
            ],202);
        }

        $expire = env("APP_TOKEN_DEFAULT_EXPIRE"); //24 horas
        if($request->lembrar){
            $expire = env("APP_TOKEN_REMEMBE_EXPIRE"); //7dias
        }

        $date = new \DateTime();
        $payload = [
            "iss"=>"http://localhost:8000",
            "sub"=>$request->email,
            "exp"=>$date->getTimestamp()+$expire
        ];
        
        $token = JWT::encode($payload, env("APP_SECRET_KEY"));
        $usuarioExiste->token = $token;
        $usuarioExiste->save();

        return response()->json([
            'sucesso'=>'Usuário logado',
            'token'=>$token,
            'hasError'=> false
        ],202);
    }

    public function criar(Request $request)
    {
        $usuarioExiste = Cliente::where('email',$request->email)->first();
        if($usuarioExiste){
            return response()->json([
                'error'=>'usuario já existente.',
                'hasError'=> true
            ],400);
        }
        
        $bcrypt = new Bcrypt();   
        $expire = env("APP_TOKEN_DEFAULT_EXPIRE"); //24 horas
        if($request->lembrar){
            $expire = env("APP_TOKEN_REMEMBE_EXPIRE"); //7dias
        }
        $date = new \DateTime();
        $payload = [
            "iss"=>"http://localhost:8000",
            "sub"=>$request->email,
            "exp"=>$date->getTimestamp()+$expire
        ];
        
        $dados = [
            'nome'=>$request->nome,
            'sobrenome'=>$request->sobrenome,
            'email'=>$request->email,
            'senha'=>$bcrypt->encrypt($request->senha, '2a'),
            'token'=>JWT::encode($payload, env("APP_SECRET_KEY"))
        ];
        $cliente = Cliente::create($dados);
        return response()->json(['sucesso'=>'usuario criado.','resposta'=>$dados],201);
    }

    public function editar(Request $request, $id)
    {
        $dado = $request->only([
            "tipo",
            "nome",
            "sobrenome",
            "email",
            "senha",
            "agencia",
            "conta",
            "cpf_cnpj",
            "n_cartao",
            "titular",
            "validade",
            "endereco",
            "celular",
        ]);
        $usuarioExiste = Cliente::where('email',$request->dados['token_decode']->sub)->where('uuid',$id)->first();
        
        if(!$usuarioExiste){
            return response()->json([
                'status'=>'error',
                'message'=>'Usuario não foi encontrado.',
                'hasError'=> true,
            ], 404);
        }
        $bcrypt = new Bcrypt();
        
        foreach (array_keys($dado) as $value) {
            if($value === 'senha'){
                $usuarioExiste[$value] = $bcrypt->encrypt($dado[$value], '2a');
            }
            switch ($dado['tipo']) {
                case 'cliente':
                    if($value!=='agencia' and $value!=='conta' and $value!=='senha' and $value!=='tipo'){
                        $usuarioExiste[$value] = $dado[$value];
                    }
                    break;
                case 'vendedor':
                    if($value!=='n_cartao' and $value!=='validade' and $value!=='senha' and $value!=='tipo'){
                        $usuarioExiste[$value] = $dado[$value];
                    }
                    break;
                default:
                   return response()->json([
                        'status'=>'falha',
                        'message'=>'Escolha um tipo de usuario.',
                        'help'=>'Passe um tipo pode ser cliente ou vendedor',
                        'hasError'=> true,
                    ], 400);
            }
        }
        if($dado['tipo']==='cliente'){
            $usuarioExiste['isCliente'] = 'true';
            $usuarioExiste['isVendedor'] = 'false';
        }else if($dado['tipo']==='vendedor'){
            $usuarioExiste['isCliente'] = 'false';
            $usuarioExiste['isVendedor'] = 'true';
        }
        $usuarioExiste->save();

        return response()->json([
                'status'=>'success',
                'message'=>'Editado com sucesso.',
                'hasError'=> false,
                'dados'=>$usuarioExiste
        ], 200);
    }

    public function logout(Request $request)
    {
        $usuarioExiste = Cliente::where('email',$request->dados['token_decode']->sub)->first();
        if($usuarioExiste and $usuarioExiste->token!=='null'){
            $usuarioExiste->token = 'null';
            $usuarioExiste->save();
            return response()->json([
                'status'=>'success',
                'message'=>'Token anulado.',
                'hasError'=> false
            ], 200);
        }else{
            return response()->json([
                'status'=>'error',
                'message'=>'Token não foi anulado.',
                'hasError'=> true
            ], 200);
        }
    }

    public function deletar(Request $request, $id){
        $usuarioExiste = Cliente::where('email',$request->dados['token_decode']->sub)->where('uuid',$id)->delete();
        if($usuarioExiste){
            return response()->json([
                'status'=>'success',
                'message'=>'Usuario excluido',
                'hasError'=> false
            ], 200);
        }
        return response()->json([
            'status'=>'error',
            'message'=>'Usuario não pode ser excluido.',
            'hasError'=> true,
        ], 200);
    }
}
