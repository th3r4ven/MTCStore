<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 06/12/2019
 * Time: 11:10
 */

?>



<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="http://localhost/site/view/dashboard/index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Login Screens:</h6>
            <a class="dropdown-item" href="http://localhost/site/view/login.php">Login</a>
            <a class="dropdown-item" href="#">Register</a>
            <a class="dropdown-item" href="#">Forgot Password</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Other Pages:</h6>
            <a class="dropdown-item" href="404.php">404 Page</a>
            <a class="dropdown-item" href="useless/blank.php">Blank Page</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="http://localhost/site/view/dashboard/charts.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="http://localhost/site/view/dashboard/tables.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Usuários</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Administradores:</h6>
            <a class="dropdown-item" href="http://localhost/site/view/dashboard/usuarios/cadADM.php">Administradores</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Clientes:</h6>
            <a class="dropdown-item" href="http://localhost/site/view/dashboard/usuarios/cadCli.php">Cadastrar</a>
            <a class="dropdown-item" href="http://localhost/site/view/dashboard/usuarios/clientes.php">Todos os clientes</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-box-open"></i>
            <span>Produtos</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="http://localhost/site/view/dashboard/produto/cad_prod.php">Cadastrar Produtos</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="http://localhost/site/view/dashboard/produto/produto.php">Todos os produtos</a>
            <a class="dropdown-item" href="http://localhost/site/view/dashboard/produto/categoria.php">Categorias</a>
            <a class="dropdown-item" href="http://localhost/site/view/dashboard/produto/subcategoria.php">Sub Categorias</a>
            <a class="dropdown-item" href="http://localhost/site/view/dashboard/produto/variacao.php">Variações</a>
            <a class="dropdown-item" href="http://localhost/site/view/dashboard/produto/cupons.php">Cupons</a>

        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Configurações</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Personalizar:</h6>
            <a class="dropdown-item" href="http://localhost/site/view/dashboard/util/config.php">Páginas</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Dados da loja:</h6>
            <a class="dropdown-item" href="http://localhost/site/view/dashboard/util/home.php">Configurações Gerais</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Midias:</h6>
            <a class="dropdown-item" href="http://localhost/site/view/dashboard/usuarios/midia.php">Mídias</a>
        </div>
    </li>




    <li class="nav-item">
        <a class="nav-link" href="http://localhost/site/view/dashboard/usuarios/User.php">
            <i class="far fa-address-card"></i>
            <span>Perfil</span></a>
    </li>
</ul>

<div id="content-wrapper">
    <div class="container-fluid">
