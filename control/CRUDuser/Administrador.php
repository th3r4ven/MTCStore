<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 26/12/2019
 * Time: 16:43
 */

class Administrador{

    private $admID;
    private $username;
    private $email;
    private $senha;
    private $user_type;

    /**
     * @return mixed
     */
    public function getAdmID()
    {
        return $this->admID;
    }

    /**
     * @param mixed $admID
     */
    public function setAdmID($admID): void
    {
        $this->admID = $admID;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return urldecode($this->username);
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = urlencode($username);
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return urldecode($this->email);
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = urlencode($email);
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha): void
    {
        $senha = urlencode($senha);
        $this->senha = md5($senha);
    }

    /**
     * @return mixed
     */
    public function getUserType()
    {
        return urldecode($this->user_type);
    }

    /**
     * @param mixed $usert_type
     */
    public function setUserType($user_type): void
    {
        $this->user_type = urlencode($user_type);
    }

    public function cadastrarADM($conexao){
        include $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDUser/INSERT_ADM.php';
        $cadastrar = new INSERT_ADM();

        $cadastrar->conexao = $conexao;
        $resultado = $cadastrar->InsertUser($this->username, $this->email, $this->senha, $this->user_type);

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            return '0';
        }else{
            return '1';
        }

    }

    public function alterarADM($conexao){
        include $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDUser/ALTER_ADM.php';
        $alterar = new ALTER_ADM();
        $alterar->conexao = $conexao;

        $resultado = $alterar->AlterarUsuario($this->admID, $this->username, $this->email);

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            return '0';
        }else{
            foreach ($resultado as $resul){
                $this->setAdmID($resul['id']);
                $this->setUsername($resul['username']);
                $this->setEmail($resul['email']);
                $this->setUserType($resul['user_type']);
            }
            return '1';
        }
    }

    public function alterarSenhaADM($conexao){
        include $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDUser/ALTER_ADM.php';
        $alterar = new ALTER_ADM();
        $alterar->conexao = $conexao;

        $resultado = $alterar->AlterarSenha($this->admID, $this->senha);

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            return '0';
        }else{
            return '1';
        }
    }

    public function excluirADM($conexao){
        include $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDUser/DELETE_ADM.php';
        $excluir = new DELETE_ADM();
        $excluir->conexao = $conexao;

        $resultado = $excluir->DeletarUsuario($this->admID);

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            return '0';
        }else{
            return '1';
        }
    }

}