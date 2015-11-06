<?php
//namespace validator;


class Usuario {

  /**
  * Funcao de cadastro de usuario:
  * @param string $nome Nome do usuario a ser cadastrado
  * @param string $email Email do usuario a ser cadastrado
  * @param $opcaoPagamento
  * @param boolean $gravado True se escolher opcao de gravado, False caso nao
  * @param boolean $streaming True se escolher opcao de streaming, False caso nao
  */
  public function cadastrar($nome, $email, $senha) {
    $dados['nome'] = $nome;
    $dados['email'] = $email;

    $senha = $senha;
    $custo = '08';
    $salt = 'Cf1f11ePArKlBJomM0F6aJ';
  // Gera um hash baseado em bcrypt
    $hash = crypt($senha, '$2a$' . $custo . '$' . $salt . '$');

    $dados['senha'] = $hash;
    inserir('usuarios',$dados);
  }

  public function cadastrarSenha($pass,$email){
    $id = ver('usuarios','id',"email = '$email' AND ativo = 't'");
    //echo "aqui";
  //  var_dump("<pre>",$email,"<pre>");
  //  var_dump("<pre>",$id,"<pre>");

    $dados['senha'] = $pass;
    $dados['id_usuario'] = $id['id'];

    $jaExiste = ver('senhas','id',"id_usuario = {$dados[id_usuario]}");

    if($jaExiste==FALSE){
      //var_dump($dados);
      //die();
      inserir('senhas',$dados);
    }else{
      echo "Senha já cadastrada para esse usário.";
      die();
    }
  }

  /**
  * Funcao de atualizacao ou update de usuario:
  * @param string $nome Nome do usuario a ser alterado
  * @param string $email Email do usuario a ser alterado
  * @param $opcaoPagamento
  * @param boolean $gravado True se escolher opcao de gravado, False caso nao
  * @param boolean $streaming True se escolher opcao de streaming, False caso nao
  */
  public function alterar($nome, $email, $senha = null) {
    $dados['nome'] = $nome;
    $dados['email'] = $email;

    if($senha != null){
      $senha = $senha;
      $custo = '08';
      $salt = 'Cf1f11ePArKlBJomM0F6aJ';
    // Gera um hash baseado em bcrypt
      $hash = crypt($senha, '$2a$' . $custo . '$' . $salt . '$');

      $dados['email'] = $email;
    }

//    conectar();
    alterar('usuarios',$onde,$dados);
  }

  /**
  * Funcao de deletar usuario:
  * @param string $email Email do usuario a ser alterado
  */
  public function deletar($email) {
    $dados['ativo'] = f;
    $onde = "email = '$email'";
//    conectar();
    alterar('usuarios',$onde,$dados);
  }

  public function verficarEmailCdastrado($email){
  //  conectar();
    return ver('usuarios','email',"email = '{$email}' and ativo = 't'");
  }

  public function buscar($email){
    $campos = "id,nome,email";
    $onde = "email = '$email' and ativo = 't'";
  //  conectar();
    $resultado = listar('usuarios',$campos,$onde);
    return $resultado;
  }

  public function listarAtivos(){
    $campos = "nome,email";
//    conectar();
    $resultado = listar('usuarios',$campos,"ativo = 't'");
    return $resultado;
  }

  public function niveis(){
    $campo = "id";
    $resultado = listar('nivel_acesso',$campo);
    return $resultado;
  }

}
