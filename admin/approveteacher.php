<?php include 'connect.php' ?>
<?php
session_start();
if (!isset($_SESSION['admin'])) {
    echo '<script type="text/javascript">
                window.location = "signin.php"
                 </script>';
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "UPDATE teachers SET verified=1 WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        echo '<script type="text/javascript">
                window.location = "teacherslist.php"
                </script>';
    }
}
?>