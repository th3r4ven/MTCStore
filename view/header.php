<?php
/**
 * Created by PhpStorm.
 * User: HACKCR0W
 * Date: 30/11/2019
 * Time: 16:10
 */

/**
*
* THIS FILE IS CALLED ON ALL FILES THAT ITS NOT FROM ADMIN DASHBOARD,
* THIS FILES CALLS FOR pagetile.php THAT DEFINES THE SITE TITLE.
*
**/


session_start();

include $_SERVER['DOCUMENT_ROOT'] . '/site/control/dynamic_data/pagetitle.php';

$page = new PageTitle();
$title = $page->get_page_title();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title ?> </title>
    <link rel="icon" href="http://localhost/site/assets/images/crow.png"/>
    <meta name="Author" content="Matheus T. Chiarato">
    <link rel="stylesheet" type="text/css" href="http://localhost/site/assets/CSS/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/site/assets/CSS/bootstrap-grid.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/site/assets/CSS/bootstrap-reboot.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/site/assets/CSS/style.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/site/assets/CSS/login.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>

<body class="<?php if(isset($cssClassBody)){echo $cssClassBody;} ?>">



