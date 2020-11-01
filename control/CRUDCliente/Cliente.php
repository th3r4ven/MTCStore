<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 26/12/2019
 * Time: 11:56
 */


/**
 * Class Cliente.
 *
 * This class contains all the code for the client CRUD on the admin dashboard;
 * The functions is named as what they do. ex.: cadastrarCliente($conexao) get the values from the variables to insert into the database table.
 *
 */
class Cliente{


    private $clientID;
    private $firstName;
    private $lastName;
    private $nomeCompleto;
    private $email;
    private $cpf;
    private $data_nascimento;
    private $telefone;
    private $cep;
    private $endereco;
    private $numero;
    private $estado;
    private $bairro;
    private $cidade;

    /**
     * @return mixed
     */
    public function getClientID()
    {
        return $this->clientID;
    }

    /**
     * @param mixed $clientID
     */
    public function setClientID($clientID): void
    {
        $this->clientID = $clientID;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        $this->firstName = urldecode($this->firstName);
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName): void
    {
        $this->firstName = urlencode($firstName);
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        $this->lastName = urldecode($this->lastName);
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName): void
    {
        $this->lastName = urlencode($lastName);
    }

    /**
     * @return mixed
     */
    public function getNomeCompleto()
    {
        $this->nomeCompleto = urldecode($this->nomeCompleto);
        return $this->nomeCompleto;
    }

    /**
     * @param mixed $nomeCompleto
     */
    public function setNomeCompleto($nomeCompleto): void
    {
        $this->nomeCompleto = urlencode($nomeCompleto);
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        $this->email = base64_decode(urldecode($this->email));
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = base64_encode(urlencode($email));
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        $this->cpf = base64_decode(urldecode($this->cpf));
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf): void
    {
        $this->cpf = base64_encode(urlencode($cpf));
    }

    /**
     * @return mixed
     */
    public function getDataNascimento()
    {
        $this->data_nascimento = urldecode($this->data_nascimento);
        return $this->data_nascimento;
    }

    /**
     * @param mixed $data_nascimento
     */
    public function setDataNascimento($data_nascimento): void
    {
        $this->data_nascimento = urlencode($data_nascimento);
    }

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        $this->telefone = urldecode($this->telefone);
        return $this->telefone;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone): void
    {
        $this->telefone = urlencode($telefone);
    }

    /**
     * @return mixed
     */
    public function getCep()
    {
        $this->cep = urldecode($this->cep);
        return $this->cep;
    }

    /**
     * @param mixed $cep
     */
    public function setCep($cep): void
    {
        $this->cep = urlencode($cep);
    }

    /**
     * @return mixed
     */
    public function getEndereco()
    {
        $this->endereco = urldecode($this->endereco);
        return $this->endereco;
    }

    /**
     * @param mixed $endereco
     */
    public function setEndereco($endereco): void
    {
        $this->endereco = urlencode($endereco);
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero): void
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado): void
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getBairro()
    {
        $this->bairro = urldecode($this->bairro);
        return $this->bairro;
    }

    /**
     * @param mixed $bairro
     */
    public function setBairro($bairro): void
    {
        $this->bairro = urlencode($bairro);
    }

    /**
     * @return mixed
     */
    public function getCidade()
    {
        $this->cidade = urldecode($this->cidade);
        return $this->cidade;
    }

    /**
     * @param mixed $cidade
     */
    public function setCidade($cidade): void
    {
        $this->cidade = urlencode($cidade);
    }

    /**
     * This function group the first and the last name to the full name of the Client
     */
    public function nomeCompleto(){
        $nomecompleto = urldecode($this->firstName) . " " . urldecode($this->lastName);
        $this->setNomeCompleto($nomecompleto);
    }

    /**
     * @param $conexao
     * @return string
     */
    public function cadastrarCliente($conexao){
        include_once $_SERVER['DOCUMENT_ROOT'] . '/site/control/security/gerador_de_senha.php';
        $senha = Gerarsenha();

        include $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDCliente/INSERT_Cliente.php';
        $cadastrar = new INSERT_Cliente();
        $cadastrar->conexao = $conexao;
        $resultado = $cadastrar->Inserir_cliente($this->nomeCompleto, $this->email, $this->cpf, $this->data_nascimento, $this->telefone, $this->cep, $this->endereco, $this->numero, $this->estado, $this->bairro, $this->cidade, $senha);

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            return '0';
        }else{
            return '1';
        }
    }

    /**
     * @param $conexao
     * @return string
     */
    public function deletarCliente($conexao){
        include $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDCliente/DELETE_Cliente.php';
        $deletar = new DELETE_Cliente();
        $deletar->conexao = $conexao;
        $resultado = $deletar->DeletarCliente($this->clientID);

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            return '0';
        }else{
            return '1';
        }
    }

    /**
     * @param $conexao
     * @return string
     */
    public function alterarCliente($conexao){
        include $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDCliente/ALTER_Cliente.php';
        $alterar = new ALTER_Cliente();
        $alterar->conexao = $conexao;

        $resultado = $alterar->Alterar_cliente($this->clientID, $this->nomeCompleto, $this->email, $this->cpf, $this->data_nascimento, $this->telefone, $this->cep, $this->endereco, $this->numero, $this->estado, $this->bairro, $this->cidade);

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            return '0';
        }else{
            return '1';
        }
    }

    /**
     * @param $conexao
     * @return string|null
     */
    public function alterarSenhaCliente($conexao){
        include $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDCliente/ALTER_Cliente.php';
        $alterar = new ALTER_Cliente();
        $alterar->conexao = $conexao;

        include_once $_SERVER['DOCUMENT_ROOT'] . '/site/control/security/gerador_de_senha.php';
        $senha = Gerarsenha();

        $resultado = $alterar->Alterar_senha_cliente($senha, $this->clientID);

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            return '0';
        }else{
            return $senha;
        }
    }

    /**
     * @param $conexao
     * @return bool|mysqli_result|string
     */
    public function listarClientes($conexao){
        include $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDCliente/SELECT_Cliente.php';
        $listar = new SELECT_Cliente();
        $listar->conexao = $conexao;
        $resultado = $listar->SelectCliente();

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            return '0';
        }else{
            return $resultado;
        }
    }

    /**
     * @param $conexao
     * @param $busca
     * @return bool|mysqli_result|string
     */
    public function search_cliente($conexao, $busca){
        include $_SERVER['DOCUMENT_ROOT'] . '/site/dao/CRUDCliente/SELECT_Cliente.php';
        $listar = new SELECT_Cliente();
        $listar->conexao = $conexao;
        $busca64 = base64_encode($busca);
        $resultado = $listar->searchCliente($busca, $busca64);

        if($resultado == '0' || $resultado == null || !isset($resultado)){
            return '0';
        }else{
            return $resultado;
        }
    }

}