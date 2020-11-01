<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 06/12/2019
 * Time: 11:03
 */

/**
 * header.php include the navbar from the dashboard and start the tag <div class="wrapper">;
 *
 * header.php include the <head> tag if your essential information and start the body html tag;
 *
 * header.php include the sidebar from the  dashboard;
 *
 * setup the admin menu and start the <div id="content-wrapper"> and <div class="container-fluid"> ;
 */

include_once 'header.php';


/**
 * breadcrumbs.php prints the nav path
 */
include_once 'breadcrumbs.php';

/**
 * cards.php print the mini cards on the top of the page
 */
include_once 'cards.php';

/**
 * chart.php print the update time
 */
include_once 'chart.php';

/**
 * tables.php print the table structure
 */
include_once 'tables.php';

/**
 * closetags.php close the tags that were open on sidebar.php
 */


/**
 * footer.php just display the scroll to top buttom
 *
 * footer.php execute the logout model that happens when the user click on logout buttom on the navbar
 *
 * footer.php just close the tags and call for scripts
 */
include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/footer.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/end.php';