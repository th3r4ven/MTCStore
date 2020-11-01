<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 06/12/2019
 * Time: 16:31
 */


class PageTitle{


    public $title;
    public $paginaFront;
    public function get_page_title(){

        $page = $_SERVER['PHP_SELF'];
        switch ($page){
            case '/site/view/dashboard/index.php':
                $this->title = 'Crow Dashboard';
                break;

            case '/site/view/dashboard/tables.php':
                $this->title = 'Tables Dashboard';
                break;
            case '/site/view/dashboard/usuarios/cadADM.php':
                $this->title = 'Administradores';
                break;

            case '/site/view/dashboard/usuarios/User.php':
                $this->title = 'Perfil';
                break;
            case '/site/view/dashboard/usuarios/clientes.php':
                $this->title = 'Clientes';
                break;

            case '/site/view/dashboard/404.php':
                $this->title = '404';
                break;

            case '/site/view/login.php':
                $this->title = 'Login';
                break;

            case '/site/view/logout.php':
                $this->title = 'Logout';
                break;

            case '/site/view/dashboard/charts.php':
                $this->title = 'Charts';
                break;

            case '/site/view/dashboard/produto/cad_prod.php':
                if(isset($_GET['produto'])){$this->title = 'Editar produto';}
                else{$this->title = 'Cadastrar Produto';}
                break;

            case '/site/view/dashboard/produto/produto.php':
                $this->title = 'Todos os produtos';
                break;

            case '/site/view/dashboard/usuarios/cadCli.php':
                $this->title = 'Clientes';
                break;

            case '/site/view/dashboard/usuarios/edit_cliente.php':
                $this->title = 'Editar Cliente';
                break;

            case '/site/view/dashboard/produto/cupons.php':
                $this->title = 'Cupons';
                break;

            case '/site/view/store/index.php':
                $this->title = 'Crow Store | Home';
                $this->paginaFront = 'Home';
                break;

            case '/site/view/store/carrinho.php':
                $this->title = 'Crow Store | Carrinho';
                $this->paginaFront = 'Carrinho';
                break;

            case '/site/view/store/store.php':
                $this->title = 'Crow Store | Loja';
                $this->paginaFront = 'Loja';
                break;

            case '/site/view/store/checkout.php':
                $this->title = 'Crow Store | Checkout';
                $this->paginaFront = 'Checkout';
                break;


            case '/site/view/store/produto.php':
                $this->title = 'Crow Store | Produto';
                $this->paginaFront = 'Produto';
                break;

            case '/site/view/store/ThankyouPage.php':
                $this->title = 'Crow Store | Obrigado(a) pela compra!';
                break;

            case '/site/view/store/contato.php':
                $this->title = 'Crow Store | Contato';
                $this->paginaFront = 'Contato';
                break;

            default:
                $this->title = 'Crow Dashboard';
                break;
        }

        return $this->title;

    }

}

