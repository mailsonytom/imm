<?php session_start();
$_SESSION['previous'] = 0;
echo '<script type="text/javascript">
    window.location = "dashboard.php"
     </script>';
?>