<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 06/12/2019
 * Time: 13:46
 */

?>

<!-- Breadcrumbs -->
<ol class="breadcrumb">
    <?php echo $path;?>
    <li class="breadcrumb-item active"><?php echo ($title == 'Crow Dashboard' ?  "" :  $title) ?></li>
</ol>
