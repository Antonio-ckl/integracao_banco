<?php

namespace App\Service;

use App\Models\Usuario;

class UsuarioService{

public function create(array $dados){
    $user = Usuario::create([
        'nome' => $dados['nome'],
        'email' => $dados['email'],
        'password' => $dados ['password']
    ]);

    return $user;
}

public function update(array $dados){
    
    if(isset($dados['password'])){
        $usuario->password=$dados['password'];
    }

}
public function delete($id){
    $usuario= Usuario::find($id);

    if($usuario==null){
        return [
            'status'=> false,
            'message'=> 'Usuario Inexistenteou Não encontrado'
        ];
    }
    $usuario->delete();
    return [
        'status'=> true,
        'message'=> 'Usuario excluido com Sucesso'
    ];

    }

    public function findById($id){
$usuario = Usuario::find($id);

if($usuario == null){
    return [
        'status'=> false,
        'message' => 'Usuario não encontrado'
    ];
}
return [
    'status'=> true,
    'message'=> 'usuario encontrado',
    'data'=> $usuario
];
}

public function getALL(){
$usuarios= Usuario::all();

return [
    'status'=>true,
    'message'=>'PesquisaRealizada COm Sucesso',
    'data'=> $usuarios
];
}

public function searchByName($nome){
    $usuarios= Usuario::where('nome','like','%'.$nome.'%')->get();
    if($usuarios->isEmpty()){
        return [
            'status'=> false, 
            'message'=>'Sem resultado'     ];
    }

    return [
        'status'=>true,
        'message'=> 'Resultados Encontrados',
        'data'=> $usuarios
    ];
}

public function searchByEmail($email){
    $usuarios= Usuario::where('email','like','%'.$email.'%')->get();
    if($usuarios->isEmpty()){
        return[
            'status'=> false,
            'message'=>'Sem Dados'
        ];
        }
        return[
            'status'=>true,
            'messagem' => 'Dados Encontrados',
            'data'=> $usuarios
        ]; 
}
}