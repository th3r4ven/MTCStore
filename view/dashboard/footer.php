<?php
/**
 * Created by PhpStorm.
 * User: Talles
 * Date: 06/12/2019
 * Time: 13:58
 */

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/closetags.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/scrolltotop.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/site/view/dashboard/logoutmodel.php';


?>


<!-- Bootstrap core JavaScript-->
<script src="http://localhost/site/view/dashboard/vendor/jquery/jquery.min.js"></script>
<script src="http://localhost/site/view/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="http://localhost/site/view/dashboard/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="http://localhost/site/view/dashboard/vendor/chart.js/Chart.min.js"></script>
<script src="http://localhost/site/view/dashboard/vendor/datatables/jquery.dataTables.js"></script>
<script src="http://localhost/site/view/dashboard/vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="http://localhost/site/view/dashboard/js/sb-admin.min.js"></script>

<!-- Demo scripts for this page-->
<script src="http://localhost/site/view/dashboard/js/demo/datatables-demo.js"></script>
<script src="http://localhost/site/view/dashboard/js/demo/chart-area-demo.js"></script>

<?php if(isset($jspath)){
    echo $jspath;
} ?>



</body>

</html>
